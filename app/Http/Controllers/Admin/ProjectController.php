<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InteriorImage;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length") ?? 10;

            $columnIndex_arr = $request->get('order');
            $columnName_arr = $request->get('columns');
            $order_arr = $request->get('order');
            $search_arr = $request->get('search');

            $columnIndex = $columnIndex_arr[0]['column']  ?? '0'; // Column index
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir'] ?? 'desc'; // asc or desc
            $searchValue = $search_arr['value']; // Search value

            // Total records
            $totalRecords = Project::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                Project::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('title', 'like', '%' . $searchValue . '%')
                ->orWhere('address', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = Project::where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('title', 'like', '%' . $searchValue . '%')
                ->orWhere('address', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')

                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();

            $data_arr = array();

            foreach ($records as $row) {
                $html = '<a href="' . route("admin.Projects.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                    <a href="' . route("admin.Projects.edit", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-warning">
                            <i class="bx bxs-edit"></i>
                        </button></a>

                    <button type="button" class="btn btn-icon btn-outline-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#delete-modal-' . $row->id . '">
                        <i class="bx bx-trash-alt"></i>
                    </button>
                    <div class="modal fade" id="delete-modal-' . $row->id . '"
                        tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <form action="' . route("admin.Projects.delete", $row->id) . '"
                            method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Delete Item
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <h3>Do You Want To Really Delete This Item?</h3>
                                        ' . csrf_field() . '
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>';
                $data_arr[] = array(
                    "id" => '<strong>' . $row->id . '</strong>',
                    "title" => strlen($row->title) > 25 ? substr($row->title, 0, 25) . '..' : $row->title,
                    "address" => strlen($row->address) > 25 ? substr(strip_tags($row->address), 0, 25) . '..' : strip_tags($row->address),
                    "status" => ' <div class="d-flex justify-content-center align-items-center form-check form-switch"><input data-id="' . $row->id . '" style="width: 60px;height: 25px;" class="form-check-input status-toggle" type="checkbox" id="flexSwitchCheckDefault" ' . ($row->status ? "checked" : "") . '  ></div>',
                    "created_at" => $row->created_at ? Carbon::parse($row->created_at)->setTimezone('Asia/Kolkata')->toDateTimeString() : '',
                    "actions" => $html,
                );
            }

            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr,
            );

            echo json_encode($response);
        } else {
            return view('admin.Projects.index');
        }
    }
    public function create()
    {
        $categorys = Category::where('status', 1)->get();
        if ($categorys->isEmpty()) {
            return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Category..');
        }
        return view('admin.Projects.create', ['categorys' => $categorys]);
    }
    public function save(Request $request)
    {
        $category = $request->input('category');

        $rules = [
            'title' => 'required',
            'address' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
            'category' => 'required|exists:categories,slug',
        ];

        if ($category === 'animation') {
            $rules['youtube_video_id'] = 'required';
        }

        if ($category === 'arvr') {
            $rules['arvr_image'] = 'required';
        }

        if ($category && $category != 'animation' && $category !== 'arvr') {
            // $rules['exterior_images'] = 'required';
            // $rules['interior_images'] = 'required';
            $rules['exterior_images.*'] = 'image|mimes:jpeg,png,jpg,gif,webp|max:5000';
            $rules['interior_images.*'] = 'image|mimes:jpeg,png,jpg,gif,webp|max:5000';
        }

        $request->validate($rules);

        $categoryID = Category::where('slug', $category)->first();

        $Project = new Project();
        $Project->title = $request['title'];
        $Project->description = $request['description'];
        $Project->address = $request['address'];


        $Project->status = 1;

        if ($category == 'animation') {
            $Project->youtube_video_id = $request['youtube_video_id'];
        } else if ($category == 'arvr') {
            if ($request->arvr_image) {
                $folderPath = public_path('custom-assets/admin/uplode/images/Projects/arvr/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('arvr_image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $Project->arvr_image = 'custom-assets/admin/uplode/images/Projects/arvr/' . $imageName;
            }
        }

        if ($request->image) {
            if ($request->old_image && file_exists(public_path($request->old_image))) {
                unlink(public_path($request->old_image));
            }
            $folderPath = public_path('custom-assets/admin/uplode/images/Projects/images/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('image');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $Project->image = 'custom-assets/admin/uplode/images/Projects/images/' . $imageName;
        }
        $Project->category_id = $categoryID->id;
        $Project->category_slug = $category;
        $Project->save();


        if ($Project) {
            return redirect()->route('admin.Projects.index')->with('message', 'Project Added Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
    public function view($id)
    {
        $Project = Project::find($id);
        if ($Project) {
            return view('admin.Projects.view', ['Project' => $Project]);
        } else {
            return redirect()->back()->with('error', 'Project Not Found..!');
        }
    }

    public function edit($id)
    {
        $Project = Project::find($id);
        if ($Project) {
            $categorys = Category::where('status', 1)->get();
            if ($categorys->isEmpty()) {
                return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Category..');
            }
            return view('admin.Projects.edit', ['Project' => $Project, 'categorys' => $categorys]);
        } else {
            return redirect()->back()->with('error', 'Project Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $category = $request->input('category');

        $rules = [
            'title' => 'required',
            'address' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
            'category' => 'required|exists:categories,slug',
        ];

        if ($category === 'animation') {
            $rules['youtube_video_id'] = 'required';
        }

        $Project = Project::find($request->id);
        if ($Project) {
            $categoryID = Category::where('slug', $category)->first();

            $Project->title = $request['title'];
            $Project->description = $request['description'];
            $Project->address = $request['address'];

            if ($request->image) {
                $folderPath = public_path('custom-assets/admin/uplode/images/Projects/images/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $Project->image = 'custom-assets/admin/uplode/images/Projects/images/' . $imageName;
                if ($request->old_image && file_exists(public_path($request->old_image))) {
                    unlink(public_path($request->old_image));
                }
            }

            $Project->category_id = $categoryID->id;
            $Project->category_slug = $category;

            $Project->update();


            if ($Project) {
                return redirect()->route('admin.Projects.index')->with('message', 'Project Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'Project Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $Project = Project::find($id);
            if ($Project->image && file_exists(public_path($Project->image))) {
                unlink(public_path($Project->image));
            }
            $Project = $Project->delete();
            if ($Project) {
                return redirect()->route('admin.Projects.index')->with('message', 'Project Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'Project Not Found..!');
        }
    }


    public function statusToggle(Request $request)
    {
        if ($request->id) {
            $Project = Project::find($request->id);
            $Project->status = $request->status;
            $Project = $Project->update();
            if ($Project) {
                return response()->json(['success' => 'Status Updated Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'Project Not Found..!']);
        }
    }

}

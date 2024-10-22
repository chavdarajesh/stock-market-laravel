<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
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
            $totalRecords = News::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                News::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('title', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = News::where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('title', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')

                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();

            $data_arr = array();

            foreach ($records as $row) {
                $html = '<a href="' . route("admin.news.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                    <a href="' . route("admin.news.edit", $row->id) . '"> <button type="button"
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
                        <form action="' . route("admin.news.delete", $row->id) . '"
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
                    "category" => $row->category ? $row->category->name : '',
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
            return view('admin.news.index');
        }
    }

    public function catIndex(Request $request, $id)
    {
        if ($id) {
            if ($request->ajax()) {
                $draw = $request->get('draw');
                $start = $request->get("start");
                $rowperpage = $request->get("length") ?? 10;

                $columnIndex_arr = $request->get('order');
                $columnName_arr = $request->get('columns');
                $order_arr = $request->get('order');
                $search_arr = $request->get('search');

                $columnIndex = $columnIndex_arr[0]['column'] ?? '0'; // Column index
                $columnName = $columnName_arr[$columnIndex]['data']; // Column name
                $columnSortOrder = $order_arr[0]['dir'] ?? 'desc'; // asc or desc
                $searchValue = $search_arr['value']; // Search value

                // Total records
                $totalRecords = News::where('category_id', $id)->select('count(*) as allcount')->count();
                $totalRecordswithFilter =
                    News::select('count(*) as allcount')
                    ->where('category_id', $id)
                    ->where(function ($query) use ($searchValue) {
                        $query->where('id', 'like', '%' . $searchValue . '%')
                            ->orWhere('title', 'like', '%' . $searchValue . '%')
                            ->orWhere('description', 'like', '%' . $searchValue . '%')
                            ->orWhere('status', 'like', '%' . $searchValue . '%')
                            ->orWhere('created_at', 'like', '%' . $searchValue . '%');
                    })
                    ->count();

                // Get records, also we have included search filter as well
                $records = News::where('category_id', $id)
                    ->where(function ($query)  use ($searchValue) {
                        $query->where('id', 'like', '%' . $searchValue . '%')
                            ->orWhere('title', 'like', '%' . $searchValue . '%')
                            ->orWhere('description', 'like', '%' . $searchValue . '%')
                            ->orWhere('status', 'like', '%' . $searchValue . '%')
                            ->orWhere('created_at', 'like', '%' . $searchValue . '%');
                    })

                    ->orderBy($columnName, $columnSortOrder)
                    ->select('*')
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();

                $data_arr = array();

                foreach ($records as $row) {
                    $html = '<a href="' . route("admin.news.view", $row->id) . '"> <button type="button"
                                class="btn btn-icon btn-outline-info">
                                <i class="bx bx-show"></i>
                            </button></a>
                        <a href="' . route("admin.news.edit", $row->id) . '"> <button type="button"
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
                            <form action="' . route("admin.news.delete", $row->id) . '"
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
                        "description" => strlen($row->description) > 25 ? substr(strip_tags($row->description), 0, 25) . '..' : strip_tags($row->description),
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
               $Category= Category::find($id);
                return view('admin.news.cat-index', ['id' => $id,'Category'=>$Category]);
            }
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }

    public function create()
    {
        $categorys = Category::where('status', 1)->get();
        $users = User::where('status', 1)->where('is_admin', 1)->where('is_verified', 1)->get();
        if ($categorys->isEmpty()) {
            return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Category..');
        }
        return view('admin.news.create', ['categorys' => $categorys, 'users' => $users]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:5000',
            'author' => 'required|exists:users,id,is_admin,1,status,1,is_verified,1',
            'category' => 'required|exists:categories,id',
        ]);
        $News = new News();
        $News->title = $request['title'];
        $News->description = $request['description'];
        $News->author = Auth::user()->name;
        $News->user_id = $request['author'];
        $News->slug = Str::slug($request['title']);
        $News->published_date = $request['published_date'] ? $request['published_date'] : date('Y-m-d');
        $News->category_id = $request['category'];
        $News->status = 1;
        if ($request->image) {
            if ($request->old_image && file_exists(public_path($request->old_image))) {
                unlink(public_path($request->old_image));
            }
            $folderPath = public_path('custom-assets/upload/admin/images/news/images/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('image');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $News->image = 'custom-assets/upload/admin/images/news/images/' . $imageName;
        }
        $News->save();
        if ($News) {
            return redirect()->route('admin.news.index')->with('message', 'News Added Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }

    public function view($id)
    {
        $News = News::find($id);
        if ($News) {
            return view('admin.news.view', ['News' => $News]);
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }

    public function edit($id)
    {
        $News = News::find($id);
        if ($News) {
            $categorys = Category::where('status', 1)->get();
            $users = User::where('status', 1)->where('is_admin', 1)->where('is_verified', 1)->get();
            if ($categorys->isEmpty()) {
                return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Category..');
            }
            return view('admin.news.edit', ['News' => $News, 'categorys' => $categorys, 'users' => $users]);
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:5000',
            'author' => 'required|exists:users,id,is_admin,1,status,1,is_verified,1',
            'category' => 'required|exists:categories,id',
        ]);
        $News = News::find($request->id);
        if ($News) {
            $News->title = $request['title'];
            $News->description = $request['description'];
            $News->author =  Auth::user()->name;
            $News->user_id = $request['author'];
            $News->published_date = $request['published_date'] ? $request['published_date'] : date('Y-m-d');
            $News->category_id = $request['category'];
            $News->slug = Str::slug($request['title']);
            if ($request->image) {
                $folderPath = public_path('custom-assets/upload/admin/images/news/images/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $News->image = 'custom-assets/upload/admin/images/news/images/' . $imageName;
                if ($request->old_image && file_exists(public_path($request->old_image))) {
                    unlink(public_path($request->old_image));
                }
            }
            $News->update();
            if ($News) {
                return redirect()->route('admin.news.index')->with('message', 'News Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $News = News::find($id);
            if ($News->image && file_exists(public_path($News->image))) {
                unlink(public_path($News->image));
            }
            $News = $News->delete();
            if ($News) {
                return redirect()->route('admin.news.index')->with('message', 'News Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }

    public function statusToggle(Request $request)
    {
        if ($request->id) {
            $News = News::find($request->id);
            $News->status = $request->status;
            $News = $News->update();
            if ($News) {
                return response()->json(['success' => 'Status Updated Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'News Not Found..!']);
        }
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Project;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home()
    {
        $Projects = Project::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.pages.home', ['Projects' => $Projects]);
    }
    public function about()
    {
        return view('front.pages.about');
    }

    public function term_and_condition()
    {
        return view('front.pages.term_and_condition');
    }
    public function privacy_policy()
    {
        return view('front.pages.privacy_policy');
    }

    public function newsletterSave(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $Newsletter = Newsletter::where('email', $request->email)->where('status', 1)->first();
        if ($Newsletter) {
            return redirect()->back()->with('message', 'Thank you for subscribing to our newsletter! Stay tuned for the latest updates and exciting news.');
        }
        $Newsletter = Newsletter::where('email', $request->email)->where('status', 0)->first();
        if ($Newsletter) {
            $Newsletter->status = 1;
            $Newsletter->save();
            return redirect()->back()->with('message', 'Thank you for subscribing to our newsletter! Stay tuned for the latest updates and exciting news.');
        }

        $Newsletter = new Newsletter();
        $Newsletter->email = $request['email'];
        $Newsletter->save();

        if ($Newsletter) {
            return redirect()->back()->with('message', 'Thank you for subscribing to our newsletter! Stay tuned for the latest updates and exciting news.');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }


    public function newsletterUnSubscribe(Request $request)
    {
        $email = decrypt($request->email);
        $Newsletter = Newsletter::where('email', $email)->first();
        if (!$Newsletter) {
            return redirect()->route('front.home')->with('error', 'Not Subscribed..');
        }
        if ($Newsletter && $Newsletter->status == 1) {
            $Newsletter->status = 0;
            $Newsletter->save();
            return redirect()->route('front.home')->with('message', 'UnSubscribed Sucssesfully!..');
        }
        return redirect()->route('front.home')->with('error', 'Already UnSubscribed..');
    }

    public function projectDetails($id)
    {
        $Project = Project::find($id);
        if ($Project) {
            return view('front.project.project-details', ['Project' => $Project]);
        } else {
            return redirect()->back()->with('error', 'Project Not Found..!');
        }
    }

    public function projectDetailsArVr($id)
    {
        $Project = Project::find($id);
        if ($Project) {
            return view('front.project.project-details-arvr', ['Project' => $Project]);
        } else {
            return redirect()->back()->with('error', 'Project Not Found..!');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Front\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Admin\ContactSetting;
use Carbon\Carbon;

class ContactController extends Controller
{
    //

    public function indexContactSettings()
    {
        $ContactSetting = ContactSetting::where('static_id', 1)->where('status', 1)->first();
        return view('admin.contact.settings.index', ['ContactSetting' => $ContactSetting]);
    }

    public function saveContactSettings(Request $request)
    {
        $request->validate([
            'email' => 'email',
            // 'phone' => 'min:10'
        ]);

        $ContactSetting = ContactSetting::find($request->id);
        $ContactSetting->email = $request['email'];
        $ContactSetting->phone = $request['phone'];
        $ContactSetting->location = $request['location'];
        $ContactSetting->map_iframe = $request['map_iframe'];
        $ContactSetting->timing = $request['timing'];
        $ContactSetting->update();
        if ($ContactSetting) {
            return redirect()->route('admin.contact.settings.index')->with('message', 'ContactSetting Saved Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
}

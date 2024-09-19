<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Admin\CareerEnquiry;
use App\Mail\Admin\ContactEnquiry;
use App\Models\Front\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Admin\ContactSetting;
use App\Models\CareerMessage;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function contact()
    {
        $ContactSetting = ContactSetting::where('static_id', 1)->where('status', 1)->first();
        return view('front.pages.contact', ['ContactSetting' => $ContactSetting]);
    }
    public function contactMessageSave(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email',
            'phone' => 'numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $ContactMessage = new ContactMessage();
        $ContactMessage->name = $request['name'];
        $ContactMessage->email = $request['email'];
        $ContactMessage->phone = $request['phone'];
        $ContactMessage->subject = $request['subject'];
        $ContactMessage->message = $request['message'];
        $ContactMessage->save();

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'subject' => $request['subject'],
            'message' => $request['message'],
            'id' => $ContactMessage->id,
            'created_at' => $ContactMessage->created_at ? Carbon::parse($ContactMessage->created_at)->setTimezone('Asia/Kolkata')->toDateTimeString() : '',
        ];
        $email = SiteSetting::where('key','career_enquiry_email')->first();
        if (isset($email) && $email && $email->value && $email->value != null && $email->value != '') {
            $mail = Mail::to($email->value)->send(new ContactEnquiry($data));
        }
        if ($ContactMessage) {
            return redirect()->back()->with('message', 'Thanks for contacting us. We will contact you ASAP!..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }

    public function career()
    {
        return view('front.pages.career');
    }
    public function careerMessageSave(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email',
            'phone' => 'numeric',
            'city' => 'required',
            'state' => 'required',
            'message' => 'required',
            'resume' => 'required|max:5000',
        ]);

        $CareerMessage = new CareerMessage();
        $CareerMessage->name = $request['name'];
        $CareerMessage->email = $request['email'];
        $CareerMessage->phone = $request['phone'];
        $CareerMessage->message = $request['message'];
        $CareerMessage->state = $request['state'];
        $CareerMessage->city = $request['city'];
        if ($request->resume) {
            $folderPath = public_path('custom-assets/admin/uplode/images/career/resume/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('resume');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $CareerMessage->resume = 'custom-assets/admin/uplode/images/career/resume/' . $imageName;
        }
        $CareerMessage->save();
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'state' => $request['state'],
            'city' => $request['city'],
            'message' => $request['message'],
            'id' => $CareerMessage->id,
            'created_at' => $CareerMessage->created_at ? Carbon::parse($CareerMessage->created_at)->setTimezone('Asia/Kolkata')->toDateTimeString() : '',
            'path'=>$CareerMessage->resume
        ];
        $email = SiteSetting::where('key','career_enquiry_email')->first();
        if (isset($email) && $email && $email->value && $email->value != null && $email->value != '') {
            $mail = Mail::to($email->value)->send(new CareerEnquiry($data));
        }

        if ($CareerMessage) {
            return redirect()->back()->with('message', 'Thanks for contacting us. We will contact you ASAP!..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
}

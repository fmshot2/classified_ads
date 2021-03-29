<?php

namespace App\Http\Controllers;

use App\AdvertRequestsForm;
use App\Mail\AdvertRequestsForm as MailAdvertRequestsForm;
use App\Mail\ContactUs;
use App\Mail\ContactUsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdvertRequestsFormController extends Controller
{
    public function store_advert_request_form(Request $request)
    {
        /*  $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        */

        $advert = new AdvertRequestsForm([
            'requester_name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'advert_type' => $request->get('advert_type'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);

        if ($advert->save()) {
            $name = $request->get('name');
            $email = $request->get('email');
            $phone = $request->get('phone');
            $advert_type = $request->get('advert_type');
            $subject = $request->get('subject');
            $message = $request->get('message');

       	    return back()->with([
                'message' => 'Your message has been sent!.',
                'alert-type' => 'success'
            ]);
            Mail::to($email)->send(new ContactUs($email, $subject, $message));
            Mail::to('support@efcontact.com')->send(new MailAdvertRequestsForm($name, $email, $advert_type, $subject, $message, $phone));
            Mail::to('info@efcontact.com')->send(new MailAdvertRequestsForm($name, $email, $advert_type, $subject, $message, $phone));
        }
        return back()->with([
            'message' => 'Something went wrong! Try again.',
            'alert-type' => 'error'
        ]);
    }
}

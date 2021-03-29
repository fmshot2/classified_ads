<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\ContactUs;
use App\Mail\ContactUsAdmin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class ContactController extends Controller
{
    public function contact_us()
    {
        return view ('contact_Us');
    }

    public function store_contact_form(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);


        $contact = new Contact([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message')
        ]);

        if ($contact->save()) {
            $name = $request->get('name');
            $email = $request->get('email');
            $subject = $request->get('subject');
            $message = $request->get('message');
            $phone = $request->get('message');

            Mail::to($email)->send(new ContactUs($email, $subject, $message));
            Mail::to('support@efcontact.com')->send(new ContactUsAdmin($name, $email, $subject, $message, $phone));
            Mail::to('info@efcontact.com')->send(new ContactUsAdmin($name, $email, $subject, $message, $phone));
        }

        //return 'sfdsgdgdg';
        return back()->with([
            'message' => 'Your message has been sent!',
            'alert-type' => 'success'
        ]);
    }







     /*$random = Str::random(3);
     $slug = Str::of($request->name)->slug('-').''.$random;
     $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->address = $request->address;
    $contact->subject = $request->subject;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->slug = $slug;
    $saved = $contact->save();
    return $saved;
    if ($contact->save()) {
    return 'sfdsgdgdg';
    }else{
    	    return 'unsuccessful';
    }
    */
    //$request->session()->flash('status', 'Task was successful!');
    //return $this->allService();

}

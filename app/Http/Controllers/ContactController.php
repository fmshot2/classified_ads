<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
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
        $name = "Your message has been recieved. We will respond to you shortly. Thank you!";
       
        Mail::to($contact->email)->send(new SendMailable($name));
    }

    //return 'sfdsgdgdg';
    return back()->with('success', 'Your message has been sent!');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\Contact;

class ContactController extends Controller
{
    public function contact_us()
    {
        return view ('contact_us');
    }

    public function store_contact_form(Request $request)
    {

     $this->validate($request,[
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'subject' => 'required',
        'slug' => 'unique:contacts,slug',
        'phone' => 'required',
        'message' => 'required',
    ]); 

  

     $random = Str::random(3);
     $slug = Str::of($request->name)->slug('-').''.$random; 
     $contact = new Contact();


    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->address = $request->address;
    $contact->subject = $request->subject;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->slug = $slug;
    if ($contact->save()) {
    return 'sfdsgdgdg';
    }else{
    	    return 'unsuccessful';
    }
    $request->session()->flash('status', 'Task was successful!');
    //return $this->allService();

}

}

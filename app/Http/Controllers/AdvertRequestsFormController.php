<?php

namespace App\Http\Controllers;

use App\AdvertRequestsForm;
use Illuminate\Http\Request;

class AdvertRequestsFormController extends Controller
{
    public function store_advert_form(Request $request)
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
       	    return back()->with([
                'message' => 'Your message has been sent!.',
                'alert-type' => 'success'
            ]);
        }
        return back()->with([
            'message' => 'Something went wrong! Try again.',
            'alert-type' => 'error'
        ]);
    }
}

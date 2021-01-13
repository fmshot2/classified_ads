<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;

class AdvertController extends Controller
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
       $advert = new Advert([
        'seller_name' => $request->get('name'),
        'email' => $request->get('email'),
        'category' => $request->get('type'),
        'phone' => $request->get('phone'),
    ]);

       if ($advert->save()) {
       	    return back()->with('success', 'Your message has been sent!');
    }
    dd('ccc');

        return back()->with('success', 'Your message was not sent!');


    //return 'sfdsgdgdg';
}}

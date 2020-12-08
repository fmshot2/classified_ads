<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
     public function storeMessages(Request $request)
    {

        $service_id = $request->service_id;
        $description = $request->description;
        $buyer_id = Auth::id();
        $message = new Message();      

        $message->save();
        //$likecount = Like::where(['service_id'=>$request->id])->count();
        return response()->json(['message'=>$message, 'success'=>'successfull']);

//  return redirect()->to('serviceDetail')->with('message', $message);
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Notification;
use App\State;



class SellerController extends Controller
{


    public function createService()
    {
        $category = Category::all();
        $states = State::all();
        return view ('seller.service.create', compact('category', 'states') );
    }

    public function storeService(Request $request)
    {

       $this->validate($request,[
        'name' => 'required',
        'image' => 'required',
        'category_id' => 'required',
        'address' => 'required',
        'description' => 'required',
        'slug' => 'unique:services,slug',
        'city' => 'required',
        'state' => 'required',
    ]); 

       $image = $request->file('image');

       $slug = Str::of($request->name)->slug('-');

       $service = new Service();

        // Image set up
       if($request->hasfile('filenames'))
       {
        foreach($request->file('filenames') as $file)
        {
            $name = time().'.'.$file->extension();
            $file->move(public_path().'/files/', $name); 
                //array_push($image_array[], $name) 
        }
    }

    $service->user_id = Auth::id();
    $service->category_id = $request->category_id;
    $service->name = $request->name;
    $service->city = $request->city;
    $service->address = $request->address;
    $service->min_price = $request->min_price;
    $service->max_price = $request->max_price;
    $service->slug = $slug;
    $service->image_1 = $image_array[0];
    $service->image_2 = $image_array[1];
    $service->image_3 = $image_array[2];
    $service->image_4 = $image_array[3];
    $service->image_5 = $image_array[4];
    $service->image_6 = $image_array[5];
    $service->video_link = $request->video_link;
    $service->description = $request->description;
    $service->state = $request->state;

    $service->save();

    $request->session()->flash('success', 'Task was successful!');
    return $this->allMessage();

}

public function unreadMessage()
{
 $all_message = Message::where('service_user_id', Auth::id() );
 $unread_message =  $all_message->Where('status', 0)->orderBy('id', 'desc')->paginate(10);
 return view ('seller.message.unread', compact('unread_message') );
}

public function readMessage()
{
    $all_message = Message::where('service_user_id', Auth::id() );
    $read_message =  $all_message->Where('status', 1)->orderBy('id', 'desc')->paginate(10);
    return view ('seller.message.read', compact('read_message') );
}

public function allMessage()
{
    $all_message = Message::where('service_user_id', Auth::id() )->orderBy('id', 'desc')->paginate(10);
    return view ('seller.message.all', compact('all_message') );
}


public function destroyMessage($id)
{
    $message = Message::findOrFail($id);
    $message->delete();
    session()->flash('status', 'Task was successful!');
    return back();
}

public function viewMessage($slug)
{
    $message = Message::where('slug', $slug)->first();
    $message->status = 1;
    $message->save();
    return view ('seller.message.view_message', compact('message') );
}

public function replyMessage($slug)
{
    $message = Message::where('slug', $slug)->first();
    return view ('seller.message.reply_message', compact('message') );
}    

public function allNotification()
{
    $all_notification = Notification::paginate(8);
    return view ('seller.notification.all_notification', compact('all_notification') );
}

public function activeService()
{
    $all_service = Service::where('user_id', Auth::id() );
    $active_service =  $all_service->Where('status', 1)->paginate(5);
    return view ('seller.service.active_service', compact('active_service') );
}

public function pendingService()
{
    $all_service = Service::where('user_id', Auth::id() );
    $pending_service =  $all_service->Where('status', 0)->paginate(5);
    return view ('seller.service.pending_service', compact('pending_service') );
}

public function allService()
{
    $all_service = Service::where('user_id', Auth::id() )->paginate(5);
    return view ('seller.service.all_service', compact('all_service') );
}

public function storeReplyMessage(Request $request)
{
    $validatedData = $request->validate([
        'description' => 'required|max:255',
    ]);

    $request->session()->flash('status', 'Task was successful!');
    return $this->allMessage();

    $message = New Message();
    $message->subject = $request->subject;
    $message->description = $request->description;
    $message->service_id = $request->service_id;
    $message->service_user_id = $request->service_user_id;
    $message->buyer_name = $request->buyer_name;
    $message->buyer_email = $request->buyer_email;
    return view ('seller.service.all_service', compact('all_service') );
}

public function viewNotification($slug)
{
    $notification = Notification::where('slug', $slug)->first();
    $notification->status = 1;
    $notification->save();
    return view ('seller.notification.view_notification', compact('notification') );
}

public function viewProfile()
{
    return view ('seller.profile.update_profile');
}

}

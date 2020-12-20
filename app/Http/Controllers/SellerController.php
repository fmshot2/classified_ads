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
use Illuminate\Support\Str;

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

        return $request->file;

     $this->validate($request,[
        'description' => 'required',
        'category_id' => 'required',
        'address' => 'required',
        'description' => 'required',
        'slug' => 'unique:services,slug',
        'city' => 'required',
        'name' => 'required',
        'state' => 'required',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //|max:2048
    ]); 

     $image = $request->file('image');

     $random = Str::random(3);
     $slug = Str::of($request->name)->slug('-').''.$random; 
     $service = new Service();

                // Image set up
     if ( $request->hasFile('file') ) {
        $image_name = time().'.'.$request->file->extension();
        $request->file->move(public_path('images'),$image_name);
        $service->image = $image_name;
    }

    $service->user_id = Auth::id();
    $service->category_id = $request->category_id;
    $service->name = $request->name;
    $service->phone = $request->phone;
    $service->city = $request->city;
    $service->experience = $request->experience;
    $service->address = $request->address;
    $service->min_price = $request->min_price;
    $service->max_price = $request->max_price;
    $service->slug = $slug;
    $service->video_link = $request->video_link;
    $service->description = $request->description;
    $service->state = $request->state;

    $service->save();

    $request->session()->flash('status', 'Task was successful!');
    return $this->allService();

}

    public function storeServiceUpdate(Request $request, $id)
    {

    $service = Service::findOrFail($id);

     $this->validate($request,[
        'description' => 'required',
        'address' => 'required',
        'description' => 'required',
        'city' => 'required',
        'name' => 'required',
        'state' => 'required',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]); 

     $image = $request->file('image');
    // Image set up
     if ( $request->hasFile('file') ) {
        $image_name = time().'.'.$request->file->extension();
        $request->file->move(public_path('images'),$image_name);
        $service->image = $image_name;
    }

    $service->user_id = Auth::id();
    $service->category_id = $request->category_id;
    $service->name = $request->name;
    $service->phone = $request->phone;
    $service->city = $request->city;
    $service->experience = $request->experience;
    $service->address = $request->address;
    $service->min_price = $request->min_price;
    $service->max_price = $request->max_price;
    $service->video_link = $request->video_link;
    $service->description = $request->description;
    $service->state = $request->state;

    $service->save();

    $request->session()->flash('status', 'Task was successful!');
    return $this->allService();

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

public function viewServiceUpdate($slug)
{
    $category = Category::all();
    $service = Service::where('slug', $slug)->first();
    return view ('seller.service.update_service', compact('service', 'category') );
}

public function viewService($slug)
{
    $service = Service::where('slug', $slug)->first();
    $category = Category::where('id', $service->category_id )->first();
    return view ('seller.service.view_service', compact('service', 'category') );
}

public function storeReplyMessage(Request $request)
{
    $validatedData = $request->validate([
        'description' => 'required|max:255',
    ]);

    $slug = Str::random(3);
    $request->session()->flash('status', 'Task was successful!');

    $message = New Message();
    $message->subject = $request->subject;
    $message->description = $request->description;
    $message->service_id = $request->service_id;
    $message->service_user_id = $request->service_user_id;
    $message->buyer_name = Auth::user()->name;
    $message->buyer_email = Auth::user()->email;
    $message->buyer_id = $request->buyer_id;
    $message->reply = 'yes';
    $message->phone = $request->phone;
    $message->slug = $slug;
    $message->save();
    return $this->allMessage();
}

public function viewNotification($slug)
{
    $notification = Notification::where('slug', $slug)->first();
    return view ('seller.notification.view_notification', compact('notification') );
}

public function viewProfile()
{
    return view ('seller.profile.update_profile');
}

  public function destroy($id)
  {
    $service = Service::findOrFail($id);
    $service->delete();
    session()->flash('status', 'Task was successful!');
    return back();
  }


}

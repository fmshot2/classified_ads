<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;
use App\Notification;
use App\General_Info;


class AdminController extends Controller
{


  public function allService()
  {
    $all_service = Service::paginate(10);
    return view ('admin.service.index', compact('all_service') );
  }

  public function activeService()
  {
    $active_service = Service::where('status', 1)->paginate(20);
    return view ('admin.service.active', compact('active_service') );
  }

  public function pendingService()
  {
    $pending_service = Service::where('status', 0)->paginate(10);
    return view ('admin.service.pending', compact('pending_service') );
  }

  public function destroy($id)
  {
    $service = Service::findOrFail($id);
    //Storage::disk('public')->delete($service->image);
    $service->delete();
    session()->flash('status', 'Task was successful!');
    return back();
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServiceStatus(Request $request, $id)
    {
     $service = Service::find($id);
     $status = $service->status == 1 ? 0 : 1;
     $service->status = $status;
     $service->save();
     $request->session()->flash('status', 'Task was successful!');
     return back();
   }

   public function serviceSearch(Request $request)
   {   
    $query = $request->input('query');
    $services = Service::where('name','LIKE',"%$query%")->paginate(8);
    return view('admin/search/service_search', compact('services', 'query'));
  }

  public function userSearch(Request $request)
  {   
    $query = $request->input('query');
    $users = User::where('name','LIKE',"%$query%")->paginate(8);
    return view('admin/search/index', compact('users', 'query'));
  }

  public function viewProfile()
  {
    return view ('admin.profile.update_profile');
  }

  public function systemConfig()
  {
    $general_info = General_Info::first();
    $check_general_info = collect($general_info)->isEmpty();
    return view ('admin.system_config', compact('general_info', 'check_general_info') );
  }

  public function storeSystemConfig(Request $request, $id)
  {

      $general_info = $id == 1 ? General_Info::find($id) : New General_Info;
      $general_info->site_name = $request->site_name;
      $general_info->hot_line = $request->hotline;
      $general_info->hot_line_2 = $request->hotline2;
      $general_info->hot_line_3 = $request->hotline3;
      $general_info->support_email = $request->support_email;
      $general_info->address = $request->address;
      $general_info->facebook = $request->facebook;
      $general_info->twitter = $request->twitter;
      $general_info->linkedin = $request->linkedin;
      $general_info->instagram = $request->instagram;
      $general_info->register_section_1 = $request->register_section_1;
      $general_info->register_section_2 = $request->register_section_2;
      $general_info->register_section_3 = $request->register_section_3;
      $general_info->register_section_1_title = $request->register_section_1_title;
      $general_info->register_section_2_title = $request->register_section_2_title;
      $general_info->register_section_3_title = $request->register_section_3_title;


    if ( $request->hasFile('file') ) {
      $image_name = time().'.'.$request->file->extension();
      $request->file->move(public_path('images'),$image_name);
      $general_info->logo = $image_name;
    }


      $general_info->save();
      $request->session()->flash('status', 'Task was successful!');

      return $this->systemConfig();



  }

  public function viewService($slug)
  {
    $service = Service::where('slug', $slug)->first();
    $category = Category::where('id', $service->category_id )->first();
    return view ('seller.service.view_service', compact('service', 'category') );
  }

  public function allNotification()
  {
    $all_notification = Notification::paginate(8);
    return view ('admin.notification.all_notification', compact('all_notification') );
  }

  public function viewNotification($slug)
  {
    $notification = Message::where('slug', $slug)->first();
    $notification->status = 1;
    $notification->save();
    return view ('seller.notification.view_notification', compact('notification') );
  }

}

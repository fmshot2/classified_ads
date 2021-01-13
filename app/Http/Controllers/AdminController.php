<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;
use App\Notification;
use App\General_Info;
use App\Badge;
use App\Termsofuse;
use App\Privacypolicy;
use App\Faq;
use App\Slider;
use App\Advertrequest;
use App\Event;
use App\Subscription;
use Illuminate\Support\Str;





class AdminController extends Controller
{


  public function allService()
  {
    $all_service = Service::paginate(10);
    return view ('admin.service.index', compact('all_service') );
  }
  

  public function advertisement() {
  return view('advertisement');
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
  public function pending_advert_requests()
  {
    $pending_advert_requests = Advertrequest::where('status', 0)->paginate(10);
    return view ('admin.page_management.pending_advert_requests', compact('pending_advert_requests') );
  }

   public function treated_advert_requests()
  {
    $treated_advert_requests = Advertrequest::where('status', 1)->paginate(10);
    return view ('admin.page_management.treated_advert_requests', compact('treated_advert_requests') );
  }

  public function active_adverts()
  {
    $active_adverts = Advertrequest::where('status', 2)->paginate(10);
    return view ('admin.advert_management.active_adverts', compact('active_adverts') );
  }

  public function events()
  {
    //return view('events');
    $all_events = Event::all();
    
    return view ('admin.page_management.events', compact('all_events'));
  }


 public function all_events()
  {
    //return view('events');
    $all_events = Event::all();
    
    return view ('all_events', compact('all_events'));
  }


   public function save_event(Request $request)
  {
    $id = $request->id;  
    $title = $request->title;  
    $image = $request->image;  
    $date = $request->event_date;  
    $time = $request->event_time;  
    //$venue = $request->venue;  
    $location = $request->location;  
    $description = $request->description;  
    

   $new_event = new Event();
   $new_event->title = $title;
   $new_event->image = $image;
   $new_event->date = $date;
   $new_event->time = $time;
   $new_event->location = $location;   
   $new_event->description = $description;


    if ( $request->hasFile('file') ) {
      $image_name = time().'.'.$request->file->extension();
      $request->file->move(public_path('images'),$image_name);
      $new_event->image = $image_name;
    }

   $new_event->save();
          dd('ddd');

   return back()->with('success', 'Task was successful!');
     //  return back()->with('success', 'Task was successful!');
 }


 /*public function storeSystemConfig(Request $request, $id)
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
*/




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

   public function sendNotification(Request $request)
  {
     $validatedData = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
       
      ]);

    $slug = Str::random(7);
    $notification = new Notification;
    $notification->title = $request->title;
    $notification->description = $request->description;  
    $notification->slug = $slug;    
    $notification->save();
     return back()->with('status', 'Task was successful!');
   }
  


  public function viewNotification($slug)
  {
    $notification = Message::where('slug', $slug)->first();
    $notification->status = 1;
    $notification->save();
    return view ('seller.notification.view_notification', compact('notification') );
  }

  public function FAQs()
  {
    return view ('admin.page_management.faq');
  }

  public function allBadges()
  {
    $all_badges = Badge::paginate(10);
    return view ('admin.badge.index', compact('all_badges') );
  }
  public function privacyPolicy()
  {
    $all_badges = Badge::paginate(10);
    return view ('admin.page_management.privacy_policy', compact('all_badges') );
  }

  public function termsOfUse()
  {
    $all_badges = Badge::paginate(10);
    return view ('admin.page_management.terms_of_use', compact('all_badges') );
  }

  public function save_termsOfUse(Request $request)
  {

    $terms = new Termsofuse;
    $terms->details = $request->details;
    $terms->save();

      //$request->session()->flash('status', 'Task was successful!');

    return back()->with('success', 'Task was successful!');

  }

  public function save_privacyPolicy(Request $request)
  {

    $privacy = new Privacypolicy;
    $privacy->details = $request->details;
    $privacy->save();

      //$request->session()->flash('status', 'Task was successful!');

    return back()->with('success', 'Task was successful!');

  }



  public function save_faq(Request $request)
  {
    $id = $request->id;  
    $faqDetails = $request->details;  
    $faqTitle = $request->title;  
      //$faq = Faq::where('id', $id);
    $faq = Faq::find($id);

    if ($faq) {
     $faq->details = $faqDetails;
     $faq->title = $faqTitle;
     $faq->save();
     return back()->with('success', 'Task was successful!');
   }

   $new_faq = new Faq();
   $new_faq->details = $faqDetails;
   $new_faq->title = $faqTitle;
   $new_faq->save();
   return back()->with('success', 'Task was successful!');



     //  return back()->with('success', 'Task was successful!');



 }


/*
    $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
          if ($likecheck) {
           Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
           $likecount = Like::where(['service_id'=>$id])->count();
           return redirect()->to('serviceDetail/'.$service_slug);
        
         }else{
           $like = new Like();
           $like->user_id = Auth::id();
           $like->service_id = $id;
           $like->save();
           $likecount = Like::where(['service_id'=>$id])->count();
           return redirect()->to('serviceDetail/'.$service_slug);
         }
         */


         public function show_faq()
         {
          $faqs = Faq::paginate(10);
          return view ('admin.page_management.faq', compact('faqs') );
        }

        public function delete_faqs($id)
         {
          $faq = Faq::findOrFail($id);
          $faq->delete();
              return back()->with('success', 'Task was successful!');

          //return view ('admin.page_management.faq', compact('faqs') );
        }

   public function sliders()
         {
          $sliders = Slider::paginate(10);
          return view ('admin.page_management.sliders', compact('sliders') );
        }



  public function save_slider(Request $request)
  {
    $id = $request->id;  
    $sliderDetails = $request->details;  
    $sliderTitle = $request->title;  
      //$faq = Faq::where('id', $id);
    $slider = Slider::find($id);

    if ($slider) {
     $slider->details = $sliderDetails;
     $slider->title = $sliderTitle;
     $slider->save();
     return back()->with('success', 'Task was successful!');
   }

   $new_slider = new Slider();
   $new_slider->details = $sliderDetails;
   $new_slider->title = $sliderTitle;
   $new_slider->save();
   return back()->with('success', 'Task was successful!');
 }

public function delete_sliders($id)
         {
          $slider = Slider::findOrFail($id);
          $slider->delete();
              return back()->with('success', 'Task was successful!');

          //return view ('admin.page_management.faq', compact('faqs') );
        }

public function subscribe(Request $request)
 {
     $this->validate($request,[
        'email' => ['required'],
    ]); 


     $subscription = new Subscription();
    
$subscription->email = $request->email;
$subscription->save();

return back()->with('success', 'Your email was sent successfully');
}


      }

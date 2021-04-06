<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Like;
use App\Message;
use App\Badge;
use Illuminate\Support\Str;
use DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

use Illuminate\Http\File;
use App\Category;
use App\Local_government;
use App\Slider;
use App\State;
use App\Image;
use App\Traits\ReusableCode;

//use Illuminate\Support\Str;


class ServiceController extends Controller
{

  use ReusableCode;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mail()
    {
     $name = 'femi';
     Mail::to('ololadeshot@gmail.com')->send(new SendMailable($name));

     return 'Email was sent again, twice4';
   }


   public function termsOfUse()
   {
    return view('terms-of-use');
  }





//    public function findNearestRestaurants()
// {
//   return 'sssss';
//   // $latitude = Auth::user()->latitude;
//   // $longitude = Auth::user()->longitude;
//   // // return $request->radius;
//   $latitude = $request->latitude;
//     $longitude = $request->longitude;
//     $radius = 1000;
//     // $keyword = $request->radius,
//     // $categories = $request->categories,
//     // $sub_category = $request->sub_category,
//     // $myRange = $request->myRange,
//     // $state =  $request->state,
//     // $city = $request->city

//    // return $latitude . $longitude;
//     // $latitude =
//     $nearestServices = Service::selectRaw("id, name, address,
//                      ( 6371000 * acos( cos( radians(?) ) *
//                        cos( radians( latitude ) )
//                        * cos( radians( longitude ) - radians(?)
//                        ) + sin( radians(?) ) *
//                        sin( radians( latitude ) ) )
//                      ) AS distance", [$latitude, $longitude, $latitude])
//         ->having("distance", "<", $radius)
//         ->orderBy("distance",'asc')
//         ->offset(0)
//         ->limit(20)
//         ->get();

//     return $nearestServices;
// }




  public function findNearestServices(Request $request)
  {


  // return $request->radius;
    $latitude = $request->latitude;
    $longitude = $request->longitude;
    $radius = 100000;
        // $featuredServices = Service::where('is_featured', 1)->with('user')->orderBy('badge_type', 'asc')->paginate(30);
        // $featuredServices->image();
    $servicesss = Service::selectRaw("id, name, address, state, thumbnail, user_id, badge_type, slug,
     ( 6371000 * acos( cos( radians(?) ) *
     cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
     ) + sin( radians(?) ) *
     sin( radians( latitude ) ) )
   ) AS distance", [$latitude, $longitude, $latitude])
    ->having("distance", "<", $radius)->with('user')->with('images')
    ->orderBy("distance",'asc')
    ->offset(0)
     ->inRandomOrder()->limit(20)->get();

    return response()->json([
      'data' => $servicesss,
      'latitude' => $latitude,
      'longitude' => $longitude
      ]);

  }


  public function index2(Request $request)
  {

     // $category_city = Service::all()->random(4);
     // dd($category_city);
 // $latitude = session()->get('latitude');
 //    $longitude = session()->get('longitude');

// return $latitude;





 //    $radius = 100;
 //    $nearestServices = Service::selectRaw("id, name, address,
 //                     ( 6371000 * acos( cos( radians(?) ) *
 //                       cos( radians( latitude ) )
 //                       * cos( radians( longitude ) - radians(?)
 //                       ) + sin( radians(?) ) *
 //                       sin( radians( latitude ) ) )
 //                     ) AS distance", [$latitude, $longitude, $latitude])
 //        ->having("distance", "<", $radius)
 //        ->orderBy("distance",'asc')
 //        ->offset(0)
 //        ->limit(20)
 //        ->get();





    $featuredServices = Service::where('is_featured', 1)
                ->where('status', 1)
                ->with('user')
                ->orderBy('badge_type', 'asc')
                ->paginate(30);

    $allServices = Service::where([
      ['is_approved', '=', 1] ])->where('status', 1)->inRandomOrder()->get();

    foreach ($allServices as $key => $serv) {
      // this is assigning a new field called total_likes to allservices
      //note, the total_likes is coming from a function in the model
      $allServices[$key]->total_likes = $serv->total_likes;
    }

// this will also do what the above code does

    // $sortedServices = $allServices->(function($serve){
    //   $serve->total_likes = $serve->total_likes;
    //   return $serve->total_likes;
    // });

    $hotServices = collect($allServices->where('status', 1)->sortByDesc('total_likes'))->sortBy('badge_type');;
    $approvedServices = Service::where('status', 1)->with('user')->get();
    $advertServices = Service::where('is_approved', 1)->where('status', 1)->with('user')->get();
    $recentServices = Service::where('is_approved', 1)->where('status', 1)->orderBy('created_at', 'asc')->paginate(16);
    $categories = Category::orderBy('id', 'asc')->get();
    $search_form_categories = Category::orderBy('name')->get();
    $sliders = Slider::all();
    $trendingServices = Service::where('status', 1)->orderByUniqueViews()->get();
    $states = State::all();
    $local_governments = Local_government::all();
    $user11 = session()->get('user11');
    $serviceName = session()->get('serviceName');
    $serviceState = session()->get('serviceState');
    $advertisements = Advertisement::all();



    if($user11){
      $user111 = $user11;
    }else{
      $user111 = null;
    }


    $latitude = $request->latitude;
    $longitude = $request->longitude;
    $radius = 100000;

    if ($latitude) {

     $nearestServices = Service::selectRaw("id, name, address,
       ( 6371000 * acos( cos( radians(?) ) *
       cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
       ) + sin( radians(?) ) *
       sin( radians( latitude ) ) )
     ) AS distance", [$latitude, $longitude, $latitude])
     ->having("distance", "<", $radius)
     ->orderBy("distance",'asc')
     ->offset(0)
     ->limit(20)
     ->get();


     $view = view('welcome', compact(['featuredServices', 'recentServices',
      'approvedServices', 'user111', 'categories', 'search_form_categories', 'states', 'local_governments', 'sliders', 'trendingServices', 'hotServices', 'nearestServices', 'advertisements' ]))->render();

     return response()->json(['html'=>$view]);


   }else{

    return view('welcome', compact(['featuredServices', 'recentServices',
      'approvedServices', 'user111', 'categories', 'search_form_categories', 'states', 'local_governments', 'sliders', 'trendingServices', 'hotServices', 'advertisements' ]));
  }



}




public function services()
{

  return view('services');
}



public function serviceDetail($slug)
{

    $serviceDetail = Service::where('slug', $slug)->firstOrFail();

    $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
    $approvedServices = Service::where('status', 1)->with('user')->get();
    $advertServices = Service::where('is_approved', 1)->with('user')->get();
    $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
    $categories = Category::paginate(8);
    $all_states = State::all();
    // $images_4_service = $serviceDetail->image;
    // $images_4_service = $images_4_servic->image_path;
  $serviceDetail_id = $serviceDetail->id;
  $images_4_service = $serviceDetail->images;
        // dd($images_4_service);
  $serviceDetail_state = $serviceDetail->state;
  $service_likes = Like::where('service_id', $serviceDetail_id)->count();
  $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$serviceDetail_id])->first();
  $service_category_id = $serviceDetail->category_id;
  $similarProducts = Service::where([['category_id', $service_category_id], ['state', $serviceDetail_state] ])->inRandomOrder()->limit(8)->get();

  $featuredServices2 = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(3)->get();
  $user_id = $serviceDetail->user_id;
  $userMessages = Message::where('service_id', $serviceDetail_id)->orderBy('created_at','desc')->take(7)->get();

  $the_user = User::find($user_id);
  $the_user_name = $the_user->name;
  $the_provider_f_name = explode(' ', trim($the_user_name))[0];

  $expiresAt = now()->addHours(24);
  views($serviceDetail)->cooldown($expiresAt)->record();

  if ($ww = session()->get('message')) {
    $ww2 = $ww;
  }else{
    $ww2 = null;
  }
  if($userser2 = session()->get('userSer')) {
    $userser3 = $userser2;
  }else{
    $userser3 = null;
  }

  $user11 = session()->get('user11');
  if($user11){
    $user111 = $user11;
  }else{
    $user111 = null;
  }

  return view('serviceDetail', compact(['serviceDetail', 'ww2', 'serviceDetail_id', 'approvedServices', 'user111', 'similarProducts', 'service_likes', 'all_states', 'userser3', 'featuredServices', 'featuredServices2', 'userMessages', 'images_4_service', 'the_provider_f_name', 'likecheck']));
}




public function allServices()
{
  $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
  $approvedServices = Service::with('user')->where('status', 1)->orderBy('badge_type', 'asc')->inRandomOrder()->paginate(100);
  $advertServices = Service::where('is_approved', 1)->where('status', 1)->with('user')->get();
  $recentServices = Service::where('is_approved', 1)->where('status', 1)->orderBy('id', 'desc')->paginate(10);
  $categories = Category::paginate(8);
  $featuredcategories = Category::orderBy('id', 'asc')->limit(12)->get();
  $all_states = State::all();
      //$serviceDetail_id = $serviceDetail->id;
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
      //$service_category_id = $serviceDetail->category;
      //$similarProducts = Service::where('category', $service_category_id)->get();
  $featuredServices2 = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
      //$user_id = $serviceDetail->user_id;
      //$userMessages = Message::where('service_id', $id)->get();
  if($userser2 = session()->get('userSer')) {
    $userser3 = $userser2;
  }else{
    $userser3 = null;
  }

  $user11 = session()->get('user11');
  if($user11){
    $user111 = $user11;
  }else{
    $user111 = null;
  }
       //return $userMessages;

  return view('allServices', compact(['approvedServices', 'user111', 'all_states', 'userser3', 'featuredServices', 'featuredServices2', 'featuredcategories']));
}


public function allSellers()
{
  $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
  $allFeaturedServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->paginate(32);
  $approvedServices = Service::where('status', 1)->with('user')->paginate(6);
  $advertServices = Service::where('is_approved', 1)->where('status', 1)->with('user')->get();
  $recentServices = Service::where('is_approved', 1)->where('status', 1)->orderBy('id', 'desc')->paginate(10);
  $categories = Category::paginate(8);
      //$serviceDetail = Service::find($id);
  $all_states = State::all();
      //$serviceDetail_id = $serviceDetail->id;
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
      //$service_category_id = $serviceDetail->category;
      //$similarProducts = Service::where('category', $service_category_id)->get();
  $featuredServices2 = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
      //$user_id = $serviceDetail->user_id;
      //$userMessages = Message::where('service_id', $id)->get();
  if($userser2 = session()->get('userSer')) {
    $userser3 = $userser2;
  }else{
    $userser3 = null;
  }

  $user11 = session()->get('user11');
  if($user11){
    $user111 = $user11;
  }else{
    $user111 = null;
  }
       //return $userMessages;

  return view('seller.sellers', compact(['approvedServices', 'allFeaturedServices', 'user111', 'all_states', 'userser3', 'featuredServices', 'featuredServices2']));
}



public function allFeaturedSellers()
{
  $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
  $allFeaturedServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->paginate(32);
  $approvedServices = Service::where('status', 1)->where('status', 1)->with('user')->paginate(6);
  $advertServices = Service::where('is_approved', 1)->where('status', 1)->with('user')->get();
  $recentServices = Service::where('is_approved', 1)->where('status', 1)->orderBy('id', 'desc')->paginate(10);
  $categories = Category::paginate(8);
      //$serviceDetail = Service::find($id);
  $all_states = State::all();
      //$serviceDetail_id = $serviceDetail->id;
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
      //$service_category_id = $serviceDetail->category;
      //$similarProducts = Service::where('category', $service_category_id)->get();
  $featuredServices2 = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
      //$user_id = $serviceDetail->user_id;
      //$userMessages = Message::where('service_id', $id)->get();
  if($userser2 = session()->get('userSer')) {
    $userser3 = $userser2;
  }else{
    $userser3 = null;
  }

  $user11 = session()->get('user11');
  if($user11){
    $user111 = $user11;
  }else{
    $user111 = null;
  }
       //return $userMessages;

  return view('all-featured-sellers', compact(['approvedServices', 'allFeaturedServices', 'user111', 'all_states', 'userser3', 'featuredServices', 'featuredServices2']));
}









public function index()
{
  $service = Service::where('status', 1)->orderBy('id', 'desc')->paginate(5);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('seller/service.create');
    }



    public function createService()
    {
      $categories = Category::all();

      return view ('seller.addService', compact(['categories']));
    }

    public function dropzone()
    {

      return view ('seller.service.create_blade_copy');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function storeService(Request $request)
    {

      $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'category' => ['string', 'max:255'],
        'experience' => ['required', 'max:255'],
        'description' => ['required', 'string'],
        'streetAddress' => ['required', 'string'],
        'city' => ['required', 'string'],
        'state' => ['required', 'string'],
        'phone' => ['required'],

      ]);


      $category = $request->category;
      $name = $request->name;
      $experience = $request->experience;
        //$service->image = $image;
      $description = $request->description;
      $streetAddress = $request->streetAddress;
      $city = $request->city;
      $state = $request->state;
      $closestBusstop = $request->closestBusstop;
      $phone = $request->phone;


      $name = $request->name;
      $image = $request->file('file');
      $imageName = time().'.'.$image->extension();
      $image->move(public_path('images'),$imageName);
      $service = new Service();
      $service->category = $category;
      $service->name = $name;
      $service->experience = $experience;
      $service->description = $description;
      $service->image = $imageName;
      $service->streetAddress = $streetAddress;
      $service->city = $city;
      $service->state = $state;
      $service->closestBusstop = $closestBusstop;
      $service->phone = $phone;
      $service->user_id = Auth::id();
      $description = $request->description;
      $streetAddress = $request->streetAddress;
      $city = $request->city;
      $state = $request->state;
      $closestBusstop = $request->closestBusstop;
      $phone = $request->phone;

      $state_name = State::find(['id'=>$request->state]);
      $name_of_state = $state_name->name;
      //dd()
      $LGA = Local_government::find(['id'=>$request->city]);
      $name_of_city = $LGA->name;


       // $name = $request->name;
      $image = $request->file('file');
      $imageName = time().'.'.$image->extension();
      $image->move(public_path('images'),$imageName);
      $service = new Service();
      $service->category = $category;
      $service->name = $name;
      $service->experience = $experience;
      $service->description = $description;
      $service->image = $imageName;
      $service->streetAddress = $streetAddress;
      $service->city = $name_of_city;
      $service->state = $name_of_state;
      $service->closestBusstop = $closestBusstop;
      $service->phone = $phone;



      $service->user_id = Auth::id();

      $service->save();
      $likecount = Like::where(['service_id'=>$request->id])->count();
      return redirect('seller/dashboard');

    }


    public function catdet()
    {
      return view ('categoryDetails');
    }






// public function search(Request $request)
// {


//  $keyword = $request->input('keyword');
//  $category = $request->input('category');
//  $state = $request->input('state');
//  $ranges = $request->input('ranges');

//  $keywordResponses = Service::where(function ($query) use ($keyword, $category, $state) {
//   $query->where('name', 'like', '%' . $keyword . '%');
// })->get();
//      // return response()->json(['a', $keywordResponses]);

//  $keyword_and_Categories = Service::where(function ($query) use ($keyword, $category) {
//   $query->where('name', 'like', '%' . $keyword . '%')
//   ->orWhere('category_id', 'like', '%' . $category . '%');
// })->get();
//  return response()->json(['a', $keyword_and_Categories]);

//  $vehsearch = "%{$vehsearch}%";

//  $query->where(function ($query) use ($vehsearch) {
//   $query->orWhere('vehmod', 'like', $vehsearch);
//   $query->orWhere('vehmark', 'like', $vehsearch);
//   $query->orWhereRaw("CONCAT(vehmod, ' ', vehmark) LIKE ?", [$vehsearch]);
// });
//  return response()->json(['d', $user11]);

//             // $user11->each(function ($item, $key) {
//             //   $item->name;
//             //   $item->state;

//             // });
// }

//     // //return response()->json($user11);
//     //     return redirect()->to('/')->with('user11', $user11)
//     //     ->with('serviceName', $serviceName)
//     //     ->with('serviceState', $serviceState);
//     //             //return 'jjj';

//     //   }

public function homepage_search(Request $request){

  $validatedData = $request->validate([
    'keyword' => ['max:255'],
    'state' => ['max:255'],
  ]);
  $latitude = $request->input('latitude');
  $longitude = $request->input('longitude');
  $radius = $request->input('ranges');

  $name = $request->input('name');

  $keyword = $request->input('keyword');
  $category = $request->input('category');
  $state = $request->input('state');
  $ranges = $request->input('ranges');
  //$serviceDetail_id = $request->input('serviceDetail_id');
  $all_states = State::all();
  $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
  $keywordResponses = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();


  // $keywordResponses = Service::where(function ($query) use ($keyword, $category, $state) {
  //   $query->where('name', 'like', '%' . $keyword . '%');
  // })->get();

 $services1 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();



if ($category)
{
$services2 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($category) {
    $query->where('category_id', 'like', '%' . $category . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();
}else{
  $services2 = null;
}

  if ($state)
{
   $services3 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($state) {
    $query->where('state', 'like', '%' . $state . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();
  }else{
  $services3 = null;
}





if($category && $state)
{
  $services4 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($category) {
    $query->where('category_id', 'like', '%' . $category . '%');
  })->where(function ($query) use ($state) {
    $query->where('state', 'like', '%' . $state . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();
 }else{
  $services4 = null;
}

if($keyword && $state)
{
  $services5 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%');
  })->where(function ($query) use ($state) {
    $query->where('state', 'like', '%' . $state . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();
 }else{
  $services5 = null;
}



if($keyword && $state)
{
  $services6 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%');
  })->where(function ($query) use ($state) {
    $query->where('state', 'like', '%' . $state . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();
 }else{
  $services6 = null;
}


if($state)
{
  $services7 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($state) {
    $query->where('state', 'like', '%' . $state . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();

  }else{
  $services7 = null;
}


if($category)
{
  $services8 = Service::selectRaw("id, name, slug, address, thumbnail, user_id, state, badge_type, category_id,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
  ->having("distance", "<", $radius)->where(function ($query) use ($category) {
    $query->where('state', 'like', '%' . $category . '%');
  })->with('user')
  ->orderBy("distance",'asc')
  ->offset(0)
  ->limit(20)
  ->get();

  }else{
  $services8 = null;
}


  $keywordResponses5 = Service::where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%')->where('status', 1);
  })
  ->where(function ($query) use ($state) {
    $query->where('state', '=', $state);

  })->get();

 $keywordResponses4 = Service::where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%')->where('status', 1);
  })
  ->where(function ($query) use ($category) {
    $query->where('category_id', '=', $category);

  })->get();

 $keywordResponses6 = Service::where(function ($query) use ($category) {
    $query->where('category_id', '=', $category)->where('status', 1);
  })
  ->where(function ($query) use ($state) {
    $query->where('state', '=', $state)->where('status', 1);

  })->get();


  $keywordResponses1 = Service::where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%')->where('status', 1);
  })->get();

  $keywordResponses2 = Service::where(function ($query) use ($category) {
    $query->where('category_id', 'like', '%' . $category . '%')->where('status', 1);
  })->get();

  $keywordResponses3 = Service::where(function ($query) use ($state) {
    $query->where('state', '=', $state)->where('status', 1);
  })->get();


  $keywordResponses7 = Service::where(function ($query) use ($category) {
    $query->where('category_id', '=', $category)->where('status', 1);
  })
  ->where(function ($query) use ($state) {
    $query->where('state', '=', $state)->where('status', 1);

  })->where(function ($query) use ($keyword) {
    $query->where('name', 'like', '%' . $keyword . '%')->where('status', 1);

  })->get();


  $keyword_and_Categories = Service::where(function ($query) use ($keyword, $category) {
    $query->where('name', 'like', '%' . $keyword . '%')
    ->where('category_id', '=', $category)->where('status', 1);
  })->get();
  // return response()->json($keyword_and_Categories);

  $keyword_and_state = Service::where(function ($query) use ($keyword, $state) {
    $query->where('name', 'like', '%' . $keyword . '%')->where('status', 1)
    ->orWhere('state',  $state);
  })->get();

  $keyword_and_category_and_state = Service::where(function ($query) use ($keyword, $category, $state) {
    $query->where('name', 'like', '%' . $keyword . '%')
    ->orWhere('category_id', 'like', '%' . $category . '%')
    ->orWhere('state', 'like', '%' . $state . '%');
  })->get();

  $category_response = Service::where(function ($query) use ($category) {
    $query->where('category_id', 'like', '%' . $category . '%')->where('status', 1);
  })->get();



   return view('searchResult', compact(['featuredServices', 'all_states', 'services1', 'services2', 'services3', 'services4', 'services5', 'services5', 'services6', 'services7', 'services8',
   'keywordResponses1', 'keywordResponses2', 'keywordResponses3', 'keywordResponses4', 'keywordResponses5', 'keywordResponses6', 'keywordResponses7', 'keyword_and_Categories', 'keyword_and_state',
   'keyword_and_category_and_state', 'category_response' ]));
}





// public function searchonservices(Request $request){
//   $category = $request->input('name');
//   $state = $request->input('state');
//   $all_states = State::all();
//   $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();

//   $userSer = Service::where(function ($query) use ($category, $state) {

//     $query->where('name', 'like', '%' . $category . '%')
//     ->orWhere('state', 'like', '%' . $state . '%');
//   })->get();

//   if (count ( $userSer ) > 0){

//     return view('searchResult')->with('userSer', $userSer)->with('all_states', $all_states)->with('featuredServices', $featuredServices);


//   }
//   else
//     $userSer = null;
//   return view ( 'searchResult' )->with('userSer', $userSer)->with('all_states', $all_states)->with('featuredServices', $featuredServices);
// }




// public function search10(Request $request){
//   $category = $request->input('name');
//   $state = $request->input('state');
//   $serviceDetail_id = $request->input('serviceDetail_id');

//   $userSer1 = Service::where('state', $state)->with('user')->get();


//   $userSer = userSer1::where(function ($query) use ($category) {

//     $query->where('name', 'like', '%' . $category . '%');
//   })->get();
//   $state2[] = array();

//   foreach ($userSer1 as $key => $value) {
//     $state2[] = $state;
//   }


//   if (count ( $userSer ) > 0){

//     return redirect()->to('serviceDetail/'.$serviceDetail_id)->with('userSer', $userSer);

//   }
//   else
//     return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );}






  public function search_by_city($city){
    $d_city = $city;

    $services_in_city = Service::where('city', $d_city)->where('status', 1)->with('user')->get();
    $all_states = State::all();
    $all_categories = Category::all();

    $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();

    return view('city_services')->with('services_in_city', $services_in_city)->with('featuredServices', $featuredServices)->with('all_states', $all_states)->with('all_categories', $all_categories);

  }


/*public function searchSeller(Request $request){
    $seller = $request->input('seller');
    $state = $request->input('state');

$seller = User::where(function ($query) use ($seller, $state) {

        $query->where('seller', 'like', '%' . $seller . '%')
          ->orWhere('state', 'like', '%' . $state . '%');
      })->get();

if (count ( $seller ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
        return redirect()->to('home')->with('seller', $seller);

    }
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );}

        */






        public function searchOnServiceDetail(Request $request)
        {
          $serviceName = $request->name;
          $serviceState =   $request->state;
          $serviceDetailId =   $request->id;
          $request->validate([
            "name"     => 'string',
            "state"       => 'string',
          ]);
          if( $user11 = Service::searchName($request->name)->
           searchState($request->state)->get()) {

            $user11->each(function ($item, $key) {
              $item->name;
              $item->state;

            });
        }
        $category_services = Service::where('id', $serviceDetailId)->where('status', 1)->get();

//return redirect()->to('job_view/'.$id);
        return view ('searchService')->with($serviceDetailId)->with('user11', $user11)
        ->with('serviceName', $serviceName)
        ->with('serviceState', $serviceState)
        ->with('category_services', $category_services);
      }



/*
public function show($id)
    {

        $one_category = Category::find($id);
        $category_services = Service::where('id', $id)->get();
        //$category_city = Service::all()->pluck("city");
        $category_city = Service::all()->random(4);
        $all_states = State::all();
        $all_categories = Category::all();
        //$category_id = $id;
        //return $category_city;

        return view ('services', compact('category_services', 'one_category', 'category_city', 'all_categories', 'all_states') );
    }


*/




    public function store(Request $request)
    {

     $this->validate($request,[
      'name' => 'required',
      'image' => 'required',
      'category_id' => 'required',
      'address' => 'required',
      'description' => 'required',
            //'slug' => 'unique:services,slug',
            //'city' => 'required',
            //'state' => 'required',
    ]);

     $image = $request->file('image');


     $service = new Service();

        // Image set up
     if ( $request->hasFile('file') ) {
      $path = Storage::disk('public')->putFile('service',$request->file('file'));
      $service->image = $path;
    }

    $service->user_id = Auth::id();
    $service->category_id = $request->category_id;
    $service->name = $request->name;
    //$service->slug = $slug;
    $service->image = $image;
    $service->description = $request->description;
    $service->state = $request->state;

    $service->save();

    $request->session()->flash('success', 'Task was successful!');
    return 'success';

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $service = Service::find($id);
      return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $service = Service::find($id);
      return response()->json($service);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

     $service = Service::find($id);

     $this->validate($request,[
      'name' => 'required',
      'image' => 'required',
      'category_id' => 'required',
      'address' => 'required',
      'description' => 'required',
      'city' => 'required',
      'state' => 'required',
    ]);

     $image = $request->file('image');

        // Image set up
     if ( $request->hasFile('file') ) {
      Storage::disk('public')->delete($service->image);
      $path = Storage::disk('public')->putFile('service',$request->file('file'));
      $driver->image = $path;
    }

    $service->user_id = Auth::id();
    $service->category_id = $request->category_id;
    $service->name = $request->name;
    //$service->slug = $slug;
    $service->image = $image;
    $service->description = $request->description;
    $service->state = $request->state;

    $service->save();

    $request->session()->flash('success', 'Task was successful!');
    return 'success';

  }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $service = Service::findOrFail($id);
      Storage::disk('public')->delete($service->image);
      $service->delete();

    }

    public function saveLike(request $request)
    {
//     $service = Service::find($id);

          /*$serviceName = $request->id;
          $serviceState =   $request->state;*/

          $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$request->id])->first();
          if ($likecheck) {
            return 'Heyyyyy';
          }else{
            return 'Heyyyyy22222';
          }
          if ($likecheck) {
            Like::where(['user_id'=>Auth::id(), 'service_id'=>$request->id])->delete();
            $likecount = Like::where(['service_id'=>$request->id])->count();
        // return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
//                    return redirect('/home');
          }else{
            $like = new Like();
            $like->user_id = Auth::id();
            $like->service_id = $request->id;
            $like->save();
            $likecount = Like::where(['service_id'=>$request->id])->count();
         //return redirect('/home');
          }
        }


        public function saveLike2($id)
        {
          $service = Service::find($id);
          $service_slug = $service->slug;
      //return $service_slug;
          /*$serviceName = $request->id;
          $serviceState =   $request->state;*/

          $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
          if ($likecheck) {
           Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
           $likecount = Like::where(['service_id'=>$id])->count();
           // return redirect()->to('serviceDetail/'.$service_slug);
        //    return back()->with('liked', 'Unliked', );
            return $likecount;

        //return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
        //return redirect('/home');
         }else{
           $like = new Like();
           $like->user_id = Auth::id();
           $like->service_id = $id;
           $like->save();
           $likecount = Like::where(['service_id'=>$id])->count();
           // return redirect()->to('serviceDetail/'.$service_slug);
        //    return back();
            return $likecount;

        //return 'Heyyyyy22222'. $likecount;
         }
       }










       public function storeComment(Request $request)
       {
         $this->validate($request,[
          'buyer_name' => 'required',
          'buyer_email' => 'required',
          'phone' => 'required',
          'description' => 'required',

        ]);
         $data = $request->all();
         return $data;
        #create or update your data here
        //$request->photo_id; // array of all selected photo id's
         $message = new Message();
        /*$message->buyer_id = $request->buyer_id;
        $message->service_id = $request->service_id;
        $message->description = $request->description;*/
        $success = 'succccccccs';
        $slug = Str::random(10);

                //$message->service_id = $data['id'];
        $message->buyer_id = $data['buyer_id'];
        $message->buyer_name = $data['buyer_name'];
        $message->buyer_email = $data['buyer_email'];
        $message->subject = $data['subject'];
        $message->phone = $data['phone'];
        $message->slug = $slug;
        $message->service_id = $data['service_id'];
        $message->service_user_id = $data['service_user_id'];
        $message->description = $data['description'];
        $serviceDetailId = $message->service_id;
        $service = Service::find($serviceDetailId);
        $service_slug = $service->slug;

        // $slug = $random = Str::random(40);
        //$message->slug = $slug;


        if ($message->save()) {
        //return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
          return redirect()->to('serviceDetail/'.$service_slug)->with('message', 'Your message has been sent!');
        }else{
          return back()->with('message', 'Your message was not sent!');
        }



      }




      public function storeComment2(Request $request)
      {
        // return response()->json(['success2'=>'Ajax request submitted successfully']);
        $data = $request->all();

        //    $this->validate($request,[
        //     'buyer_name' => 'required',
        //     'buyer_email' => 'required',
        //     'phone' => 'required',
        //     'description' => 'required',

        //   ]);

        #create or update your data here
        //$request->photo_id; // array of all selected photo id's
       $message = new Message();
        /*$message->buyer_id = $request->buyer_id;
        $message->service_id = $request->service_id;
        $message->description = $request->description;*/
        $success = 'Your message was sent successfully';
        $slug = Str::random(10);

                //$message->service_id = $data['id'];
        $message->buyer_id = $request->user()->id;
        $message->buyer_name = $request->user()->name;
        $message->buyer_email = $request->user()->email;
        $message->phone = $data['phone'];
        $message->slug = $slug;
        $message->service_id = $data['service_id'];
        // $message->subject = $data['subject'];
        $message->service_user_id = $data['service_user_id'];
        $message->description = $data['description'];

        //$serviceDetailId = $message->service_id;
        //$service = Service::find($serviceDetailId);
        //$service_slug = $service->slug;

        // $slug = $random = Str::random(40);
        //$message->slug = $slug;
        if ($message->save()) {
            $buyer_name = $message->buyer_name;
            $name = 'Your message has been delivered successfully!';
            try{
                Mail::to($message->buyer_email)->send(new SendMailable($name));
            }
            catch(\Exception $e){
                $failedtosendmail = 'Failed to Mail!.';
            }
            return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
        }
        return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>"not saved"]);

        if ($message->save()) {
          $name = $message->buyer_name;
          $message = $message->description;
          Mail::to($message->buyer_email)
          ->send(new SendMailable($name));



          return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
        //return redirect()->to('serviceDetail/'.$service_slug)->with('message', 'Your message has been sent!');
        }else{
          return response()->json(['success2', 'Your message was not sent!']);
        }

      }

      public function createpay(Request $request)
      {
        // return "Badge sfhgfasdgfhsdgfUpdated successfully!";
       $data = $request->all();

    //    return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$data]);

       $badge_service_id = $data['service_id'];



       $this->validate($request,[
        'amount' => 'required',
        'email' => 'required',
      ]);
       $service_check = Service::where(['id'=>$badge_service_id])->first();
       $service_check->badge_type = $data['badge_type'];
       $service_check->save();
       $badge_check = Badge::where(['service_id'=>$badge_service_id])->first();

       if ($badge_check) {
        $badge_check->badge_type = $data['badge_type'];

        $badge_check->amount = $data['amount'];
        $badge_check->ref_no = $data['ref_no'];

        $badge_check->save();

        return "Badge Updated successfully!";
      }else{
       $badge = new Badge();
       $badge->email = $data['email'];
       $badge->badge_type = $data['badge_type'];
       $badge->seller_id = $data['seller_id'];
       $badge->amount = $data['amount'];
       $badge->seller_name = $data['seller_name'];
       $badge->phone = $data['phone'];
       $badge->ref_no = 1234;

       $badge->save();
       return "Badge created successfully";
     }

        return response()->json(['success'=>'Ajax request submitted successfully', 'success1'=>$badge_check, 'success2'=>$service_check, 'ref'=>$request->ref_no]);

    //  $badge->save();
    //  return "yyyy";

        //return

//      if ($badge->save()) {
//       return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
//         //return redirect()->to('serviceDetail/'.$service_slug)->with('message', 'Your message has been sent!');
//     }else{
//       return response()->json(['success2', 'Your message was not sent!']);
//     }

//     $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
//     if ($likecheck) {
//      Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
//      $likecount = Like::where(['service_id'=>$id])->count();
//      return redirect()->to('serviceDetail/'.$service_slug);
//         //return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
//         //return redirect('/home');
//    }else{
//      $like = new Like();
//      $like->user_id = Auth::id();
//      $like->service_id = $id;
//      $like->save();
//      $likecount = Like::where(['service_id'=>$id])->count();
//      return redirect()->to('serviceDetail/'.$service_slug);
//         //return 'Heyyyyy22222'. $likecount;
//    }

 }





 public function saveBadge(Request $request)
 {

   $data = $request->all();



   $badge_check = Service::where(['seller_id'=>Auth::id()])->first();
   if ($badge_check) {
    $badge_check->badge_type = $data['badge_type'];

    $badge_check->amount = $data['amount'];
    $badge_check->ref_no = $data['ref_no'];

    $badge_check->save();
    return "yyyy";
  }else{
   $badge = new Badge();
   $badge->email = $data['email'];
   $badge->badge_type = $data['badge_type'];
   $badge->seller_id = $data['seller_id'];
   $badge->amount = $data['amount'];
   $badge->seller_name = $data['seller_name'];
   $badge->phone = $data['phone'];
   $badge->ref_no = $data['ref_no'];
   $badge->save();
   return "yyyy";
 }


 $badge->save();
 return "yyyy";

        //return

 if ($badge->save()) {
  return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
        //return redirect()->to('serviceDetail/'.$service_slug)->with('message', 'Your message has been sent!');
}else{
  return response()->json(['success2', 'Your message was not sent!']);
}
}


public function createbadge(Request $request)
{
  return 'jhj';
  $data = $request->all();

  $this->validate($request,[
    'buyer_name' => 'required',
    'buyer_email' => 'required',
    'phone' => 'required',
    'description' => 'required',

  ]);
  $message = new Message();
  $success = 'succccccccs';
  $slug = Str::random(10);
  $message->buyer_id = $data['buyer_id'];
  $message->buyer_name = $data['buyer_name'];
  $message->buyer_email = $data['buyer_email'];
  $message->phone = $data['phone'];
  $message->slug = $slug;
  $message->service_id = $data['service_id'];
  $message->subject = $data['subject'];
  $message->service_user_id = $data['service_user_id'];
  $message->description = $data['description'];

        //$serviceDetailId = $message->service_id;
        //$service = Service::find($serviceDetailId);
        //$service_slug = $service->slug;

        // $slug = $random = Str::random(40);
        //$message->slug = $slug;

  if ($message->save()) {
    return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
        //return redirect()->to('serviceDetail/'.$service_slug)->with('message', 'Your message has been sent!');
  }else{
    return response()->json(['success2', 'Your message was not sent!']);
  }

}



public function showContacts() {
  return view('contacts');
}



public function saveContacts(Request $request)
{

 $this->validate($request,[
  'name' => 'required',
  'email' => 'required',
  'subject' => 'required',
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



public function create_service_page() {
  return view('seller.service.create_service_page');
}

}

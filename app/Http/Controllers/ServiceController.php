<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Like;
use App\Message;
use Illuminate\Support\Str;
use DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\File;
use App\Category;
use App\Local_government;
use App\State;
//use Illuminate\Support\Str;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function termsOfUse()
    {       
      return view('terms-of-use');
    }


    public function index2()
    {
        //if (Auth::check()) {
          //$my_state =  Auth::user()->state;
        //}
        //$my_state =  Auth::user()->state;
      $featuredServices = Service::where('is_featured', 1)->with('user')->paginate(4);
      $approvedServices = Service::where('status', 1)->with('user')->get();
      $advertServices = Service::where('is_approved', 1)->with('user')->get();
      $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(4);
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
        //$closerServices = Service::where('state', $my_state)->get();
      $categories = Category::paginate(16);
      $states = State::all(); 
      $local_governments = Local_government::all();               
      $user11 = session()->get('user11');
         //$userSer = session()->get('userSer');
      $serviceName = session()->get('serviceName');
      $serviceState = session()->get('serviceState');          
      if($user11){
        $user111 = $user11;
      }else{
        $user111 = null; 
      }         
          //return $closerServices;
      return view('welcome', compact(['featuredServices', 'recentServices', 
        'approvedServices', 'user111', 'categories', 'states', 'local_governments' ]));

         // $products = Product::with('user')->get();
   // return view('shop.index', compact(['products']));

     //   Product::where('user_id', Auth::user()->id)->with('product.purchases')
     //   $results = User::where('this', '=', 1)
    //->get();
    }

    public function services()
    {

      return view('services');      
    }



    public function serviceDetail($slug)
    {
      $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
      $approvedServices = Service::where('status', 1)->with('user')->get();
      $advertServices = Service::where('is_approved', 1)->with('user')->get();
      $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
      $categories = Category::paginate(8);
      $serviceDetail = Service::where('slug', $slug)->first();
      $all_states = State::all();
      //return $serviceDetail;
      $serviceDetail_id = $serviceDetail->id;
      $service_likes = Like::where('service_id', $serviceDetail_id)->count();
      $service_category_id = $serviceDetail->category;
      $similarProducts = Service::where('category_id', $service_category_id)->get();
      $featuredServices2 = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
      $user_id = $serviceDetail->user_id;
      //$userMessages = Message::where('service_id', $id && Auth::id())->get();
      $userMessages = Message::where('service_id', $serviceDetail_id)->get();
      if ($ww = session()->get('message')) {
        $ww2 = $ww;
      }else{
        $ww2 = null;
      }
      //return $ww2;
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

      return view('serviceDetail', compact(['serviceDetail', 'ww2', 'serviceDetail_id', 'approvedServices', 'user111', 'similarProducts', 'service_likes', 'all_states', 'userser3', 'featuredServices', 'featuredServices2', 'userMessages']));
    }




     public function allServices()
    {
      $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
      $approvedServices = Service::with('user')->paginate(6);
      $advertServices = Service::where('is_approved', 1)->with('user')->get();
      $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
      $categories = Category::paginate(8);
      //$serviceDetail = Service::find($id);
      $all_states = State::all();
      //$serviceDetail_id = $serviceDetail->id;
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
      //$service_category_id = $serviceDetail->category;
      //$similarProducts = Service::where('category', $service_category_id)->get();
      $featuredServices2 = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
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

      return view('allServices', compact(['approvedServices', 'user111', 'all_states', 'userser3', 'featuredServices', 'featuredServices2']));
    }


  public function allSellers()
    {
      $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
            $allFeaturedServices = Service::where('is_featured', 1)->with('user')->paginate(32)->get();
      $approvedServices = Service::with('user')->paginate(6);
      $advertServices = Service::where('is_approved', 1)->with('user')->get();
      $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
      $categories = Category::paginate(8);
      //$serviceDetail = Service::find($id);
      $all_states = State::all();
      //$serviceDetail_id = $serviceDetail->id;
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
      //$service_category_id = $serviceDetail->category;
      //$similarProducts = Service::where('category', $service_category_id)->get();
      $featuredServices2 = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
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
      $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
            $allFeaturedServices = Service::where('is_featured', 1)->with('user')->paginate(32);
      $approvedServices = Service::with('user')->paginate(6);
      $advertServices = Service::where('is_approved', 1)->with('user')->get();
      $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
      $categories = Category::paginate(8);
      //$serviceDetail = Service::find($id);
      $all_states = State::all();
      //$serviceDetail_id = $serviceDetail->id;
      //$service_likes = Like::where('service_id', $serviceDetail_id)->count();
      //$service_category_id = $serviceDetail->category;
      //$similarProducts = Service::where('category', $service_category_id)->get();
      $featuredServices2 = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
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
      $service = Service::orderBy('id', 'desc')->paginate(5);
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function storeService(Request $request)
    {
/*        $validatedData = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'category' => ['string', 'max:255'],
            'experience' => ['required', 'max:255'],
      'description' => ['required', 'string'],
      'streetAddress' => ['required', 'string'],
      'city' => ['required', 'string'],
      'state' => ['required', 'string'],
      'phone' => ['required'],
*/
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
      $service->city = $city;
      $service->state = $state;
      $service->closestBusstop = $closestBusstop;
      $service->phone = $phone;



      $service->user_id = Auth::id();      

      $service->save();
      $likecount = Like::where(['service_id'=>$request->id])->count();
      return redirect('seller/dashboard');
      return redirect('/seller/dashboard');

    }


    public function catdet()
    {
      return view ('categoryDetails');
    }

   /*public function search2(Request $request) {
            //return redirect('/login');
    $q = $request->q;
    //$q = Input::get ( 'q' );
    $user11 = Service::where( 'name', 'LIKE', '%' . $q . '%' )->orWhere('state', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user11 ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
        return redirect()->to('home')->with('user11', $user11);

    }
    else
        return 'ddddd';
}
*/

public function search(Request $request){
  $category = $request->input('name');
  $state = $request->input('state');
  $serviceDetail_id = $request->input('serviceDetail_id');
  $all_states = State::all();
  $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();

  $userSer = Service::where(function ($query) use ($category, $state) {

    $query->where('name', 'like', '%' . $category . '%')
    ->orWhere('state', 'like', '%' . $state . '%');
  })->get();
//return $query;

  if (count ( $userSer ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
    //return redirect()->to('/')->with('user11', $userSer);
    return view('searchResult')->with('userSer', $userSer)->with('all_states', $all_states)->with('featuredServices', $featuredServices);


  }
  else
    $userSer = null;
    return view ( 'searchResult' )->with('userSer', $userSer)->with('all_states', $all_states)->with('featuredServices', $featuredServices);
}




public function searchonservices(Request $request){
  $category = $request->input('name');
  $state = $request->input('state');
  $all_states = State::all();
  $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();

  $userSer = Service::where(function ($query) use ($category, $state) {

    $query->where('name', 'like', '%' . $category . '%')
    ->orWhere('state', 'like', '%' . $state . '%');
  })->get();
//return $query;

  if (count ( $userSer ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
    //return redirect()->to('/')->with('user11', $userSer);
    return view('searchResult')->with('userSer', $userSer)->with('all_states', $all_states)->with('featuredServices', $featuredServices);


  }
  else
    $userSer = null;
    return view ( 'searchResult' )->with('userSer', $userSer)->with('all_states', $all_states)->with('featuredServices', $featuredServices);
}




  public function search10(Request $request){
  $category = $request->input('name');
  $state = $request->input('state');
    $serviceDetail_id = $request->input('serviceDetail_id');

        $userSer1 = Service::where('state', $state)->with('user')->get();


  $userSer = userSer1::where(function ($query) use ($category) {

    $query->where('name', 'like', '%' . $category . '%');
  })->get();
  $state2[] = array();

foreach ($userSer1 as $key => $value) {
$state2[] = $state;
}
//return $state2;

        //$userSer = Service::where('state', $state2)->with('user')->get();

//return $userSer;

  if (count ( $userSer ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );

      return redirect()->to('serviceDetail/'.$serviceDetail_id)->with('userSer', $userSer);
    //return redirect()->to('/')->with('user11', $userSer);

  }
  else
    return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );}






  public function search_by_city($city){
    $d_city = $city;

       $services_in_city = Service::where('city', $d_city)->with('user')->get();
        $all_states = State::all();
        $all_categories = Category::all();
//return $services_in_city;

    $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();

        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
  //return redirect()->to('serviceDetail/'.$serviceDetailId);
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




        public function search3(Request $request)
        {       
          $serviceName = $request->name;
          $serviceState =   $request->state;
        // return $request;    
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

                //return 'jjj';}
    //return response()->json($user11);
        return redirect()->to('/')->with('user11', $user11)
        ->with('serviceName', $serviceName)
        ->with('serviceState', $serviceState);
                //return 'jjj';

      }


      public function searchOnServiceDetail(Request $request)
      {       
        $serviceName = $request->name;
        $serviceState =   $request->state;
        $serviceDetailId =   $request->id;
        // return $request;    
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
      $category_services = Service::where('id', $serviceDetailId)->get();

                //return 'jjj';}
    //return response()->json($user11);
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

     //$slug = Str::of($request->name)->slug('-');

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
        return redirect()->to('serviceDetail/'.$service_slug);
        //return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
        //return redirect('/home');   
      }else{
         $like = new Like();
        $like->user_id = Auth::id();
        $like->service_id = $id;
        $like->save();
        $likecount = Like::where(['service_id'=>$id])->count();
        return redirect()->to('serviceDetail/'.$service_slug);
        //return 'Heyyyyy22222'. $likecount;    
      }
      if ($likecheck) {
        Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
        $likecount = Like::where(['service_id'=>$id])->count();
        return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
//                    return redirect('/home');    
      }else{
        $like = new Like();
        $like->user_id = Auth::id();
        $like->service_id = $id;
        $like->save();
        $likecount = Like::where(['service_id'=>$id])->count();
         //return redirect('/home');    
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

      public function advertisement() {
        return view('advertisement');
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
    }

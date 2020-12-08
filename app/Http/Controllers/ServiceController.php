<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Like;
use DB;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\File;
use App\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function index2()
    {

        $featuredServices = Service::where('is_featured', 1)->with('user')->get();
        $approvedServices = Service::where('status', 1)->with('user')->get();
        $advertServices = Service::where('is_approved', 1)->with('user')->get();
         $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
         $user11 = session()->get('user11');
         //$userSer = session()->get('userSer');
         $serviceName = session()->get('serviceName');
         $serviceState = session()->get('serviceState');
          
         if($user11){
            $user111 = $user11;
         }else{
            $user111 = null; 
         }

            return view('welcome', compact(['featuredServices', 'recentServices', 'approvedServices', 'user111' ]));

         // $products = Product::with('user')->get();
 // return view('shop.index', compact(['products']));

     //   Product::where('user_id', Auth::user()->id)->with('product.purchases')


     //   $results = User::where('this', '=', 1)
    //->get();

    }


public function serviceDetail($id)
    {

        $featuredServices = Service::where('is_featured', 1)->with('user')->get();
        $approvedServices = Service::where('status', 1)->with('user')->get();
        $advertServices = Service::where('is_approved', 1)->with('user')->get();
        $recentServices = Service::where('is_approved', 1)->orderBy('id', 'desc')->paginate(10);
        $serviceDetail = Service::find($id);
        $user11 = session()->get('user11');
         if($user11){
            $user111 = $user11;
         }else{
            $user111 = null; 
         }


        //return view('edit-teacher',compact('teacher'));

            return view('serviceDetail', compact(['serviceDetail', 'serviceDetailId', 'approvedServices', 'user111' ]));
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
        return view ('seller.addService');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function storeService(Request $request)
    {

        $category = $request->category;
        $name = $request->name;
        $experience = $request->experience;
        //$service->image = $image;
        $description = $request->description;
        $streetAddress = $request->streetAddress;
        $city = $request->city;
        $state = $request->state;
        $closestBusstop = $request->closestBusstop;

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

        
        $service->user_id = Auth::id();      

        $service->save();
        $likecount = Like::where(['service_id'=>$request->id])->count();
        return redirect('/adminDashboard');
        
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

$userSer = Service::where(function ($query) use ($category, $state) {

        $query->where('name', 'like', '%' . $category . '%')
          ->orWhere('state', 'like', '%' . $state . '%');
      })->get();

if (count ( $userSer ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
        return redirect()->to('home')->with('user11', $userSer);

    }
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );}


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
    return redirect()->to('home')->with('user11', $user11)
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
 
                //return 'jjj';}
    //return response()->json($user11);
//return redirect()->to('job_view/'.$id);

    return redirect()->to('serviceDetail/'.$serviceDetailId)->with('user11', $user11)
    ->with('serviceName', $serviceName)
    ->with('serviceState', $serviceState);
                //return 'jjj';

}


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

        $slug = Str::of($request->name)->slug('-');

        $service = new Service();

        // Image set up
        if ( $request->hasFile('file') ) {
            $path = Storage::disk('public')->putFile('service',$request->file('file'));
            $service->image = $path;
        }
       
        $service->user_id = Auth::id();
        $service->category_id = $request->category_id;
        $service->name = $request->name;
        $service->slug = $slug;
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
        $service->slug = $slug;
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
       
        $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$request->id])->first();
        if ($likecheck) {
            Like::where(['user_id'=>Auth::id(), 'service_id'=>$request->id])->delete();
            $likecount = Like::where(['service_id'=>$request->id])->count();
        return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
//                    return redirect('/home');    
        }else{

        $like = new Like();

        $like->user_id = Auth::id();

        $like->service_id = $request->id;
        $like->save();
        $likecount = Like::where(['service_id'=>$request->id])->count();
        return response()->json(['success'=>$likecount, 'success2'=>'downvote']);
        //return redirect('/home');    
        }
        

    }
}

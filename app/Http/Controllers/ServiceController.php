<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;

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
         $recentServices = Service::orderBy('id', 'desc')->paginate(10);
         $user11 = session()->get('user11');

         if($user11){
            $user111 = $user11;
         }else{
            $user111 = null;
         }

            return view('welcome', compact(['featuredServices', 'recentServices', 'user111']));

         // $products = Product::with('user')->get();
 // return view('shop.index', compact(['products']));

     //   Product::where('user_id', Auth::user()->id)->with('product.purchases')


     //   $results = User::where('this', '=', 1)
    //->get();

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




   public function search(Request $request) {
            //return redirect('/login');

    $q = $request->q;
    //$q = Input::get ( 'q' );
    $user11 = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user11 ) > 0){
        //return view ( 'welcome' )->withDetails( $user )->withQuery ( $q );
        return redirect()->to('home')->with('user11', $user11);

    }
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
}


public function search2(Request $request){
    $category = $request->input('category');

    //now get all user and services in one go without looping using eager loading
    //In your foreach() loop, if you have 1000 users you will make 1000 queries

    $users = User::with('services', function($query) use ($category) {
         $query->where('name', 'LIKE', '%' . $category . '%');
    })->get();

        return 'yes';
}

/*Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('welcome')->withDetails($user)->withQuery ( $q );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});

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

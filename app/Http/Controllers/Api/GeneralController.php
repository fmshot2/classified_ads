<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;

use App\Advertisement;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\AdvertisementResourceCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceResourceCollection;
use App\Http\Resources\SliderResourceCollection;
use App\Service;
use App\General_Info;
use App\Slider;
use App\State;
use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ServiceCreated;
use App\SubCategory;
use Carbon\Carbon;
use App\ProviderSubscription;



class GeneralController extends Controller
{
    protected $user;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'categories', 'showcategory', 'banner_slider', 'search', 'advertisement', 'systemConfig']]);
        $this->user = $this->guard()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banner_slider()
    {
        return new SliderResourceCollection(Slider::all());
    }

    public function advertisement()
    {
        return new AdvertisementResourceCollection(Advertisement::paginate(50));
    }


    public function systemConfig()
    {
        $general_info = General_Info::all();
        $check_general_info = collect($general_info)->isEmpty();

        if (!$general_info->isEmpty()) {
            return response()->json([
                'general_info' => $general_info
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'No Config Found!'
            ], 404);
        }

    }


    protected function guard()
    {
        return Auth::guard();
    }


      public function createSubApi(Request $request)
    {   
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

          $validator = Validator::make($request->all(), [
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()], 422);
        }

        $added_days = 0;
        $mytime = Carbon::now();

        // Produces something like "2019-03-11 12:25:00"
        $current_date_time = Carbon::now()->toDateTimeString();
        //
        $added_date_time = Carbon::now()->addDays(5)->toDateTimeString();
        $data = $request->all();
        // $this->validate($request, [
        //     'amount' => 'required',
        // ]);
        $sub_check = ProviderSubscription::where(['user_id' => Auth::id()])->first();
        if ($sub_check) {
 
        if ($request->amount == '200') {
            $added_days = 31;
            $sub_type = 'monthly';
        }elseif ($request->amount == '600') {
            $added_days = 93;
            $sub_type = '3-months';
        }elseif ($request->amount == '1200') {
            $added_days = 186;
            $sub_type = 'bi-annual';          
        }elseif($request->amount == '2400') {
            $added_days = 372;
            $sub_type = 'annual';                       
        }else{
        return response()->json(['res_message' => 'no amount was provided', 'res_code' => 404], 200);
        }
        $initial_end_date = $sub_check->subscription_end_date;
        $sub_check->user_id = Auth::id();
        $sub_check->sub_type = $sub_type;
        $sub_check->user_type = 'provider';
        $sub_check->last_amount_paid = $request->amount;
        $sub_check->subscription_end_date = Carbon::parse($initial_end_date)->addDays($added_days)->format('Y-m-d H:i:s');
        $sub_check->last_subscription_starts = $current_date_time;
        $sub_check->save();

        return response()->json(['res_message' => 'Success', 'res_code' => 200], 200);        
    }else{
        return response()->json(['res_message' => 'user not found', 'res_code' => 404], 200);

        }
       
    }
}

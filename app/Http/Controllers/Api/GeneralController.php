<?php

namespace App\Http\Controllers\Api;

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
}

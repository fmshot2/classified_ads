<?php

namespace App\Http\Controllers;

use App\Category;
use App\Like;
use App\Message;
use App\Models\User;
use App\SeekingWork;
use App\Service;
use App\Image as ModelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class SeekingWorkController extends Controller
{
    public function seekingWorkCreate(Request $request)
    {

        $this->validate($request, [
            'name'                  => 'string|required',
            'phone'                 => 'numeric',
            'job_type'              => 'string|required',
            'job_title'             => 'string|required',
            'job_experience'        => 'required',
            'still_studying'        => 'string',
            'gender'                => 'string|required',
            'age'                   => 'numeric',
            'marital_status'        => 'string',
            'employment_status'     => 'string|required',
            'highest_qualification' => 'required',
            'expected_salary'       => 'required',
            'user_state'            => 'string|required',
            'user_lga'              => 'string|required',
            'address'               => 'nullable',
            'work_experience'       => 'nullable',
            'education'             => 'required',
            'certifications'        => 'nullable',
            'skills'                => 'required',
            'user_image'            => 'image|required'
        ]);


        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;

            //Fullsize
            $image->move(public_path('uploads/seekingworks/'), $file_name);

            $image_resize = Image::make(public_path('uploads/seekingworks/') . $file_name);
            $image_resize->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('uploads/seekingworks/' . $file_name), 60);
        }

        $sWork = new SeekingWork();

        $sWork->user_id               = Auth::user()->id;
        $sWork->fullname              = $request->name;
        $sWork->phone                 = $request->phone;
        $sWork->job_type              = $request->job_type;
        $sWork->job_title             = $request->job_title;
        $sWork->slug                  = Str::of($request->job_title)->slug('-') . '-' . time();
        $sWork->job_experience        = $request->job_experience;
        $sWork->still_studying        = $request->still_studying;
        $sWork->gender                = $request->gender;
        $sWork->age                   = $request->age;
        $sWork->marital_status        = $request->marital_status;
        $sWork->employment_status     = $request->employment_status;
        $sWork->highest_qualification = $request->highest_qualification;
        $sWork->expected_salary       = $request->expected_salary;
        $sWork->user_state            = $request->user_state;
        $sWork->user_lga              = $request->user_lga;
        $sWork->address               = $request->address;
        $sWork->work_experience       = $request->work_experience;
        $sWork->education             = $request->education;
        $sWork->certifications        = $request->certifications;
        $sWork->skills                = $request->skills;
        $sWork->category_id           = $request->category_id;
        $sWork->is_featured           = $request->is_featured;
        $sWork->picture             = $file_name;

        if ($sWork->save()) {
            $sWork->images()->create(['image_path' => $file_name]);
            $sWork->thumbnail = $sWork->images()->first()->image_path;
            $sWork->save();

            return redirect()->route('seller.show.cv', ['slug' => $sWork->slug])->with([
                'message' => 'CV succesfully created!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'CV couldn\'t updated!',
                'alert-type' => 'error'
            ]);
        }
    }

    public function showCV($slug)
    {
        $service = SeekingWork::where('slug', $slug)->firstOrFail();

        return view('seller.service.showcv', [
            'service' => $service
        ]);
    }

    public function imagesSeekingWorkStore(Request $request, $service_id)
    {
        $image       = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . '.' . $extension;

        //Fullsize
        $image->move(public_path('uploads/seekingworks/'), $file_name);

        $image_resize = Image::make(public_path('uploads/seekingworks/') . $file_name);
        $image_resize->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('uploads/seekingworks/' . $file_name));

        // Saving it with this service
        $service = SeekingWork::find($service_id);
        $service->images()->create(['image_path' => $file_name]);
        $service->thumbnail = $service->images()->first()->image_path;
        $service->save();

        $success_notification = array(
            'message' => 'Image(s) uploaded successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($success_notification);
    }

    public function imagesDelete($seekingworkid, $id)
    {
        $image = ModelImage::where('imageable_id', $seekingworkid)->where('id', $id)->first();
        $filename = $image->image_path;

        $seekingwork = SeekingWork::find($seekingworkid);

        if ($seekingwork->images->count() != 1) {
            $image->delete();

            $path = public_path('uploads/seekingworks/') . $filename;

            if (file_exists($path)) {
                unlink($path);
            }
            return redirect()->back()->with([
                'message' => 'Image deleted successfully!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'You cannot delete the last image!',
            'alert-type' => 'error'
        ]);
    }

    public function seekingWorkDetails($slug)
    {

        $seekingWorkDetail = SeekingWork::where('slug', $slug)->where('status', 1)->firstorFail();

        $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $approvedServices = Service::where('status', 1)->with('user')->get();
        $categories = Category::paginate(8);
        $seekingWorkDetail_id = $seekingWorkDetail->id;
        $seekingWorkDetail_likes = Like::where('service_id', $seekingWorkDetail_id)->count();
        $likecheck = Like::where(['user_id' => Auth::id(), 'service_id' => $seekingWorkDetail_id])->first();
        $service_category_id = $seekingWorkDetail->category_id;
        $seekingWorkDetail_state = $seekingWorkDetail->state;
        $images_4_service = $seekingWorkDetail->images;
        // $images_4_service = Image::where('imageable_id', $seekingWorkDetail_id)->get();
        $similarProducts = Service::where([['category_id', $service_category_id], ['state', $seekingWorkDetail_state]])->inRandomOrder()->limit(8)->get();

        $user_id = $seekingWorkDetail->user_id;
        $userMessages = Message::where('service_id', $seekingWorkDetail_id)->orderBy('created_at', 'desc')->take(7)->get();

        $allServiceComments = $seekingWorkDetail->comments->sortByDesc('created_at');

        $the_user = User::find($user_id);
        $the_user_name = $the_user->name;
        $the_provider_f_name = explode(' ', trim($the_user_name))[0];

        $expiresAt = now()->addHours(24);
        views($seekingWorkDetail)->cooldown($expiresAt)->record();

        return view('seekingWorkDetail', compact(['seekingWorkDetail', 'images_4_service', 'seekingWorkDetail_id', 'approvedServices',  'similarProducts', 'seekingWorkDetail_likes', 'featuredServices', 'userMessages', 'the_provider_f_name', 'likecheck', 'allServiceComments']));
    }

    public function seekingWorkPreviewDetails($slug)
    {

        $seekingWorkDetail = SeekingWork::where('slug', $slug)->first();
        $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $approvedServices = Service::where('status', 1)->with('user')->get();
        $categories = Category::paginate(8);
        $seekingWorkDetail_id = $seekingWorkDetail->id;
        $seekingWorkDetail_likes = Like::where('service_id', $seekingWorkDetail_id)->count();
        $likecheck = Like::where(['user_id' => Auth::id(), 'service_id' => $seekingWorkDetail_id])->first();
        $service_category_id = $seekingWorkDetail->category_id;
        $seekingWorkDetail_state = $seekingWorkDetail->state;
        $images_4_service = $seekingWorkDetail->images;
        // $images_4_service = Image::where('imageable_id', $seekingWorkDetail_id)->get();
        $similarProducts = Service::where([['category_id', $service_category_id], ['state', $seekingWorkDetail_state]])->inRandomOrder()->limit(8)->get();

        $user_id = $seekingWorkDetail->user_id;
        $userMessages = Message::where('service_id', $seekingWorkDetail_id)->orderBy('created_at', 'desc')->take(7)->get();

        $allServiceComments = $seekingWorkDetail->comments->sortByDesc('created_at');

        $the_user = User::find($user_id);
        $the_user_name = $the_user->name;
        $the_provider_f_name = explode(' ', trim($the_user_name))[0];

        $expiresAt = now()->addHours(24);
        views($seekingWorkDetail)->cooldown($expiresAt)->record();

        return view('seekingWorkDetail', compact(['seekingWorkDetail', 'images_4_service', 'seekingWorkDetail_id', 'approvedServices',  'similarProducts', 'seekingWorkDetail_likes', 'featuredServices', 'userMessages', 'the_provider_f_name', 'likecheck', 'allServiceComments']));
    }
}

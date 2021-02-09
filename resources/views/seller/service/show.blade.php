
@extends('layouts.seller')

@section('title')
Create Service |
@endsection

@section('content')

<br>
<hr>



<div class="content-wrapper" style="min-height: 868px;">

  @include('layouts.backend_partials.status')


  <section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header">
                    <div>
                        <img src="{{ asset('images/00_SEO-and-Digital-Marketing-Agency-Mega-Stationery-Branding-Identity-Design-Template-scaled.jpg') }}" alt="{{ $service->name }}" style="width: 100%; height: auto; margin: 0 auto">
                    </div>
                    <div>
                    <h2 style="font-weight: 700; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service Name:</h2>
                    <h4 class="box-title">{{ $service->name }}</h4>
                    </div>
                </div>
                <div class="box-body">
                    <h6 style="font-weight: 500; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service Description:</h6>
                    <p>{{ $service->description }}</p>
                    <h6 style="font-weight: 500; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service City:</h6>
                    <p>{{ $service->city }}</p>
                    <h6 style="font-weight: 500; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service State:</h6>
                    <p>{{ $service->state }}</p>
                    <h6 style="font-weight: 500; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service Street Address:</h6>
                    <p>{{ $service->address }}</p>
                     <h6 style="font-weight: 500; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service Experience:</h6>
                    <p>{{ $service->experience }}</p>
                    <h3 style="font-weight: 500; font-size: 17px; margin: 0 0 5px 0; padding: 0">Service Phone No:</h3>
                    <p>{{ $service->phone }}</p>
            </div>
        </div>
    </div>
        <div class="col-md-7">
          {{--   <div class="box box-default">
                <div class="box-header">
                    <h2 class="box-title" style="font-weight: 700">Service Thumbnail</h2>
                    <p>This is what will show on your service showcase page.</p>
                    <div>
                        <img src="{{ asset('images/00_SEO-and-Digital-Marketing-Agency-Mega-Stationery-Branding-Identity-Design-Template-scaled.jpg') }}" alt="{{ $service->name }}" style="width: 100%; height: auto; margin: 0 auto">
                    </div>
                </div>
                <div class="box-body">

                </div>
            </div> --}}
            <div class="box box-default">
                <div class="box-header">
                    <h2 class="box-title" style="font-weight: 700">Service Images</h2>
                    <p>Add more images to describe your service more!</p>
                </div>
                <div class="box-body">
                        @forelse ($service->images as $image)
                            <div style="display: inline-flex; flex-wrap: wrap">
                                <div>
                                    <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="" style="display: block;width:100px;">
                                    <a href="{{ route('service.image.delete', ['id' => $image->id]) }}" style="display:block">Delete</a>
                                </div>
                            </div>
                        @empty
                            <p>You don't have other images yet!</p>
                        @endforelse
                    </div>

                    <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-default dz-message">Drop your service images here</div>
                    </form>
                    <br>
                    <center>
                        <button id="submit-all" class="btn btn-success" style="height: 40px;"> Upload all the images</button>
                    </center>

                </div>
            </div>
        </div>
    </div>
  </section>

@endsection

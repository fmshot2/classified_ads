
@extends('layouts.seller')

@section('title', 'Create Service | ')

@section('content')

<style>
    .box-heading{
        font-weight: 600; font-size: 15px; margin: 0 0 10px 0; padding: 0
    }
    .box-heading span{
        font-weight: normal;
    }
</style>


<div class="content-wrapper" style="min-height: 868px;">

  @include('layouts.backend_partials.status')


  <section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header">
                    <div>
                        <img src="{{ $service->thumbnail ? asset('uploads/services/'.$service->thumbnail) : asset('images/00_SEO-and-Digital-Marketing-Agency-Mega-Stationery-Branding-Identity-Design-Template-scaled.jpg') }}" style="width: 100%; height: auto; margin: 0 auto">
                    </div>
                </div>
                <div class="box-body">
                    <h6 class="box-heading">Service Name: <span>{{ $service->name }}</span></h6>

                    <h6 class="box-heading">Service Description: <span>{{ $service->description }}</span></h6>

                    <h6 class="box-heading">Service City: <span>{{ $service->city }}</span></h6>

                    <h6 class="box-heading">Service State: <span>{{ $service->state }}</span></h6>

                    <h6 class="box-heading">Service Street Address: <span>{{ $service->address }}</span></h6>

                    <h6 class="box-heading">Service Experience: <span>{{ $service->experience }}</span></h6>

                    <h3 class="box-heading">Service Phone No: <span>{{ $service->phone }}</span></h3>

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
                        <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger" style="height: 40px; line-height: 29px"> View Service</a>
                    </center>

                </div>
            </div>
        </div>
    </div>
  </section>

@endsection

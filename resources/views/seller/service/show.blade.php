
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
                        <img src="{{ $service->thumbnail ? asset('uploads/services/'.$service->thumbnail) : asset('images/00_SEO-and-Digital-Marketing-Agency-Mega-Stationery-Branding-Identity-Design-Template-scaled.jpg') }}" style="width: 70%; height: auto; margin: 0 auto">
                    </div>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="right"><strong>Service Name: </strong> {{ $service->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Posted: </strong> {{ $service->created_at->diffForHumans() }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Description: </strong> {{ $service->description  }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Category: </strong> {{ $service->category->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Amount Charge: </strong> {{ $service->min_price }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Country : </strong>
                            <span class="right">Nigeria</span>
                        </li>
                        <li class="list-group-item">
                            <strong>State : </strong>
                            <span class="right"> {{ $service->state }} </span>
                        </li>
                        <li class="list-group-item">
                            <strong>City : </strong>
                            <span class="right"> {{ $service->city }}</span>
                        </li>

                        <li class="list-group-item">
                            <strong>Address : </strong>
                            <span class="left"> {{ $service->address }}</span>
                        </li>

                        <li class="list-group-item">
                            <strong>Images </strong>
                            <div class="images">
                                @foreach ($service->images as $image)
                                    <div class="image-list">
                                        <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="{{ $service->name }}">
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
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
                        <div class="dz-default dz-message">
                            Click here to add your images <br>
                            <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                        </div>
                    </form>
                    <br>
                    <center>
                        <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                        <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                    </center>

                </div>
            </div>
        </div>
    </div>
  </section>

</div>

@endsection

@extends('layouts.seller')

@section('title', $service->name . ' | ')

@section('content')

    <style>
        .list-group-item .images{
            display: block;
        }
        .list-group-item .image-list{
            display: inline-block;
            /* padding: 0 10px; */
        }

        .list-group-item .image-list img{
            width: 100px;
        }
        .box-title{
            margin-top: 5px;
        }
        @media only screen and (max-width: 768px) {
            .act-btns{
                margin-top: 20px;
            }
        }
    </style>

    <div class="content-wrapper" style="min-height: 868px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                          <i class="fa fa-briefcase"></i>

                          <h2 class="box-title"><strong>Service Details</strong></h2>

                          <div class="act-btns pull-right">
                              <a href="{{ route('service.update.view', $service->slug) }}" class="btn btn-danger">Edit Service</a>
                              <a href="{{ route('serviceDetail', $service->slug) }}" class="btn btn-warning">Preview Service</a>
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
                                    <span class="right"><strong>Description: </strong> {!! $service->description  !!}</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="right"><strong>Category: </strong> {{ $category->name }}</span>
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
            </div>
        </section>
    </div>

@endsection

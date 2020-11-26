@extends('layouts.app')
@section('title')
Privacy Policy
@endsection

@section('content')
<div class="blog-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Privacy Policy</h2>
                <ul class="breadcrumbs">
                    <li><a href="{{url('/')}}">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Blog box start -->
                <div class="blog-1 blog-big">
                    <div class="detail">
                        <p> {!! $general->privacy_policy !!}</p>
                    </div>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>


@endsection

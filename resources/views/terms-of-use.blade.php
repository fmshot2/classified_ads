
@extends('layouts.app')
@section('title', 'Terms of Use | ')

@section('content')
    <div class="blog-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Terms of Use</h2>
                    <ul class="breadcrumbs">
                        <li><a href="{{url('/')}}">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog body start -->
    <div class="blog-body content-area">
        <div class="container" style=" background-color: #fff">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog box start -->
                    <div class="blog-1 blog-big">
                        <div class="detail">
                            <p>{!! $pages_contents->term_of_use !!}</p>
                        </div>
                    </div>

                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

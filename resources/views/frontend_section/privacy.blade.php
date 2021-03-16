@extends('layouts.app')

@section('title', 'Privacy Policy | ')

@section('content')
<style>
    .detail ul{
        list-style-type: disc;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 40px;
    }
</style>
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
    <div class="container" style=" background-color: #fff">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Blog box start -->
                <div class="blog-1 blog-big">
                    <div class="detail">
                        <p> {!! $pages_contents->privacy_policy !!}</p>
                    </div>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>


@endsection

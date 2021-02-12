@extends('layouts.app')
@section('title', 'All Categories | ')
@section('content')

<div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/allcatbg.jpeg')}});">
    <div class="container">
        <div class="page-name">
            <div class="sub-banner-text-content">
                <h1>All Categories</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><span>/</span>All Categories</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="properties-section-body content-area categories-pg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <!-- Option bar start -->
                <div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon bg-warning">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="title-name">All Categories</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad ">
                        <div class="sorting-options">
                            {{-- <select class="sorting">
                                <option>New To Old</option>

                            </select>
                            <a href="properties-list-fullwidth.html" class="change-view-btn bg-warning"><i class="fa fa-th-list"></i></a>
                            <a href="properties-grid-fullwidth.html" class="change-view-btn bg-warning"><i class="fa fa-th-large"></i></a> --}}
                        </div>
                    </div>
                </div>
                <!-- grid properties start -->
                <div class="services-2 categories-pg-area content-area-5 bg-grea-3">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h5>What service are you looking for?</h5>
                </div>
                @if(isset($categories))
                    <div class="row wow animated" style="visibility: visible;">
                        @foreach($categories as $category)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                <a href="{{ route('services', $category->slug) }}">
                                    <div class="service-info-5 animate__animated animate__fadeInUp">
                                        <i class="flaticon-apartment text-warning"></i>
                                        <h4>{{$category->name}}</h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

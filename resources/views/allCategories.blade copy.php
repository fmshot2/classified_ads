
@extends('layouts.app')


@section('content')



<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>All Categories</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><span>/</span>All Categories</li>
            </ul>
        </div>
    </div>
</div>


<div class="properties-section-body content-area">
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
                            <span class="title-name">Categories Grid</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad ">
                        <div class="sorting-options">
                            <select class="sorting">
                                <option>New To Old</option>
                                
                            </select>
                            <a href="properties-list-fullwidth.html" class="change-view-btn bg-warning"><i class="fa fa-th-list"></i></a>
                            <a href="properties-grid-fullwidth.html" class="change-view-btn bg-warning"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div>
                <!-- grid properties start -->
                <div class="services-2 content-area-5 bg-grea-3">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h5>What service are you looking for?</h5>
                </div>
                @if(isset($categories))


        
                    <div class="row wow animated" style="visibility: visible;">
                        @foreach($categories as $category)

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="service-info-5 animate__animated animate__fadeInUp">
                                <i class="flaticon-apartment text-warning"></i>
                                <h4>{{$category->name}}</h4>
                                <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt</p>
                                <a href="{{ route('catdet', $category->id)}}">See Products</a>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="properties-grid-leftside.html">2</a></li>
                            <li class="page-item"><a class="page-link" href="properties-grid-fullwidth.html">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="properties-grid-fullwidth.html"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

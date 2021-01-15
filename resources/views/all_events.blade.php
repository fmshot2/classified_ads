


@extends('layouts.app')

@section('title')
Home | 
@endsection

@section('content')



<div class="main">
    <div class="blog-banner" style="background-image:url({{asset('OurBackend/img/makeupartist.jfif')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Events</h2>
                    <ul class="breadcrumbs">
                        <li><a href="https://new.efcontact.com">Home</a></li>
                        <li class="active"><span>/</span>Events</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @forelse($all_events as $all_event)
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="{{asset('images')}}/{{$all_event->image}}" alt="blog-img" class="img-fluid">
                            <div class="date-box">
                                <span>{{$all_event->date}}</span>
                            </div>
                        </div>
                        <div class="detail">
                            <h2>
                                <a href="#">{{$all_event->title}}</a>
                            </h2>
                            <div class="post-meta clearfix">
                                <span><a href="#" tabindex="0"><i class="fa fa-clock-o"></i>{{$all_event->time}}</a></span>
                                <span><a href="#" tabindex="0"><i class="fa fa-calendar"></i>{{$all_event->date}}</a></span>
                                <span><a href="#" tabindex="0"><i class="fa fa-home"></i>{{$all_event->location}}</a></span>
                            </div>
                            {{--<p></p><p>test</p><p></p>--}}
                            {{--<a href="https://new.efcontact.com/event/london-lifestyle" class="read-more">Read more</a>--}}
                        </div>
                    </div>
                                                     @empty
<p>There are no events posted yet</p>
@endforelse             

                </div>
   
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Posts by Category Start -->
                        <div class="posts-by-category widget">
                            <h3 class="sidebar-title">Archives</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="list-unstyled list-cat">
                                                    @forelse($all_events as $all_event)

                                <li><a href="#">{{$all_event->location}} | {{$all_event->date}}</a></li>
@empty
<p>There are no events posted yet</p>
@endforelse 
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

















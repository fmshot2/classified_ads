@extends('layouts.seller')

@section('title')
All Service | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 868px;">


    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-briefcase"></i>

                  <h2 class="box-title"><strong>Service Details</strong></h2>
                </div>

                <div class="header">
                    <h4>
                        {{ $service->name }}
                        <br>
                        <small>Posted By <strong> {{ Auth::user()->name }} </strong> {{ $service->created_at->diffForHumans() }} </small>
                    </h4>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="right"><strong>Min Price : </strong> {{ $service->min_price }} </span> -<span class="right"><strong>Max Price : </strong>  {{ $service->min_price }} </span>
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
                    </ul>
                </div>

                <div class="body">
                    <h5><strong>Description: </strong></h5>
                    {{ $service->description  }}
                </div>

            </div>
            {{--
          <!-- Map box -->
          <div class="box">
            <div class="box-header">
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                MAP
              </h3>
            </div>
            <div class="box-body">
              <div id="gmap_markers" style="height: 270px; width: 100%;"></div>
            </div>
          </div>
          <!-- /.box --> --}}


                        <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title"> Images </h3>
                </div>
                                <div class="body">
                    <img class="img-responsive" src="{{asset('images')}}/{{$service->image}}" alt=" {{ $service->name }}">
                </div>
                            </div>

            
                        <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Service Video</h3>
                </div>
                <div class="body text-center">
                    <iframe width="560" height="315" src=" {{ $service->video_link }} " frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
            
            
            

        {{--              <!-- Chat box -->
          <div class="box">
            <div class="box-header">
              <i class="fa fa-comments"></i>

              <h3 class="box-title">0 Comments</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="refresh">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button class="btn btn-primary btn-sm no-border red-btn"><a href="https://www.efcontact.com/admin/properties/milean-ventures"> <i class="fa fa-refresh" style="color: white"></i></a></button>
                </div>
              </div>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 325px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 325px;">
              <!-- chat item -->
                          </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 325px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            <!-- /.chat -->
          </div>
          <!-- /.box (chat box) --> --}}

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title"> Category Type </h3>
                </div>
                <div class="body">
                    <strong class="label bg-blue"></strong> {{ $category->name }} <strong class="label bg-success"></strong>
                </div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title"> Status </h3>
                </div>
                <div class="body">
                                            <span class="label bg-warning"> {{ $service->status == 1 ? 'Active' : 'Pending' }} </span>
                                        </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title"> </h3>
                </div>
                <div class="body">
                    <a href=" {{route('seller.service.all')}}" class="btn btn-info btn-warning waves-effect">
                        <i class="fa fa-arrow-left"></i>
                        <span> BACK </span>
                    </a>
                    <a href="{{ route('service.update.view', $service->slug) }}" class="btn btn-info btn-warning waves-effect">
                        <i class="fa fa-pencil-square-o"></i>
                        <span> UPDATE </span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>

</section></div>

@endsection
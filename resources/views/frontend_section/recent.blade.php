    <div class="recently-properties content-area-12">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1> Recent Services </h1>
        </div>


<div class="row">
    @foreach($recentServices as $recentService)

    <div class="col-sm-3 card service-box">
                        <img class="card-img-top" src="{{asset('images')}}/{{$recentService->image}}" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4><a href="#">{{$recentService->user->name}} </a></h4>
                            </div>
                             <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        <i class="fa fa-map-marker"></i>{{$recentService->user->name}}
                                    </a><span>, {{$recentService->address}} &nbsp;, {{$recentService->state}}</span>
                                </div>
                         
                            <a href="#" class="read-more">More...</a>
                        </div>
                    </div>
                        @endforeach
    </div>
</div>
</div> 

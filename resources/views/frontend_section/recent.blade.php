    <div class="recently-properties content-area-12">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1> Recently Added Services </h1>
        </div>

        @if(isset($recentServices))

<div class="row">
    @foreach($recentServices as $recentService)

    <div class="col-sm-3 card service-box">
                        <img class="card-img-top" src="{{asset('images')}}/{{$recentService->image}}" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4><a href="#">{{$recentService->user->name}}, &nbsp; {{$recentService->name}}</a></h4>
                            </div>
                             <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        
                                    </a><i class="fa fa-map-marker"></i><span>{{$recentService->state}}</span>
                                </div>
                         
                            <!--<a href="#" class="read-more">More...</a>-->
                        </div>
                    </div>
                        @endforeach
                        @endif
    </div>
</div>
</div> 

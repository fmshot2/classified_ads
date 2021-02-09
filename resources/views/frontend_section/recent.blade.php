<div class="recently-properties content-area-12 hm-cl-recently-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1> Recently Added Services </h1>
        </div>

        @if(isset($recentServices))
            <div class="row">
                @foreach($recentServices as $recentService)
                    <div class="col-lg-3 col-md-4 col-sm-6 filtr-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$recentService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </div>
                            <div class="detail">
                                <div>
                                    <a class="title" href="{{route('serviceDetail', $recentService->slug)}}">{{$recentService->user->name}}: {{$recentService->name}}</a>
                                </div>

                                <ul class="d-flex flex-row justify-content-between info">
                                    <li>
                                        <a class="pull-right" href="{{route('serviceDetail', $recentService->slug)}}">
                                            <i class="fa fa-map-marker text-warning"></i> {{$recentService->state}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="blog content-area bg-grea-3">
    <div class="container">
       <!-- Main title -->
<div class="main-title" style="margin-top: -50px;">
    <h1> Featured Services </h1>
</div>

@if(isset($featuredServices))
<div class="row">
    @foreach($featuredServices as $featuredService)
    <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
    <div class="col-lg-3 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
        <div class="property-box">
            <div class="property-thumbnail">
                
                    <div class="listing-badges">
                        <span class="featured bg-warning">{{$featuredService->is_featured == 1 ? 'featured' : ''}}</span>
                    </div>
                    <div class="price-ratings-box">
                        <p class="price">
                           {{ Str::limit($featuredService->experience, 5) }} Yrs Experience
                        </p>
                                   <!-- <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div> -->
                                </div>
                                <div class="listing-time opening">{{ Str::limit($featuredService->user->name, 10) }}</div>
                                <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            
                        </div>
                        <div class="detail">
                            <div class="d-flex justify-content-between"><a class="title " href="{{route('serviceDetail', $featuredService->slug)}}"  style="font-size: 14px;">{{ Str::limit($featuredService->name, 50) }}</a>
                                </div>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i>                                    {{$featuredService->likes->count()}} likes
                                    </li>
                                    <a class="pull-right" href="{{route('serviceDetail', $featuredService->slug)}}" style="font-size: 13px;">
                                    <i class="fa fa-map-marker text-warning"></i>{{$featuredService->state}}                                   
                                </a>
                                   <!-- <li class="" style="float: right;">
                                        <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="{{route('serviceDetail', $featuredService->id)}}">Verified</a>
                                    </li>-->
                               <!-- <form action="{{ route('admin.like', $featuredService->id)}}" method="POST">
                            {{ csrf_field() }}

             <span id="alert-block"></span>                &nbsp;&nbsp;&nbsp; <input id="id" type="hidden" value="{{$featuredService->id}}" class="input-text" name="id"><button id="alert-block2" class="fa fa-thumbs-up btn-submit" type="submit">Like</button>
         </form>-->

                                <!--<li>
                                    <i class="flaticon-monitor"></i> TV
                                </li>-->
                            </ul>
                        </div>
                 
                    </div>
                </div> 
                @endforeach
</a>
            </div>


            @endif



        </div>


        <div id="" class="search-section search-area-2">
            <div class="row justify-content-center">                          

                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <a href="{{route('allSellers')}}" class="btn font-weight-bold btn-outline-warning">See All Featured Sellers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    </div>
</div>


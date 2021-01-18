<div class="recently-properties content-area-12" style="margin-bottom: -230px; margin-top: -175px; margin-right: 80px;margin-left: 80px;">
    <div class="" style="">

    {{--    @if(isset($closerServices))



<div class="row">
    @foreach($closerServices as $closerService)

    <div class="col-sm-3 card service-box mr-3">
                        <img class="card-img-top" src="{{asset('images')}}/{{$closerService->image}}" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4><a href="#">{{$closerService->user->name}}, &nbsp; {{$closerService->name}}</a></h4>
                            </div>
                             <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        
                                    </a><i class="fa fa-map-marker"></i><span>{{$closerService->state}}</span>
                                </div>
                            </div>
                    </div>
                        @endforeach
    </div>
@endif
--}}







<div class="services-2 content-area-5 d-none d-sm-block">
    <!-- Main title -->
    <div class="row container-fluid">


        <div class="col-lg-3 col-md-2 ml-1">
            <div class="sidebar-right">
                <!-- Advanced search start -->

                <div class="footer-item clearfix container-fluid">
                 <br/>
                 <div class="s-border" style="margin-top: -15px;"></div>
                 <div class="m-border"></div>
                 <h5 style="margin-top: -15px;">Featured Services</h5>
                 <div class="s-border"></div>
                 <div class="m-border"></div>
                 <div class="popular-posts">
                    @foreach($featuredServices as $featuredService)
                    <div class="media p-2">
                       <a href="{{route('serviceDetail', $featuredService->slug)}}"> <div class="media-left">
                        <img class="media-object" src=" {{asset('images')}}/{{ $featuredService->image[0]}} " alt="sub-properties"></a>

                    </div>
                    <div class="media-body align-self-center">
                        <h3 class="media-heading">
                        </h3>
                        <h6><a href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 30)}}</a></h6>

                        <a href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->state, 30)}}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="s-border"></div>
            <div class="m-border"></div>
        </div>

        <!-- Posts by category start -->
                    {{--<div class="posts-by-category widget">
                        <h3 class="sidebar-title">Cities</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                              @if(isset($featuredServices))
                        @foreach($featuredServices as $featuredService)
                        <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning text-gray-dark"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                                                            @endforeach
                        @endif
                                                      
                    </ul>
                </div>--}}
                
            </div>
        </div>

          {{-- <div class="">
                <ul>
                    @forelse($featuredServices as $featuredService)

                    <li>
                        <div class="">{{ Str::limit($featuredService->name, 15) }}</div>

                  </li>
                  @empty
                  <p>No Featurd Services Yet</p>
                  @endforelse
              </ul>

          </div>--}}
          <div class="col-lg-6">
            <div class="main-title">
                <h1>What service are you looking for?</h1>
            </div>
            <div class="sidebar-right">
                <div class="row wow animated" style="visibility: visible;">
                    @if(isset($categories))

                    @foreach($categories as $category)
                    <div class="  col-lg-3 col-md-3 col-sm-2 col-xs-2">
                        <div class="service-info-5">
                         <a href="{{route('services', $category->slug)}}" >

                            <div style="border-radius: 50px">
                             <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px;" alt="properties">
                         </div>
                     </a>

                     {{--<i class="fa fa-user text-warning"></i>--}}
                     <a href="{{route('services', $category->slug)}}" >
                        <h6>{{$category->name}}</h6>

                    </div>

                </div>

                @endforeach
            </div>
        </div>
        {{ $categories->links() }}
        @endif
    </div>







    <div class="col-lg-2 col-md-2">
        <div class="sidebar-right">
            <!-- Advanced search start -->

            <div class="footer-item clearfix container-fluid">
                <br/>
                <div class="s-border" style="margin-top: -15px;"></div>
                <div class="m-border"></div>
                <h5 style="margin-top: -15px;">Featured Adverts</h5>
                <div class="s-border"></div>
                <div class="m-border"></div>
                <div class="media">
                    <div class="media-left">
                      <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid">
                  </div>
              </div>
              <div class="s-border"></div>
              <div class="m-border"></div>
              <br />
              <div class="popular-posts">
                @foreach($featuredServices as $featuredService)
                <div class="media p-2">
                    <div class="media-left">
                        <img class="media-object" src=" {{asset('images')}}/{{ $featuredService->image[0]}} " alt="sub-properties">

                    </div>
                    <div class="media-body align-self-center">
                        <h3 class="media-heading">
                        </h3><h6><a href="#">{{ Str::limit($featuredService->name, 35)}}</a></h6>

                        <p>{{ Str::limit($featuredService->state, 30)}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

</div>
</div>

{{--mobile view for choosing a category--}}
<div class=" services-2 content-area-5 bg-grea-3 d-block d-sm-none">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Choose a category</h1>
        </div>
        <div class=" d-flex justify-content-around">
            <div class="form-group col-6">
                <select class="form-control" id="categories" name="category">
                    <option value="">-- Select Category --</option>
                    @if(isset($categories))
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}  </option> 
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>
{{--End mobile view for choosing a category--}}













{{--
<!-- Main title -->
<div class="main-title">
    <h1> Featured Services </h1>
</div>

@if(isset($featuredServices))
<div class="row">
    @foreach($featuredServices as $featuredService)
    <div class="col-lg-3 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
        <div class="property-box">
            <div class="property-thumbnail">
                <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
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
                            </a>
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
                    <!--    <div class="footer clearfix">
                            <div class="pull-left days">
                                <a><i class="fa fa-user"></i>{{$featuredService->user->name}}</a>
                            </div>
                            <div class="pull-right">
                                <ul class="facilities-list clearfix">
                                <li>
                                   <i class="fa fa-thumbs-up"></i>Upvote
                                </li>
                                <li>
                                    <i class="fa fa-thumbs-down"></i>Downvote
                                </li>
                                 </ul>
                            </div>
                        </div>-->
                    </div>
                </div> 
                @endforeach

            </div>


            @endif
            --}}


        </div>

    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var id = $("#id").val();

                $.ajax({
                    url: "{{ route('admin.like') }}",
                    type:'POST',
                    data: {_token:_token, id:id},
                    success: function(data) {
                      printMsg(data);
                  }
              });
            }); 

            function printMsg (msg) {
              if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  $('#alert-block').empty().append(msg.success);
                  $('#alert-block2').empty().append(msg.success2);

                  //$('.alert-block').empty().('display','block').append('<strong>'+msg.success+'</strong>');
              }else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
              });
            }

        }
    });
</script>
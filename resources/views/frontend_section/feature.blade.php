<div class="recently-properties content-area-12">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1> Featured Services </h1>
        </div>

<div class="container">
    @if(isset($user111))
        <p> The Search results for your query <b> query</b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user111 as $user)
            <tr>
                <td>{{$user->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<div class="row">
    @foreach($featuredServices as $featuredService)

<div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="{{route('serviceDetail', $featuredService->id)}}" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured bg-warning">featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                   <!-- <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div> -->
                                </div>
                                <div class="listing-time opening">For Rent</div>
                                <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">{{$featuredService->name}}</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>{{$featuredService->city}}&nbsp;, {{$featuredService->state}}
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square"></i>Experience:{{$featuredService->experience}} Yrs
                                </li>
                                <div class="pull-right">
                                <li>
                                    <i class="flaticon-time"></i> 5 Upvotes
                                </li>
                                </div>
                                
                                <!--<li>
                                    <i class="flaticon-monitor"></i> TV
                                </li>-->
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <a><i class="fa fa-user"></i> {{$featuredService->user->name}}</a>
                            </div>
                            <div class="pull-right">
                                <ul class="facilities-list clearfix">
                                <li>
                                   <i class="fa fa-thumbs-up"></i>Upvote
                                </li>
                                <li>
                                    <i class="fa fa-thumbs-down"></i> Downvote
                                </li>
                                 </ul>
                            </div>
                        </div>
                    </div>
                </div> 
                        @endforeach
       <!-- <div class="property-box-5 col-sm-3 col-pad mr-5">
                        <div class="property-photo">
                            <img class="img-fluid" src="{{asset('images')}}/{{$featuredService->image}}" alt="properties" style="height:180px;">
                            <div class="date-box ">For Sale</div>
                        </div>
                        <div class="detail">
                            <div class="heading">
                                <h3>
                                    <a href="properties-details.html" tabindex="-1">{{$featuredService->user->name}}</a>
                                </h3>
                                <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        <i class="fa fa-map-marker"></i>{{$featuredService->streetAddress}}
                                    </a><span>, {{$featuredService->city}} &nbsp;, {{$featuredService->state}}</span>
                                </div>
                            </div>
                            <div class="properties-listing">
                              <span> 
 <form action="{{ route('admin.like', $featuredService->id)}}" method="POST">
                            {{ csrf_field() }}

             <span id="alert-block"></span>                &nbsp;&nbsp;&nbsp; <input id="id" type="hidden" value="{{$featuredService->id}}" class="input-text" name="id"><button id="alert-block2" class="fa fa-thumbs-up btn-submit" type="submit">Like</button>
                        </form>
                    </span>
                                <span> <i class="fa fa-thumbs-down"></i> 2 &nbsp;&nbsp;&nbsp;
Unlike</span>
                                <span>980 sqft</span>
                            </div>
                        </div>
                    </div>-->
    </div>
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
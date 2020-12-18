<!--<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
-->
 <!-- <div class="row justify-content-center bg-dark">
<form class="form-inline" action="{{route('search3')}}" method="POST" role="search">
    {{ csrf_field() }}
<div class="form-group mr-4"> 
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Service">
      </div>
    <div class="form-group mr-4">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Location">
      </div>
   

    <div class="form-group">
      <button type="submit" class="btn btn-warning mb-2 font-weight-bold btn-block bg-warning text-white"> Search  <i class="fa fa-search ml-2" aria-hidden="true"></i>  </button>
    </div>
</div>-->
 <!--   <div class="col-sm">
      <div class="form-group">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Location ">
      </div>
    </div>




    <div class="col-sm">
      <div class="form-group">
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
    </div>
-->

</div>

</form>




<!--<form action="{{route('search3')}}" method="GET">
    <input type="text" name="name" />
    <input type="text" name="state" />
    <input type="text" name="city" />

    <button type="submit">Submit</button>
</form>-->
<div id="" class="search-section search-area-2 bg-grea">
    <div class="">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form action="{{route('search3')}}" method="GET">

                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="hidden" name="name2" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                </div>
                            </div>



                            <div class="col-lg-2 col-md-3" style="">
                              <div class="form-group">
                                <select class="form-control" id="categories" name="category">
                                          @if(isset($categories))

                                    @foreach($categories as $category)

                                    <option value="1"> {{ $category->name }}  </option> 
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                         <div class="col-lg-2 col-md-3" style="">
                      <div class="form-group">
                        <select class="form-control" id="sub_category" name="sub_categories">



                        </select>
                    </div>
                </div>

                        <div class="col-lg-2 col-md-3" style="">
                          <div class="form-group">
                            <select class="form-control" id="state" name="state">
                                          @if(isset($categories))

                               @foreach($states as $state)

                               <option value="{{$state->id}}"> {{ $state->name }}  </option> 
                               @endforeach
                                                                   @endif


                           </select>
                       </div>
                   </div>

                   <div class="col-lg-2 col-md-3" style="">
                      <div class="form-group">
                        <select class="form-control" id="city" name="city">



                        </select>
                    </div>
                </div>




                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning">Search <i class="fa fa-search ml-2" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>








 <div class="row">
            @if(isset($user111))
                                  @foreach($user111 as $user)
            <div class="col-lg-3 col-md-6 col-sm-12 filtr-item" style="">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="{{route('serviceDetail', $user->id)}}" class="property-img">
                            <div class="listing-badges">
                                <span class="featured bg-warning">featured</span>
                            </div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    {{$user->experience}} Yrs Experience
                                </p>
                                  
                                </div>
                                <div class="listing-time opening">{{$user->user->name}}</div>
                                <img class="d-block w-100" src="{{asset('images')}}/{{$user->image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <span class="d-flex justify-content-around"><a class="title " href="properties-details.html">{{$user->name}}</a>
                                <a class="pull-right" href="properties-details.html">
                                    <i class="fa fa-map-marker text-warning"></i> {{$user->state}}
                                </a></span>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; 5 likes
                                    </li>
                                    <li class="" style="float: right;">
                                        <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="{{route('serviceDetail', $user->id)}}">Verified</a>
                                        </li>
                                     </ul>                         
                        </div>                 
                </div> 
            </div>
                            @endforeach
                            @endif

</div>




<div class="container">
            @if(isset($user111))
            <p> The Search2 results for your query <b> query</b> are :</p>
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
                        <td>{{$user->city}}</td>
                    </tr>
                </tbody>
            </table>


@endforeach
       



@endif
        </div>









          
<script type="text/javascript">


   $('#categories').on('change',function(){
    var categoryID = $(this).val();    
    if(categoryID){
        $.ajax({
         type:"GET",
           //url:"{{url('qqq')}}"+stateID,
           url: 'api/get-category-list/'+categoryID,
           success:function(res){               
            if(res){
             console.log(res);
             console.log(categoryID);
             $("#categ ").empty();
             $.each(res,function(key,value){
                $("#sub_category").append('<option value="'+key+'">'+value+'</option>');
            });

         }else{
             $("#sub_categories").empty();
         }
     }
 });
    }else{
        $("#sub_categories").empty();
    }

}); 

</script>



<script type="text/javascript">


   $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
         type:"GET",
           //url:"{{url('qqq')}}"+stateID,
           url: 'api/get-city-list/'+stateID,
           success:function(res){               
            if(res){
             console.log(res);
             console.log(stateID);
             $("#city").empty();
             $.each(res,function(key,value){
                $("#city").append('<option value="'+key+'">'+value+'</option>');
            });

         }else{
             $("#city").empty();
         }
     }
 });
    }else{
        $("#city").empty();
    }

}); 

</script>

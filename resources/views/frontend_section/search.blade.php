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
                                <select class="form-control" id="exampleFormControlSelect1" name="category">
                                    @foreach($categories as $category)

                                    <option value="1"> {{ $category->name }}  </option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3" style="">
                          <div class="form-group">
                            <select class="form-control" id="state" name="state">

                               @foreach($states as $state)

                               <option value="{{$state->id}}"> {{ $state->name }}  </option> 
                               @endforeach

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

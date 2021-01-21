<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">
    <div class="">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                     <form>
                 
                    </form>
                    <form action="{{route('search3')}}" method="GET">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" required name="name" class="form-control" placeholder="Enter Keyword">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-6" style="">
                                <div class="form-group">
                                  <select class="form-control" required id="categories" name="category">
                                      <option value="">-- Select Category --</option>
                                            @if(isset($categories))
                                      @foreach($categories as $category)
                                      <option value="{{ $category->id }}"> {{ $category->name }}  </option>
                                      @endforeach
                                      @endif
                                  </select>
                              </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-6" style="">
                                <div class="form-group">
                                    <select class="form-control" id="sub_category" name="sub_categories"></select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-6" style="">
                                <div class="form-group">
                                    <select class="form-control" required id="state" name="state">
                                        <option value="">-- Select State --</option>
                                        @if(isset($states))
                                            @foreach($states as $state)

                                                <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-6" style="">
                                <div class="form-group">
                                    <select class="form-control" id="city" name="city"></select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning">Search <i class="fa fa-search ml-2" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="name2" class="form-control" placeholder="">
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
                        $("#sub_category ").empty();
                        $.each(res,function(key,value){
                            $("#sub_category").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }else{
                        $("#sub_category").empty();
                    }
                }
            });
        }else{
         $("#sub_category").empty();
        }
    });
</script>

<script type="text/javascript">

    $('#state').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
         $.ajax({
          type:"GET",
            //url:"{{url('qqq')}}"+stateID,
            url: 'api/get-city-list/'+state_name,
            success:function(res){
             if(res){
                console.log(res);
                console.log(state_name);
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

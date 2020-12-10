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
    <div class="container">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
<form action="{{route('search3')}}" method="GET">
                       
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="Enter Your State">

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
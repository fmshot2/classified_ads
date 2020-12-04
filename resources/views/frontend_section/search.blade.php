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


<form action="{{route('search2')}}" method="GET">
    <input type="text" name="category" required/>
    <button type="submit">Submit</button>
</form>



<form class="container mt-3">

  <div class="row">


<form action="{{route('search2')}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="col-10">
      <div class="form-group">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Search For A Service, Seller or Location">
      </div>
    </div>




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





    <div class="col-2">
      <button type="submit" class="btn btn-warning mb-2 font-weight-bold btn-block bg-warning text-white"> Search  <i class="fa fa-search ml-2" aria-hidden="true"></i>  </button>
    </div>





  </div>

</form>
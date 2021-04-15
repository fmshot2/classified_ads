
<div class="box">

  <div class="box-header with-border">
    <h3>Total Balance:
     @if($user->refererAmount == NULL || $user->refererAmount == '' || $user->refererAmount == 0)
      ₦0
      <p><small class="text text-danger">Register people to earn</small></p>
    @else
     ₦{{ $user->refererAmount }}
    @endif
    </h3>


    @if (url()->current() == route('buyer.message.all') )
    <div class="box-tools">
      <form class="" method="GET" action="{{ route('admin.service.search') }}">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
    @endif 

  </div>
  <!-- /.box-header -->
  <div class="box-body ">
    
  </div>
  <!-- /.box-body -->

</div>

@include('seller/modal/create_service') 



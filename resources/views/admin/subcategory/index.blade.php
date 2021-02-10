
@extends('layouts.admin')

@section('title')
Category | 
@endsection


@section('content')
<div class="content-wrapper" style="min-height: 868px;">

<div class="container">

  @include('layouts.backend_partials.status')

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Category Form </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->



 <div class="row text-center">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">

        <div class="box box-primary">
          {{--<form action="{{route('saveService4Badge')}}" method="GET">--}}
            <form>
              {{ csrf_field() }}
              <select class="form-control" id="service_id11" required name="service_id">
                <option value=0>-- Select  the service --</option>
                @if(isset($services))
                @foreach($services as $service)
                <option value="{{ $service->id }}"> {{ $service->name }}</option> 
                @endforeach
                @endif
              </select>

              @if ($errors->has('service'))
              <span class="helper-text" data-error="wrong" data-success="right">
                <strong class="text-danger">{{ $errors->first('service') }}</strong>
              </span>
              @endif
            </form>
            <button class="btn btn-outline-warning btn-submit5" onclick="bbb()">click to confirm</button>
          </div>
        </div>
        <div class="col-md-4">
          <p id="drag_image" style="display: none;">hjhjhjhj</p>
        </div>
      </div>




  <form class="form-horizontal form-element" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label"> Name </label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Enter Category Name Here" required>


                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file">
                </div>


        </div>
      </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-warning pull-right"> Submit </button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>


</div>


@include('admin/section/category_table') 


</div>


<script type="text/javascript">
  function bbb() {
    document.getElementById("drag_image").style.removeProperty('display');
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    document.getElementById("paystack_btn_control1").disabled = true;
    const paystack_btn_control2 =document.getElementById("paystack_btn_control2");

    const paystack_btn_control3 =document.getElementById("paystack_btn_control3");

    document.getElementById("error_msg_paystack1").innerHTML = "Select a service before payment ";
    document.getElementById("error_msg_paystack2").innerHTML = "Select a service before payment ";
    document.getElementById("error_msg_paystack3").innerHTML = "Select a service before payment ";

      //paystack_btn_control1.disabled = true;
      paystack_btn_control2.disabled = true;

      paystack_btn_control3.disabled = true;
      $(".btn-submit4").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();

        var service_id = $("#service_id11").val();
        // if (service_id == 0) {
        //   document.getElementById("paystack_btn_control1").disabled = true;

        //   paystack_btn_control2.disabled = true;

        //   paystack_btn_control3.disabled = true;
        //   document.getElementById("error_msg_paystack1").innerHTML = "Select a service before payment ";
        //   document.getElementById("error_msg_paystack2").innerHTML = "Select a service before payment ";
        //   document.getElementById("error_msg_paystack3").innerHTML = "Select a service before payment ";
        //   alert("You have not selected a service");
        //   return;

        // }
        
        $.ajax({

          type:'POST',
          url: "{{ route('saveService4Badge') }}",
                    //data: $('#myform').serialize(),
                    //url: '/seller/service/createpay/',
                    data: {_token:_token, service_id:service_id },
                    success: function(data) {
                      alert(data.id);
                      document.getElementById("paystack_btn_control1").disabled = false;
                      paystack_btn_control2.disabled = false;

                      paystack_btn_control3.disabled = false;

                      // document.getElementById("error_msg_paystack1").innerHTML = " ";
                      // document.getElementById("error_msg_paystack2").innerHTML = " ";

                      // document.getElementById("error_msg_paystack3").innerHTML = " ";
                      document.getElementById("form_service_id").value = data.id;


                      //printMsg(data);
                    }
                  });
      });
    });
  </script>
@endsection
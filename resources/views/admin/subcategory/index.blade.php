
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
    <h3 class="box-title"> Save New Sub-Categories</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->



  {{-- <form class="form-horizontal form-element" method="POST" action="{{route('admin.subcategory.store')}}" enctype="multipart/form-data">
     --}}
    {{--  <form class="form-horizontal form-element"  method="POST" action="{{route('admin.subcategory.store')}}"  >
    {{ csrf_field() }}

    <div class="box-body">
      <div class="row text-center">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <div class="form-group">
                                  <select class="form-control" required id="category_id" name="category">
                                      <option value="">- Select Category -</option>
                                            @if(isset($categories))
                                      @foreach($categories as $category)
                                      <option value="{{ $category->id }}"> {{ $category->name }}  </option>
                                      @endforeach
                                      @endif
                                  </select>
                              </div>


      <div class="form-group">
        <label for="inputSubcategory" class="col-sm-2 control-label"> Name </label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="inputSubcategory" placeholder="Enter Sub-category Name Here" required>

        </div>
      </div>
    </div>
    <div class="col-md-4">
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-warning pull-right"> Submit </button>
    </div>
    <!-- /.box-footer -->
  </form> --}}
</div>


</div>


{{-- @include('admin/section/category_table')  --}}


</div>


<script type="text/javascript">
  function bbb() {
    document.getElementById("drag_image").style.removeProperty('display');
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // document.getElementById("paystack_btn_control1").disabled = true;
    // const paystack_btn_control2 =document.getElementById("paystack_btn_control2");

    // const paystack_btn_control3 =document.getElementById("paystack_btn_control3");

    // document.getElementById("error_msg_paystack1").innerHTML = "Select a service before payment ";
    // document.getElementById("error_msg_paystack2").innerHTML = "Select a service before payment ";
    // document.getElementById("error_msg_paystack3").innerHTML = "Select a service before payment ";

    //   //paystack_btn_control1.disabled = true;
    //   paystack_btn_control2.disabled = true;

    //   paystack_btn_control3.disabled = true;
      $(".btn-submit4").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();

        var category_id = $("#category_id").val();
        var inputSubcategory = $("#inputSubcategory").val();

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
          url: "{{ route('admin.subcategory.store') }}",
                    //data: $('#myform').serialize(),
                    //url: '/seller/service/createpay/',
                    data: {_token:_token, category_id:category_id, inputSubcategory:inputSubcategory },
                    success: function(data) {
                      alert(data.id);
                      // // document.getElementById("paystack_btn_control1").disabled = false;
                      // paystack_btn_control2.disabled = false;

                      // paystack_btn_control3.disabled = false;

                      // document.getElementById("error_msg_paystack1").innerHTML = " ";
                      // document.getElementById("error_msg_paystack2").innerHTML = " ";

                      // document.getElementById("error_msg_paystack3").innerHTML = " ";
                      // document.getElementById("form_service_id").value = data.id;


                      //printMsg(data);
                    },
                    error:  function(data){
                      alert(data.error);
                    }
                  });
      });
    });
  </script>
@endsection
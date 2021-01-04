
@extends('layouts.seller')

@section('title')
Create Service | 
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 868px;">

  @include('layouts.backend_partials.status')

  <section class="content-header">
    <h1>
{{Auth::User()->name}}    </h1>
    <ol class="breadcrumb">
      <li><a href="https://efcontact.com/seller/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <!--<li class="active">Shehu Furnitures</li>-->
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="https://efcontact.com/img/verified-gold-512.png" alt="">

              <h3 class="profile-username text-center">Trusted Badge</h3>
              <p class="text-center">Advantages of having a Trusted Badge</p>
              <ol>
                <li>Post as 8 images of your services</li>
                <li>Gain access to phone numbers of unlimited numbers of buyers</li>
                <li>Appear on the top when buyers search for services related to yours</li>
              </ol>
              <hr>
              <img class="profile-user-img img-responsive img-circle" src="https://efcontact.com/img/48025305-0-WhatsApp-Green-Tick.png" alt="">

              <h3 class="profile-username text-center">Verified Badge</h3>
              <p class="text-center">Advantages of having a Verified Badge</p>
              <ol>
                <li>Post 6 images of your services</li>
                <li>Gain access to phone numbers of unlimited numbers of buyers</li>
                <li>Appear beneath Trusted badge holders when buyers search for services related to yours</li>
              </ol>
              <hr>
              <img class="profile-user-img img-responsive img-circle" src="https://efcontact.com/img/instagram-verified-logo-11549386033fpzr9vfugd.png" alt="">

              <h3 class="profile-username text-center">Basic Badge</h3>
              <p class="text-center">Advantages of having a Basic Badge</p>
              <ol>
                <li>Post 4 images of your services</li>
                <li>Gain access to phone numbers of unlimited numbers of buyers</li>
              </ol>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <!-- /.col -->
      <div class="col-md-8">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">

            <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true">Trusted Badge</a></li>
            <li class=""><a href="#password" data-toggle="tab" aria-expanded="false">Verified Badge</a></li>
            <li class=""><a href="#verified" data-toggle="tab" aria-expanded="false">Basic Badge</a></li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane active" id="timeline">                               
                <form class="form-horizontal form-element">
                        {{ csrf_field() }}
                   
                    <div class="form-group">
                                <select class="form-control"  name="service_id">
                                    <option value="">-- Select  the service --</option>
                                          @if(isset($services))
                                    @foreach($services as $service)
                                    <option id="service_id" value="{{ $service->id }}"> {{ $service->name }}</option> 
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                    <div class="col-sm-10">
                      <input type="text" id="seller_name1" class="form-control" name="seller_name1" value="{{Auth::User()->name}}">
                    </div>
                  </div>               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" class="btn btn-warning" onclick="payWithPaystack1()"> MAKE PAYMENT1 </button> 
    {{--<button type="button" class="btn btn-submit2 btn-warning"> MAKE confirm </button> --}}
                    </div>
                    </div>
                </form>
              </div>
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- place below the html form -->
<script>
   var _token = $("input[name='_token']").val();

            var email1 = $("#email-address1").val();
            var amount1 = $("#amount1").val();
            var seller_id1 = $("#seller_id1").val();
            var badge_type1 = $("#badge_type1").val();
            var seller_name1 = $("#seller_name1").val();
            var phone1 = $("#phone1").val();
            var service_id = $("#service_id").val();



  function payWithPaystack1(){
    var handler = PaystackPop.setup({
      key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
       email: document.getElementById("email-address1").value,
    amount: 2000000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },


      callback: function(response){
      var ref_no1 = response.reference;
       /* $.ajax({
    url: 'http://www.yoururl.com/verify_transaction?reference='+ response.reference,
    method: 'get',
    success: function (response) {
      // the transaction status is in response.data.status
    }
  });*/
     $.ajax({
                type:'POST',
                {{--url: "{{ route('user.message2') }}",--}}
                    //data: $('#myform').serialize(),
                    url: '/seller/service/createpay/',
                    data: {_token:_token, email:email1, amount:amount1, seller_id:seller_id1, badge_type:badge_type1, seller_name:seller_name1, phone:phone1, ref_no:ref_no1, service_id:service_id },
                    success: function(data) {
                      alert(data);
                      console.log(data);
                  }
              });
     //       console.log(response);
       //   alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }         
</script>


@endsection
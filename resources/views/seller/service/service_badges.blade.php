
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

                    <input type="hidden" name="amount1" id="amount1" value="20000" class="form-control">
                    <input type="hidden" name="plan" id="plan" value="Trusted Seller" class="form-control">
                    <input type="hidden" name="seller_id1" id="seller_id1" value="{{Auth::User()->id}}" class="form-control">
                    <input type="hidden" name="badge_type1" id="badge_type1" value="Trusted" class="form-control">

                    <input type="hidden" name="type" value="card" class="form-control">
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" id="name" class="form-control" name="name" value="{{Auth::User()->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email-address1" id="email-address1" value="{{Auth::User()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" id="phone" 
                      value="{{Auth::User()->phone}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="address" id="address">{{Auth::User()->address == null ? "" : Auth::User()->address}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                           <input type="checkbox" id="basic_checkbox_1" checked="" required="">
                        <label for="basic_checkbox_1"> I agree to the</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://efcontact.com/terms-of-use">Terms and Conditions</a>
                      </div>
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
            <!-- /.tab-pane -->


            <div class="tab-pane" id="password">
                            
               <form class="form-horizontal form-element">
                                              {{ csrf_field() }}

                    <input type="hidden" name="amount2" id="amount2" value="15000" class="form-control">
                    <input type="hidden" name="plan" id="plan" value="Trusted Seller" class="form-control">
                    <input type="hidden" name="seller_id2" id="seller_id2" value="{{Auth::User()->id}}" class="form-control">
                    <input type="hidden" name="badge_type2" id="badge_type2" value="Verified" class="form-control">

                    <input type="hidden" name="type" value="card" class="form-control">
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" id="name" class="form-control" name="name" value="{{Auth::User()->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email-address2" id="email-address2" value="{{Auth::User()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" id="phone" 
                      value="{{Auth::User()->phone}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="address" id="address">{{Auth::User()->address == null ? "" : Auth::User()->address}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                           <input type="checkbox" id="basic_checkbox_1" checked="" required="">
                        <label for="basic_checkbox_1"> I agree to the</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://efcontact.com/terms-of-use">Terms and Conditions</a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" class="btn btn-warning" onclick="payWithPaystack2()"> MAKE PAYMENT2 </button> 
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="verified">
   <form class="form-horizontal form-element">
                                              {{ csrf_field() }}

                    <input type="hidden" name="amount3" id="amount3" value="10000" class="form-control">
                    <input type="hidden" name="plan" id="plan" value="Trusted Seller" class="form-control">
                    <input type="hidden" name="seller_id3" id="seller_id3" value="{{Auth::User()->id}}" class="form-control">
                    <input type="hidden" name="badge_type3" id="badge_type3" value="Basic" class="form-control">

                    <input type="hidden" name="type" value="card" class="form-control">
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" id="name" class="form-control" name="name" value="{{Auth::User()->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email-addres3" id="email-address3" value="{{Auth::User()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" id="phone" 
                      value="{{Auth::User()->phone}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="address" id="address">{{Auth::User()->address == null ? "" : Auth::User()->address}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                           <input type="checkbox" id="basic_checkbox_1" checked="" required="">
                        <label for="basic_checkbox_1"> I agree to the</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://efcontact.com/terms-of-use">Terms and Conditions</a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" class="btn btn-warning" onclick="payWithPaystack3()"> MAKE PAYMENT3 </button> 
                   </div>



                  </div>
                </form>
              </div>
          </div>
          <!-- /.tab-content -->
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
                    data: {_token:_token, email:email1, amount:amount1, seller_id:seller_id1, badge_type:badge_type1 },
                    success: function(data) {
                      alert(data);
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

<script type="text/javascript">
   var _token = $("input[name='_token']").val();

            var email2 = $("#email-address2").val();
            var amount2 = $("#amount2").val();
            var seller_id2 = $("#seller_id2").val();
            var badge_type2 = $("#badge_type2").val();

   function payWithPaystack2(){
    var handler = PaystackPop.setup({
      key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
       email: document.getElementById("email-address2").value,
    amount: document.getElementById("amount2").value * 100,
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
      
     $.ajax({
                type:'POST',
               
                    url: '/seller/service/createpay/',
                    data: {_token:_token, email:email2, amount:amount2, seller_id:seller_id2, badge_type:badge_type2 },
                    success: function(data) {
                      alert(data);
                  }
              });
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>


<script type="text/javascript">


   var _token = $("input[name='_token']").val();

            var email3 = $("#email-address3").val();
            var amount3 = $("#amount3").val();
            var seller_id3 = $("#seller_id3").val();
            var badge_type3 = $("#badge_type3").val();
  
   function payWithPaystack3(){
    var handler = PaystackPop.setup({
      key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
       email: document.getElementById("email-address3").value,
    amount: document.getElementById("amount3").value * 100,
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
      
     $.ajax({
                type:'POST',
               
                    url: '/seller/service/createpay/',
                    data: {_token:_token, email:email3, amount:amount3, seller_id:seller_id3, badge_type:badge_type3 },
                    success: function(data) {
                      alert(data);
                  }
              });
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }

</script>



<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit2").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();

            var email = $("#email-address").val();
            var amount = $("#amount").val();
           
             $.ajax({
                type:'POST',
                {{--url: "{{ route('user.message2') }}",--}}
                    //data: $('#myform').serialize(),
                    url: '/seller/service/createpay/',
                    data: {_token:_token, email, amount },
                    success: function(data) {
                      alert(data);
                      //printMsg(data);
                  }
              });
        });
    });
</script>
@endsection
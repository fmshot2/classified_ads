
@extends('layouts.admin')

@section('title')
All Badges | 
@endsection

@section('content')
<div class="content-wrapper">


    <!-- Main content -->
    

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> All Badge Requests</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display data_table_main nowrap margin-top-10">
              <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Account</th>
                    <th>Payment Type</th>
                    <th>Plan</th>
                    <th>Reference</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @if(isset($all_badges))
                @foreach($all_badges as $all_badge)
                                  <tr>
                    <td>2</td>
                    <td title="Shehu Furnitures">{{$all_badge->seller_name}}</td>
                    <td>{{$all_badge->email}}</td>
                    <td>{{$all_badge->phone}}</td>
                    <td>₦{{$all_badge->amount}}</td>
                    <td>Seller</td>
                    <td>Card</td>
                    <td>{{$all_badge->badge_type}}Seller</td>
                    <td>{{$all_badge->ref_no}}7</td>
                    <td>"{{$all_badge->created_at->diffForHumans()}}"</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-icon mg-r-5 mg-b-10" data-toggle="modal" data-target="#badgeapproveModal" onclick="approveAccount(1)"><i class="fa fa-check"></i></a>
                      <a href="#" class="btn btn-success btn-icon mg-r-5 mg-b-10" data-toggle="modal" data-target="#userapproveModal" onclick="activateAccount(1)"><i class="fa fa-star"></i></a>
                    
                    </td>
                    </tr>
                    @endforeach
                    @endif
                              </tbody>

          </table>



          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->



    </div>
    <!-- BASIC MODAL -->
    <div id="badgeapproveModal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Approve Badge Request</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="badgeapprove" method="POST">
                            {{ csrf_field() }}
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Action</label>
                        <select name="verification_status" id="badge_id" required="">
                            <option value="" disabled="" selected="">---Select Badge---</option>
                            <option value="1">Trusted Badge</option>
                            <option value="2">Verified Badge</option>
                            <option value="3">Basic Badge</option>
                            <option value="0">Decline</option>
                        </select>
                    </div>
                </div>
                </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-badgeSubmit btn-primary pd-x-20">Update <i class="fa fa-refresh"></i></button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
    <!-- BASIC MODAL -->
    <div id="accountapproveModal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Assign Badge to User</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="accountapprove" action="" method="post">
              <input type="hidden" name="_token" value="gKVmZYiO5HY0VzgtjOO52XgALjyQLXAUKstI3jjZ">
              <input type="hidden" name="_method" value="PUT">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Action</label>
                        <select name="status" id="" required="">
                            <option value="" disabled="" selected="">---Assign Badge---</option>
                            <option value="1">Trusted Badge</option>
                            <option value="2">Verified Badge</option>
                            <option value="3">Basic Badge</option>

                        </select>
                    </div>
                </div>
                </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success pd-x-20">Assign <i class="fa fa-star"></i></button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
    <!-- /.row -->
  </section>


    <!-- /.content -->
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
      
     $.ajax({
                type:'POST',
                {{--url: "{{ route('user.message2') }}",--}}
                    //data: $('#myform').serialize(),
                    url: '/seller/service/createpay/',
                    data: {_token:_token, email:email1, amount:amount1, seller_id:seller_id1, badge_type:badge_type1, seller_name:seller_name1, phone:phone1, ref_no:ref_no1 },
                    success: function(data) {
                      alert(data);
                  }
              });
     //       console.log(response);
       //   alert('success. transaction ref is ' + response.reference);
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }         
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-badgeSubmit").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();

            var badge_id = $("#badge_id").val(); 
            var badge_value = $("#badge_value").val();                     

            $.ajax({
                type:'POST',
                    url: '/admin/seller/saveBadge/',
                    data: {_token:_token, badge_id:badge_id, badge_value:badge_value, service_id:service_id },
                    success: function(data) {
                    alert(data.success2);
                      //printMsg(data);
                  }
              });
        }); 

        function printMsg (msg) {
            if((msg.success)){
              console.log(msg.success);
                  //$('#alert-block').empty().append(msg.success);
                  //$('#alert-block2').empty().append(msg.success2);

                 // $('.alert-block').empty().('display','block').append('<strong>'+msg.success+'</strong>');
              }

        }
    });
</script>

@endsection
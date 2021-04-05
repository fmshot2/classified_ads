@extends('layouts.agent')

@section('title', 'View All Referrals | ')

@section('content')

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>
    <section class="content-header">
        <p id="referer_text" style="font-size: 21px">You can view all your Referral activities here.</p>
        <p class="downline_text" style="font-size: 21px; display: none;">You Can View A Specific Downline Here.</p>

    </section>
    <section class="content">

      <div class="row">
         <div class="col-xs-12">

            <div class="box" >
               <div class="box-header">
                  <h3 class="box-title"> Referals </h3>
                  <h5 class="text-success downline_text" style="display: none;"> These are the benefits you've gained from this particular referer </h5>
              </div>
              @if(isset($myreferrals))

              <!-- /.box-header -->
              <div id="main_referer_table" class="box-body">
                  <div class="table-responsive">
                    <table class="display table table-bordered data_table_main">
                        <thead>
                            <tr>
                             <th> S/N </th>
<!--                        <th> Referee Name </th>
-->                       
<th> Referer Link </th>
<!-- <th> Agent Code </th> -->
<th> Bonus </th>
<th> Date Created </th>
                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($myreferrals as $key =>  $myreferral)


                                        <tr role="row" class="odd">
                                           <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                           <!-- <td> {{ $myreferral->user->name }} </td> -->
                                           <td> {{ $myreferral->user->refererLink }} </td>
                                           <td> {{ $myreferral->user->refererAmount }} </td>
                                           <td> {{ $myreferral->created_at->diffForHumans() }} </td>
                                           <!-- <td> {{ $myreferral->status == 1 ? 'read' : 'unread' }} </td> -->

                                           <td class="center">
                                            <a onclick="getDetails({{$myreferral->user->id}})" class="btn btn-warning "><i class="fa fa-eye"></i>View Downline</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>


                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    @endif



                    <!-- /.box-header -->
                    <div id="downline_table" style="display: none;" class="box-body">
                      <div class="table-responsive">
                        <table class="display table table-bordered data_table_main">
                            <thead>
                                <tr>
                                 <!-- <th> S/N </th> -->
<!--                        <th> Referee Name </th>
-->                       
<th> Referer Link </th>
<!-- <th> Agent Code </th> -->
<th> Level 1 Bonus </th>
<th> Level 2 Bonus </th>
<th> Level 3 Bonus </th>
<th> Your Total Bonus </th>
<!-- <th> Action </th> -->



                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                                        </tr>
                                    </thead>

                                    <tbody>



                                        <tr role="row" class="odd">
                                           <!-- <td><a href=""> </a></td> -->
                                           <td id="ref_link">  </td>
                                           <td id="level1">  </td>
                                           <td id="level2">  </td>
                                           <td id="level3">  </td>
                                           <td id="total">  </td>

                                           <!-- <td class="center">
                                            <a onclick="" class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                            <a href=" {{ route('home') }} " class="btn btn-warning "><i class="fa fa-eye"></i>View Downline</a>
                                            <a href="{{ route('home') }} " class="btn btn-warning "><i class="fa fa-reply"></i></a>
                                        </td> -->
                                    </tr>


                                </tbody>


                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                   <!--  <div>
                        <a class="btn btn-success downline_text" style="display: none;" onclick="goBack()">Go Back</a>
                    </div> -->


                </div>


                <!-- /.content -->
            </div>



        </div>

    </div>
</section>
<script type="text/javascript">

 function getDetails(id) {

    $.ajax({
      method: "GET",
      url: base_Url + '/agent/referer/downline/' + id,

      success: function (data) {
        console.log(data);
        // toastr.success('You have purchased a new subscription!');
        $('#downline_table').css("display", "block");
        $('.downline_text').css("display", "block");
        $('#main_referer_table').css("display", "none");
                $('#referer_text').css("display", "none");

                                // $("#sub_end2").innerHTML = data.new_date;
                                $("#ref_link").html(data.success.refererLink);
                                if (data.success.level1) {
                                    var level1_value = 200;
                                   $("#level1").html(200);
                               }else{
                                    var level1_value = 0;
                               }
                               if (data.success.level2) {
                                var level2_value = 150;
                                $("#level2").html(150);
                               }else{
                                    var level1_value = 0;
                               }
                               if (data.success.level3) {
                                var level3_value = 100;
                                   $("#level3").html(100);
                               }else{
                                    var level1_value = 0;
                               }

                               var total =  level1_value +  level2_value + level3_value;
                               console.log(total);
                                 $("#total").html(total);
 
                                 // $("#level2").html(data.success.level2);
                                 // $("#level3").html(data.success.level3);

                                    // if (data.success.level1) {
                                    //  data.success.level1 = 200;
                                    // }
                                    // if (data.success.level2) {
                                    //  data.success.level2 = 150;
                                    // }
                                    // if (data.success.level3) {
                                    // data.success.level3 = 100;
                                    // }

                                 // $('#sub_message').css("display", "block");
                             },
                             error: function(error) {
                              console.log(error)
                          }
                      })
}
</script>
<script type="text/javascript">
    function goBack(){
          window.history.back();
    }
</script>



<script>

    base_Url = "{{ url('/') }}"

    var _token = $("input[name='_token']").val();

                // var email1 = $("#email-address3").val();
                var amount = $("#sub_cost").val();
                var sub_type = $("#sub_type").val();

                function payWithPaystack1() {
                    $('#badgeRequestModal').modal('hide');
                    console.log(base_Url);

                    var handler = PaystackPop.setup({
                        key: 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
                        email: document.getElementById("email-address3").value,
                        amount: $("#sub_cost").val(),
                        ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                        metadata: {
                            custom_fields: [{
                                display_name: "Mobile Number",
                                variable_name: "mobile_number",
                                value: "+2348012345678"
                            }]
                        },
                        callback: function(response) {

                            var email = document.getElementById("email-address3").value;
                            var amount = $("#sub_cost").val();
                            var ref_no1 =  response.reference;
                            var sub_type = $("#sub_type").val();
                            console.log(email, amount, ref_no1, sub_type)
                            
                            $.ajax({
                              method: "POST",
                              url: base_Url + '/provider/service/create_sub',
                              dataType: "json",
                              data: {
                                _token: _token,
                                email: email,
                                amount: amount,
                                ref_no: ref_no1,
                                sub_type: sub_type
                            },
                            success: function (data) {
                                console.log(data);
                                toastr.success('You have purchased a new subscription!')
                                // $("#sub_end2").innerHTML = data.new_date;
                                $("#sub_end2").html(data.new_date);
                                 // $('#2').css("display", "block");
                             },
                             error: function(error) {
                              console.log(error)
                          }
                      })
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                }



            </script>

            @endsection

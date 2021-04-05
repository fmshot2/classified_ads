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
          <h5 class="text-success downline_text" style="display: none;"> These are the bonuses you've gained from this particular referer </h5>
      </div>
      @if(isset($myreferrals))

      <!-- /.box-header -->
      <div id="main_referer_table" class="box-body">
          <div class="table-responsive">
            <table class="display table table-bordered data_table_main">
                <thead>
                    <tr>
                       <th> S/N </th>
                        <!-- <th> Referee Name </th> -->
                       
                        <th> Referer Name </th>
                        <!-- <th> Agent Code </th> -->
                        <th> Bonus Earned </th>
                        <th> Date Created </th>
                        <th> Action </th>

                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                    </tr>
                </thead>

                                <tbody>

                                        @foreach($myreferrals as $key =>  $myreferral)


                                        <tr role="row" class="odd">
                                         <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                         <!-- <td> {{ $myreferral->user->name }} </td> -->
                                         <td> {{ $myreferral->user->name }} </td>
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
<th> Referer Name </th>
<!-- <th> Agent Code </th> -->
<th> Level 1 Bonus </th>
<th> Level 2 Bonus </th>
<th> Level 3 Bonus </th>
<th> Level 4 Bonus </th>
<th> Total Bonus From This Referer </th>
<!-- <th> Action </th> -->



                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                                        </tr>
                                    </thead>g

                                    <tbody>



                                        <tr role="row" class="odd">
                                         <!-- <td><a href=""> </a></td> -->
                                         <td id="name">  </td>
                                         <td id="level1">  </td>
                                         <td id="level2">  </td>
                                         <td id="level3">  </td>
                                         <td id="level4">  </td>                           
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
                    
                    <div>
                            <button class="btn btn-success downline_text w-10" style="display: none;" onclick="goBack()">Go Back</button>
                        
                </div>


                </div>


                <!-- /.content -->
            </div>



        </div>

    </section>
    <script type="text/javascript">

       function getDetails(id) {

        $.ajax({
          method: "GET",
          url: '/agent/referer/downline/' + id,

          success: function (data) {
            console.log(data);
        // toastr.success('You have purchased a new subscription!');
        $('#downline_table').css("display", "block");
        $('.downline_text').css("display", "block");
        $('#main_referer_table').css("display", "none");
        $('#referer_text').css("display", "none");

                                // $("#sub_end2").innerHTML = data.new_date;
                                $("#name").html(data.success.name);
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
                                    var level2_value = 0;
                                }
                                if (data.success.level3) {
                                    var level3_value = 100;
                                    $("#level3").html(100);
                                }else{
                                    var level3_value = 0;
                                }
                                if (data.success.level4) {
                                    var level4_value = 50;
                                    $("#level4").html(50);
                                }else{
                                    var level4_value = 0;
                                }


                                var total =  level1_value +  level2_value + level3_value + level4_value;
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
    $('#main_referer_table').css("display", "block");
    $('#downline_table').css("display", "none");
      // window.history.back();
  }
</script>

@endsection

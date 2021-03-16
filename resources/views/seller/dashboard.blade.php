@extends('layouts.seller')

@section('title', 'Provider\'s Dashboard | ')

@section('content')
<style>
    .content-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .navbar-top-post-btn a{
        font-size: 15px !important;
        color:#fff
    }
    .refererArea h4{
        text-transform: uppercase;
    }
    .refererArea h4 small{
        font-size: 13px;
    }
    .refererArea h4 small a{
        color: #10CFBD;
        text-transform: initial;
    }
    .refererArea h4 small a:hover{
        color: #95f3ea;
        cursor: pointer;
    }
    .modal-title{
        text-transform: uppercase;
    }
    .form-text{
        display: block
    }
    ul{
        list-style-type: disc;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 40px;
    }
    @media (max-width: 768px){
        .content-header{
            padding: 0 5px 10px 10px;
        }
        .refererArea h4{
            font-size: 14px;
        }
        .refererArea .btn{
            font-size: 11px;
        }
        .navbar-top-post-btn a{
            font-size: 11px !important;
            margin-top: 40px
        }
        span.info-box-icon.push-bottom.bg-warning {
            display: none !important;
        }
        .info-box-content{
            margin-left: 0;
        }
        .info-box-text, .info-box-number{
            font-size: 14px;
        }
        .progress-description .btn{
            font-size: 9px;
        }
    }
</style>

<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('layouts.backend_partials.status')

        <section class="content-header">

            @if(isset($linkcheck->refererlink))
            <div class="refererArea">
                <h4>My Referral Link <small>(<a data-toggle="modal" data-target="#referralInfoModal">How it works?</a>)</small></h4>
                <div class="referralContainer">
                    <div>
                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="{{ url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink}}" onclick="copyToClipboard('#refererlinkText') ">
                            Click here to copy link
                        </button>
                    </div>
                    <div>
                        <p id="refererlinkText" hidden>{{ url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink }}</p>
                    </div>
                </div>
            </div>
            @endif
            <div>
                <p class="navbar-top-post-btn">
                    <a data-toggle="modal" data-target="#postServiceModal" class="btn btn-success"><i class="fa fa-plus"></i> <span >Post A Service</span></a>
                </p>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You Are About To Make Withdrawal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Current Total Amount :  {{$accruedAmount ?? 0}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if(isset($linkcheck->refererlink))
                        <a class="btn btn-primary" href="{{route('seller.make_withdrawal_request', $linkcheck->refererlink)}}">
                            Make Request
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            @if (Auth::User()->status == 0)
            <div class="callout callout-danger" style="background-color: #ff3d3dbb;">
                <p><i class="fa fa-info"></i> Your account is not active yet.</p>
            </div>
            @endif

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 top-box-card">
                    <div class="info-box">
                        <a href="{{ route('seller.service.all') }}">
                            <span class="info-box-icon push-bottom bg-warning">
                                <i class="fa fa-briefcase text-white" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> My Service{{ $service_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $service_count }} </span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $service_count}}%"></div>
                                </div>
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-clock-o text-white" aria-hidden="true"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Pending Service{{ $pending_service_count > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ $pending_service_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $pending_service_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-check text-white" aria-hidden="true"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Active Service{{ $active_service_count > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ $active_service_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $active_service_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-thumbs-up text-white" aria-hidden="true"></i>  </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> My Service{{ $service_count > 1 ? 's' : '' }} Likes </span>
                            <span class="info-box-number"> {{ $servicesLikeCounter }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $all_notification_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <a href="{{ route('seller.message.all') }}">
                            <span class="info-box-icon push-bottom bg-warning">
                                <i class="fa fa-commenting text-white" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> My Message{{ $message_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $message_count }} </span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $message_count}}%"></div>
                                </div>
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-commenting text-white" aria-hidden="true"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Unread Message{{ $unread_message_count > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ $unread_message_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $unread_message_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- 50% Increase in 28 Days -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-bell text-white" aria-hidden="true"></i>  </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> General Notice{{ $all_notification_count > 1 ? 's' : '' }}</span>
                            <span class="info-box-number"> {{ $all_notification_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $all_notification_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-money text-white" aria-hidden="true"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Referral Bonus </span>
                            <span class="info-box-number"> &#8358;{{$accruedAmount ?? 0}} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{$accruedAmount ?? 0}}%"></div>
                            </div>
                            <span class="progress-description">
                                <button class="btn btn-success btn-sm" style="cursor: pointer; display: block; margin-top: 5px;" data-toggle="modal" data-target="#exampleModal">Make Withdrawal</button>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            @include('seller/section/badge_notification')


            <div class="row">
                <div class="col-md-6 connectedSortable">
                    @include('seller/section/dash_pending_services_table')
                </div>

                <div class="col-md-6 connectedSortable">
                    @include('seller/section/active_service_table')
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 connectedSortable">
                    @include('seller/section/unread_message_table')
                </div>

                <div class="col-md-6 connectedSortable">
                    @include('seller/section/unread_notification_table')
                </div>
            </div>

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->
    </section>


    <div>
        <div id="referralInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h4 class="modal-title">How the Referral Works</h4>
                    </div>
                    <div class="modal-body">
                        <p>A refer is a person that uses his or her referral link to invite people online to register on efcontact.</p>
                        <ul>
                            <li>
                                All you have to do is copy and share your link to your friends , family , clients or anyone through WhatsApp, Facebook, sms, mms, Instagram, Twitter etc...
                            </li>
                            <li>
                                when they click your link and register , you automatically get 50 naira . The more people register using your link the more your bonuses increases.
                            </li>
                            <li>
                                When it gets to 1000 naira, you can request for a cashout or live it and keep inviting people to register using your link.
                            </li>
                            <li>
                                <strong>Note:</strong> you can only request withdrawal from monday to Thursday only. <br>
                                Friday is pay day to all our customers.
                            </li>
                        </ul>
                        <p><strong>Have fun and keep sharing 😃</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color: #cc8a19; color: #fff" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div id="postServiceModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h4 class="modal-title">Post A Service</h4>
                    </div>
                    <form action="{{ route('service.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Service Name</label><small class="text-danger">*</small>
                                        <small class="form-text text-muted">Enter the name of the service you want to offer. <input readonly type="text" name="countdown" size="1" value="20" style="border: 0; padding: 0;margin-right: -25px"> chars left</small>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" onkeydown="limitText(this.form.name,this.form.countdown,20);" onkeyup='limitText(this.form.name,this.form.countdown,20);' placeholder="e.g. Adamu Boutique..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Tell us about your service." rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">How much do you want to charge for this service?</label>
                                        <small class="form-text text-muted">Enter the amount you want on this service.</small>
                                        <input type="number" name="min_price" class="form-control" onkeydown="limitText(this.form.message,this.form.countdown,20);" onkeyup='limitText(this.form.message,this.form.countdown,20);' placeholder="e.g. 20000">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="form-label"> Experience (in years)</label>
                                        <small class="form-text text-muted">How many years of experience do you have for this service?</small>
                                        <input id='experience' type="number"  value="{{ old('experience') }}" name="experience" placeholder="e.g. 5" class="form-control" value="">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="">Phone</label><small class="text-danger">*</small>
                                        <small class="form-text text-muted">Enter your phone number.</small>
                                        <input id="phone" required type="number"  class="form-control" value="{{ old('phone') }}" placeholder="e.g. 09023456789" name="phone" value=" {{ Auth::user()->phone }}">
                                    </div>
                                    <div class="form-check">
                                        <input id="negotiable" class="form-check-input" type="checkbox" value="{{ old('negotiable') }}" name="negotiable">
                                        <label class="form-check-label" for="negotiable"> Is this service negotiable?</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <small class="text-danger">*</small>
                                        <select name="category_id" required class="form-control show-tick" id="categories">
                                            <option value="">-- Please select --</option>
                                            @foreach($categories as $category)
                                            <option id="category_id" value=" {{ $category->id }} "> {{ $category->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category <small class="text-info">(You can select multiple sub category)</small></label>
                                        <select name="sub_category[]" class="form-control show-tick" id="sub_categories" multiple>
                                            <option value="">-- Please select a category to populate this --</option>
                                            @foreach($subcategories as $subcategory)
                                            <option id="category_id" value=" {{ $subcategory->id }} "> {{ $subcategory->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group form-float">
                                        <label class="form-label">Video (Youtube)</label>
                                        <small class="form-text text-muted">Your youtube video link.</small>
                                        <input type="text" class="form-control" name="video_link">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Location</label><small class="text-danger">*</small>
                                        <select class="form-control" required id="state"  name="state">
                                            <option value="">-- Select State --</option>
                                            @if(isset($states))
                                            @foreach($states as $state)
                                            <option id="state" value="{{$state->name}}"> {{ $state->name }}  </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Local Government</label><small class="text-danger">*</small>
                                        <select class="form-control" id="city" name="city" required>
                                            <option disabled selected>- Select a State -</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input id="address" type="text"  value="{{ old('address') }}" class="form-control" name="address" placeholder="Enter your address here.">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;">Create Service</button>
                            <button id="closeytplayer" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
        // $(function () {
        //     $("#postServiceModal").modal('show');
        // })
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");

            toastr.options.progressBar = true
            toastr.options.positionClass = 'toast-top-left'
            toastr.success("Referral Link Copied!")

            $temp.remove();

        }

        function limitText(limitField, limitCount, limitNum) {
          if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;

            if (limitCount.value == 0) {
                limitField.style.border = '1px solid red'
                limitCount.style.color = 'red'
            }else{
                limitField.style.border = '1px solid #d2d6de'
                limitCount.style.color = '#333333'
            }
        }
    }


    $('#categories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:"GET",
                url: '/api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                        var res = JSON.parse(res);
                        $("#sub_categories ").empty();
                        $.each(res, function(key,value){
                            var chosen_value = value;
                            $("#sub_categories").append(
                                '<option value="'+chosen_value.id+'">'+chosen_value.name+'</option>'
                                );
                        });
                    }else{
                        $("#sub_categories").empty();
                    }
                }
            });
        }else{
            $("#sub_categories").empty();
        }
    });



    $('#state').on('change',function(){
        console.log('ddd');
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:"GET",
                url: '../../api/get-city-list/'+stateID,
                success:function(res){
                    if(res){
                        console.log(res);
                        console.log(stateID);
                        $("#city").empty();
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+value+'">'+value+'</option>');
                        });

                    }else{
                        $("#city").empty();
                    }
                }
            });
        }else{
            $("#city").empty();
        }

    });
</script>


@endsection

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
    .file-upload .image-box {
        margin: 0 auto;
        margin-top: 1em;
        height: 15em;
        width: 100%;
        background: #d24d57;
        cursor: pointer;
        overflow: hidden;
    }

    .file-upload .image-box img {
        height: 100%;
        width: 100%;
        display: none;
    }

    .file-upload .image-box p {
        position: relative;
        top: 45%;
        color: #fff;
    }
    .badge-info-box {
        min-height: 100px;
        background: #fff;
        width: 100%;
        box-shadow: 0 5px 20px rgb(0 0 0 / 10%);
        -webkit-box-shadow: 0 5px 20px rgb(0 0 0 / 10%);
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 15px;
        text-align: center;
    }
    .badge-info-box-icon {
        display: flex !important;
        justify-content: center;
        align-items: center;
        margin-top: 5px;
        flex-direction: row;
    }
    .badge-info-box-icon span {
        height: 60px;
        width: 60px;
        text-align: center;
        font-size: 30px;
        line-height: 64px;
        border-radius: 100%;
        color: #fff;
        margin: 0 5px 10px
    }
    .super-user{
        background-color: #FFC107 !important;
    }
    .moderate-user{
        background-color: #28A745 !important;
    }
    .basic-user{
        background-color: #007BFF !important;
    }
    .badge-info-title{
        padding-top: 10px;
    }
    select[multiple], select[size] {
        height: 220px;
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
        .badge-info-title{
            padding-top: 8px;
            font-size: 13px;
        }
    }
</style>

<style>
    /* Style the form */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 0;
    }
    .form-control {
        padding-left: 15px !important;
        border-radius: 0;
    }

    /* Mark input boxes that gets an error on validation: */
    .invalid {
        background-color: #ffdddd;
        border: 1px solid red !important;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Hide all steps by default: */
    .swtab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .swstep {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Hide all steps by default: */
    .swtab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .swstep {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .swstep.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .swstep.finish {
        background-color: #4CAF50;
    }


    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }
    .form-group label{
        text-align: left !important;
    }
    .contact-section .form-section {
        text-align: unset;
    }
    .contact-section .form-section h3, .form-section .btn {
        text-align: center;
    }
    .contact-section .form-section h3 {
        text-transform: uppercase;
        font-weight: 600
    }

    .tab .tabs-title{
        font-weight: 600
    }
    .tab .col-md-6 h5{
        font-weight: 600;
        font-size: 17px;
    }
    .swtab .tabs-title{
        font-weight: 600
    }
    .swtab .col-md-6 h5{
        font-weight: 600;
        font-size: 17px;
    }

    #submitBtn{
        display: none;
    }

    #swsubmitBtn{
        display: none;
    }
    .tabActionBtn{
        width: 100%; display: flex; justify-content: flex-end;
    }
    .input-group-addon{
        border: 1px solid #ced4da;
        background-color: #fff;
        padding: .375rem .75rem;
        cursor: pointer;
    }
    .postServiceModal .btn{
        border-radius: 50px;
        font-size: 15px;
        padding-left: 20px;
        padding-right: 20px;
        text-transform: uppercase;
    }
    .postServiceModal .modal-body{
        padding: 15px !important
    }

    @media(max-width: 768px){
        .tab .tabs-title{
            font-weight: 600;
            font-size: 14px;
        }
        .swtab .tabs-title{
            font-weight: 600;
            font-size: 14px;
        }
        .form-group .form-label {
            font-size: 13px !important;
        }

        .tabActionBtn{
            flex-direction: column;
            justify-content: center;

        }
        .tabActionBtn button{
            text-align: center;
            margin-bottom: 10px;
            width: 100%;
            margin: 10px 0;
        }
        .postServiceModal .modal-body{
            padding: 10px !important;
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
                <h4>My Referral Link <small class="infoLinkNote">(<a data-toggle="modal" data-target="#referralInfoModal">How it works?</a>)</small></h4>
                <div class="referralContainer">
                    <div>
                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="{{ url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink}}" onclick="copyToClipboard('#refererlinkText') ">
                            Click here to copy link
                        </button>
                    </div>
                    <div>
                        <p id="refererlinkText" hidden>{{ url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink }}</p>
                    </div>
                    {{-- <div style="padding-top: 5px; padding-left:5px">
                        <div class="addthis_inline_share_toolbox_k39l" data-url="{{ url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink }}" data-title="Your Referral Link 👍"></div>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60643ce977f333d6"></script>
                    </div> --}}
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
                        <p></p>
                        <br>
                        <form class="form-horizontal form-element" method="POST" action="{{route('buyer.submit.payemnt.request')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                       <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Withdrawal Amount: </label><small class="text-success">(How Much Do You Want To Withdraw?)</small>
                              <input type="text" name="amount_requested" id="editSubCategoryName" class="form-control">
                          </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                          <button type="submit" class="btn btn-warning pull-right"> Submit Request </button>
                      </div>
                      <!-- /.box-footer -->
                  </form>

                    </div>

                    {{-- <div class="modal-footer"> --}}
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        {{-- @if(isset($linkcheck->refererlink))
                        <a class="btn btn-primary" href="{{route('seller.make_withdrawal_request', $linkcheck->refererlink)}}">
                            Make Request
                        </a>
                        @endif --}}
                    {{-- </div> --}}
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
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $service_count}}%"></div>
                                </div>
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span> --}}
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
                            {{-- <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $pending_service_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span> --}}
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
                            {{-- <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $active_service_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span> --}}
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
                            {{-- <div class="progress">
                                <div class="progress-bar progress-bar-danger"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span> --}}
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
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $message_count}}%"></div>
                                </div>
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span> --}}
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
                            {{-- <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $unread_message_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- 50% Increase in 28 Days -->
                            </span> --}}
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="badge-info-box">
                        @if (Auth::user()->badgetype == 1)
                            <div>
                                <span class="">
                                    <img src="{{ asset('SuperBadge.svg') }}" alt="Super Badge">
                                </span>
                            </div>
                            <div class="badge-info-title">
                                <strong> Super Badge User </strong>
                            </div>
                        @elseif (Auth::user()->badgetype == 2)
                            <div>
                                <span class="">
                                    <img src="{{ asset('ModerateBadge.svg') }}" alt="Moderate Badge">
                                </span>
                            </div>
                            <div class="badge-info-title">
                                <strong> Moderate Badge User </strong>
                            </div>
                        @elseif (Auth::user()->badgetype == 3)
                            <div>
                                <span class="">
                                    <img src="{{ asset('BasicBadge.svg') }}" alt="Basic Badge">
                                </span>
                            </div>
                            <div class="badge-info-title">
                                <strong> Basic Badge User </strong>
                            </div>
                        @else
                            <div>
                                <span class="">
                                    <img src="{{ asset('nobadge.svg') }}" alt="No Badge">
                                </span>
                            </div>
                            <div class="badge-info-title">
                                <strong> No Badge </strong>
                            </div>
                        @endif
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-money text-white" aria-hidden="true"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Referral Bonus: <br> &#8358;{{$accruedAmount ?? 0}}</span>
                            {{-- <span class="progress-description">
                                <button class="btn btn-success btn-sm" style="cursor: pointer; display: block; margin-top: 5px;" data-toggle="modal" data-target="#exampleModal">Make Withdrawal</button>
                            </span> --}}
                            {{-- <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{$accruedAmount ?? 0}}%"></div>
                            </div> --}}

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


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
                                All you have to do is copy and share your link to your friends , family , clients or anyone through WhatsApp, Facebook, SMS, mms, Instagram, Twitter etc...

                            </li>
                            <li>
                                When your referral registers with EFContact or uses your agent code to register, you earn &#8358;200. The more the people register using your link the more your bonuses will increase.
                            </li>
                            <li>
                                When your commission reaches &#8358;1000, it will be sent to you on the pay day.
                            </li>
                        </ul>
                        <p><strong>Note:</strong> We pay commissions on a weekly basis - So if your bonus reaches the required threshold (&#8358;1000) the money will be transferred automatically to the account number provided on your profile the following week.</p>
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
        <div id="postServiceModal" class="modal fade postServiceModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h4 class="modal-title">Post A Service</h4>
                    </div>
                    <form id="serviceForm" action="{{ route('service.save') }}" method="post" enctype="multipart/form-data" style="display: block">
                        @csrf
                        <div class="modal-body">
                            <div style="padding: 20px">
                                <!-- One "tab" for each step in the form: -->
                                <div class="tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Category</label><small class="text-danger">*</small>
                                                <small class="form-text text-muted">Select a category to continue.</small>
                                                <select name="category_id" required class="form-control show-tick required" id="categories">
                                                    <option value="">-- Please select --</option>
                                                    @foreach($categories as $category)
                                                        <option id="category_id" value=" {{ $category->id }} "> {{ $category->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Service Name</label><small class="text-danger">*</small>
                                                <small class="form-text text-muted">Enter the name of the service you want to offer. <input readonly type="text" name="countdown" size="1" value="50" style="border: 0; padding: 0;margin-right: -20px; display: inline; width:auto; font-size: inherit"> chars left</small>
                                                <input type="text" class="form-control required" name="name" value="{{ old('name') }}" onkeydown="limitText(this.form.name,this.form.countdown,50);" onkeyup='limitText(this.form.name,this.form.countdown,50);' placeholder="e.g. Bag, Plumber, Phone, etc..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Location</label><small class="text-danger">*</small>
                                                <select class="form-control required" required id="state"  name="state">
                                                    <option value="">-- Select State --</option>
                                                    @if(isset($states))
                                                    @foreach($states as $state)
                                                    <option id="state" value="{{$state->name}}"> {{ $state->name }}  </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Local Government</label><small class="text-danger">*</small>
                                                <select class="form-control required" id="city" name="city" required>
                                                    <option disabled selected>- Select a State -</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control required" name="description" placeholder="Tell us about your service." style="height: 220px" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub Category <small class="text-info">(You can select multiple sub categories)</small></label>
                                                <select name="sub_category[]" class="form-control show-tick" id="sub_categories" multiple>
                                                    <option value="">- Please select a category to populate this -</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group file-upload" id="file-upload1">
                                                <label>Upload Image</label>
                                                <small class="text-danger">*</small> <br>
                                                <small class="text-info">Choose a thumbnail for your service.</small>
                                                <div class="image-box required text-center">
                                                        <p>Select an Image</p>
                                                        <img src="" alt="">
                                                    </div>
                                                <div class="controls" style="display: none;">
                                                    <input type="file" name="thumbnail" class="form-control required show-tick" required />
                                                </div>
                                            </div>
                                            <p class="text-danger">Uploading an image is compulsory.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" id="servicePriceRange">How much do you want to charge for this service?</label>
                                                        <small class="form-text text-muted" id="servicePriceRangeLabel">Enter the amount you want on this service.</small>
                                                        <input type="number" name="min_price" class="form-control required" placeholder="e.g. 20000">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <small class="form-text text-muted">Enter your physical address.</small>
                                                        <input id="address" type="text"  value="{{ old('address') }}" class="form-control" name="address" placeholder="Enter your address here.">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Phone</label><small class="text-danger">*</small>
                                                        <small class="form-text text-muted">Enter your phone number.</small>
                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="phone" required type="number" class="form-control required" value="{{ old('phone') }}" placeholder="e.g. 09023456789" minlength="11" maxlength="11" name="phone" value=" {{ Auth::user()->phone }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-float" id="youtubeLink">
                                                        <label class="form-label">Video (Youtube)</label>
                                                        <small class="form-text text-muted">Your youtube video link.</small>
                                                        <input type="text" class="form-control" name="video_link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-check" id="negotiableChBox">
                                                            <input id="negotiable" class="form-check-input" type="checkbox" value="{{ old('negotiable') }}" name="negotiable">
                                                            <label class="form-check-label" for="negotiable"> Is this service negotiable?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input id="featured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="featuredCheckbbox()">
                                                            <label class="form-check-label" for="featured"> Do you want this service featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label>
                                                        </div>
                                                        <p id="featuredText" class="text-info">This will attract a fee of &#8358;2000 which will be paid before the service is displayed.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-info" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-lg btn-warning"  id="nextBtn" onclick="nextPrev(1)">Next</button>
                            <button type="submit" class="btn btn-lg btn-warning"  id="submitBtn">Submit</button>
                        </div>
                    </form>



                    <form id="seekingworkForm" action="{{route('provider.seeking.work.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div style="padding: 20px">
                                <div style="margin-bottom: 20px">
                                    <h2 style="font-size: 20px"><strong>Create Your CV's Page</strong></h2>
                                    <small class="text-danger">* please fill all astericked fields</small>
                                </div>

                                <div class="swtab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Change Category</label>
                                                <small class="text-danger">*</small>
                                                <select name="category_id" required class="form-control show-tick" id="sw_categories">
                                                    <option value="1" selected>Job Applicant</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == 1 ? 'selected' : '' }}> {{ $category->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label class="form-label">Full Name </label><small class="text-danger">*</small>
                                            <input id='name' type="text" required name="name" value="{{ Auth::user()->name }}" class="form-control required" placeholder="Enter your fullname here (e.g. James Tapo)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job Title</label><small class="text-danger">*</small>
                                                <input id='name' type="text" name="job_title" value="{{ old('job_title') }}" class="form-control required" placeholder="What type of job are you looking for? (e.g. Accounting Finance)" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Job Type</label><small class="text-danger">*</small>
                                                <select class="form-control required" name="job_type" value="{{ old('job_type') }}" required>
                                                    <option value="Full Time" selected>Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Temporary">Temporary</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Internship">Internship</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Still Studying</label>
                                                <select class="form-control required" name="still_studying" value="{{ old('still_studying') }}" required>
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Years of experience in this field?</label><small class="text-danger">*</small>
                                                <input type="number" name="job_experience" value="{{ old('job_experience') }}" min="0" value="0" class="form-control required" placeholder="0" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Age</label><small class="text-danger">*</small>
                                                <input type="number" name="age" class="form-control required" min="0" value="{{ old('age') }}" placeholder="Your age (e.g. 24)" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Marital Status</label>
                                                <select class="form-control required" name="marital_status" value="{{ old('marital_status') }}" required>
                                                    <option value="Single" selected>Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Highest Qualification</label><small class="text-danger">*</small>
                                                <select class="form-control required" name="highest_qualification" value="{{ old('highest_qualification') }}" required>
                                                    <option value="High School (S.S.C.E)">High School (S.S.C.E)</option>
                                                    <option value="Degree">Degree</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="HND">HND</option>
                                                    <option value="OND">OND</option>
                                                    <option value="MBA/MSc">MBA/MSc</option>
                                                    <option value="MBBS">MBBS</option>
                                                    <option value="MPhil/PhD">MPhil/PhD</option>
                                                    <option value="N.C.E">N.C.E</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Gender</label><small class="text-danger">*</small>
                                                <select class="form-control required" name="gender" value="{{ old('gender') }}" required>
                                                    <option value="">- Gender type -</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Employment Status</label><small class="text-danger">*</small>
                                                <select class="form-control required" name="employment_status" value="{{ old('employment_status') }}" required>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Self Employed">Self-employed</option>
                                                    <option value="Retired Pensioner">Retired/Pensioner</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Expected Salary</label><small class="text-danger">*</small>
                                                <select class="form-control required" name="expected_salary" value="{{ old('expected_salary') }}" required>
                                                    <option value="&#8358;50,000">Below	&#8358;50,000</option>
                                                    <option value="&#8358;50,000 - &#8358;75,000<">&#8358;50,000 - &#8358;75,000</option>
                                                    <option value="&#8358;75,000 - &#8358;100,000">&#8358;75,000 - &#8358;100,000</option>
                                                    <option value="&#8358;100,000 - 125,000">&#8358;100,000 - 125,000</option>
                                                    <option value="&#8358;125,000 - &#8358;150,000">&#8358;125,000 - &#8358;150,000</option>
                                                    <option value="&#8358;150,000 - &#8358;200,000">&#8358;150,000 - &#8358;200,000</option>
                                                    <option value="&#8358;200,000 - &#8358;300,000">&#8358;200,000 - &#8358;300,000</option>
                                                    <option value="&#8358;300,000 - &#8358;500,000">&#8358;300,000 - &#8358;500,000</option>
                                                    <option value="Above &#8358;500,000">Above &#8358;500,000</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swtab">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Work Experience</label>
                                            <textarea id='workexperience' name="work_experience" class="form-control summernote" placeholder="Your work experience.">{{ old('work_experience') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Education</label><small class="text-danger">* compulsory</small>
                                            <textarea id='education' name="education" class="form-control required summernote" placeholder="Educational Background." required>{{ old('education') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Certifications</label>
                                            <textarea id='certifications' name="certifications" class="form-control summernote" placeholder="Any certifications?">{{ old('certifications') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Skills</label><small class="text-danger">* compulsory</small>
                                            <textarea id='skills' name="skills" class="form-control required summernote" placeholder="List your skills.">{{ old('skills') }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="swtab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group file-upload" id="file-upload1">
                                                <label>Upload Image</label>
                                                <small class="text-danger">*</small> <br>
                                                <small class="text-info">Choose a profile picture for your CV.</small>
                                                <div class="image-box text-center">
                                                        <p>Select an Image</p>
                                                        <img src="" alt="">
                                                </div>
                                                <div class="controls" style="display: none;">
                                                    <input type="file" name="user_image" class="form-control show-tick" required />
                                                </div>
                                            </div>
                                            <p style="color: #ee3636">Uploading an image is compulsory.</p>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Phone</label><small class="text-danger">*</small>
                                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="phone" type="number" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Your phone number (e.g. 09023456789)" name="phone"  minlength="11" maxlength="11" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Location</label><small class="text-danger">*</small>
                                                    <select class="form-control required" required id="user_state"  name="user_state">
                                                        <option value="">- Select State -</option>
                                                        @if(isset($states))
                                                            @foreach($states as $state)
                                                                <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Local Government</label><small class="text-danger">*</small>
                                                    <select class="form-control" id="user_lga" name="user_lga" required>
                                                        <option disabled selected>- 👈 Select a State -</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input id="address" type="text"  value="{{ old('address') }}" class="form-control" name="address" placeholder="Enter your address here.">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input id="swfeatured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="swfeaturedCheckbox()">
                                                    <label class="form-check-label" for="swfeatured"> Do you want this CV featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label>
                                                </div>
                                                <p id="swfeaturedText" class="text-info">This will attract a fee of &#8358;2000 which will be paid before the service is displayed.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="swstep"></span>
                                    <span class="swstep"></span>
                                    <span class="swstep"></span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-info" id="swPrevBtn" onclick="swNextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-lg btn-warning"  id="swNextBtn" onclick="swNextPrev(1)">Next</button>
                            <button type="submit" class="btn btn-lg btn-warning"  id="swSubmitBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div id="featuredInfoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                    <h4 class="modal-title">How Featured Service Works</h4>
                </div>
                <div class="modal-body">
                    <p>You can take advantage of EFContacts Featured Service to get the attention of your potential customers/clients 😃. <br>
                        Providers who use the featured service will have their service displayed first on all important EFContact pages.
                        A featured service will be given search priority on EFContact. This means that featured services will get displayed first on a search result page.
                    </p>
                    <p><strong>Note:</strong> This will attract a fee of &#8358;2000 which will be paid before the service is display on our website and last for a period of one month.</p>
                    <p><strong>Take advantage of this to get the attention of your potential customers/clients 😃.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #cc8a19; color: #fff" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showError(){
            document.getElementById('errMess').style.display = 'block';
    }
    document.getElementById('seekingworkForm').style.display = 'none'

    var checkBox = document.getElementById("featured");
    var text = document.getElementById("featuredText");
    text.style.display = "none";

    function featuredCheckbbox() {
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }


    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");

        toastr.options.progressBar = true
        toastr.options.positionClass = 'toast-top-left'
        toastr.success("Referral Link Copied!")

        navigator
        .share({
            title: 'Referral Link Copied! 🎉',
            text: 'Here is my referral link on EFContact.👍',
            url: $(element).text()
        })
        .then(() => console.log('Successful share! 🎉'))
        .catch(err => console.error(err));

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

        console.log(categoryID)

        if (categoryID == 1) {
            document.getElementById('seekingworkForm').style.display = 'block'
            document.getElementById('serviceForm').style.display = 'none'
        }
        else {
            document.getElementById('seekingworkForm').style.display = 'none !important'
            document.getElementById('serviceForm').style.display = 'block !important'
        }

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


    $('#sw_categories').on('change',function(){
        var categoryID = $(this).val();

        if (categoryID == 1) {
            document.getElementById('seekingworkForm').style.display = 'block'
            document.getElementById('serviceForm').style.display = 'none'
        }
        else {
            document.getElementById('seekingworkForm').style.display = 'none'
            document.getElementById('serviceForm').style.display = 'block'
        }

        if(categoryID){
            $.ajax({
                type:"GET",
                url: '/api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                    var res = JSON.parse(res);
                        $("#sw_sub_categories ").empty();
                        $.each(res, function(key,value){
                        var chosen_value = value;
                            $("#sw_sub_categories").append(
                                '<option value="'+chosen_value.id+'">'+chosen_value.name+'</option>'
                            );
                        });
                    }else{
                        $("#sw_sub_categories").empty();
                    }
                }
            });
        }else{
            $("#sw_sub_categories").empty();
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

    $('#user_state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
            type:"GET",
                url: '../../api/get-city-list/'+stateID,
                success:function(res){
                    if(res){
                        console.log(res);
                        console.log(stateID);
                        $("#user_lga").empty();
                        $.each(res,function(key,value){
                        $("#user_lga").append('<option value="'+value+'">'+value+'</option>');
                        });

                    }else{
                        $("#user_lga").empty();
                    }
                }
            });
        }else{
            $("#user_lga").empty();
        }

    });


    $(".image-box").click(function(event) {
        var previewImg = $(this).children("img");
        $(this)
        .siblings()
        .children("input")
        .trigger("click");

        $(this)
        .siblings()
        .children("input")
        .change(function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                var urll = e.target.result;
                $(previewImg).attr("src", urll);
                previewImg.parent().css("background", "transparent");
                previewImg.show();
                previewImg.siblings("p").hide();
            };
            reader.readAsDataURL(this.files[0]);
        });
    });

</script>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 120,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
</script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            // document.getElementById("nextBtn").innerHTML = "Submit";
            // document.getElementById("nextBtn").removeAttribute("onclick");
            // document.getElementById("nextBtn").setAttribute('type', 'submit');

            document.getElementById("nextBtn").style.display = 'none';
            document.getElementById("submitBtn").style.display = 'inline-block';
        } else {
            // document.getElementById("nextBtn").innerHTML = "Next";
            // document.getElementById("nextBtn").setAttribute('type', 'button');
            // document.getElementById("nextBtn").setAttribute("onclick","nextPrev(1)");
            document.getElementById("nextBtn").style.display = 'inline-block';
            document.getElementById("submitBtn").style.display = 'none';
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        // if (n == 1) return false;
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;

        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, i, valid = true;

        tab = document.getElementsByClassName("tab");
        requiredField = tab[currentTab].getElementsByClassName("required");

        for (i = 0; i < requiredField.length; i++) {
            if (requiredField[i].value == "") {
                // add an "invalid" class to the field:
                requiredField[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
            // else{
            //     requiredField[i].classList.remove("invalid");
            //     valid = true;
            // }

        }

        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>

<script>
    var swCurrentTab = 0; // Current tab is set to be the first tab (0)
    swShowTab(swCurrentTab); // Display the current tab

    function swShowTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("swtab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("swPrevBtn").style.display = "none";
        } else {
            document.getElementById("swPrevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            // document.getElementById("swNextBtn").innerHTML = "Submit";
            // document.getElementById("swNextBtn").setAttribute('type', 'submit');
            // document.getElementById("swNextBtn").removeAttribute("onclick");
            document.getElementById("swNextBtn").style.display = 'none';
            document.getElementById("swSubmitBtn").style.display = 'inline-block';
        } else {
            // document.getElementById("swNextBtn").innerHTML = "Next";
            // document.getElementById("swNextBtn").setAttribute('type', 'button');
            // document.getElementById("swNextBtn").setAttribute("onclick","swNextPrev(1)");
            document.getElementById("swNextBtn").style.display = 'inline-block';
            document.getElementById("swSubmitBtn").style.display = 'none';
        }
        // ... and run a function that displays the correct step indicator:
        swFixStepIndicator(n)
    }

    function swNextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("swtab");
        // Exit the function if any field in the current tab is invalid:
        // if (n == 1) return false;
        if (n == 1 && !swValidateForm()) return false;
        // Hide the current tab:
        x[swCurrentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        swCurrentTab = swCurrentTab + n;

        // Otherwise, display the correct tab:
        swShowTab(swCurrentTab);
    }

    function swValidateForm() {
        // This function deals with validation of the form fields
        var x, i, valid = true;

        tab = document.getElementsByClassName("swtab");
        requiredField = tab[swCurrentTab].getElementsByClassName("required");

        for (i = 0; i < requiredField.length; i++) {
            if (requiredField[i].value == "") {
                // add an "invalid" class to the field:
                requiredField[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
            // else{
            //     requiredField[i].classList.remove("invalid");
            //     valid = true;
            // }

        }

        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("swstep")[swCurrentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function swFixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("swstep");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>

@endsection

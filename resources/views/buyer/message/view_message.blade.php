
@extends('layouts.buyer')

@section('title', 'View Message | ')

@section('content')
<div class="content-wrapper" style="min-height: 518px;">
    <section class="content-header">
        <h1>View Message</h1>
        <ol class="breadcrumb">
            <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Message</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-info dash-1">
                    <div class="box-header">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">MESSAGE </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                    </div>
                    <div class="box-body">
                    <form action="#" method="post">
                        <div class="form-group">
                        <input type="email" class="form-control"  value="{{$message->sender_name }}" disabled="">
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" value="{{$message->sender_email}}" disabled="" >
                        </div>
                        <div>
                        <textarea class="textarea" disabled="" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $message->message }} </textarea>
                        </div>
                    </form>
                    </div>
                    <div class="box-footer clearfix">
                        @if (Auth::user()->email != $message->sender_email)
                            <a data-toggle="modal" data-target="#replyMessageModal{{ $message->id }}" href="#" class="btn btn-info "><i class="fa fa-reply"></i> Reply</a>
                        @endif
                </div>
            </div>
            </div>

            <div id="replyMessageModal{{ $message->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                            <h4 class="modal-title"><i class="fa fa-reply"></i> Reply</h4>
                        </div>

                        <div class="modal-body">
                            <form action="{{ route('client.message.reply') }}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="modal-body">
                                    <div class="row">
                                        @csrf
                                        <input type="hidden" name="service_id" value=" {{ $message->service_id }} ">
                                        <input type="hidden" name="receiver_id" value=" {{ $message->user_id }}">
                                        <input type="hidden" name="message_id" value=" {{ $message->id }}">
                                        <input type="hidden" name="sender_name" id="sender_name" value="{{ Auth::user()->name }}">
                                        <input type="hidden" name="sender_email" id="sender_email" value="{{ Auth::user()->email }}">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Sender Email:</label>
                                                <input class="form-control" name="sender_email" type="email" value=" {{ Auth::user()->email }} " disabled="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone Number:</label>
                                                <input class="form-control" name="sender_phone"  type="number" placeholder=" Enter phone here " >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div>
                                                <label for="">The Message:</label>
                                                <textarea class="textarea" placeholder="Message" name="message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                        </div>

                                        {{-- <div class="box-footer clearfix">
                                            <button type="submit" class="pull-right btn btn-warning"><font color="white"> SEND </font><i class="fa fa-paper-plane-o"></i></button>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a data-dismiss="modal" class="btn btn-default m-t-15 waves-effect">
                                        <i class="fa fa-close"></i>
                                        <span> Close</span>
                                    </a>
                                    <button type="submit" class="btn btn-warning" style="background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;">
                                        <span>Reply </span>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

</div>
@endsection

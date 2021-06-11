@extends('layouts.buyer')

@section('title', 'All Messages Table | ')

@section('content')
    <style>
        .table-responsive{
            padding-bottom: 20px !important;
        }
        /* width */
        .table-responsive::-webkit-scrollbar {
            height: 10px !important;
            margin-top: 20px !important;
            padding-top: 20px !important;
        }

        /* Track */
        .table-responsive::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgb(218, 218, 218);
            border-radius: 10px;
        }

        /* Handle */
        .table-responsive::-webkit-scrollbar-thumb {
            background: #cc8a19;
            border-radius: 10px;
        }

        /* Handle on hover */
        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #b3770f;
        }
    </style>
    <div class="content-wrapper" style="min-height: 518px;">

        <div class="container">
            @include('layouts.backend_partials.status')
        </div>
        <section class="content-header">
            <h3 class="page-title">All Messages</h3>
            <p class="page-description">This is where you get all your messages.</p>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="box" >
                        <div class="box-header">
                            <h4 class="box-title"> Received Messages</h4><br>
                            <h6 class="box-subtitle"> Sorting is from the most recent. </h6>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered data_table_main">
                                    <thead>
                                        <tr>
                                            <th> SL </th>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Message </th>
                                            <th> Status </th>
                                            <th> Date </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($all_received_messages as $key =>  $all_message)
                                            <tr role="row" class="odd">
                                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>

                                                <td> {{ $all_message->sender_name }} </td>
                                                <td> {{ $all_message->sender_email }} </td>
                                                <td> {{ Str::limit($all_message->message, 25) }} </td>
                                                <td id="rdStatus{{ $all_message->slug }}"> {!! $all_message->status == 1 ? '<strong class="text-success text-center">Read</strong>' : '<strong class="text-danger text-center">Unread</strong>' !!} </td>
                                                <td> {{ $all_message->created_at->format('d/m/Y') }} </td>

                                                <td class="center">
                                                    <a data-toggle="modal" data-target="#viewMessageModal{{ $all_message->id }}" onclick="readStatus('{{ $all_message->slug }}')" href="#" class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                                    @if (Auth::user()->email != $all_message->sender_email)
                                                        <a data-toggle="modal" data-target="#replyMessageModal{{ $all_message->id }}" href="#" class="btn btn-info "><i class="fa fa-reply"></i></a>
                                                    @endif
                                                </td>
                                            </tr>

                                            {{-- @if ($all_message->replies)
                                                @foreach($all_message->replies as $all_reply)
                                                    <tr role="row" class="odd">
                                                        <td><a href="javascript:void(0)"><i class="fa fa-reply"></i></a>  {{ $key + 1 }} </a></td>

                                                        <td> {{ $all_reply->sender_name }} </td>
                                                        <td> {{ $all_reply->sender_email }} </td>
                                                        <td> {{ Str::limit($all_reply->message, 25) }} </td>
                                                        <td id="rdStatus{{ $all_reply->slug }}"> {!! $all_reply->status == 1 ? '<strong class="text-success text-center">Read</strong>' : '<strong class="text-danger text-center">Unread</strong>' !!} </td>
                                                        <td> {{ $all_reply->created_at->diffForHumans() }} </td>

                                                        <td class="center">
                                                            <a data-toggle="modal" data-target="#viewMessageModal{{ $all_reply->id }}" onclick="readStatus('{{ $all_reply->slug }}')" href="#" class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                                            @if (Auth::user()->email != $all_reply->sender_email)
                                                                <a data-toggle="modal" data-target="#replyMessageModal{{ $all_reply->id }}" href="#" class="btn btn-info "><i class="fa fa-reply"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif --}}




                                            <div id="viewMessageModal{{ $all_message->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                                            <h4 class="modal-title">{{ $all_message->subject }}</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Name:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Email:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_email }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Phone No.:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_phone }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Message Subject:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Time:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->created_at->diffForHumans() }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Message:</label>
                                                                            <textarea disabled class="form-control">{{ $all_message->message }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a data-dismiss="modal" class="btn btn-default m-t-15 waves-effect">
                                                                    <i class="fa fa-close"></i>
                                                                    <span> Close</span>
                                                                </a>
                                                                @if (Auth::user()->email != $all_message->sender_email)
                                                                    <a data-toggle="modal" data-target="#replyMessageModal{{ $all_message->id }}" class="btn btn-warning" style="background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;">
                                                                        <i class="fa fa-reply"></i>
                                                                        <span>Reply </span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="replyMessageModal{{ $all_message->id }}" class="modal fade" role="dialog">
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
                                                                        <input type="hidden" name="service_id" value=" {{ $all_message->service_id }} ">
                                                                        <input type="hidden" name="receiver_id" value=" {{ $all_message->user_id }}">
                                                                        <input type="hidden" name="message_id" value=" {{ $all_message->id }}">
                                                                        <input type="hidden" name="sender_name" id="sender_name" value="{{ Auth::user()->name }}">
                                                                        <input type="hidden" name="sender_email" id="sender_email" value="{{ Auth::user()->email }}">

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Sender Email:</label>
                                                                                <input class="form-control" name="sender_email" type="email" value=" {{ $all_message->sender_email }} " disabled="">
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
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="box" >
                        <div class="box-header">
                            <h4 class="box-title"> Sent Messages</h4><br>
                            <h6 class="box-subtitle"> Sorting is from the most recent. </h6>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered data_table_main">
                                    <thead>
                                        <tr>
                                            <th> SL </th>
                                            <th> Message </th>
                                            <th> Status </th>
                                            <th> Date </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($all_sent_messages as $key =>  $all_message)
                                            <tr role="row" class="odd">
                                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                                <td> {{ Str::limit($all_message->message, 25) }} </td>
                                                <td id="rdStatus{{ $all_message->slug }}"> {!! $all_message->status == 1 ? '<strong class="text-success text-center">Read</strong>' : '<strong class="text-danger text-center">Unread</strong>' !!} </td>
                                                <td> {{ $all_message->created_at->format('d/m/Y') }} </td>

                                                <td class="center">
                                                    <a data-toggle="modal" data-target="#viewMessageModal{{ $all_message->id }}" onclick="readStatus('{{ $all_message->slug }}')" href="#" class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                                    @if (Auth::user()->email != $all_message->sender_email)
                                                        <a data-toggle="modal" data-target="#replyMessageModal{{ $all_message->id }}" href="#" class="btn btn-info "><i class="fa fa-reply"></i></a>
                                                    @endif
                                                </td>
                                            </tr>




                                            <div id="viewMessageModal{{ $all_message->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                                            <h4 class="modal-title">{{ $all_message->subject }}</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Name:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Email:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_email }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Phone No.:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_phone }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Message Subject:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->sender_name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Time:</label>
                                                                            <input class="form-control" disabled value="{{ $all_message->created_at->diffForHumans() }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Message:</label>
                                                                            <textarea disabled class="form-control">{{ $all_message->message }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a data-dismiss="modal" class="btn btn-default m-t-15 waves-effect">
                                                                    <i class="fa fa-close"></i>
                                                                    <span> Close</span>
                                                                </a>
                                                                @if (Auth::user()->email != $all_message->sender_email)
                                                                    <a data-toggle="modal" data-target="#replyMessageModal{{ $all_message->id }}" class="btn btn-warning" style="background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;">
                                                                        <i class="fa fa-reply"></i>
                                                                        <span>Reply </span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="replyMessageModal{{ $all_message->id }}" class="modal fade" role="dialog">
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
                                                                        <input type="hidden" name="service_id" value=" {{ $all_message->service_id }} ">
                                                                        <input type="hidden" name="receiver_id" value=" {{ $all_message->user_id }}">
                                                                        <input type="hidden" name="message_id" value=" {{ $all_message->id }}">
                                                                        <input type="hidden" name="sender_name" id="sender_name" value="{{ Auth::user()->name }}">
                                                                        <input type="hidden" name="sender_email" id="sender_email" value="{{ Auth::user()->email }}">

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Sender Email:</label>
                                                                                <input class="form-control" name="sender_email" type="email" value=" {{ $all_message->sender_email }} " disabled="">
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
                                        @endforeach

                                    </tbody>


                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!-- /.content -->
                </div>
            </div>
        </section>
    </div>


    <script>
        function readStatus(slug) {
            var rdStatustd = document.getElementById('rdStatus'+slug)
            $.ajax({
                type:"GET",
                url: "/buyer/message/read/status/" + slug,
                success:function(res){
                    console.log(res)
                    rdStatustd.innerHTML = '<strong class="text-success text-center">Read</strong>'
                }
            });
        }
    </script>

@endsection



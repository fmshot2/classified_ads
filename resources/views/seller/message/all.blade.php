@extends('layouts.seller')

@section('title', 'All Message | ')

@section('content')

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
			<div class="col-xs-12">


<div class="box" >
					<div class="box-header">
						<h3 class="box-title" style="opacity: .8"> Sorting is from the most recent. </h3>
						{{-- <h6 class="box-subtitle"> Sorting is from the most recent. </h6> --}}
					</div>

					<!-- /.box-header -->
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

                                    @foreach($all_message as $key =>  $all_messages)
                                        <tr role="row" class="odd">
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>

                                            <td> {{ $all_messages->buyer_name }} </td>
                                            <td> {{ $all_messages->buyer_email }} </td>
                                            <td> {{ Str::limit($all_messages->description, 25) }} </td>
                                            <td id="rdStatus{{ $all_messages->slug }}"> {!! $all_messages->status == 1 ? '<strong class="text-success text-center">Read</strong>' : '<strong class="text-danger text-center">Unread</strong>' !!} </td>
                                            <td> {{ $all_messages->created_at->diffForHumans() }} </td>

                                            <td class="center">
                                                <a data-toggle="modal" data-target="#viewMessageModal{{ $all_messages->id }}" onclick="readStatus('{{ $all_messages->slug }}')" href="#" class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                                @if (Auth::user()->email != $all_messages->buyer_email)
                                                    <a data-toggle="modal" data-target="#replyMessageModal{{ $all_messages->id }}" href="#" class="btn btn-info "><i class="fa fa-reply"></i></a>
                                                @endif
                                                {{-- <a href="{{ route('seller.message.reply',$all_messages->slug) }} " class="btn btn-warning "><i class="fa fa-reply"></i></a> --}}
                                                {{-- <a href=" {{ route('seller.message.view',$all_messages->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a> --}}
                                            </td>
                                        </tr>




                                        <div id="viewMessageModal{{ $all_messages->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                                        <h4 class="modal-title">{{ $all_messages->subject }}</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Sender Name:</label>
                                                                        <input class="form-control" disabled value="{{ $all_messages->buyer_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Sender Email:</label>
                                                                        <input class="form-control" disabled value="{{ $all_messages->buyer_email }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Sender Phone No.:</label>
                                                                        <input class="form-control" disabled value="{{ $all_messages->phone }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Message Subject:</label>
                                                                        <input class="form-control" disabled value="{{ $all_messages->buyer_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Time:</label>
                                                                        <input class="form-control" disabled value="{{ $all_messages->created_at->diffForHumans() }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Message:</label>
                                                                        <textarea disabled class="form-control">{{ $all_messages->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-dismiss="modal" class="btn btn-default m-t-15 waves-effect">
                                                                <i class="fa fa-close"></i>
                                                                <span> Close</span>
                                                            </a>
                                                            @if (Auth::user()->email != $all_messages->buyer_email)
                                                                <a data-toggle="modal" data-target="#replyMessageModal{{ $all_messages->id }}" class="btn btn-warning" style="background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;">
                                                                    <i class="fa fa-reply"></i>
                                                                    <span>Reply </span>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="replyMessageModal{{ $all_messages->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                                        <h4 class="modal-title"><i class="fa fa-reply"></i> Reply</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{ route('seller.message.reply.store') }}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    @csrf
                                                                    <input type="hidden" name="service_id" value=" {{ $all_messages->service_id }} ">
                                                                    <input type="hidden" name="buyer_id" value=" {{ Auth::user()->id }}">
                                                                    <input type="hidden" name="service_user_id" value=" {{ $all_messages->service_user_id }}">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Sender Email:</label>
                                                                            <input class="form-control" name="buyer_email" type="email" value=" {{ $all_messages->buyer_email }} " disabled="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Phone Number:</label>
                                                                            <input class="form-control" name="phone"  type="number" placeholder=" Enter phone here " >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Message Subject:</label>
                                                                            <input class="form-control" name="subject"  type="text" placeholder=" Enter subject here " >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div>
                                                                            <label for="">The Message:</label>
                                                                            <textarea class="textarea" placeholder="Message" name="description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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

	</div>
</section>


    <script>
        function readStatus(slug) {
            var rdStatustd = document.getElementById('rdStatus'+slug)
            $.ajax({
                type:"GET",
                url: "/provider/message/read/status/" + slug,
                success:function(res){
                    console.log(res)
                    rdStatustd.innerHTML = '<strong class="text-success text-center">Read</strong>'
                }
            });
        }
    </script>

@endsection

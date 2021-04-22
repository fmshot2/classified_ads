@extends('layouts.buyer')

@section('title', 'All Notification | ')


@section('content')
<div class="content-wrapper" style="min-height: 518px;">
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

    <section class="content-header">
        <h3 class="page-title">General  Notice</h3>
        <p class="page-description">This Page Is To Notify You Of Updates And Changes From The EFContact Company.</p>
    </section>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">
				<div class="box" >
					<div class="d-flex justify-content-start mb-4">
						<a id="markAllAsRead" onclick="markAllAsRead()" href="#" class="btn btn-success" data-toggle="modal">Mark all as Read</a>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Notification </th>
                                        <th> Date </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->notifications as $key => $notification)
                                        <tr id="notification{{ $notification->id }}">
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td>{{ Str::limit( $notification->data[0]['message'], 100) }}</td>
                                            <td>{{ $notification->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                @if ($notification->read_at == null)
                                                    <a id="markAsRead{{ $notification->id }}" onclick="markNotificationRead('{{ $notification->id }}')" href="#" class="btn btn-success markAsRead"> <i class="fa fa-check"></i> </a>
                                                @endif
                                                <a data-toggle="modal" data-target="#thisNotification{{ $notification->id }}" href="#" class="btn btn-info"> <i class="fa fa-eye"></i> </a>
                                                <a onclick="deleteNotification('{{ $notification->id }}')" href="#" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                            </td>

                                            <div id="thisNotification{{ $notification->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                                            <h4 class="modal-title">Your Notification</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ $notification->data[0]['message'] }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn" style="background-color: #cc8a19; color: #fff" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.content -->


				</div>
				<!-- /.box-body -->
			</div>


			<!-- /.content -->
		</div>



	</div>

</div>
</section>

<script>
    var base_Url = "{{ url('/') }}";
    var _token = $("input[name='_token']").val();

    function markNotificationRead(id) {
        $.ajax({
            method: "POST",
            url: "{{ route('seeker.notification.markasread') }}",
            dataType: "json",
            data: {
                _token: _token,
                notification_id: id,
            },
            success: function (data) {
                toastr.success('Notification marked as read!')
                $('#markAsRead'+id).hide()
            },
            error: function(error) {
                toastr.error('Something went wrong!')
                console.log(error)
            }
        })
    }

    function deleteNotification(id) {
        $.ajax({
            method: "POST",
            url: "{{ route('seeker.notification.delete') }}",
            dataType: "json",
            data: {
                _token: _token,
                notification_id: id,
            },
            success: function (data) {
                toastr.success('Notification deleted!')
                $('#notification'+id).hide()
            },
            error: function(error) {
                toastr.error('Something went wrong!')
                console.log(error)
            }
        })
    }


    function markAllAsRead() {
        var markAllAsReadBtn = document.getElementById('markAllAsRead')
        var markAsReadBtn = document.getElementsByClassName('markAsRead')
        markAllAsReadBtn.setAttribute('disabled', 'true')

        $.ajax({
            method: "GET",
            url: "{{ route('seeker.notification.markallasread') }}",
            success: function (data) {
                toastr.success('All notifications marked as read!')
                markAllAsReadBtn.setAttribute('disabled', 'false')
                $('.markAsRead').hide()
            },
            error: function(error) {
                toastr.error('Something went wrong!')
            }
        })
    }
</script>

@endsection



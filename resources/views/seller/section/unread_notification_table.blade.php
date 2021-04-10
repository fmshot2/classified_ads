
  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Recent Notification{{ Auth::user()->unreadNotifications->count() > 1 ? 's' :'' }} ({{ Auth::user()->unreadNotifications->count() }}) <a href="{{route('seller.notification.all') }}" class="text-success" style="font-weight: bold; font-size: 14px"> See all  notification </a></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Notification </th>
                    <th> Date </th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>
                @forelse(Auth::user()->unreadNotifications as $key => $unread_notification)
                    <tr id="notification{{ $unread_notification->id }}">
                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                        <td> {{ Str::limit( $unread_notification->data[0]['message'], 100) }} </td>
                        <td> {{ $unread_notification->created_at->diffForHumans() }} </td>

                        <td>
                            @if ($unread_notification->read_at == null)
                                <a id="markAsRead{{ $unread_notification->id }}" onclick="markNotificationRead('{{ $unread_notification->id }}')" href="#" class="btn btn-success markAsRead"> <i class="fa fa-check"></i> </a>
                            @endif
                            <a onclick="deleteNotification('{{ $unread_notification->id }}')" href="#" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center"><td colspan="4">No new notifications!</td></tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>
    <!-- /.box-body -->

<script>
    var base_Url = "{{ url('/') }}";
    var _token = $("input[name='_token']").val();

    function markNotificationRead(id) {
        $.ajax({
            method: "POST",
            url: "{{ route('seller.notification.markasread') }}",
            dataType: "json",
            data: {
                _token: _token,
                notification_id: id,
            },
            success: function (data) {
                toastr.success('Notification marked as read!')
                $('#markAsRead'+id).hide()
                $('#notification'+id).hide()
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
            url: "{{ route('seller.notification.delete') }}",
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
            url: "{{ route('seller.notification.markallasread') }}",
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

</div>



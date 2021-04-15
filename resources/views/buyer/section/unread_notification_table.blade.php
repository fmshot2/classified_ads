
  <div class="box">

    <div class="box-header with-border">
    <h3 class="box-title"> {{ url()->current() == route('seeker.notification.all') ?  'Notification' : 'General Notice(s)' }}
      {{ $unread_notification->count() }} </h3>

      @if (url()->current() == route('seller.message.all') )
      <div class="box-tools">
        <form class="" method="GET" action="{{ route('admin.service.search') }}">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      </div>
      @endif

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
            url: "{{ route('seeker.notification.markasread') }}",
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

</div>



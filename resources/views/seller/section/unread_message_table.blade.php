
  <div class="box">

    <div class="box-header with-border">
      <h3 class="box-title"> {{ $unread_message->count() > 1 ?  'Unread Messages' : 'Unread Message' }} ({{ $unread_message->count() }}) </h3>


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
                        <th> From </th>
                        <th> Email </th>
                        <th> Message </th>
                        <th> Status </th>
                        <th> Date </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unread_message as $key => $unread_messages)
                    <tr>
                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                        <td> {{ $unread_messages->buyer_name }} </td>
                        <td> {{ $unread_messages->buyer_email }} </td>
                        <td> {{ Str::limit($unread_messages->description, 30) }} </td>
                        <td> {{ $unread_messages->status == 1 ? ' Read' : 'Unread' }} </td>
                        <td> {{ $unread_messages->created_at->diffForHumans() }} </td>
                        {{-- <td class="center">
                            <a href=" {{ route('seller.message.view',$unread_messages->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
                        </td> --}}
                        <td>
                            {{-- <button type="button" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </button> --}}
                            <a href=" {{ route('seller.message.view',$unread_messages->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
                            <button type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->

@if (url()->current() == route('seller.message.unread') )
<div class="box-footer clearfix">

{{ $unread_message->links() }}

</div>
@endif

</div>

@include('seller/modal/create_service')



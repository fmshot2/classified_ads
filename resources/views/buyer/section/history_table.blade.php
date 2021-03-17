
<div class="box">

  <div class="box-header with-border">
    <h3 class="box-title"> {{ url()->current() == route('buyer.payment.history') ?  'Payment History' : 'All Your Activity Shows Here' }} 
      {{-- {{ $unread_message->count() }} </h3> --}}


   {{--  @if (url()->current() == route('buyer.payment.history') )
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
    @endif --}} 

  </div>
  <!-- /.box-header -->
  <div class="box-body ">
    <table class="display table table-bordered data_table_main">

      <tbody>

        <tr>
          <th> # </th>
          {{-- <th style="display: none;"></th> --}}
          <th> Requested On </th>
          <th> Date Disbursed </th>
          <th> Payment Status </th>
          {{-- <th> Action </th> --}}
        </tr>

        
          @forelse($payment_history as $key => $history)
          <tr>
          <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
          {{-- <td style="display: none;" id="history">{{ $history->id }}</td> --}}
          <td> {{ date('d-m-Y', strtotime($history->created_at)) }} </td>
          <td> {{ date('d-m-Y', strtotime($history->updated_at)) }} </td>
          <td> {{ $history->is_paid == 1 ? 'Paid' : 'Pending' }} </td>

          {{-- <td class="center">
            <a href="" class="btn btn-danger " data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteHistory()"><i class="fa fa-trash"></i></a>
          </td> --}}
          @empty 
          <tr>
            <td class="alert alert-danger">No history to show!</td>
          </tr>
          
        </tr>
@endforelse
        

      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
{{-- 
  @if (url()->current() == route('buyer.message.unread') )
  <div class="box-footer clearfix">

    {{ $unread_message->links() }}

  </div>
  @endif --}}

</div>

@include('seller/modal/create_service') 



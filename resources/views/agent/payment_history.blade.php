
@extends('layouts.agent')

@section('title')
Agent's Payment History |
@endsection

@section('content')
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Payment History</h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment History</li>
      </ol>

    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 connectedSortable">
                @include('agent/section/history_table')
            </div>
        </div>
    </section>
</div>
    <script type="text/javascript">
        function deleteHistory()
        {
            event.preventDefault();
        let id = document.getElementById('history').innerHTML
        if (confirm("Are you sure you want to delete this history?")) {
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                url: "/delete-history/"+id,
                method: 'POST',
                success: function(result)
                {
                    toastr.success("{{ Session::get('message') }}")
                    location.reload()
                }

            });

        } else {
            toastr.error("{{ Session::get('message') }}")
            location.reload()
        }

        }

    </script>
@endsection

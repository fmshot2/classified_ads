@extends('layouts.admin')
@section('title', 'User Feedbacks | ')

@section('content')

<div class="content-wrapper" style="min-height: 518px;">
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Message </h3>
						<h6 class="box-subtitle"> Sorting is from the most recent. </h6>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> S/N </th>
									<th> Title </th>
									<th> Status </th>
									<th> Date </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
								@foreach($feedbacks as $key => $feedback)
                                    <tr>
                                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                        <td> {{ Str::limit($feedback->feedback, 20) }} </td>
                                        <td>
                                            <form id="treatForm" action="{{ route('admin.user.feedback.treat', $feedback->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" id="treatedBtn" class="btn {{ $feedback->treated == 0 ? 'btn-success' : '' }}">{{ $feedback->treated == 1 ? 'Treated' : 'Untreated' }}</button>
                                            </form>
                                        </td>
                                        <td> {{ $feedback->created_at->diffForHumans() }} </td>
                                        <td class="center">
                                            <a onclick="viewFeedback({{ $feedback->id }})" class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                            <button onclick="deleteFeedback({{ $feedback->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
							    @endforeach
						    </tbody>
					    </table>
				    </div>
				    <!-- /.box-body -->
			    </div>
			    <!-- /.content -->
		    </div>
	    </div>
    </section>
</div>

<!-- Modal -->
<div id="viewFeedbackModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p id="feedback"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@endsection


<script>
    function viewFeedback(id) {
        event.preventDefault();
        $.ajax({
            url: '/admin/userfeedback/' + id,
            method: 'get',
            success: function(result){
                $('#feedback').text(result.feedback)
                $('#viewFeedbackModal').modal('show')
            }
        });

    }
    function deleteFeedback(id) {
        event.preventDefault();
        if (confirm("Are you sure?")) {
            $.ajax({
                url: '/admin/userfeedback/delete/' + id,
                method: 'get',
                success: function(result){
                    alert('Feedback Deleted!')
                    window.location.assign(window.location.href);
                }
            });

        } else {

            console.log('Delete process cancelled');

        }

    }
</script>

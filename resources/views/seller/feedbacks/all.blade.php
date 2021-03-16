@extends('layouts.seller')

@section('title', 'All Client Feedbacks | ')

@section('content')

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>
    <section class="content-header">
        <h3 class="page-title">All Feedbacks</h3>
        <p class="page-description">This is where you get all your messages.</p>
    </section>
	<section class="content">

		<div class="row">
			<div class="col-xs-12">

				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Client Feedbacks </h3>
						<h6 class="box-subtitle"> Sorting is from the most recent. </h6>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> SL </th>
                                        <th> Message </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($allcomments as  $key => $allcomment)

                                    <tr role="row" class="odd">
                                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                        <td> {!! $allcomment->comment !!} </td>

                                        <td class="center">
                                            <a href="#"
                                            onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $allcomment->id }}').submit();" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                                            <form id="comment-delete-form-{{ $allcomment->id }}"
                                                action="{{route('comments.delete', $allcomment->id)  }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
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



		</div>

	</div>
</section>

@endsection

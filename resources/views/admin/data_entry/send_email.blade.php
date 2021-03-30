

@extends('layouts.admin')

@section('title')
Send Mail | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	{{-- <div class="container">
		@include('layouts.backend_partials.status')
	</div> --}}

	<section class="content">

		<div class="row">
			<div class="col-xs-12">

<div class="box">
              <div class="box-header">
                <h3 class="box-title">Send Mail</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <div class="card">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-md-6 col-sm-12">


                                    <form class="form-horizontal form-element" method="POST" action="{{route('admin.submit.data')}} " enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Enter Email Address</label>
                                                <small class="text text-danger">Separate email addresses with comma</small>
                                                <input type="text" name="email" id="site_name" class="form-control" autofocus="" placeholder="Email Address" value="{{ old('email') }}">
                                            </div>
                                            @if ($errors->has('email'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
				                            </span>
				                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Subject</label>
                                                <input type="text" name="subject" id="site_name" class="form-control" autofocus="" placeholder="Subject of message" value="{{ old('subject') }}">
                                                
                                            </div>
                                            @if ($errors->has('subject'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
				                            </span>
				                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Message</label>
                                                <textarea class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            @if ($errors->has('message'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
				                            </span>
				                            @endif
                                        </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"> Send Mail </button>
                                        </div>
                                    </div>

                                </form>



                            </div>

                            
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>


			</div>


			<!-- /.content -->
		</div>	



	</div>

</div>
</section>
</div>



@endsection



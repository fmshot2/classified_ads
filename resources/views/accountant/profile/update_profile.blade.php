@extends('layouts.accountant')

@section('title')
Update Profile |
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 868px;">

	@include('layouts.backend_partials.status')

	<section class="content-header">
		<h3 class="page-title">Your Profile</h3>
		<p class="page-description">This page is for managing your profile details.</p>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-md-4">

				<!-- Profile Image -->
				<div class="box box-warning">
					<div class="box-body box-profile">

						<img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->image == null ? '/images/user-icon.png' : '/images/'.''.Auth::user()->image  }}" alt="User profile picture">

						<h3 class="profile-username text-center"> {{ Auth::user()->name }} </h3>

						<div class="row">
							<div class="col-xs-12">
								<div class="profile-user-info">
									<p>Email address </p>
									<h5> {{ Auth::user()->email }} </h5>
									<p>Phone</p>
									<h5> {{ Auth::user()->phone }}</h5>
									<p>About Me</p>
									<h5> {{ Auth::user()->about }}</h5>
									<p>Address</p>
									<h5> {{ Auth::user()->address }}</h5>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
			<div class="col-md-8">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">

						<li class="active"><a href="#timeline" data-toggle="tab">Update Profile</a></li>
						<li><a href="#password" data-toggle="tab">Change Password</a></li>
					</ul>

					<div class="tab-content">

						<div class="active tab-pane" id="timeline">

							<form class="form-horizontal form-element" method="POST" action="{{route('profile.update', Auth::id() )}}" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Full Name</label>

									<div class="col-sm-10">
										<input type="text" id="name" class="form-control" name="name" value=" {{ Auth::user()->name }} ">
									</div>
								</div>


								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Email</label>

									<div class="col-sm-10">
										<input type="email" class="form-control" name="email" value=" {{ Auth::user()->email }}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputPhone" class="col-sm-2 control-label">Phone</label>

									<div class="col-sm-10">
										<input type="number" class="form-control" name="phone" value=" {{ Auth::user()->phone }}">
									</div>
								</div>


								<div class="form-group">
									<label for="inputExperience" class="col-sm-2 control-label">Image</label>

									<div class="col-sm-10">
										<input type="file" class="form-control" name="file">
									</div>
								</div>

								<div class="form-group">
									<label for="inputSkills" class="col-sm-2 control-label">About Me</label>

									<div class="col-sm-10">
										<textarea class="form-control" name="about" placeholder=""> {{ Auth::user()->about }} </textarea>
									</div>
								</div>

								<div class="form-group">
									<label for="inputSkills" class="col-sm-2 control-label">Address</label>

									<div class="col-sm-10">
										<textarea class="form-control" name="address" placeholder=""> {{ Auth::user()->address }} </textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-warning">Update <i class="fa fa-refresh"></i></button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->


						<div class="tab-pane" id="password">
							<form class="form-horizontal form-element" method="POST" action="{{route('profile.update.password', Auth::id() )}}" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Current Password</label>

									<div class="col-sm-10">
										<input class="form-control" name="old_password" type="password" placeholder="*********" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">New Password</label>

									<div class="col-sm-10">
										<input class="form-control" name="password" type="password" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-2 control-label">Confirm New Password</label>

									<div class="col-sm-10">
										<input class="form-control" name="password_confirmation" type="password" required="">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-warning">Update <i class="fa fa-refresh"></i></button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

	</section>

</div>


@endsection

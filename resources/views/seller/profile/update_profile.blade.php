

@extends('layouts.seller')

@section('title', 'Update Profile | ')

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

						<img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->image == null ? '/images/user-icon.png' : '/uploads/users/'.''.Auth::user()->image  }}" alt="User profile picture">

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
						<li><a href="#bankaccount" data-toggle="tab">Account Details</a></li>
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
										<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control"  minlength="11" maxlength="11" name="phone" value="{{ Auth::user()->phone }}">
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
							<form class="form-horizontal form-element" method="POST" action="{{route('providerprofile.update.password', Auth::id() )}}"  enctype="multipart/form-data">
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
										<input class="form-control" name="new_password" type="password" required="">
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

                        <div class="tab-pane" id="bankaccount">
							<form class="form-horizontal form-element" method="POST" action="{{route('profile.update.account', Auth::id() )}}">
								@csrf
								<div class="form-group">
									<label for="bank_name" class="col-sm-2 control-label">Account Name</label>
									<div class="col-sm-10">
										<input type="text" id="account_name" class="form-control" name="account_name" value="{{ Auth::user()->account_name ? Auth::user()->account_name : '' }}" placeholder="Enter the name on the account (e.g Egen Jacobs)">
									</div>
								</div>

								<div class="form-group">
									<label for="bank_name" class="col-sm-2 control-label">Bank Name</label>
									<div class="col-sm-10">
										<input type="text" id="bank_name" class="form-control" name="bank_name" value="{{ Auth::user()->bank_name ? Auth::user()->bank_name : '' }}" placeholder="Enter the bank name. (e.g. Access Bank)">
									</div>
								</div>


								<div class="form-group">
									<label for="account_number" class="col-sm-2 control-label">Account Number</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="account_number" value="{{Auth::user()->account_number ? Auth::user()->account_number : '' }}" placeholder="Enter your account number here. (e.g 01237474483)">
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

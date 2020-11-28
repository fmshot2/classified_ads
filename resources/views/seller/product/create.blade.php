@extends('layouts.admin')

@section('title')
Create | 
@endsection



@section('content')


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">




<h2 class="font-weight-bold mt-2 text-center"> Post Product </h2>
<hr>
<h3 class="font-weight-normal mt-4"> Basic Information </h3>


<form class="mt-3">

	<div class="form-row"> <!-- Form row tag open -->

		<div class="col-md-4 mb-3">
			<label for="validationServer01"> Product Title</label>
			<input type="text" class="form-control " id="validationServer01" placeholder=" Name "  required>
			@if ($errors->has('name'))
			<div class="invalid-feedback">
				{{ $errors->first('name') }}
			</div>
			@endif
		</div>

		<div class="col-md-4 mb-3">
			<label for="validationServer02"> Status </label>
			<select id="inputState" class="form-control" name="status">
				<option value="for_sale" selected> For Sale</option>
				<option value="for_rent"> For Rent </option>
			</select>
			@if ($errors->has('status'))
			<div class="invalid-feedback">
				{{ $errors->first('status') }}
			</div>
			@endif
		</div>

		<div class="col-md-4 mb-3">
			<label for="validationServer02"> Product Categories </label>

			<select id="tags" multiple="multiple" class="form-control" required>

			</select>

			<div class="valid-feedback">
				Looks good!
			</div>
		</div>

	</div>  <!-- Form row tag close -->



	<button class="btn btn-primary" type="submit">Submit form</button>
</form>

















    </div>
  </div>
</div>

@endsection
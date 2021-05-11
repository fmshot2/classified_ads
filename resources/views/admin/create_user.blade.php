@extends('layouts.admin')
@section('title', 'Tourist Sites | ')

@section('content')
<style>
    table th{
        font-weight: 600 !important;
    }
</style>
@include('layouts.backend_partials.status')
<div class="content-wrapper" style="min-height: 868px;">
    <div class="container">
        <div class="w-75">
            @include('layouts.backend_partials.status')
        </div>
    </div>

    <section class="content-header">
        <h3 class="page-title">All New Users</h3>
        <p class="page-description">This Page Is for creating new users EFContact platform.</p>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add A New User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="padding: 20px">
                        <!-- form start -->
                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.create.user')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">refererParam</label>
                                    <input type="text" name="refer" id="refer" class="form-control"  value="{{ old('refer') }}">
                                    @if ($errors->has('refer'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('refer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Name </label>
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}" >
                                    @if ($errors->has('name'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="text" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           <!--     <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required value="{{ old('confirm_password') }}">
                                    @if ($errors->has('confirm_password'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" required value="{{ old('amount') }}">
                                    @if ($errors->has('amount'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Agent Code</label>
                                    <input type="text" name="agent_code" id="agent_code" class="form-control" value="{{ old('agent_code') }}">
                                    @if ($errors->has('agent_code'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('agent_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">User Type: </label>
                                    <select class="form-control" required id="role" name="role" required value="{{ old('role') }}">
                                        <option value="">Please Choose A User Type</option>                                        
                                        <option value="seller">Service Provider</option>
                                        <option value="buyer">Service Seeker</option>

                                    </select>
                                </div>
                            </div>

                               <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Admin Password</label>
                                    <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Enter Your Admin Password For Verification" value="{{ old('admin_password') }}">
                                    @if ($errors->has('agent_code'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('agent_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                               
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </section>
</div>

<script>

</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 120,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
        ]
    });
</script>
@endsection


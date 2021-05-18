

@extends('layouts.admin')

@section('title', 'e-Mail Templates | ')

@section('content')
    <div class="content-wrapper" style="min-height: 518px;">
        <section class="content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Start to Earn Money</h3>
                        </div>
                        <div class="box-body pad">
                            <div class="card">
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-md-12">
                                            <form class="form-horizontal form-element" method="POST" action="{{route('super.submit.email')}} " enctype="multipart/form-data">@csrf
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_name" class="control-label">Subject:</label>
                                                        <input type="text" name="subject" class="form-control" autofocus="" placeholder="Subject" value="{{ old('subject') }}">
                                                    </div>
                                                    @if ($errors->has('subject'))
                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                        <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="tagline" class="control-label">Tagline:</label>
                                                        <input type="text" name="tagline" class="form-control" autofocus="" placeholder="Tagline" value="{{ old('tagline') }}">
                                                    </div>
                                                    @if ($errors->has('tagline'))
                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                        <strong class="text-danger">{{ $errors->first('tagline') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="intro" class="control-label">Intro:</label>
                                                        <input type="text" name="intro" class="form-control" autofocus="" placeholder="Subject of message" value="{{ old('intro') }}">
                                                    </div>
                                                    @if ($errors->has('message'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="site_name" class="control-label">Body:</label>
                                                        <textarea class="form-control summernote" name="message"></textarea>
                                                    </div>
                                                    @if ($errors->has('message'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="link" class="control-label">Link:</label>
                                                        <input type="text" name="link" class="form-control" autofocus="" value="{{ old('intro') }}">
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
                        <!-- /.content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Popular Products and Services</h3>
                        </div>
                        <div class="box-body pad">
                            <div class="card">
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-md-12">
                                            <form class="form-horizontal form-element" method="POST" action="{{route('super.submit.email')}} " enctype="multipart/form-data">@csrf
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
                                                        <textarea class="form-control summernote" name="message"></textarea>
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
                        <!-- /.content -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script type="text/javascript">
        $('.summernote').summernote({
            height: 120
        });
    </script>
@endsection



@extends('layouts.admin')

@section('title', 'e-Mail Templates | ')

@section('content')

    <div class="content-wrapper" style="min-height: 518px;">
        <section class="content">
            <div class="row">
                {{-- START TO EARN  --}}
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Send E-mail</h3>
                        </div>
                        <div class="box-body pad">
                            <div class="card">
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-md-12">
                                            <form class="form-horizontal form-element" method="POST" action="{{route('email.start_to_earn')}} " enctype="multipart/form-data">@csrf
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_name" class="control-label">Subject:</label>
                                                        <input type="text" name="subject" class="form-control" autofocus="" placeholder="Subject" value="Start to earn extra money!">
                                                    </div>
                                                    @if ($errors->has('subject'))
                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                        <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="header_title" class="control-label">Header Title:</label>
                                                        <input type="text" name="header_title" class="form-control" autofocus="" placeholder="Email Header" value="Start to earn your extra money!">
                                                    </div>
                                                    @if ($errors->has('header_title'))
                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                        <strong class="text-danger">{{ $errors->first('header_title') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="tagline" class="control-label">Tagline:</label>
                                                        <input type="text" name="tagline" class="form-control" autofocus="" placeholder="Tagline" value="Provide a service, get a service on EFContact.">
                                                    </div>
                                                    @if ($errors->has('tagline'))
                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                        <strong class="text-danger">{{ $errors->first('tagline') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="user_type" class="control-label">Users</label>
                                                        <select name="user_type" class="form-control">
                                                            <option value="all" selected>All Users</option>
                                                            <option value="providers">Service Providers</option>
                                                            <option value="seekers">Service Seekers</option>
                                                            <option value="tests">Dev Tests</option>
                                                            {{-- <option value="agents">Agents</option> --}}
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('user_type'))
                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                        <strong class="text-danger">{{ $errors->first('user_type') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="intro" class="control-label">Intro:</label>
                                                        <input type="text" name="intro" class="form-control" autofocus="" placeholder="Email Intro" value="There're a couple of ways to make money with EFContact and promote your living.">
                                                    </div>
                                                    @if ($errors->has('intro'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('intro') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="body" class="control-label">Body:</label>
                                                        <textarea class="form-control summernote" name="body"><p>1. As a <strong>service provider</strong> on EFContact using your <a href="{{ route('referralprogram') }}">referral link</a>.</p>
                                                            <p style="margin-top: -20px">2. As an <strong>agent</strong> on EFContact using your <a href="{{ route('referralprogram') }}">agent code</a>.</p>
                                                            <p>You can share your referral link or agent code with your friends and families or business partners and get a commission when they register as a service provider on EFContact.</p></textarea>
                                                    </div>
                                                    @if ($errors->has('body'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('body') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="link" class="control-label">Link:</label>
                                                        <input type="text" name="link" class="form-control" autofocus="" value="{{ route('home') }}">
                                                    </div>
                                                    @if ($errors->has('link'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('link') }}</strong>
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



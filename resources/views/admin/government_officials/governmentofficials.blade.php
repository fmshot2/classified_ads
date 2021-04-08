@extends('layouts.admin')
@section('title', 'Government Officials | ')

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
            <h3 class="page-title">All Officials</h3>
            <p class="page-description">This Page Is for creating and managing government officials on EFContact platform.</p>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('admin/government_officials/officials_table')
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Official</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                            <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('admin.government.create')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Official Name: </label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Official Position: </label>
                                        <input type="text" name="position" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">State: </label>
                                        <select class="form-control" name="state" required>
                                            <option value="">-- Select State --</option>
                                            @if(isset($states))
                                                @foreach($states as $state)
                                                    <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Region: </label>
                                        <input type="text" name="region" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description: </label>
                                        <textarea name="description" class="form-control summernote" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file">Official Image:</label>
                                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                                </div>
                                <!-- /.box-footer -->
                            </form>

                        </div>
                    </div>
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
            height: 120
        });
    </script>
@endsection


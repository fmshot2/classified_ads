
@extends('layouts.admin')

@section('title', 'Term of Use | ')



@section('content')


<div class="content-wrapper" style="min-height: 868px;">
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Term of Use</h3>
                    </div><!-- card -->

                    <div class="box-body">
                        <form id="aboutForm" action="{{route('admin.pagescontents.save.termofuse')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea name="term_of_use" class="form-control summernote" rows="15" value="{{ $pages_contents_page == 0 ? $pages_contents->term_of_use : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                    {{ $pages_contents_page == 0 ? $pages_contents->term_of_use : ''  }}
                                </textarea>
                            </div>
                            <br>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-primary mg-r-5">Update <i class="fa fa-refresh"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- sl-pagebody -->
        </div>
    </section>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
$('.summernote').summernote({
    height:500
});
</script>

@endsection



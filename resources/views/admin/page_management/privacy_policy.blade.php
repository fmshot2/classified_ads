
@extends('layouts.admin')

@section('title', 'Privacy Policy')



@section('content')


<div class="content-wrapper" style="min-height: 868px;">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">PRIVACY &amp; POLICY</h3>
                    </div><!-- card -->

                    <div class="box-body">
                        <form id="aboutForm" action="{{route('admin.pagescontents.save.privacy')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea name="privacy_policy" class="form-control summernote" rows="15" value="{{ $pages_contents_page == 0 ? $pages_contents->privacy_policy : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                    {{ $pages_contents_page == 0 ? $pages_contents->privacy_policy : ''  }}
                                </textarea>
                            </div>
                            <br>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-primary mg-r-5">Update <i class="fa fa-refresh"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </section>
</div>
<script>

    function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'faqs/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#titleEdit').val(result.title);
        $('#bodyEdit').val(result.body);
        var url = 'faqs/' + id;
        $('form#faqs').attr('action', url);
        $('#editfaqsModal').modal('show');
    }
    });

    }
    </script>
    <script>
        function deleteContact(id) {

    event.preventDefault();

    if (confirm("Are you sure?")) {

        $.ajax({
            url: 'delete/faqs/' + id,
            method: 'get',
            success: function(result){
                window.location.assign(window.location.href);
            }
        });

    } else {

        console.log('Delete process cancelled');

    }

    }
    </script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
$('.summernote').summernote({
    height:500
});
</script>
  </div>


@endsection



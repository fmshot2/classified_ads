@extends('layouts.admin')
@section('title', 'System Config | ')


@section('content')


<div class="content-wrapper" style="min-height: 868px;">

    <div class="container">
        @include('layouts.backend_partials.status')
    </div>

    <section class="content-header">
        <h3 class="page-title">Pages Contents</h3>
        <p class="page-description">This page is managing everything dynamically on pages.</p>
    </section>


    <!-- Main content -->

    <section class="content">
        <div class="row">
            <!-- About Us -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">About Us Page</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{ route('admin.pagescontents.save.aboutus') }} " enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="site_name" class="control-label">Content</label>
                                                        <textarea name="about_site" class="form-control summernote" rows="7" value="{{ $check_general_info == 0 ? $general_info->about_site : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $check_general_info == 0 ? $general_info->about_site : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" name="submitAbout" class="btn btn-warning btn-sm"> Save About Us </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- Become our Agent Modal -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">Become our Agent Modal</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('system.config.store', $check_general_info == 0 ? $general_info->id : 0 )}} " enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="site_name" class="control-label">Content</label>
                                                        <textarea name="about_site" class="form-control summernote" rows="7" value="{{ $check_general_info == 0 ? $general_info->about_site : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $check_general_info == 0 ? $general_info->about_site : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" name="submitAgent" class="btn btn-warning btn-sm"> Save Agent Content </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- Privacy Policy Page -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">Privacy Policy</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.pagescontents.save.privacy')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="site_name" class="control-label">Content</label>
                                                        <textarea name="privacy_policy" class="form-control summernote" rows="7" value="{{ $pages_contents_page == 0 ? $pages_contents->privacy_policy : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $pages_contents_page == 0 ? $pages_contents->privacy_policy : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-warning btn-sm"> Save Privacy Policy </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- Benefits of EFContact -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">Benefits of EFContact</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.pagescontents.save.benefitsofefc')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="benefit_of_efcontact" class="control-label">Content</label>
                                                        <textarea name="benefit_of_efcontact" class="form-control summernote" rows="7" value="{{ $pages_contents_page == 0 ? $pages_contents->benefit_of_efcontact : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $pages_contents_page == 0 ? $pages_contents->benefit_of_efcontact : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-warning btn-sm"> Save Benefits </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- Terms of Use -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">Terms of Use</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.pagescontents.save.termofuse')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="benefit_of_efcontact" class="control-label">Content</label>
                                                        <textarea name="term_of_use" class="form-control summernote" rows="7" value="{{ $pages_contents_page == 0 ? $pages_contents->term_of_use : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $pages_contents_page == 0 ? $pages_contents->term_of_use : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-warning btn-sm"> Save Term of Use </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- About Us Section 1 -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">About Us Section 1</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.pagescontents.saveAboutUsSection1')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="about_site_section_1" class="control-label">Content</label>
                                                        <textarea name="about_site_section_1" class="form-control summernote" rows="7" value="{{ $pages_contents_page == 0 ? $pages_contents->about_site_section_1 : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $pages_contents_page == 0 ? $pages_contents->about_site_section_1 : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-warning btn-sm"> Save Section </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- About Us Section 2 -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">About Us Section 2</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.pagescontents.saveAboutUsSection2')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="about_site_section_2" class="control-label">Content</label>
                                                        <textarea name="about_site_section_2" class="form-control summernote" rows="7" value="{{ $pages_contents_page == 0 ? $pages_contents->about_site_section_2 : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $pages_contents_page == 0 ? $pages_contents->about_site_section_2 : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-warning btn-sm"> Save Section </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- About Us Section 3 -->
            <div class="col-md-4">
                <div class="box pad">
                    <div class="box-header">
                        <h3 class="box-title">About Us Section 3</h3>
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
                                    <div class="col-md-12 col-sm-12">
                                        <form class="form-horizontal form-element" method="POST" action="{{route('admin.pagescontents.saveAboutUsSection3')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="about_site_section_3" class="control-label">Content</label>
                                                        <textarea name="about_site_section_3" class="form-control summernote" rows="7" value="{{ $pages_contents_page == 0 ? $pages_contents->about_site_section_3 : ''  }}" style="border: 1px solid #d2d6de; padding: 10px">
                                                            {{ $pages_contents_page == 0 ? $pages_contents->about_site_section_3 : ''  }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-warning btn-sm"> Save Section </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div> <!-- Row start end here -->
        <!-- /.col-->
    </section>
</div>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height:200
    });
</script>





@endsection

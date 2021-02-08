


@extends('layouts.app')

@section('title')

@section('content')



<div class="main">
        <div class="sub-banner" style="background-image:url({{asset('images/faqbg.jpg')}})">
    <div class="container">
        <div class="page-name">
            <div class="sub-banner-text-content">
                <h1>Frequently Asked Questions</h1>
                <ul>
                    <li><a href="https://efcontact.com">Home</a></li>
                    <li><span>/</span>Faqs</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Faq start -->
<div class="faq faq-page content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Frequently Asked Questions</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tabbing tabbing-box mb-30">
                    <ul class="nav nav-tabs" id="carTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">General Information</a>
                        </li>
                     {{--   <li class="nav-item">
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Extra Feature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false">Properties Overview</a>
                        </li>--}}
                    </ul>
                    <div class="tab-content" id="carTabContent">
                        <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <div id="faq" class="faq-accordion">
                                <div class="card m-b-0">
                                  @forelse ($all_faqs as $all_faq)

                                    <div class="card-header">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse7" aria-expanded="false">
                                          {{$all_faq->title}}
                                        </a>
                                    </div>
                                    <div id="collapse7" class="card-block collapse" style="padding: 0 15px;">
                                        <div class="foq-info">
                                            <p>{!! $all_faq->details !!}</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>

                              @empty
    <p>No records yet</p>
@endforelse
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <div id="faq2" class="faq-accordion">
                                <div class="card m-b-0">
                                    <div class="card-header">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq2" href="#collapse13" aria-expanded="false">
                                            Do I need to buy a licence for each site?
                                        </a>
                                    </div>
                                    <div id="collapse13" class="card-block collapse" style="">
                                        <div class="foq-info">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-header bd-none">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq2" href="#collapse14" aria-expanded="false">
                                            Is my license transferable?
                                        </a>
                                    </div>
                                    <div id="collapse14" class="card-block collapse">
                                        <div class="foq-info">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq2" href="#collapse15" aria-expanded="false">
                                            Do I need to buy a licence for each site?
                                        </a>
                                    </div>
                                    <div id="collapse15" class="card-block collapse">
                                        <div class="foq-info">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-header bd-none mb-0">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq2" href="#collapse16" aria-expanded="false">
                                            Is my license transferable?
                                        </a>
                                    </div>
                                    <div id="collapse16" class="card-block collapse">
                                        <div class="foq-info pad-b-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
                            <div id="faq3" class="faq-accordion">
                                <div class="card m-b-0">
                                    <div class="card-header bd-none">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse17" aria-expanded="false">
                                            Is my license transferable?
                                        </a>
                                    </div>
                                    <div id="collapse17" class="card-block collapse" style="">
                                        <div class="foq-info">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse18">
                                            Do I need to buy a licence for each site?
                                        </a>
                                    </div>
                                    <div id="collapse18" class="card-block collapse">
                                        <div class="foq-info">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-header bd-none mb-0">
                                        <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse19">
                                            Is my license transferable?
                                        </a>
                                    </div>
                                    <div id="collapse19" class="card-block collapse">
                                        <div class="foq-info pad-b-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta. Morbi tincidunt viverra pharetra. Vestibulum vel mauris et odio lobortis laoreet eget eu magna. Proin mauris erat, luctus at nulla ut, lobortis mattis magna. Morbi a arcu lacus. Maecenas tristique velit vitae nisi consectetur, in mattis diam sodales. Mauris sagittis sem mattis justo bibendum, a eleifend dolor facilisis. Mauris nec pharetra tortor, ac aliquam felis. Nunc pretium erat sed quam consectetur fringilla.</p>
                                            <hr>
                                            <span>
                                                Was this answer helpful?
                                                <a href="#" class="yes">Yes <i class="fa fa-thumbs-o-up"></i></a>
                                                <a href="#" class="no">No <i class="fa fa-thumbs-o-down"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>


@endsection

















@extends('layouts.app')

@section('title', 'Frequently Asked Questions | ')

@section('content')


<div class="main">
        <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/faqbg.jpg')}})">
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
        <div class="faq faq-page content-area" style="background-color: #fff">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Frequently Asked Questions</h1>
                </div>
                <div class="row">
                    <div class="row">
                        @forelse ($all_faqs as $all_faq)
                            <div class="col-md-6">
                                <div class="mb-30">
                                    <h5>Q: {{$all_faq->title}}</h5>
                                    <p>{!! $all_faq->details !!}</p>
                                </div>
                            </div>
                        @empty
                            <p>No records yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

















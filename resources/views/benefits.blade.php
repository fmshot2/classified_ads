@extends('layouts.app')

@section('title', 'Frequently Asked Questions | ')

@section('content')

<style>
    @media (max-width: 768px){
        .content-area{
            padding: 40px 10px;
        }
        .main-title{
            display: none;
        }
    }
</style>

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
                    <h1>Benefits Of EFContact</h1>
                </div>
                <div class="row">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="mb-30">
                                    <p>{!! $benefits_details !!}</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

















@extends('layouts.app')

@section('title', 'About Us | ')

@section('content')

<style>
    @media (max-width: 768px){
        .content-area{
            padding: 40px 0;
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
                        <h1>About Us</h1>
                        <ul>
                            <li><a href="https://efcontact.com">Home</a></li>
                            <li><span>/</span>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq start -->
        <div class="faq faq-page content-area" style="background-color: #fff">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $check_general_info == 0 ? $general_info->about_site : ''  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

















@extends('layouts.app')

@section('title', 'Benefits Of EFContact | ')

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
                        <h1>Benefits Of EFContact</h1>
                        <ul>
                            <li><a href="https://efcontact.com">Home</a></li>
                            <li><span>/</span>Benefits Of EFContact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq start -->
        <div class="faq faq-page content-area">
            <div class="container" style="background-color: #fff;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-30" style="padding-top: 15px">
                            <p>{!! $pages_contents_page == 0 ? $pages_contents->benefit_of_efcontact : ''  !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

















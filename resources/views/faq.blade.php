@extends('layouts.app')

@section('title', 'Frequently Asked Questions | ')

@section('content')

<style>
    .contact-info{
        text-align: center;
        font-size: 15px !important;
        font-weight: 500;
        border-top: 1px solid rgb(233, 233, 233);
        padding-top: 30px;
        margin-top: 20px
    }
    .contact-info a{
        font-size: 15px !important;
        font-weight: 500
    }
    .contact-info p{
        font-size: 15px !important;
        font-weight: 600;
        text-transform: uppercase;
    }
    .phone-area a{
        display: block;
    }
    .faq-question{
        font-family: "Poppins-Regular";
        font-weight: 600;
        font-size: 18px;
    }
    @media (max-width: 768px){
        .content-area{
            padding: 40px 10px;
        }
        .main-title{
            display: none;
        }
        .contact-info .col-md-4{
            margin-bottom: 20px;
        }
        .faq-question{
            font-family: "Poppins-Regular";
            font-weight: 600;
            font-size: 16px;
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
                {{-- <div class="main-title">
                    <h1>Frequently Asked Questions</h1>
                </div> --}}
                <div class="row">
                    @forelse ($all_faqs as $all_faq)
                        <div class="col-md-6">
                            <div class="mb-30">
                                <h4 class="faq-question">Q: {{$all_faq->title}}</h4>
                                <p>{!! $all_faq->details !!}</p>
                            </div>
                        </div>
                    @empty
                        <p>No records yet</p>
                    @endforelse
                </div>

                <div class="row contact-info">
                    <div class="col-md-4 col-sm-6 mrg-btn-50">
                        <p><i class="flaticon-location"></i><br> Office Address</p>
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31518.588844000613!2d7.492251300000006!3d9.07982880000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55e2e606f1c6452e!2sE.F.%20Network%20Ltd!5e0!3m2!1sen!2sng!4v1611820893949!5m2!1sen!2sng"> {{ $general_info->address ? $general_info->address : ''}} </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mrg-btn-50 phone-area">
                        <p><i class="flaticon-technology-1"></i><br> Phone Number</p>
                        <a href="tel: { $check_general_info == 0 ? $general_info->hot_line : '' }} ">
                            {{ $general_info->hot_line ? '+234 '.$general_info->hot_line : '' }}
                        </a>
                        <a href="tel: { $check_general_info == 0 ? $general_info->hot_line2 : '' }} ">
                            {{ $general_info->hot_line2 ? '+234 '.$general_info->hot_line2 : '' }}
                        </a>
                        <a href="https://wa.me/{{ $check_general_info == 0 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank">
                            <i class="fa fa-whatsapp" style="font-size: 15px"></i> WhatsApp
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mrg-btn-50">
                        <p><i class="flaticon-envelope"></i><br> Email Address</p>
                        <a href="mailto:{{ $general_info->contact_email ? $general_info->contact_email : '' }} ">
                            {{ $general_info->contact_email ? $general_info->contact_email : '' }}
                        </a></strong> <br>
                        <strong><a href="mailto:{{ $general_info->support_email ? $general_info->support_email : '' }} ">
                            {{ $general_info->support_email ? $general_info->support_email : '' }}
                        </a>
                    </div>
                    {{-- <div class="col-md-3 col-sm-6 mrg-btn-50">
                        <i class="flaticon-globe"></i>
                        <p>Support</p>
                        <strong>info@maxwellochadefoundation.com</strong>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>


@endsection

















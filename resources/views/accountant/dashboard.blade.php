@extends('layouts.accountant')

@section('title', 'Accountant\'s Dashboard | ')

@section('content')
<style>
    .content-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .navbar-top-post-btn a{
        font-size: 15px !important;
        color:#fff
    }
    .refererArea h4{
        text-transform: uppercase;
    }
    .refererArea h4 small{
        font-size: 13px;
    }
    .refererArea h4 small a{
        color: #10CFBD;
        text-transform: initial;
    }
    .refererArea h4 small a:hover{
        color: #95f3ea;
        cursor: pointer;
    }
    .modal-title{
        text-transform: uppercase;
    }
    .form-text{
        display: block
    }
    @media (max-width: 768px){
        .content-header{
            padding: 0 5px 10px 10px;
        }
        .refererArea h4{
            font-size: 14px;
        }
        .refererArea .btn{
            font-size: 11px;
        }
        .navbar-top-post-btn a{
            font-size: 11px !important;
            margin-top: 40px
        }
        span.info-box-icon.push-bottom.bg-warning {
            display: none !important;
        }
        .info-box-content{
            margin-left: 0;
        }
        .info-box-text, .info-box-number{
            font-size: 14px;
        }
        .progress-description .btn{
            font-size: 9px;
        }
    }
</style>

<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            
           <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <section class="content">
           
   <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-sticky-note text-white" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Advert Payments </span>
              <span class="info-box-number"> {{ $ads_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-blue" style="width:  %"></div>
              </div>
              <span class="progress-description">
                <!-- Extra content can go here -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Badge Payments </span>
              <span class="info-box-number">{{ $badge_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width:  %"></div>
              </div>
              <span class="progress-description">
                <!-- Extra content can go here -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-handshake-o text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Referal Payments </span>
              <span class="info-box-number">  {{ $payment_count }}</span>

              <div class="progress">
                <div class="progress-bar progress-bar-primary" style="width:  %"></div>
              </div>
              <span class="progress-description">
               <!-- 85% Increase in 28 Days -->
             </span>
           </div>
           <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-bell text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> All Agent Payments </span>
            <span class="info-box-number">{{ $payment_count }}  </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width:  %"></div>
            </div>
            <span class="progress-description">
             <!-- 50% Increase in 28 Days -->
           </span>
         </div>
         <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
     </div>
     <!-- /.col -->


  </div>
  <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Advert Payments </span>
              <span class="info-box-number"> ₦{{ $total_ads }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-blue" style="width:  %"></div>
              </div>
              <span class="progress-description">
                <!-- Extra content can go here -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Badge Payments </span>
              <span class="info-box-number">₦{{ $total_badges }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width:  %"></div>
              </div>
              <span class="progress-description">
                <!-- Extra content can go here -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
     <!-- /.col -->

     
  </div>
  <div class="row">
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Referal Amount Requested </span>
              <span class="info-box-number">  ₦{{ $total_ref_requested }}</span>

              <div class="progress">
                <div class="progress-bar progress-bar-primary" style="width:  %"></div>
              </div>
              <span class="progress-description">
               <!-- 85% Increase in 28 Days -->
             </span>
           </div>
           <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
       </div>
       <!-- /.col -->
       <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> Total Referal Pending Requests </span>
            <span class="info-box-number">₦{{ $total_ref_pending }}  </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width:  %"></div>
            </div>
            <span class="progress-description">
             <!-- 50% Increase in 28 Days -->
           </span>
         </div>
         <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
     </div>
     <!-- /.col -->

       <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> Total Referal Paid </span>
            <span class="info-box-number">₦{{ $total_ref_paid }}  </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width:  %"></div>
            </div>
            <span class="progress-description">
             <!-- 50% Increase in 28 Days -->
           </span>
         </div>
         <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
     </div>
     <!-- /.col -->

     
  </div>
 <div class="row">
    <div class="col-md-6 connectedSortable">
        @include('accountant/section/referal_table')
    </div>

    <div class="col-md-6 connectedSortable">
        @include('accountant/section/ads_table')
    </div>
</div>      
           
           
    
        </section>
    </div>
</div>
    @include('accountant.modal.pay_ad')

    
    @endsection

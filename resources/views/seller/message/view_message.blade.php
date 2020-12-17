
@extends('layouts.seller')

@section('title')
View Message | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

  <section class="content">




<div class="row">
      <div class="col-md-12">
        <div class="box box-info dash-1">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">MESSAGE </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control"  value="{{$message->buyer_name }}" disabled="">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="{{$message->buyer_email}}" disabled="" >
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" value="{{$message->subject}}" disabled="" >
                </div>
                <div>
                  <textarea class="textarea" disabled="" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $message->description }} </textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
                <form class="right" action="https://www.efcontact.com/buyer/message/readunread" method="POST">
                    <input type="hidden" name="_token" value="5P51Gk7hIrIYV2H8whQF7oJpEttZs2F7CDQrCpa4">                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="messageid" value="2">

              <button type="button" class="pull-left btn btn-primary"><a href=" {{ route('seller.message.reply', $message->slug) }} "><font color="white"> Reply </font></a><i class="fa fa-reply"></i></button>
            </form></div>
          </div>
      </div>
    </div>


</div>


</section>


@endsection
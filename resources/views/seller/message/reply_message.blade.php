

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

            <h3 class="box-title">Quick Reply</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form class="" method="POST" action="{{ route('seller.message.reply.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="hidden" name="service_id" value=" {{ $message->service_id }} ">
               <input type="hidden" name="buyer_id" value=" {{ $message->buyer_id }}">
               <input type="hidden" name="service_user_id" value=" {{ $message->service_user_id }}">

               <div class="form-group">
                <input class="form-control" name="buyer_email" type="email" value=" {{ Auth::user()->email }} " disabled="">
              </div>
              
              <div class="form-group">
                <input class="form-control" name="subject"  type="text" placeholder=" Enter subject here " >
              </div>

              <div class="form-group">
                <input class="form-control" name="phone"  type="number" placeholder=" Enter phone here " >
              </div>

              <div>
                <textarea class="textarea" placeholder="Message" name="description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

              <div class="box-footer clearfix">
                <button type="submit" class="pull-right btn btn-warning"><font color="white"> SEND </font><i class="fa fa-paper-plane-o"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>


@endsection
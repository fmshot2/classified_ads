
@extends('layouts.seller')

@section('title', 'Upload Images | ')

@section('content')

<style>
    .box-heading{
        font-weight: 600; font-size: 15px; margin: 0 0 10px 0; padding: 0
    }
    .box-heading span{
        font-weight: normal;
    }
    /* .images{
        width: 100%;
        display: flex;
        justify-content: space-evenly
    }
    .image-list img{
        width: 50px
    } */

</style>


<div class="content-wrapper" style="min-height: 868px;">

    @include('layouts.backend_partials.status')


    <section class="content-header">
        <h3 class="page-title">Upload Image(s)</h3>
        <p class="page-description">Upload multiple images to describe your service better.</p>
    </section>


  <section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header">
                    {{-- <div>
                        <img src="{{ $service->thumbnail ? asset('uploads/services/'.$service->thumbnail) : asset('images/00_SEO-and-Digital-Marketing-Agency-Mega-Stationery-Branding-Identity-Design-Template-scaled.jpg') }}" style="width: 70%; height: auto; margin: 0 auto">
                    </div> --}}
                    <h2 class="box-title" style="font-weight: 700">Your New Service</h2>
                    <p>This is your newly created service.</p>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="right"><strong>Service Name: </strong> {{ $service->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Posted: </strong> {{ $service->created_at->diffForHumans() }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Description: </strong> {{ $service->description  }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Category: </strong> {{ $service->category->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Amount Charge: </strong> {{ $service->min_price }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Country : </strong>
                            <span class="right">Nigeria</span>
                        </li>
                        <li class="list-group-item">
                            <strong>State : </strong>
                            <span class="right"> {{ $service->state }} </span>
                        </li>
                        <li class="list-group-item">
                            <strong>City : </strong>
                            <span class="right"> {{ $service->city }}</span>
                        </li>

                        <li class="list-group-item">
                            <strong>Address : </strong>
                            <span class="left"> {{ $service->address }}</span>
                        </li>

                        @if ($service->is_featured == 1 && $service->paid_featured == 0)
                        <li class="list-group-item">
                            <span class="left">Please make payment now!</span>
                            <p><strong>Note:</strong> This service won't be featured without payment.</p>
                            <form>
                                @csrf
                                <input id="user_email" type="hidden" name="" value="{{Auth::user()->email}}">
                                <input id="featured_amount" type="hidden" name="amount" value="2000">
                                <input id="service_id" type="hidden" name="service_id" value="{{$service->id}}">
                                "{{$service->id}}"

                                <script src="https://js.paystack.co/v1/inline.js"></script>

                                <button type="button" class="btn btn-lg" style="cursor: pointer; display: block; margin-top: 5px; background-color: #cc8a19; color: #fff" onclick="payWithPaystack1(2000)">Make Payment</button>
                            </form>

                        </li>
                        @endif

                        {{-- <li class="list-group-item" style="width: 100%">
                            <strong>Images </strong>
                            <div class="images">
                                @foreach ($service->images as $image)
                                    <div class="image-list">
                                        <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="{{ $service->name }}">
                                    </div>
                                @endforeach
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="box box-default">
                <div class="box-header">
                    <h2 class="box-title" style="font-weight: 700">Service Images</h2>
                    <p>Add more images to describe your service more!</p>
                </div>
                <div class="box-body">
                        @forelse ($service->images as $image)
                            <div style="display: inline-flex; flex-wrap: wrap">
                                <div>
                                    <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="" style="display: block;width:100px;">
                                    <a href="{{ route('service.image.delete', ['id' => $image->id]) }}" style="display:block">Delete</a>
                                </div>
                            </div>
                        @empty
                            <p>You don't have other images yet!</p>
                        @endforelse
                    </div>

                    <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-default dz-message">
                            Click here to add your images <br>
                            <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                        </div>
                    </form>
                    <br>
                    <center>
                        <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                        <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                    </center>

                </div>
            </div>
        </div>
    </div>
  </section>

</div>


 <script>

                base_Url = "{{ url('/') }}"

                var _token = $("input[name='_token']").val();

                // var email1 = $("#email-address3").val();
                var amount = $("#featured_amount").val();
                var email = $("#user_email").val();
                var service_id = document.getElementById("service_id").value;
                function payWithPaystack1() {

                    // return;

                    var handler = PaystackPop.setup({
                        key: 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
                        email: document.getElementById("user_email").value,
                        amount: 200000,
                        ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                        metadata: {
                            custom_fields: [{
                                display_name: "Mobile Number",
                                variable_name: "mobile_number",
                                value: "+2348012345678"
                            }]
                        },
                        callback: function(response) {

                            var email = document.getElementById("user_email").value;
                            var service_id = document.getElementById("service_id").value;
                            var amount = $("#featured_amount").val();
                            var ref_no1 =  response.reference;
                            
                            $.ajax({
                              method: "POST",
                              url: base_Url + '/provider/service/create_pay_featured',
                              dataType: "json",
                              data: {
                                _token: _token,
                                email: email,
                                amount: amount,
                                service_id: service_id,
                                ref_no: ref_no1,
                              },
                              success: function (data) {
                                  console.log(data)
                              },
                              error: function(error) {
                                  console.log(error)
                              }
                            })
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                }



            </script>
@endsection

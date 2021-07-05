@extends('layouts.admin')

@section('title')
Send Mail | 
@endsection

@section('extra-styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">

    <style>
        .form-area{
            background-color: #fff;
            padding: 25px;
            /* width: 60%;
            margin: 0 auto; */
            border-radius: 5px;
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        .form-fields{
           margin-bottom: 20px;
           width: 100%;
        }
        .form-fields label{
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-family: 'Roboto', sans-serif;
            font-size: 17px;
        }
        .form-fields input{
            display: block;
            width: 100%;
            height: 40px;
            border: 1px solid rgb(241, 241, 241);
            padding-left: 10px;
            padding-right: 10px;
            font-size: 16px;
            font-family: 'Quicksand', sans-serif;
        }
        .form-fields textarea{
            display: block;
            width: 100%;
            border: 1px solid rgb(241, 241, 241);
        }
        .btnDiv{
            display: flex;
            justify-content: flex-end;
        }
        #submitBtn {
            font-family: 'Quicksand', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #fff;
            background-color: #1ebc61;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
            padding: 18px 23px;
        }

        #submitBtn:hover {
            background-color: #2EE59D;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners{
            height: 250px;
        }
        .title{
            margin-bottom: 25px;
            text-transform: uppercase;
        }


        @media screen and (max-width: 768px){
            .form-area{
                background-color: #fff;
                width: 50%;
                padding: 18px;

            }
        }
    </style>
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	{{-- <div class="container">
		@include('layouts.backend_partials.status')
	</div> --}}

	<section class="content">

		<div class="row">
			<div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                       <!-- Form Wrapper -->
                    <div class="form-area">
                        <div class="title">
                            <h3>Customer Service E-mail Template</h3>
                            <p style="font-size: 15px; text-transform:initial">Separate each user email addresses with comma ',' if they're more than one.</p>
                        </div>
                        <form action="{{ route('customer.service.email.send') }}" method="POST" class="message-form">@csrf
                            <div class="form-fields">
                                <label for="emails">User(s) E-mail: <span style="font-size: 14px; color:rgb(255, 118, 118)">required</span></label>
                                <input type="text" name="emails" id="emails" placeholder="Enter the users email address." required>
                            </div>
                            <div class="form-fields">
                                <label for="subject">Subject: <span style="font-size: 14px; color:rgb(255, 118, 118)">required</span></label>
                                <input type="text" name="subject" id="subject" value="EFContact Subscription Renewal!" placeholder="Enter a subject." required>
                            </div>
                            <div class="form-fields">
                                <label for="message">Your Message: <span style="font-size: 14px; color:rgb(255, 118, 118)">required</span>
                                    <p style="font-size: 15px; text-transform:initial;font-weight:500">Leave out the greeting part (e.g Good day EFContact service provider).</p></label>
                                <textarea name="message" id="message" cols="30" rows="10">
                                    This is to inform you that your subscription on our platform has expired. <br>
                                    Kindly log on to your provider dashboard to renew your subscription. <br>
                                    If you're having any difficulties or challenges, simply call us or send a message via the live chat on our website.
                                </textarea>
                            </div>
                            <div class="form-fields btnDiv">
                                <button type="submit" id="submitBtn">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
			</div>


			<!-- /.content -->
		</div>	



	</div>

</div>
</section>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 120
    });
</script>


@endsection

@section('extra-scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    <script type="text/javascript">
        ClassicEditor.create( document.querySelector('#message'))
            .then( editor => {
                console.log( editor );
            })
            .catch( error => {
                console.error( error );
            });
    </script>

    @if(Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        </script>
    @endif

@endsection



@extends('layouts.admin')

@section('title')
FAQs |
@endsection



@section('content')


<div class="content-wrapper" style="min-height: 868px;">


    <!-- Main content -->

<section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">PRIVACY &amp; POLICY
            </h3>
        <form id="aboutForm" action="{{route('admin.save_termsOfUse')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

<textarea id="basic-example" name="details">
    Privacy & Cookie Notice
    Contents:


    About this Privacy and Cookie Notice
    The data we collect about you
    Cookies and how we use them
    How we use your personal data
    How we share your personal data
    Data security
    Your legal rights

    1. About this Notice
    This Privacy and Cookie Notice provides information on how E.fcontact collects and processes your personal data when you post on/visit our website or mobile application.
    2. The Data We Collect About You?
    We collect your personal data in order to provide and continually improve our services. We may collect, use, store and transfer the following different kinds of personal data about you to enable us serve you better.
    To find out more:
    ⦁	Information you provide to us: We receive and store the information you provide to us including your identity data, contact data, business data.
    ⦁	Information on your use of our website and/or mobile applications: We automatically collect and store certain types of information regarding your use of the E.fcontact including information about your searches, views and purchases.
    ⦁	Information from third parties and publicly available sources: We may receive information about you from third parties including clients who have patronised or used your services.
    3. Cookies and How We Use Them
    A cookie is a small file of letters and numbers that we put on your computer if you agree.
    Cookies allow us to distinguish you from other users of our website and mobile applications, which helps us to provide you with an enhanced browsing experience. For example we use cookies for the following purposes:
    ⦁	Recognising and counting the number of visitors and to see how visitors move around the site when they are using it (this helps us to improve the way our website works, for example by ensuring that users can find what they are looking for).
    ⦁	Identifying your preferences and subscriptions e.g. language settings, saved items, items stored in your basket and Prime membership.
    4. How We Use Your Personal Data
    We use your personal data to operate, provide, develop and improve the services that we offer, including the following:
    ⦁	Registering you as a service provider.
    ⦁	Registering you as a service user.
    ⦁	Managing your relationship with us.
    ⦁	Enabling you to participate in surveys.
    ⦁	Improving our website, applications and services
    ⦁	Recommending/advertising products or services which may be of interest to you.
    ⦁	Complying with our legal obligations, including verifying your identity where necessary.
    ⦁	Detecting fraud.
    5. How We Share Your Personal Data
    We may need to share your personal data with third parties for the following purposes:
    ⦁	Need of products and services: In order for those interested in  your products and services on the platform to contact you, we may be required to provide your personal data to such third parties.
    ⦁	Authentication by third party: we release your information to third party seeking your services to enable them check authenticity of your products and services.
    When we share your personal data with third parties we:
    ⦁	require them to agree to use your data in accordance with the terms of this Privacy and Cookie Notice, our Privacy Policy and in accordance with the law; and
    ⦁	only permit them to process your personal data for specified purposes and in accordance with our instructions. We do not allow our third-party to use your personal data for their own purposes.
    6. Data Security
    We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used or accessed in an unauthorised way, altered or disclosed.
    In addition, we limit access to your personal data to those employees, agents and other third parties who have a business need to know. They will only process your personal data on our instructions and they are subject to a duty of confidentiality.
    We have put in place procedures to deal with any suspected personal data breach and will notify you and any applicable regulator of a breach where we are legally required to do so.

    8. Your Legal Rights
    It is important that the personal data we hold about you is accurate and current. Please keep us informed if your personal data changes during your relationship with us.
    Under certain circumstances, you have rights under data protection laws in relation to your personal data, including the right to access, correct or erase your personal data, object to or restrict processing of your personal data.


</textarea>


        <div class="form-layout-footer">
            <button type="submit" class="btn btn-primary mg-r-5">Update <i class="fa fa-refresh"></i></button>
        </div>
        </form>
      </div><!-- card -->
    </div><!-- sl-pagebody -->









      </div>
    </div>
 </section>
<script>

  /*  function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'faqs/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#titleEdit').val(result.title);
        $('#bodyEdit').val(result.body);
        var url = 'faqs/' + id;
        $('form#faqs').attr('action', url);
        $('#editfaqsModal').modal('show');
    }
    });

    }
    </script>
    <script>
      /*  function deleteContact(id) {

    event.preventDefault();

    if (confirm("Are you sure?")) {

        $.ajax({
            url: 'delete/faqs/' + id,
            method: 'get',
            success: function(result){
                window.location.assign(window.location.href);
            }
        });

    } else {

        console.log('Delete process cancelled');

    }

    }
    </script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


</script>
    <!-- /.content -->
  </div>


@endsection




@extends('layouts.admin')

@section('title')
Privacy Policy
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
        <form id="aboutForm" action="{{route('admin.save_privacyPolicy')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <textarea id='basic-example' name="details" class="form-control" value= placeholder="Tell us about your service.">{{ $current_privacy_policy_details }}</textarea>
{{--
<textarea id="basic-example" name="details">
  <p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;"><span style="text-rendering: optimizelegibility; outline: 0px; font-weight: 700; margin-bottom: 0px;">Security Policy</span></p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Your security really matters. At Virtual Xcellence security is not an empty word and we take it very seriously.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;"><span style="text-rendering: optimizelegibility; outline: 0px; font-weight: 700; margin-bottom: 0px;">SSL</span></p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcmmmmellence force TLS (SSL) for all the requests to Virtual Xcellence website. This means that requests from your browser are encrypted with SSL.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">You can verify that with the lock icon on your browser.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;"><span style="text-rendering: optimizelegibility; outline: 0px; font-weight: 700; margin-bottom: 0px;">Backups</span></p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Our data are constantly backed on multiple servers in several geographic locations to avoid any data loss.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;"><span style="text-rendering: optimizelegibility; outline: 0px; font-weight: 700; margin-bottom: 0px;">Availability</span></p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">We do our best effort to ensure the availability of Virtual Xcellence website, even under huge spike of requests.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;"><span style="text-rendering: optimizelegibility; outline: 0px; font-weight: 700; margin-bottom: 0px;">Payment Security</span></p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">We don’t store and manage with payment ourselves. We use PCIDSS approved payment gateway.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">If you have any security questions or concerns you can use your contact form at&nbsp;https://www.virtualxcellence.com/contacts/</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Your privacy really matters. At Virtual Xcellence, we have a few fundamental principles :</p><ul style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;"><li style="text-rendering: optimizelegibility; outline: 0px;">We don’t ask you for personal information unless we truly need it.</li><li style="text-rendering: optimizelegibility; outline: 0px;">We don’t share your personal information with anyone except to comply with the law, develop our products, or protect our rights.</li><li style="text-rendering: optimizelegibility; outline: 0px;">We don’t store personal information on our servers unless required for the ongoing operation of one of our services.</li><li style="text-rendering: optimizelegibility; outline: 0px; margin-bottom: 0px;">We don’t sell any of your personal information</li></ul><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Below is our privacy policy, which incorporates these goals.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">This policy has been largely inspired by&nbsp;<a href="https://automattic.com/privacy" target="_blank" rel="noopener" style="color: rgb(0, 169, 20); text-rendering: optimizelegibility; outline: 0px; margin-bottom: 0px;">Automattic privacy policy</a>, and is available under a Creative Commons ShareAlike license, which means you’re more than welcome to steal it and repurpose it for your own use.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence operates several websites including&nbsp;<a href="https://preprod.wp-rocket.me/" target="_blank" rel="noopener" style="color: rgb(0, 169, 20); text-rendering: optimizelegibility; outline: 0px;">preprod.wp-rocket.me</a>,&nbsp;<a href="https://imagify.io/" target="_blank" rel="noopener" style="color: rgb(0, 169, 20); text-rendering: optimizelegibility; outline: 0px;">imagify.io</a>,&nbsp;<a href="https://wp-media.me/" target="_blank" rel="noopener" style="color: rgb(0, 169, 20); text-rendering: optimizelegibility; outline: 0px; margin-bottom: 0px;">wp-media.me</a>&nbsp;It is Virtual Xcellence’s policy to respect your privacy regarding any information we may collect while operating our websites.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">If you have questions about deleting or correcting your personal data please contact our support.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Website Visitors</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Like most website operators, Virtual Xcellence collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence purpose in collecting non-personally identifying information is to better understand how Virtual Xcellence’s visitors use its website. From time to time, Virtual Xcellence may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on Virtual Xcellence’s website.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Gathering of Personally-Identifying Information</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Certain visitors to Virtual Xcellence’s websites choose to interact with Virtual Xcellence in ways that require Virtual Xcellence to gather personally-identifying information. The amount and type of information that Virtual Xcellence gathers depends on the nature of the interaction.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">For example, we ask visitors who buy a licence for Virtual Xcellence to provide email address, country, name, and financial information required to process those transactions. Virtual Xcellence collects such information only in so far as is necessary or appropriate to fulfill the purpose of the visitor’s interaction with Virtual Xcellence.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Protection of Certain Personally-Identifying Information</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence discloses potentially personally-identifying and personally-identifying information only to those of its employees, contractors and affiliated organizations that (i) need to know that information in order to process it on Virtual Xcellence’s behalf or to provide services available at Virtual Xcellence’s websites, and (ii) that have agreed not to disclose it to others.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using Virtual Xcellence’s websites, you consent to the transfer of such information to them. Virtual Xcellence will not rent or sell potentially personally-identifying and personally-identifying information to anyone.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Other than to its employees, contractors and affiliated organizations, as described above, Virtual Xcellence discloses potentially personally-identifying and personally-identifying information only in response to a subpoena, court order or other governmental requests, or when Virtual Xcellence believes in good faith that disclosure is reasonably necessary to protect the property or rights of Virtual Xcellence, third parties or the public at large.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">If you are a registered user of an Virtual Xcellence website and have supplied your email address, Virtual Xcellence may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what’s going on with Virtual Xcellence and our products.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">We primarily use our various product blogs to communicate this type of information, so we expect to keep this type of email to a minimum. If you send us a request (for example via a support email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence takes all measures reasonably necessary to protect against the unauthorized access, use, alteration or destruction of potentially personally-identifying and personally-identifying information.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Cookies</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">A cookie is a string of information that a website stores on a visitor’s computer, and that the visitor’s browser provides to the website each time the visitor returns.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence uses cookies to help Virtual Xcellence identify and track visitors, their usage of Virtual Xcellence website, and their website access preferences.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using Virtual Xcellence’s websites, with the drawback that certain features of Virtual Xcellence’s websites may not function properly without the aid of cookies.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Business Transfers</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">If Virtual Xcellence, or substantially all of its assets, were acquired, or in the unlikely event that Virtual Xcellence goes out of business or enters bankruptcy, user information would be one of the assets that is transferred or acquired by a third party.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">You acknowledge that such transfers may occur, and that any acquirer of Virtual Xcellence may continue to use your personal information as set forth in this policy.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Ads</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Ads appearing on any of our websites may be delivered to users by advertising partners, who may set cookies.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">This Privacy Policy covers the use of cookies by Virtual Xcellence and does not cover the use of cookies by any advertisers.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Privacy Policy Changes</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Although most changes are likely to be minor, Virtual Xcellence may change its Privacy Policy from time to time, and in Virtual Xcellence’s sole discretion.</p><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">Virtual Xcellence encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;">Contacting us</h4><p style="text-rendering: optimizelegibility; outline: 0px; color: rgb(86, 88, 114); font-family: Rubik; font-size: 15px;">If there are any questions regarding this privacy policy you may contact us by email: info@virtualxcellence.com</p><h4 style="font-family: Poppins; font-weight: 700; line-height: 1.25em; color: rgb(39, 50, 114); margin-top: 40px; margin-bottom: 20px; font-size: 1.25rem; text-rendering: optimizelegibility; outline: 0px;"><span style="text-rendering: optimizelegibility; outline: 0px; margin-bottom: 0px;">Introduction</span></h4>

</textarea> --}}




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

    function fetchPost(id) {

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
        function deleteContact(id) {

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



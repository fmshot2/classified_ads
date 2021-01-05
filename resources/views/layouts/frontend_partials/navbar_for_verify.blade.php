        <!-- Top header start -->
        <header class="top-header bg-warning  none-992" id="top-header-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7">
                        <div class="list-inline">
                            <a href=" {{ $check_general_info == 0 ? $general_info->hot_line : '' }} "><i class="fa fa-phone"></i>Need Support? {{ $check_general_info == 0 ? $general_info->hot_line : '' }} </a>
                            <a href=" {{ $check_general_info == 0 ? $general_info->support_email : ''}}"><i class="fa fa-envelope"></i> {{ $check_general_info == 0 ? $general_info->support_email : ''}} </a>
                        </div>
                    </div>                                
        </div>
    </div>
</header>



<!-- Main header start -->
<header class="main-header">
    <div class="container">
  
</div>
</header>

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src",reader.result);
            }
            reader.readAsDataURL(file);     
        }
    }
</script>
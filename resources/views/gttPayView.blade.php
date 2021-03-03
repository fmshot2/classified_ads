
<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript">
  $(document).ready( function () {
	$('#gt_payment').submit()
});
</script>
</head>


<body>

 <form id="gt_payment" action="https://ibank.gtbank.com/GTPay/Tranx.aspx" method="post">

           
                <input type="text" name="gtpay_mert_id" class="form-control" id="gtpay_mert_id" value="{{ $gtpay_mert_id }}">
          
                <input type="text" name="gtpay_tranx_id" value="{{ $gtpay_tranx_id }}" class="form-control" id="gtpay_tranx_id">
           
                <input type="text" name="gtpay_tranx_amt" value="{{ $gtpay_tranx_amt }}" class="form-control" id="gtpay_tranx_amt">
       
                <input type="text" name="gtpay_tranx_curr" value="{{ $gtpay_tranx_curr }}" class="form-control" id="gtpay_tranx_curr">
        
                <input type="text" name="gtpay_cust_id" value="{{ $gtpay_cust_id }}" class="form-control" id="gtpay_cust_id">
          
                <input type="text" name="gtpay_cust_name" value="{{ $gtpay_cust_name }}" class="form-control" id="gtpay_cust_name">
      
                <input type="text" name="gtpay_tranx_memo" value="{{ $gtpay_tranx_memo }}" class="form-control" id="gtpay_tranx_memo">
      
                <input type="text" name="" value="{{ $gtpay_echo_data }}" class="form-control" id="gtpay_echo_data">
            
                <input type="text" name="gtpay_no_show_gtbank" value="{{ $gtpay_no_show_gtbank }}" class="form-control" id="gtpay_no_show_gtbank">
            
                <input type="text" name="gtpay_gway_name" value="{{ $gtpay_gway_name }}" class="form-control" id="gtpay_gway_name">
                 <input type="text" name="gtpay_hash" value="{{ $hashed }}" class="form-control" id="gtpay_hash">
                 <input type="text" name="gtpay_tranx_noti_url" value="{{ $gtpay_tranx_noti_url }}" class="form-control" id="gtpay_tranx_noti_url">

    </form>


</body>




</html>

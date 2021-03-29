
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


                <input type="hidden" name="email" class="form-control" id="email" value="{{ $email }}">

                <input type="hidden" name="password" value="{{ $password }}" class="form-control" id="password">

                <input type="hidden" name="slug3" value="{{ $slug3 }}" class="form-control" id="slug3">

                <input type="hidden" name="agent_Id" value="{{ $agent_Id }}" class="form-control" id="agent_Id">

                <input type="hidden" name="refererId" value="{{ $refererId }}" class="form-control" id="refererId">

                <input type="hidden" name="role" value="{{ $role }}" class="form-control" id="role">

    </form>

    <h5>Connecting.....Please do not reload the page</h5>


</body>




</html>

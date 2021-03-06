<?php use yii\helpers\Html; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Two Win Indonesia</title>
<link rel="stylesheet" href="twi/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="twi/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="twi/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="twi/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<script type="text/javascript">
function submitform()
{
  document.forms["myform"].submit();
}
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	<?= Html::beginForm(['site/login'], 'post', ['id'=>'myform']) ?>
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp" name="LoginForm[username]" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="************"  onfocus="this.value=''" class="login-inp" name="LoginForm[password]" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" class="checkbox-size" id="login-check" value="1" name="LoginForm[rememberMe]" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="button" class="submit-login"  onclick="javascript: submitform()"/></td>
		</tr>
		</table>
	</div>
	<?= Html::endForm() ?>
 	<!--  end login-inner -->
	<div class="clear"></div>
	
 </div>
 <!--  end loginbox -->
 <?= $content ?>
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>
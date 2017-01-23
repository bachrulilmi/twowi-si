<?php use yii\helpers\Html; ?>
<!DOCTYPE html>
<html >
<head>
<script type="text/javascript">
function submitform()
{
  document.forms["myform"].submit();
}
</script>
  <meta charset="UTF-8">
  <title>Two Win Indonesia</title>
  
  
  
      <link rel="stylesheet" href="twi/login/css/style.css">

  
</head>

<body>
  <div class="login-page">
  <div class="form">
    <?= Html::beginForm(['site/login'], 'post', ['class'=>'login-form','id'=>'myform']) ?>
    
	<center><img src="twi/login/img/logo-twin.png"></center>
      <input type="text" name="LoginForm[username]" placeholder="username"/>
      <input type="password" name="LoginForm[password]" placeholder="password"/>
      <button onclick="javascript: submitform()"><b>login</b></button>
      <p class="message"></p>
    
    <?= Html::endForm() ?>
  </div>
</div>
  <script src='twi/login/js/jquery-2.1.3.min.js'></script>

    <script src="twi/login/js/index.js"></script>

</body>
</html>

<?php
use yii\helpers\Url ;
use yii\helpers\Html;

?>
<div class="container">
		<center><h1>Selamat Bergabung</h1></center>


<p><h4>Selamat! Anda saat ini sudah menjadi member Two Win Indonesia. Nikmati segala fasilitas dari Two Win Indonesia.</h4></p>
</br></br>
<table style="width:100%">
  
  <tr>
    <th width="30%">No Kandidat</th>
    <th width="5%">:</th> 
    <th width="65%"><?= Html::encode($model->kandidatid) ?></th>
  </tr>
  <tr>
    <th>Nama Lengkap</th>
    <th>:</th> 
    <th><?= Html::encode($model->namalengkap) ?></th>
  </tr>
  <tr>
    <th>Jenis Kelamin</th>
    <th>:</th> 
    <th><?= Html::encode($model->jenkel) ?></th>
  </tr>
  
  <tr>
    <th>Tempat Lahir</th>
    <th>:</th> 
    <th><?= Html::encode($model->tempatlahir) ?></th>
  </tr>
  <tr>
    <th>Tanggal Lahir</th>
    <th>:</th> 
    <th><?= Html::encode($model->tanggallahir) ?></th>
  </tr>

</table>

</br>
<p><h4>Salam,</h4></p>
</br></br></br>
<p><h4>Two Win Indonesia</h4></p>
</div>
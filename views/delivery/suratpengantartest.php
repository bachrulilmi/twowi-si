<?php
use yii\helpers\Url ;
use yii\helpers\Html;

?>
<div class="container">
		<center><h1>Surat Pengantar</h1></center>

<p>Kepada YTH,</p>
<p>Berikut ini adalah kandidat yang ikut test di tempat saudara :</p>
</br>
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
    <th>Status</th>
    <th>:</th> 
    <th><?= Html::encode($model->status) ?></th>
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

<p>Demikian informasi ini kami sampaikan.</p>
<p>Terima Kasih</p>
</div>
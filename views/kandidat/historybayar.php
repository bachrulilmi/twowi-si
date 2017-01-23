<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;
use yii\bootstrap\Modal;

$this->title = 'History Bayar';
?>

<!--  start page-heading -->
	<div id="page-heading">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="twi/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="twi/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		

		<table style="width:50%" class="table table-striped">
	<tr>
		<th>Kandidat ID</th>
		<th>:</th> 
		<th><?= Html::encode($model->kandidatid) ?></th>
	</tr>
	<tr>
		<th>Nama Lengkap</th>
		<th>:</th> 
		<th><?= Html::encode($model->namalengkap) ?></th>
	</tr>
	<tr>
		<th>Tanggal Bayar</th>
		<th>:</th> 
		<th><?= Html::encode(Yii::$app->formatter->asDate($model2->tglbayar, 'long')) ?></th>
	</tr>
	<tr>
		<th>Nominal</th>
		<th>:</th> 
		<th><?= Html::encode(Yii::$app->formatter->asDecimal($model2->nominal)) ?></th>
	</tr>
	<tr>
		<th>Jenis Pembayaran</th>
		<th>:</th> 
		<th><?= Html::encode($model3->jenis_bayar) ?></th>
	</tr>
	<tr>
		<th>Tipe Pembayaran</th>
		<th>:</th> 
		<th><?= Html::encode($model2->viabayar) ?></th>
	</tr>
</table>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                
                <?= Html::resetButton('Kembali', ['class' => 'btn btn-danger', 'name' => 'login-button','onclick'=>'history.go(-1)']) ?>

            </div>
        </div>

    
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>




<div class="clear">&nbsp;</div>


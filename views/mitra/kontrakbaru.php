<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;

$this->title = 'Kontrak Baru';
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
		
		<?php 
		if(Yii::$app->session->getFlash('berhasil')){
			echo Alert::widget([
		   'options' => ['class' => 'alert-info'],
		   'body' => Yii::$app->session->getFlash('berhasil'),]);
		}
		
	   ?>
	
	<?php $form = ActiveForm::begin([
		'action'=>Url::to(['mitra/simpan-kontrak', 'id' =>$model->id ]),
		'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>
    	<?= $form->field($model, 'mitraid')->hiddenInput()->label(false)?>
    	<?= $form->field($model, 'namamitra')->textInput(['readonly' => true])->label('Nama Mitra') ?>
    	<?= $form->field($model2, 'nokontrak')->textInput(['autofocus' => true]) ->label('Nomor Kontrak/MoU')?>
    	<?= $form->field($model2, 'ttd') ->label('Penandatangan Kontrak')?>
        <?= $form->field($model2, 'tgl_mulai')->label('Tanggal Mulai Kontrak')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'yyyy-mm-dd']]) ?>
        <?= $form->field($model2, 'tgl_selesai')->textInput()->label('Tanggal Selesai Kontrak')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'yyyy-mm-dd']]) ?>
		<?= $form->field($model2, 'penjelasan') ->label('Keterangan')?>
		<?= $form->field($model2, 'status')->dropdownList([
			'Aktif' => 'Aktif', 
			'Non Aktif' => 'Non Aktif'
			])->label('Status');?>
		<?= $form->field($model2, 'nilai')->label('Nilai Kontrak')?>
		<?= $form->field($model2, 'lampiran')->fileInput()->label('Lampiran Kontrak') ?>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
 
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
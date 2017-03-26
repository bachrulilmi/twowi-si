<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url;

$this->title = 'Edit Order';
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
		'action'=>Url::to(['order/update', 'id' =>$model->id]),
		'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>
    	
        <?= $form->field($model, 'mitraid')->dropdownList($mitra)->label('Nama Perusahaan');?>
		<?= $form->field($model, 'namapictwo')->label('Nama PIC Two Win')?>
		<?= $form->field($model, 'kategori')->dropdownList([
			'Outsourcing' => 'Outsourcing', 
			'Supply' => 'Supply'
			
			])->label('Kategori Order');?>
			
		
		<?= $form->field($model, 'posisi')->dropdownList([
				'Security' => 'Security', 
				'Cleaning Service' => 'Cleaning Service',
				'Operator' => 'Operator'
			])->label('Posisi Order');?>
		<?= $form->field($model, 'qty')->label('Quantity')?>
		<?= $form->field($model, 'spesifikasi')->textarea(['rows' => '6'])->label('Spesifikasi')?>
		<?= $form->field($model, 'periode')->label('Periode Kontrak')?>
		<?= $form->field($model, 'sat_periode')->dropdownList([
				'Bulan' => 'Bulan', 
				'Tahun' => 'Tahun',
				
			])->label('Satuan Periode');?>
		<?= $form->field($model, 'tgl_mulai')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'yyyy-mm-dd']])->label('Tanggal Mulai Kontrak')?>
		<?= $form->field($model, 'tgl_selesai')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'yyyy-mm-dd']])->label('Tanggal Selesai Kontrak')?>
		<?= $form->field($model, 'nilai_kontrak')->label('Nilai Kontrak')?>
		<?= $form->field($model, 'bpjs')->checkboxList([
				'Tenaga Kerja' => 'Security', 
				'Kematian' => 'Kematian',
				'Pensiun' => 'Pensiun',
				'Kecelakaan' => 'Kecelakaan',
				'Hari Tua' => 'Hari Tua'
			])->label('BPJS');
		?>
		<?= $form->field($model, 'gaji')->dropdownList([
				'UMP' => 'UMP', 
				'Non UMP' => 'Non UMP',
				
			])->label('Gaji');
		?>
		<?= $form->field($model, 'thr')->dropdownList([
				'Include' => 'Include', 
				'Exclude' => 'Exclude',
				'Non THR' => 'Non THR',				
			])->label('THR');
		?>
		
		<div class="form-group field-order-lampiran">
						<label class="col-lg-2 control-label" for="order-lampiran">Lampiran Dokumen</label>
						<div class="col-lg-3">
							<input type="hidden" name="Order[lampiran]" value="<?=$model->lampiran?>">
							<input type="file" id="order-lampiran" name="Order[lampiran]" value="<?=$model->lampiran?>">
							<?php if($model->lampiran <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/orders/".$model->lampiran ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            
                <button type="button" class="btn btn-danger" onclick="location.href='<?= Url::to(['order/list-order' ]) ?>'">Batal</button>
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
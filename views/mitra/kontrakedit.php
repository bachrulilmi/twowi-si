<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;

$this->title = 'Ubah Kontrak';
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
					'action'=>Url::to(['mitra/update-kontrak', 'id' =>$kontrak->id,'mitraid'=>$mitra->id ]),
					'options' => ['enctype' => 'multipart/form-data'],
					'id' => 'login-form',
					'layout' => 'horizontal',
					'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-1 control-label'],
					],
					]); ?>
					<?= $form->field($mitra, 'id')->hiddenInput()->label(false)?>
					<?= $form->field($mitra, 'namamitra')->textInput(['readonly' => true])->label('Nama Mitra') ?>
					<?= $form->field($kontrak, 'nokontrak') ->label('Nomor Kontrak/MoU')?>
    				<?= $form->field($kontrak, 'ttd') ->label('Penandatangan Kontrak')?>
					<?= $form->field($kontrak, 'tahun')->textInput(['autofocus' => true])->label('Tahun Kontrak') ?>
					<?= $form->field($kontrak, 'penjelasan') ->label('Keterangan')?>
					<?= $form->field($kontrak, 'status')->dropdownList([
						'Aktif' => 'Aktif', 
						'Non Aktif' => 'Non Aktif'
						])->label('Status');?>
						<?= $form->field($kontrak, 'periode')->label('Periode Kontrak')?>
						
						<div class="form-group field-kontrak-lampiran">
							<label class="col-lg-1 control-label" for="kontrak-lampiran">Lampiran Kontrak</label>
							<div class="col-lg-8">
								<input type="hidden" name="Kontrak[lampiran]" value="<?=$kontrak->lampiran?>">
								<input type="file" id="kontrak-lampiran" name="Kontrak[lampiran]" value="<?=$kontrak->lampiran?>">
								<button type="button" onclick="window.open('<?= Url::base() . "/uploads/".$kontrak->lampiran ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button>
							</div>
							<div class="col-lg-8">
								<div class="help-block help-block-error "></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-offset-1 col-lg-11">

								<?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								<button type="button" onclick="history.go(-1);" class="btn btn-danger">Batal</button>
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
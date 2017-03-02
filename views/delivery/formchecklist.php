<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;
$this->title = 'Form Checklist';
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
					'action'=>Url::to(['delivery/simpan-checklist', 'id' =>$model->id ]),
					'options' => ['enctype' => 'multipart/form-data'],
					'id' => 'login-form',
					'layout' => 'horizontal',
					'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-2 control-label'],
					],
					]); ?>

					<?= $form->field($model, 'kandidatid')->textInput(['autofocus' => true])->label('No Kandidat') ?>
					<div class="form-group field-delivery-namalengkap">
						<label class="col-lg-2 control-label" for="delivery-namalengkap">Nama Lengkap</label>
						<div class="col-lg-3"><input type="text" id="delivery-kandidatid" class="form-control" name="" value="<?=$model->kandidat->namalengkap ?>"></div>
						<div class="col-lg-7"><div class="help-block help-block-error "></div></div>
					</div>

					<!- upload ktp ->
					<div class="form-group field-delivery-ktp">
						<label class="col-lg-2 control-label" for="delivery-ktp">FC KTP</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[ktp]" value="<?=$model->ktp?>">
							<input type="file" id="delivery-ktp" name="Delivery[ktp]" value="<?=$model->ktp?>">
							<?php if($model->ktp <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->ktp ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>

					<!- upload lamaran ->
					<div class="form-group field-delivery-lamaran">
						<label class="col-lg-2 control-label" for="delivery-lamaran">Surat Lamaran</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[lamaran]" value="<?=$model->lamaran?>">
							<input type="file" id="delivery-lamaran" name="Delivery[lamaran]" value="<?=$model->lamaran?>">
							<?php if($model->lamaran <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->lamaran ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>

					<!- upload ijazah ->
					<div class="form-group field-delivery-ijazah">
						<label class="col-lg-2 control-label" for="delivery-ijazah">Ijazah</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[ijazah]" value="<?=$model->ijazah?>">
							<input type="file" id="delivery-ijazah" name="Delivery[ijazah]" value="<?=$model->ijazah?>">
							<?php if($model->ijazah <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->ijazah ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>

					<!- upload transkrip ->
					<div class="form-group field-delivery-transkrip">
						<label class="col-lg-2 control-label" for="delivery-transkrip">Transkrip Nilai</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[transkrip]" value="<?=$model->transkrip?>">
							<input type="file" id="delivery-transkrip" name="Delivery[transkrip]" value="<?=$model->transkrip?>">
							<?php if($model->transkrip <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->transkrip ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>
					
					<!- upload kartukel ->
					<div class="form-group field-delivery-kartukel">
						<label class="col-lg-2 control-label" for="delivery-kartukel">Kartu Keluarga</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[kartukel]" value="<?=$model->kartukel?>">
							<input type="file" id="delivery-kartukel" name="Delivery[kartukel]" value="<?=$model->kartukel?>">
							<?php if($model->kartukel <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->kartukel ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>
					
					<!- upload suratkuning ->
					<div class="form-group field-delivery-suratkuning">
						<label class="col-lg-2 control-label" for="delivery-suratkuning">Surat Kuning</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[suratkuning]" value="<?=$model->suratkuning?>">
							<input type="file" id="delivery-suratkuning" name="Delivery[suratkuning]" value="<?=$model->suratkuning?>">
							<?php if($model->suratkuning <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->suratkuning ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>
					
					<!- upload pengalamankerja ->
					<div class="form-group field-delivery-pengalamankerja">
						<label class="col-lg-2 control-label" for="delivery-pengalamankerja">Surat Pengalaman Kerja</label>
						<div class="col-lg-3">
							<input type="hidden" name="Delivery[pengalamankerja]" value="<?=$model->pengalamankerja?>">
							<input type="file" id="delivery-pengalamankerja" name="Delivery[pengalamankerja]" value="<?=$model->pengalamankerja?>">
							<?php if($model->pengalamankerja <> ""){ ?><button type="button" onclick="window.open('<?= Url::base() . "/checklist/".$model->pengalamankerja ?>')" class="btn btn-success">Download Lampiran Sebelumnya</button><?php }?>
						</div>
						<div class="col-lg-7">
							<div class="help-block help-block-error "></div>
						</div>
					</div>
					
					<?= $form->field($model, 'flag_checklist')->dropdownList([
						'In Progress' => 'In Progress', 
						'Complete' => 'Complete',
						]
						)->label('Status Dokumen');?>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-11">
								<?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								<button type="button" class="btn btn-danger" onclick="location.href='<?= Url::to(['delivery/list-check-kandidat','id' => $model->orderid]) ?>'">Batal</button>
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
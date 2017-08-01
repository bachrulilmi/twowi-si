<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;
$this->title = 'Form Input Nilai';
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
					'action'=>Url::to(['delivery/simpan-nilai', 'id' =>$model->id ]),
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

					<?= $form->field($model, 'tgl_test')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'yyyy-mm-dd']])->label('Tanggal Test')?>

					<?= $form->field($model, 'nilai_test')->label('Nilai Test') ?>

					<?= $form->field($model, 'hasil_test')->dropdownList([
						'Diterima' => 'Diterima', 
						'Tidak Diterima' => 'Tidak Diterima',
						'Waiting List' => 'Waiting List'

						],
						['prompt'=>'Pilih',
						'onchange'=>'

						if($(this).val()=="Lulus"){
							$( "input#periode" ).removeAttr("readonly");
						}
						if($(this).val()=="Tidak Lulus"){
							$( "input#periode" ).attr("readonly",true);
						}
						
						']
						)->label('Hasil Test');?>

						<?= $form->field($model, 'keterangan_test')->textarea(['rows' => '6'])->label('Keterangan')?>

						<?= $form->field($model, 'periode_kontrak')->textInput(['id'=>'periode','readonly' => true])->label('Periode Kontrak') ?>


						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-11">
								<?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								<button type="button" class="btn btn-danger" onclick="location.href='<?= Url::to(['delivery/list-testing-kandidat','id' => $order]) ?>'">Batal</button>
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
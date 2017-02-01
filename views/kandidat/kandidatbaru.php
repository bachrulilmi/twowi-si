<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;
use yii\bootstrap\Modal;

$this->title = 'Tambah Kandidat Baru';
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
					'action'=>Url::to(['kandidat/save']),
					'options' => ['enctype' => 'multipart/form-data'],
					'id' => 'login-form',
					'layout' => 'horizontal',
					'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-2 control-label'],
					],
					]); ?>

					<?= $form->field($model, 'namalengkap')->textInput(['autofocus' => true])->label('Nama Lengkap') ?>

					<?= $form->field($model, 'jenkel')->dropdownList([
						'Laki-laki' => 'Laki-laki', 
						'Perempuan' => 'Perempuan'
						],
						['prompt'=>'Pilih Jenis Kelamin']
						)->label('Jenis Kelamin');?>
					<?= $form->field($model, 'status')->dropdownList([
						'Pelajar' => 'Pelajar', 
						'Single' => 'Single',
						'Menikah' => 'Menikah'
						],
						['prompt'=>'Pilih Status']
						)->label('Status');?>
						<?= $form->field($model, 'tempatlahir') ->label('Tempat Lahir')?>

						<?= $form->field($model, 'tanggallahir')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'yyyy-mm-dd']])?>

						<?= $form->field($model, 'alamat') ->label('Alamat')?>
						<?= $form->field($model, 'kodepos') ->label('Kodepos')?>
						<?= $form->field($model, 'notelp') ->label('No Telp/HP')?>
						<?= $form->field($model, 'agama')->dropdownList([
							'Islam' => 'Islam', 
							'Katolik' => 'Katolik',
							'Protestan' => 'Protestan',
							'Hindu' => 'Hindu',
							'Budha' => 'Budha',
							'Kong Hu Cu' => 'Kong Hu Cu'
							],
							['prompt'=>'Pilih Agama']
							)->label('Agama');?>
							<?= $form->field($model, 'namasekolah') ->label('Nama Sekolah')?>
							<?= $form->field($model, 'jurusan') ->label('Jurusan')?>
							
							<div class="form-group field-kandidat-refferer">
								<label class="col-lg-2 control-label">Info Lowongan Kerja</label>
								<div class="col-lg-3"><input type="hidden" name="Kandidat[refferer]" value=""><div id="kandidat-refferer" prompt="Pilih">
								<div class="radio"><label><input type="radio" name="Kandidat[refferer]" value="Internet"> Internet</label></div>
								<div class="radio"><label><input type="radio" name="Kandidat[refferer]" value="Browser"> Browser</label></div>
								<div class="radio"><label><input type="radio" name="Kandidat[refferer]" value="Koran"> Koran</label></div>
								<div class="radio"><label><input id="ref1" type="radio" name="Kandidat[refferer]" value=""> Lainnya</label><input type="text" id="ref2" class="form-control" name="Kandidat[refferer-others]"></div>
								
								<div class="col-lg-7"><div class="help-block help-block-error "></div></div>
							</div>
							<?= Html::hiddenInput("Kandidat[jabatan]", "ss");?>


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
			<?php
			Modal::begin([
				'header' => '<h2>Hello world</h2>',

				]);

			echo 'Say hello...';

			Modal::end();
			?>
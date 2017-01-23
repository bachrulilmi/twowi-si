<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url ;
$this->title = 'Tambah Mitra Baru';
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
				
				
				
				<?php $form = ActiveForm::begin([
					'action'=>Url::to(['mitra/save']),
					'options' => ['enctype' => 'multipart/form-data'],
					'id' => 'login-form',
					'layout' => 'horizontal',
					'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-1 control-label'],
					],
					]); ?>

					<?= $form->field($model, 'namamitra')->textInput(['autofocus' => true])->label('Nama Mitra') ?>

					<?= $form->field($model, 'alamatmitra') ->label('Alamat Mitra')?>
					<?= $form->field($model, 'namapic') ->label('Nama PIC')?>
					<?= $form->field($model, 'telppic') ->label('Telepon PIC')?>
					<?= $form->field($model, 'emailpic') ->label('Email PIC')?>
					<?= $form->field($model, 'deskripsi') ->label('PIC')?>
					<?= $form->field($model, 'status')->dropdownList([
						'Aktif' => 'Aktif', 
						'Non Aktif' => 'Non Aktif'
						],
						['prompt'=>'Pilih Status']
						);?>
						
						

						<div class="form-group">
							<div class="col-lg-offset-1 col-lg-11">
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
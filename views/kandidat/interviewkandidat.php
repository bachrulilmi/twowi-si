<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url ;
$this->title = 'Interview Kandidat';
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
		'action'=>Url::to(['kandidat/update', 'id' =>$model->id ]),
		'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
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
		<?= $form->field($model, 'refferer') ->label('Info Lowongan Kerja')?>
		<h2>Perusahaan 1</h2>
		<?= $form->field($model, 'namacomp1') ->label('Nama Perusahaan')?>
        <?= $form->field($model, 'jabatan1') ->label('Jabatan')?>
		<?= $form->field($model, 'lamabkrj1') ->label('Lama bekerja(Tahun)')?>
		<h2>Perusahaan 2</h2>
		<?= $form->field($model, 'namacomp2') ->label('Nama Perusahaan')?>
        <?= $form->field($model, 'jabatan2') ->label('Jabatan')?>
		<?= $form->field($model, 'lamabkrj2') ->label('Lama bekerja(Tahun)')?>
		<h2>Perusahaan 3</h2>
		<?= $form->field($model, 'namacomp3') ->label('Nama Perusahaan')?>
        <?= $form->field($model, 'jabatan3') ->label('Jabatan')?>
		<?= $form->field($model, 'lamabkrj3') ->label('Lama bekerja(Tahun)')?>
		<h2>Biodata Orang Tua</h2>
		<?= $form->field($model, 'nmbpk') ->label('Nama Bapak')?>
        <?= $form->field($model, 'nmibu') ->label('Nama Ibu')?>
		<?= $form->field($model, 'pkrjortu') ->label('Pekerjaan Orang Tua')?>
		<h2>Kerabat Dekat</h2>
		<?= $form->field($model, 'nama_kerabat') ->label('Nama Kerabat')?>
        <?= $form->field($model, 'telp_kerabat') ->label('No Telp Kerabat')?>
		<h2>Kemampuan Komputer</h2>
		<?= $form->field($model, 'msoffice')->dropdownList([
			'Ya' => 'Ya', 
			'Tidak' => 'Tidak',
			],
			['prompt'=>'Pilih']
		)->label('Microsoft Office');?>
		<?= $form->field($model, 'photosh')->dropdownList([
			'Ya' => 'Ya', 
			'Tidak' => 'Tidak',
			],
			['prompt'=>'Pilih']
		)->label('Photoshop');?>
		<?= $form->field($model, 'autoca')->dropdownList([
			'Ya' => 'Ya', 
			'Tidak' => 'Tidak',
			],
			['prompt'=>'Pilih']
		)->label('AutoCad');?>
		<?= $form->field($model, 'others') ->label('Program lainnya')?>
		<h2>Kemampuan Lainnya</h2>
		<?= $form->field($model, 'inggris')->dropdownList([
			'Ya' => 'Ya', 
			'Tidak' => 'Tidak',
			],
			['prompt'=>'Pilih']
		)->label('Bahasa Inggris');?>
		<?= $form->field($model, 'mengemudi')->dropdownList([
			'Ya' => 'Ya', 
			'Tidak' => 'Tidak',
			],
			['prompt'=>'Pilih']
		)->label('Mengemudi');?>
		<?= $form->field($model, 'sim') ->label('SIM')?>
		<?= $form->field($model, 'jabatan')->checkboxList([
				'Security' => 'Security', 
				'Cleaning Service' => 'Cleaning Service',
				'Operator' => 'Operator'
			])->label('Jabatan');
		?>
		
		<?= $form->field($model, 'fotokandidat')->fileInput()->label('Foto Kandidat') ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <button type="button" class="btn btn-danger" onclick="location.href='<?= Url::to(['kandidat/list' ]) ?>'">Batal</button>
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
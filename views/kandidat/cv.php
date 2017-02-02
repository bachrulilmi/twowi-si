<?php
use yii\helpers\Url ;
use yii\helpers\Html;

?>
<div class="container">
		<center><h1>Curriculum Vitae</h1></center>
<img src="foto/<?= Html::encode($model->fotokandidat) ?>" alt="foto kandidat" class="img-rounded" style="width:128px;height:128px;">


</br>
<table style="width:100%">
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Biodata</h4></th>
    
  </tr>
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
  <tr>
    <th>Alamat</th>
    <th>:</th> 
    <th><?= Html::encode($model->alamat) ?></th>
  </tr>
  <tr>
    <th>Kode pos</th>
    <th>:</th> 
    <th><?= Html::encode($model->kodepos) ?></th>
  </tr>
  <tr>
    <th>No Telp/HP</th>
    <th>:</th> 
    <th><?= Html::encode($model->notelp) ?></th>
  </tr>
  <tr>
    <th>Agama</th>
    <th>:</th> 
    <th><?= Html::encode($model->agama) ?></th>
  </tr>
  <tr>
    <th>Nama Sekolah</th>
    <th>:</th> 
    <th><?= Html::encode($model->namasekolah) ?></th>
  </tr>
  <tr>
    <th>Jurusan</th>
    <th>:</th> 
    <th><?= Html::encode($model->jurusan) ?></th>
  </tr>
  <tr>
    <th>Info Lowongan Kerja</th>
    <th>:</th> 
    <th><?= Html::encode($model->refferer) ?></th>
  </tr>
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Perusahaan 1</h4></th>
    
  </tr>
  <tr>
    <th>Nama Perusahaan</th>
    <th>:</th> 
    <th><?= Html::encode($model->namacomp1) ?></th>
  </tr>
  <tr>
    <th>Posisi</th>
    <th>:</th> 
    <th><?= Html::encode($model->jabatan1) ?></th>
  </tr>
  <tr>
    <th>Lama Bekerja</th>
    <th>:</th> 
    <th><?= Html::encode($model->lamabkrj1) ?></th>
  </tr>
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Perusahaan 2</h4></th>
    
  </tr>
  <tr>
    <th>Nama Perusahaan</th>
    <th>:</th> 
    <th><?= Html::encode($model->namacomp2) ?></th>
  </tr>
  <tr>
    <th>Posisi</th>
    <th>:</th> 
    <th><?= Html::encode($model->jabatan2) ?></th>
  </tr>
  <tr>
    <th>Lama Bekerja</th>
    <th>:</th> 
    <th><?= Html::encode($model->lamabkrj2) ?></th>
  </tr>
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Perusahaan 3</h4></th>
    
  </tr>
  <tr>
    <th>Nama Perusahaan</th>
    <th>:</th> 
    <th><?= Html::encode($model->namacomp3) ?></th>
  </tr>
  <tr>
    <th>Posisi</th>
    <th>:</th> 
    <th><?= Html::encode($model->jabatan3) ?></th>
  </tr>
  <tr>
    <th>Lama Bekerja</th>
    <th>:</th> 
    <th><?= Html::encode($model->lamabkrj3) ?></th>
  </tr>
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Keluarga</h4></th>
    
  </tr>
  <tr>
    <th>Nama Bapak</th>
    <th>:</th> 
    <th><?= Html::encode($model->nmbpk) ?></th>
  </tr>
  <tr>
    <th>Nama Ibu</th>
    <th>:</th> 
    <th><?= Html::encode($model->nmibu) ?></th>
  </tr>
  <tr>
    <th>Pekerjaan Orangtua</th>
    <th>:</th> 
    <th><?= Html::encode($model->pkrjortu) ?></th>
  </tr>
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Kerabat Dekat</h4></th>
    
  </tr>
  <tr>
    <th>Nama Kerabat</th>
    <th>:</th> 
    <th><?= Html::encode($model->nama_kerabat) ?></th>
  </tr>
  <tr>
    <th>No Telp Kerabat</th>
    <th>:</th> 
    <th><?= Html::encode($model->telp_kerabat) ?></th>
  </tr>
  <tr>
    <th colspan="3" style="color:#1435F5"><h4>Kemampuan</h4></th>
    
  </tr>
  <tr>
    <th>Microsoft Office</th>
    <th>:</th> 
    <th><?= Html::encode($model->msoffice) ?></th>
  </tr>
  <tr>
    <th>Photoshop</th>
    <th>:</th> 
    <th><?= Html::encode($model->photosh) ?></th>
  </tr>
  <tr>
    <th>Autocad</th>
    <th>:</th> 
    <th><?= Html::encode($model->autoca) ?></th>
  </tr>
  <tr>
    <th>Lainnya</th>
    <th>:</th> 
    <th><?= Html::encode($model->others) ?></th>
  </tr>
  <tr>
    <th>Bahasa Inggris</th>
    <th>:</th> 
    <th><?= Html::encode($model->inggris) ?></th>
  </tr>
  <tr>
    <th>Mengemudi</th>
    <th>:</th> 
    <th><?= Html::encode($model->mengemudi) ?></th>
  </tr>
  <tr>
    <th>SIM</th>
    <th>:</th> 
    <th><?= Html::encode($model->sim) ?></th>
  </tr>
  <tr>
    <th>Posisi</th>
    <th>:</th> 
    <th><?= Html::encode($model->jabatan) ?></th>
  </tr>

</table>

</div>
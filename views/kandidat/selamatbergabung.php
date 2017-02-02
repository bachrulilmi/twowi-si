<?php
use yii\helpers\Url ;
$this->title = 'Selamat Menjadi Member Two Win Indonesia';

?>

<div class="container">
		<div class="jumbotron">
			<h1>Proses Pembayaran Telah Selesai</h1> 
			</br>
			<p>
				Silahkan klik dibawah ini untuk mencetak tanda bukti pendaftaran sebagai member.			
			</p> 
			<p>
				<button class="btn btn-lg btn-primary" onclick="location.href='<?= Url::to(['kandidat/tanda-member', 'id' =>$model]); ?>'">Cetak Tanda Bukti Member</button>
				<button class="btn btn-lg btn-danger" onclick="location.href='<?= Url::to(['kandidat/list-bayar']); ?>'">Kembali</button>
			</p>
		</div>
		
	</div>
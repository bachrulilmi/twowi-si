<?php
use yii\helpers\Url ;
$this->title = 'Kandidat Baru Sukses';

?>

<div class="container">
		<div class="jumbotron">
			<h1>No Kandidat Anda : <?php echo $model; ?></h1> 
			</br>
			<p>
				Pastikan anda mencatat no ini untuk dibawa ke bagian interview.			
			</p> 
			<p>
				<button class="btn btn-lg btn-primary" onclick="location.href='<?= Url::to(['kandidat/index']); ?>'">Selesai</button>
			</p>
		</div>
		
	</div>
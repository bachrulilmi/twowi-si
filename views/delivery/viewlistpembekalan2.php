<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;


$this->title = 'List Pembekalan';
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

				<!--  start table-content  -->
				<div id="table-content">



					<table style="width:50%">
						<tr>
							<th width="30%">Nama Pembekalan</th>
							<th width="5%">:</th> 
							<th width="65%"><?= Html::encode($bekal->nama_bekal) ?></th>
						</tr>
						<tr>
							<th>Nama Trainer</th>
							<th>:</th> 
							<th><?= Html::encode($bekal->trainer_bekal) ?></th>
						</tr>
						<tr>
							<th>Tanggal & Waktu</th>
							<th>:</th> 
							<th><?= Html::encode($bekal->date_bekal." ".$bekal->time_bekal) ?></th>
						</tr>

					</table>
					</br>
					<!--  end top-search -->
					<div class="clear"></div>

					<!--  start product-table ..................................................................................... -->
					<form id="mainform" action="">
						<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
							<tr>

								<th class="table-header-repeat line-left minwidth-1"><p>No Kandidat</p>	</th>
								<th class="table-header-repeat line-left minwidth-1"><p>Nama Kandidat</p></th>
								<th class="table-header-repeat line-left minwidth-1"><p>Posisi</p></th>
								<th class="table-header-repeat line-left minwidth-1"><p>Status Member</p></th>

								
							</tr>
							<?php $count=1;foreach ($deliv as $del): ?>
							<tr>

								<td><?= $del->kandidatid ?></td>
								<td><?= $del->kandidat->namalengkap ?></td>
								<td><?= $del->kandidat->jabatan ?></td>
								<td><?=( $del->kandidat->flag_member == 'Y') ? "Member" : "Non Member" ?></td>
								
							</tr>
						<?php endforeach; ?>
					</table>
					<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->

			<?= LinkPager::widget(['pagination' => $pagination]) ?>
			
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


<div class="clear"></div>
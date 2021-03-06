<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Database Kandidat';
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
			
				<!--  start top-search -->
					<div id="top-search">
					<form class="form-inline" action="<?= Url::to(['kandidat/list-all']); ?>" method="post" >
							<div class="form-group">
								<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
								<input type="text" name="nilai" class="form-control input-sm" id="exampleInputName2" placeholder="Search">
							</div>
							<div class="form-group">
								<select class="form-control input-sm" name="kolom">
									<option value="kandidatid">No Kandidat</option>
									<option value="namalengkap">Nama Kandidat</option>
									<option value="jurusan">Jurusan</option>
									<option value="jabatan">Posisi</option>
									

								</select>

							</div>
							<button type="submit" class="btn btn-primary btn-sm">Search</button>
						</form>
					</div>

					<!--  end top-search -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
					<th class="table-header-repeat line-left minwidth-1"><p>No Kandidat</p>	</th>
					<th class="table-header-repeat line-left minwidth-1"><p>Nama Kandidat</p></th>
					<th class="table-header-repeat line-left"><p>Jenis Kelamin</p></th>
					<th class="table-header-repeat line-left"><p>Status</p></th>
					<th class="table-header-repeat line-left"><p>Jurusan</p></th>
					<th class="table-header-repeat line-left"><p>Posisi</p></th>
					<th class="table-header-options line-left"><p>Actions</p></th>
				</tr>
				
				<?php $count=1;foreach ($kandidat as $kan): ?>
				<?php
					if($kan->flag_member=='Y'){
						$member = "Member";
					}else{
						$member = "Non Member";
					}
				?>
				<tr>
					
					<td><?= $kan->kandidatid ?></td>
					<td><?= $kan->namalengkap ?></td>
					<td><?= $kan->jenkel ?></td>
					<td><?= $member ?></td>
					<td><?= $kan->jurusan ?></td>
					<td><?= $kan->jabatan ?></td>
					<td class="options-width">
					<a href="index.php?r=kandidat/disable&id=<?= $kan->id ?>" title="Disable" class="icon-disable info-tooltip"></a>
					<a href="index.php?r=kandidat/pdf&id=<?= $kan->id ?>" target="_blank" title="Generate CV" class="icon-cetak-cv info-tooltip"></a>
					<a href="index.php?r=kandidat/edit&id=<?= $kan->id ?>" title="View/Edit" class="icon-view-edit info-tooltip"></a>
					<?php 
						if($kan->flag_member=='Y'){
							echo '<a href="index.php?r=kandidat/history-bayar&id='.$kan->id.'" title="History Pembayaran" class="icon-history-bayar info-tooltip"></a>
							<a href="index.php?r=kandidat/turun-nonmember&id='. $kan->id .'" title="Turunkan ke Non Member" class="icon-non-member info-tooltip"></a>';

						}
					?>
					<a href="index.php?r=kandidat/list-test&id=<?= $kan->id ?>" title="Input Nilai Test" class="icon-test info-tooltip"></a>

					</td>
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







<div class="clear">&nbsp;</div>
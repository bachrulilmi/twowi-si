<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;


$this->title = 'List Kontrak';
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
							<th width="30%">Nama Perusahaan</th>
							<th width="5%">:</th> 
							<th width="65%"><?= Html::encode($mitra->namamitra) ?></th>
						</tr>
						<tr>
							<th>Alamat Perusahaan</th>
							<th>:</th> 
							<th><?= Html::encode($mitra->alamatmitra) ?></th>
						</tr>

					</table>
					<!--  start top-search -->
					<div id="top-search-left">
						
						<button type="button" class="btn btn-primary btn-sm" onclick="location.href='<?= Url::to(['mitra/new-contract', 'id' =>$mitra->id ]) ?>'">Kontrak Baru</button>
					</div>

					<!--  end top-search -->
					<div class="clear"></div>

					<!--  start product-table ..................................................................................... -->
					<form id="mainform" action="">
						<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
							<tr>

								<th class="table-header-repeat line-left minwidth-1"><p>Tahun Mulai Kontrak</p>	</th>
								<th class="table-header-repeat line-left minwidth-1"><p>Penjelasan</p></th>
								<th class="table-header-repeat line-left minwidth-1"><p>Nilai Kontrak</p></th>

								<th class="table-header-options line-left"><p>Actions</p></th>
							</tr>
							<?php $count=1;foreach ($kontrak as $mit): ?>
							<tr>

								<td><?= $mit->tahun_mulai ?></td>
								<td><?= $mit->penjelasan ?></td>
								<td><?= $mit->nilai ?></td>
								<td class="options-width">

									<a href="<?= Url::to(['mitra/disable-kontrak', 'id' =>$mit->id ]) ?>" title="Non Aktif" class="icon-disable info-tooltip"></a>
									<a href="index.php?r=mitra/edit-kontrak&id=<?= $mit->id ?>" title="Edit" class="icon-view-edit info-tooltip"></a>
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


<div class="clear"></div>
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\models\Delivery;

$this->title = 'Pembekalan Delivery';

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
						<div align="right" style="padding-bottom: 10px">

							<button type="button" onclick="location.href='<?= Url::to(['delivery/do-bekal']); ?>'" class="btn btn-info btn-lg">Buat Pembekalan Baru</button>	
						</div>

						<form class="form-inline" action="<?= Url::to(['delivery/list-pembekalan']); ?>" method="post" >
							<div class="form-group">
								<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
								<input type="text" name="nilai" class="form-control input-sm" id="exampleInputName2" placeholder="Search">
							</div>
							<div class="form-group">
								<select class="form-control input-sm" name="kolom">
									
									<option value="status">Status</option>
									<option value="id">Order ID</option>

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

								<th class="table-header-repeat line-left"><p>Nama Pembekalan</p>	</th>
								<th class="table-header-repeat line-left minwidth-1"><p>Nama Trainer</p></th>
								<th class="table-header-repeat line-left"><p>Tanggal & Waktu</p></th>
								<th class="table-header-repeat line-left"><p>Keterangan</p></th>
								
								<th class="table-header-repeat line-left"><p>Action</p></th>
								
							</tr>

							<?php $count=1;foreach ($order as $or): ?>

							

							<tr>
								
								<td><?= $or->nama_bekal ?></td>
								<td><?= $or->trainer_bekal ?></td>
								<td><?= $or->date_bekal. " ".$or->time_bekal ?></td>
								<td><?= $or->keterangan ?></td>
								
								<td class="options-width">

									<a href="<?= Url::to(['delivery/view-list-bekal2', 'id' =>$or->id ]) ?>" title="Tambahkan kandidat untuk pembekalan" class="icon-add-people info-tooltip"></a>
									
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
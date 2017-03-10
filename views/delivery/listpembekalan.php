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

							<button type="button" onclick="location.href='<?= Url::to(['delivery/do-bekal']); ?>'" class="btn btn-info btn-lg">Isi Pembekalan</button>	
						</div>

						<form class="form-inline" action="<?= Url::to(['order/list-order']); ?>" method="post" >
							<div class="form-group">
								<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
								<input type="text" name="nilai" class="form-control input-sm" id="exampleInputName2" placeholder="Search">
							</div>
							<div class="form-group">
								<select class="form-control input-sm" name="kolom">
									
									<option value="status">Status</option>

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

								<th class="table-header-repeat line-left"><p>No Order</p>	</th>
								<th class="table-header-repeat line-left minwidth-1"><p>Nama Mitra</p></th>
								<th class="table-header-repeat line-left"><p>QTY</p></th>
								<th class="table-header-repeat line-left"><p>Posisi</p></th>
								<th class="table-header-repeat line-left"><p># Belum Pembekalan</p></th>
								<th class="table-header-repeat line-left"><p>Status</p></th>
								
							</tr>

							<?php $count=1;foreach ($order as $or): ?>

							<?php
							$count = Delivery::find()
							->where(['orderid' => $or->id])
							->andWhere(['status' => 'Aktif'])
							->andWhere(['flag_pembekalan' => 'N'])
							->count();

							/** Hide jika semua kandidat sudah dibekali */
							if($count > 0){
							?>

							<tr>
								
								<td><?= $or->id ?></td>
								<td><?= $or->mitra->namamitra ?></td>
								<td><?= $or->qty ?></td>
								<td><?= $or->posisi ?></td>
								<td><?= $count ?></td>
								<td><?= $or->status ?></td>
								
							</tr>
						<?php } ?>

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
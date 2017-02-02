<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;


$this->title = 'List Test';
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
							<th width="30%">ID Kandidat</th>
							<th width="5%">:</th> 
							<th width="65%"><?= Html::encode($kandidat->kandidatid) ?></th>
						</tr>
						<tr>
							<th>Nama Kandidat</th>
							<th>:</th> 
							<th><?= Html::encode($kandidat->namalengkap) ?></th>
						</tr>

					</table>
					<!--  start top-search -->
					<div id="top-search-left">
						
						<button type="button" class="btn btn-primary btn-sm" onclick="location.href='<?= Url::to(['kandidat/new-test', 'id' =>$kandidat->id ]) ?>'">Hasil Test Baru</button>
					</div>

					<!--  end top-search -->
					<div class="clear"></div>

					<!--  start product-table ..................................................................................... -->
					<form id="mainform" action="">
						<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
							<tr>

								<th class="table-header-repeat line-left minwidth-1"><p>Nama Test</p>	</th>
								<th class="table-header-repeat line-left minwidth-1"><p>Hasil Test</p></th>
								<th class="table-header-repeat line-left minwidth-1"><p>Keterangan</p></th>

								<th class="table-header-options line-left"><p>Actions</p></th>
							</tr>
							<?php $count=1;foreach ($test as $mit): ?>
							<tr>

								<td><?= $mit->name_test ?></td>
								<td><?= $mit->result_test ?></td>
								<td><?= $mit->keterangan ?></td>
								<td class="options-width">

									<a href="<?= Url::to(['kandidat/disable-test', 'id' =>$mit->id ]) ?>" title="Non Aktif" class="icon-disable info-tooltip"></a>
									<a href="<?= Url::to(['kandidat/edit-test', 'id' =>$mit->id ]) ?>" title="Edit" class="icon-view-edit info-tooltip"></a>
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
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body> 
	<?php $this->beginBody() ?>
	<!-- Start: page-top-outer -->
	<div id="page-top-outer">    

		<!-- Start: page-top -->
		<div id="page-top">

			<!-- start logo -->
			<div id="logo">
				<a href=""><img src="twi/images/shared/logo-twin-u342.png" height="100" alt="" /></a>sadasd
			</div>
			<!-- end logo -->

			<!--  start top-search -->

			<!--  end top-search -->
			<div class="clear"></div>

		</div>
		<!-- End: page-top -->

	</div>
	<!-- End: page-top-outer -->
	
	<div class="clear">&nbsp;</div>

	<!--  start nav-outer-repeat................................................................................................. START -->
	<div class="nav-outer-repeat"> 
		<!--  start nav-outer -->
		<div class="nav-outer"> 

			<!-- start nav-right -->
			<div id="nav-right">

			<!-- div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="twi/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div-->
				<div class="nav-divider">&nbsp;</div>
				<a href="<?= Url::to(['site/logout']); ?>" id="logout"><img src="twi/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
				<div class="clear">&nbsp;</div>

				<!--  start account-content -->	
				<div class="account-content">
					<div class="account-drop-inner">
						<a href="" id="acc-settings">Settings</a>
						<div class="clear">&nbsp;</div>
						<div class="acc-line">&nbsp;</div>
						<a href="" id="acc-details">Personal details </a>
						<div class="clear">&nbsp;</div>
						<div class="acc-line">&nbsp;</div>
						<a href="" id="acc-project">Project details</a>
						<div class="clear">&nbsp;</div>
						<div class="acc-line">&nbsp;</div>
						<a href="" id="acc-inbox">Inbox</a>
						<div class="clear">&nbsp;</div>
						<div class="acc-line">&nbsp;</div>
						<a href="" id="acc-stats">Statistics</a> 
					</div>
				</div>
				<!--  end account-content -->

			</div>
			<!-- end nav-right -->

			<?php

			if($this->title == 'Tambah Kandidat Baru' || $this->title == 'Errror' || $this->title =='Kandidat Baru Sukses'){

				$kandidat = 'class="current"';
				$kan_sub = 'show';
				$kan_a = 'class="sub_show"';
				$kan_b = '';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';

			}elseif ($this->title == 'List Interview Kandidat Baru'  || $this->title == 'Interview Kandidat') {


				$kandidat = 'class="current"';
				$kan_sub = 'show';
				$kan_a = '';
				$kan_b = 'class="sub_show"';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';


			}elseif ($this->title == 'Pembayaran Kandidat Baru' || $this->title == 'Pembayaran Kandidat') {
				$kandidat = 'class="current"';
				$kan_sub = 'show';
				$kan_a = '';
				$kan_b = '';
				$kan_c = 'class="sub_show"';
				$kan_d = '';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';
			}elseif ($this->title == 'Database Kandidat') {
				$kandidat = 'class="current"';
				$kan_sub = 'show';
				$kan_a = '';
				$kan_b = '';
				$kan_c = '';
				$kan_d = 'class="sub_show"';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';
			}elseif ($this->title == 'List Mitra' || $this->title =='Kontrak Baru' || $this->title =='Ubah Kontrak' || $this->title =='List Kontrak' || $this->title =='Edit Mitra') {
	
				$kandidat = 'class="select"';
				$kan_sub = '';
				$kan_a = '';
				$kan_b = '';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="current"';
				$mit_sub = 'show';
				$mit_a ='class="sub_show"';
				$mit_b='';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';

			}elseif ($this->title == 'Tambah Mitra Baru') {
	
				$kandidat = 'class="select"';
				$kan_sub = '';
				$kan_a = '';
				$kan_b = '';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="current"';
				$mit_sub = 'show';
				$mit_a ='';
				$mit_b='class="sub_show"';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';

			}elseif ($this->title == 'List Order') {
	
				$kandidat = 'class="select"';
				$kan_sub = '';
				$kan_a = '';
				$kan_b = '';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="current"';
				$ord_sub = 'show';
				$ord_a ='class="sub_show"';
				$ord_b='';

			}elseif ($this->title == 'Order Baru') {
	
				$kandidat = 'class="select"';
				$kan_sub = '';
				$kan_a = '';
				$kan_b = '';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="current"';
				$ord_sub = 'show';
				$ord_a ='';
				$ord_b='class="sub_show"';

			}
			else{
				$kandidat = 'class="select"';
				$kan_sub = '';
				$kan_a = '';
				$kan_b = '';
				$kan_c = '';
				$kan_d = '';

				$mitra = 'class="select"';
				$mit_sub = '';
				$mit_a ='';
				$mit_b='';

				$order = 'class="select"';
				$ord_sub = '';
				$ord_a ='';
				$ord_b='';
			}
			?>

			<!--  start nav -->
			<div class="nav">
				<div class="table">

					<ul <?= $kandidat ?>><li><a href="#nogo"><b>Kandidat</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
						<div class="select_sub <?=$kan_sub ?>">
							<ul class="sub">
								<li <?= $kan_a ?>><a href="<?= Url::to(['kandidat/index']); ?>">Pendaftaran Kandidat</a></li>
								<li <?= $kan_b ?> ><a href="<?= Url::to(['kandidat/list']); ?>">Interview Kandidat</a></li>
								<li <?= $kan_c ?>><a href="<?= Url::to(['kandidat/list-bayar']); ?>">Pembayaran Kandidat</a></li>
								<li <?= $kan_d ?>><a href="<?= Url::to(['kandidat/list-all']); ?>">Database Kandidat</a></li>
							</ul>
						</div>
						<!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
				</ul>

				<div class="nav-divider">&nbsp;</div>

				<ul <?= $mitra ?>><li><a href="#nogo"><b>Mitra</b><!--[if IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]-->
					<div class="select_sub <?=$mit_sub ?>">
						<ul class="sub">
							<li <?= $mit_a ?>><a href="<?= Url::to(['mitra/list']); ?>">Database Mitra</a></li>
							<li <?= $mit_b ?>><a href="<?= Url::to(['mitra/index']); ?>">Tambah Mitra</a></li>
						</ul>
					</div>
					<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
			</ul>

			<div class="nav-divider">&nbsp;</div>

			<ul <?= $order ?>><li><a href="#nogo"><b>Order</b><!--[if IE 7]><!--></a><!--<![endif]-->
				<!--[if lte IE 6]><table><tr><td><![endif]-->
				<div class="select_sub <?=$ord_sub ?>">
					<ul class="sub">
						<li <?= $ord_a ?>><a href="<?= Url::to(['order/list-order']); ?>">Daftar Order</a></li>
						<li <?= $ord_b ?>><a href="<?= Url::to(['order/index']); ?>">Tambah Order</a></li>

					</ul>
				</div>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Delivery</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
			<div class="select_sub">
				<ul class="sub">
					<li><a href="<?= Url::to(['delivery/list-deliv']); ?>">Preparing</a></li>
					<li><a href="<?= Url::to(['delivery/list-checklist']); ?>">Checklist</a></li>
					<li><a href="">Pembekalan</a></li>
					<li><a href="">Testing</a></li>

				</ul>
			</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
	</ul>

	<div class="nav-divider">&nbsp;</div>


	<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

<div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
	<!-- start content -->
	<div id="content">

		<?= $content ?>

	</div>
	<!--  end content -->
	<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->



<div class="clear">&nbsp;</div>

<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
		Powered by &copy; Realtek Teknologi <?= date('Y') ?> </div>
		<!--  end footer-left -->
		<div class="clear">&nbsp;</div>
	</div>
	<!-- end footer -->
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
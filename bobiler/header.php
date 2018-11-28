<?php 
ob_start();
session_start();
include 'admin/netting/baglan.php';
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $ayarcek['ayar_title']; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<link href="//fonts.googleapis.com/css?family=Oswald:400,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="page">
		<div class="uk-hidden"></div>
		<div class="bobi-top-spacer bobi-placeholder bobi-fixed-menu"></div>
		<div class="bobi-top-container">
			<header class="bobi-top-menu-header">
				<div class="bobi-max-width uk-container-center">
					<div class="uk-grid">
						<div class="bobi-top-logo-column uk-width-6-10">
							<a href="index.php" style="border:none;">
								<img src="img/ak_bobiler.png" alt="bobiler">
							</a>
							<div class="bobi-top-tab-holder">
								<nav class="bobi-feed-tab uk-margin-bottom bobi-menu-tab bobi-make-static">
									<ul class="home-page-tabs bobi-tab uk-tab uk-width-small-1-1">
										<li class="uk-active"><a href="#">SÜPIRLAR</a></li>
										<li><a href="#">GÜZİDELER</a></li>
										<li><a href="#">YENİLER</a></li>
									</ul>
									<ul class="bobi-sub-tab uk-tab uk-width-small-1-1">
										<li>
											<a href="#">Dünün En Çok Oylanan Monteleri </a>
										</li>
										<li><span>|</span></li>
										<li>
											<a href="#">Son Haftanın En Çok Oylanan Monteleri </a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="bobi-top-menu-column uk-width-4-10">
							<nav class="uk-align-right bobi-top-menu-nav uk-hidden">
								<div class="bobi-dark-button bobi-quick-search">
									<input type="search" name="search" value="" autocomplete="off">
								</div>
								<div id="bobi-quick-search-results" class="uk-hidden"></div>
								<a href="hesapkaydol.php" class="bobi-dark-button">KATIL</a>
								<a href="hesapgiris.php" class="bobi-dark-button">GİRİŞ <i class="bobi-icon i-kafa"></i></a>
								<a href="monteyuklemekicin.php" class="bobi-dark-button desktop-button bobi-gold-button">YÜKLE</a>
							</nav>
						</div>
					</div>
				</div>
			</header>
		</div>
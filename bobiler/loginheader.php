<?php 
ob_start();
session_start();
include 'admin/netting/baglan.php';
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
	'mail' => $_SESSION['kullanici_mail']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if($say==0) {
	Header("Location:hesapgiris.php?durum=izinsiz");
}
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
		<div class="uk-hidden" id="notificationArea"></div>
		<div class="bobi-top-spacer bobi-placeholder bobi-fixed-menu"></div>
		<div class="bobi-top-container">
			<header class="bobi-top-menu-header">
				<div class="bobi-max-width uk-container-center">
					<div class="uk-grid">
						<div class="bobi-top-logo-column uk-width-6-10">
							<a href="loginindex.php" style="border:none;">
								<img src="img/ak_bobiler.png" alt="bobiler">
							</a>
						</div>
						<div class="bobi-top-menu-column uk-width-4-10">
							<div class="bobi-topmenu-response bobi-top-menu-switch uk-align-right">

							</div>
							<nav class="uk-align-right bobi-top-menu-nav uk-hidden">
								<div class="bobi-dark-button bobi-quick-search">
									<input type="search" name="search" value="" autocomplete="off">
								</div>
								<div id="bobi-quick-search-results" class="uk-hidden"></div>
								<a href="mesaj.php" class="bobi-dark-button bobi-message bobi-btn-black">
									<span class="bobi-sakla">MESAJ</span> <i class="bobi-icon i-messages"></i>
									<span class="uk-badge uk-badge-notification userMessageCount"></span>
								</a>
								<ul class="uk-list userMessageList uk-hidden"></ul>
								
								
								<a href="profil.php?kullaniciID=<?=$kullanicicek['kullanici_id'];?>" class="bobi-dark-button bobi-btn-black desktop-button">BEN</a>	
								<a href="monteyeni.php" class="bobi-dark-button desktop-button bobi-gold-button">YÜKLE</a>
								<a href="cikis.php" onclick="cikisYap()" class="bobi-dark-button desktop-button" name="cikisyap">ÇIKIŞ</a>

								<script>
									function cikisYap() {
										alert("Çıkış yapılıyor...");
									}
								</script>

							</nav>
						</div>
					</div>
				</div>
			</header>
		</div>
<?php
include 'loginheader.php'; 

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id' => $_SESSION['kullanici_id']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>

	<main class="bobi-max-width bobi-main uk-container-center">
		<div class="uk-grid">
			<div class="uk-width-1-1">
				<section class="uk-width-1-1">
					<div class="uk-grid bobi-user-profile uk-grid-divider">
						<nav class="bobi-feed-tab bobi-page-tab uk-width-small-1-1">
							<ul class="bobi-tab uk-tab uk-width-small-1-1">
								<li class="uk-active">
									<a href="#">GENEL BiLGiLER</a>
								</li>
								<li>
									<a href="profilsosyalmedya.php">SOSYAL AYARLAR</a>
								</li>
							</ul>
						</nav>

						<form action="admin/netting/islem.php" class="uk-form uk-width-1-1" id="editForm" method="POST" enctype="multipart/form-data">

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5">Avatar</label>
								<div class="bobi-form-element uk-width-1-2">
									<a class="uk-form-file uk-button bobi-upload-button">dosya seçiniz<input id="upload-select" name="kullanici_avatar" type="file"></a>
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5">Üye adı</label>
								<div class="bobi-form-element uk-width-1-2">
									<input class="uk-width-1-1" disabled="disabled" name="kullanici_nick" type="text" value="<?php echo $kullanicicek['kullanici_nick']; ?>">
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5">Email</label>
								<div class="bobi-form-element uk-width-1-2">
									<input maxlenght="60" class="uk-width-2-4 mask-email" name="kullanici_mail" type="mail" value="<?php echo $kullanicicek['kullanici_mail']; ?>" maxlength="60" autocomplete="off">
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5" >İsim Soyad</label>
								<div class="bobi-form-element uk-width-1-2">
									<input class="uk-width-1-1 mask-fullname" name="kullanici_ad" type="text" value="<?php echo $kullanicicek['kullanici_ad']; ?>" maxlength="80" autocomplete="off">
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5" for="f4">Web siten varsa</label>
								<div class="bobi-form-element uk-width-1-2">
									<input name="kullanici_website" type="text" value="<?php echo $kullanicicek['kullanici_website']; ?>" maxlength="80" autocomplete="off">
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5">Hangi ülkedesin?</label>
								<div class="bobi-form-element uk-width-1-2">
									<input type="text" name="kullanici_ulke" value="<?php echo $kullanicicek['kullanici_ulke']; ?>">
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5" for="Birthdate">Doğum tarihin?</label>
								<div class="bobi-form-element uk-width-1-2">
									<input type="date" class="uk-width-2-4 mask-date" name="kullanici_dtarihi" value="<?php echo $kullanicicek['kullanici_dtarihi']; ?>" maxlength="10" autocomplete="off">
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5" for="f8">Cep telefonun? *</label>
								<div class="bobi-form-element uk-width-1-2">
									<input class="uk-width-1-1 mask-gsm" name="kullanici_ceptel" type="text" value="<?php echo $kullanicicek['kullanici_ceptel']; ?>" maxlength="12" autocomplete="off">
									<p>*Bazen garip durumlarda ya da telif ödemesi vs söz konusuysa iletişime geçmek gerekiyor. O yüzden sormaktayızdır.</p>
								</div>
							</div>

							<div class="uk-grid">
								<label class="bobi-title-label uk-width-1-5" for="f12">Hakkında</label>
								<div class="bobi-form-element uk-width-1-2">
									<textarea class="uk-width-1-1" cols="20" id="f12" maxlength="400" name="kullanici_hakkinda" placeholder="En fazla 400 karakter." rows="2"></textarea>
								</div>
							</div>

							<hr>

							<div class="uk-grid">
								<button type="submit" name="kullanicibilgiguncelle" class="bobi-dark-button uk-align-right">&nbsp;&nbsp;&nbsp; kaydet <i class="icon icon-check-white"></i></button>
							</div>
						</fieldset>
					</form>		</div>
				</section>
			</div>

		</div>
	</main>
</div>
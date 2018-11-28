<?php include 'header.php'; ?>

<main class="bobi-max-width bobi-main uk-container-center">
	<div class="uk-grid">
		<section class="uk-width-1-1">
			<div class="uk-grid bobi-sign-in bobi-login uk-grid-divider">
				<div class="uk-width-medium-1-2">
					<div class="bobi-panel-grey">
						<h5>Sevgili Sen,</h5>
						<p>Aşağıda yazanları bilmeyenler üzerinde yaptığımız bir ankette çoğunun bunları bilmediğini gördük. Bu bizi üzdü.</p>
						<p>Şimdi şöyle:</p>
						<ul class="uk-list">
							<li>· Bobiler.örg cisimleri, olayları, kavramları, insanları, yerleri, kısaca her şeyi yeniden tasarladığımız bir yer. Birlike yarattığımız bir paralel evren. Aksi düşünülemez.</li>
							<li>· Bobiler.örg'e sadece kendi yaptığın şeyleri gönderebilirsin. Copy paste yapmak yok.</li>
							<li>· Burayı img board / forum / sözlük / çatal formatinda kullanmazsan Sevinç Teyze.</li>
							<li>· Copy paste'te ısrar edersen Chuck Norris.</li>
						</ul>
					</div>
					<br>
				</div>
				<div class="uk-width-medium-1-2">
					<form action="admin/netting/islem.php" class="uk-form uk-width-1-1" id="registrationForm" role="form" method="POST"> 
						<fieldset>
							<hgroup class="uk-grid">
								<h2 class="uk-width-small-1-4">üye ol</h2>
								<div class="uk-width-small-3-4 uk-button-group bobi-socialmedia uk-align-right">
								</div>
							</hgroup>
							<hr>

							<div class="uk-form-row">
								<input class="uk-form-width-medium mask-nick" name="kullanici_nick" placeholder="nick" type="text" maxlength="60">
							</div>

							<div class="uk-form-row">
								<input class="uk-form-width-medium mask-email"  name="kullanici_mail" placeholder="email" type="email" maxlength="60">
							</div>

							<div class="uk-form-row">
								<div class="uk-form-password">
									<input  class="uk-form-width-medium" name="kulanici_sifrebir" placeholder="şifre" type="password">
								</div>
							</div>

							<div class="uk-form-row">
								<div class="uk-form-password">
									<input class="uk-form-width-medium" name="kulanici_sifreiki" placeholder="şifre tekrar" type="password">

								</div>
							</div>
							<hr>

							<div class="uk-form-row">
								<button type="submit" name="kullanicikaydet" class="bobi-dark-button uk-align-right">kaydet <i class="icon icon-check-white"></i></button>
							</div>

							<?php if (@$_GET['durum']=="farklisifre") { ?>
							<div style="background-color: #f5dfdf;border-color: #ce9e9e; text-align: center;">
								<span><strong>Şifreler eşleşmiyor !</strong></span>
							</div> 
							<?php } ?>

							<?php if (@$_GET['durum']=="mukerrerkayit") { ?>
							<div style="background-color: #f5dfdf;border-color: #ce9e9e; text-align: center;">
								<span><strong>Bu mail hesabıyla kayıtlı bir kullanıcımız zaten var !</strong></span>
							</div>
							<?php } ?>

							<?php if (@$_GET['durum']=="basarisiz") { ?>
							<div style="background-color: #f5dfdf;border-color: #ce9e9e; text-align: center;">
								<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
							</div>
							<?php } ?>

						</fieldset>
					</form>
				</div>
			</div>
		</section>
	</div>
</main>

</div>
</body>
</html>
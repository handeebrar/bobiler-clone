<?php include 'header.php'; ?>
<main class="bobi-max-width bobi-main uk-container-center">

	<div class="uk-grid">

		<section class="uk-width-1-1">
			<div class="uk-grid bobi-login uk-grid-divider">
				<div class="uk-width-1-3 uk-visible-large">
					<img src="img/robot01.jpg" alt="">
				</div>
				<form action="admin/netting/islem.php" class="uk-form uk-width-2-3" method="POST">
					<input id="ReturnUrl" name="ReturnUrl" type="hidden" value="/">          
					<hgroup class="uk-grid">
						<h2 class="uk-width-small-1-4">Giriş</h2>
						<div class="uk-width-small-3-4 uk-button-group bobi-socialmedia uk-align-right uk-text-right">
							<a href="hesapkaydol.php"><i class="icon icon-bobi-white"></i><b>üye ol</b></a>
						</div>
					</hgroup>
					<hr>

					<div class="uk-form-row">
						<input class="uk-form-width-medium" type="text" name="kullanici_mail" placeholder="email">
					</div>

					<div class="uk-form-row">
						<input class="uk-form-width-medium" name="kullanici_sifre" placeholder="şifre" type="password">
					</div>
					<hr>
					<div class="uk-form-row">
						<a href="#" class="uk-button bobi-passive-button">şifre neydi?</a>
						<button type="submit" name="kullanicigiris" class="bobi-dark-button uk-align-right">giriş <i class="icon icon-check-white"></i></button>

							<?php if (@$_GET['durum']=="basarisizgiris") { ?>
							<div style="background-color: #f5dfdf;border-color: #ce9e9e; text-align: center;">
								<span><strong>Mail Adresi veya Şifre Hatalı !</strong></span>
							</div> 
							<?php } ?>
					</div>
				</fieldset>
			</form>    </div>
		</section>

	</div>
</main>
</div>
</body>
</html>
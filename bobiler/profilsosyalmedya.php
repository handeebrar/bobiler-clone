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
							<li>
								<a href="profilbilgilerim.php">GENEL BiLGiLER</a>
							</li>
							<li class="uk-active">
								<a href="profilsosyalmedya.php">SOSYAL AYARLAR</a>
							</li>
						</ul>
					</nav>

					<form action="admin/netting/islem.php" class="uk-form uk-width-1-1 uk-margin-large-bottom" method="POST">
						<input id="socialType" name="socialType" type="hidden" value=""><input id="socialmediaNick" name="socialmediaNick" type="hidden" value=""><input id="privacy" name="privacy" type="hidden" value="">            <fieldset>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Behance</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="1">
											<div class="txtSocial txtSocial-Active" id="1">
												http://be.net/<input id="url1" name="kullanici_behance" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>


								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Blogger</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="2">
											<div class="txtSocial" id="2">
												http://<input id="kullanici_blogger" name="url2" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Dribbble</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="3">
											<div class="txtSocial" id="3">
												http://dribble.com/<input id="kullanici_dribble" name="kullanici_dribble" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Eksi</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="4">
											<div class="txtSocial" id="4">
												http://eksisozluk.com/<input id="url4" name="kullanici_eksi" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">FacebookFanPage</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="6">
											<div class="txtSocial" id="6">
												http://facebook.com/<input id="url6" name="kullanici_facebookfanpage" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Facebook</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="5">
											<div class="txtSocial" id="5">
												http://facebook.com/<input id="url5" name="kullanici_facebook" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Flickr</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="8">
											<div class="txtSocial" id="8">
												http://flickr.com/<input id="url8" name="kullanici_flickr" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>


								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">Foursquare</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="9">
											<div class="txtSocial" id="9">
												http://foursquare.com/<input id="url9" name="kullanici_foursquare" autocomplete="off" class="socialAccountTextBox" value="" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
							<div class="uk-grid uk-margin-small-top">
								<label class="bobi-title-label uk-width-1-5" for="f1">GooglePlus</label>
								<div class="bobi-form-element uk-width-4-6">
									<div class="uk-float-left uk-width-3-6">
										<label for="10">
											<div class="txtSocial" id="10">
												http://plus.google.com/<input id="url10" name="url10" autocomplete="off" class="socialAccountTextBox" value="kullanici_googleplus" placeholder="..." style="width:160px;height:27px;border:none;margin-bottom:3px;padding-left:0;" type="text">
											</div>
										</label>

									</div>

								</div>
							</div>
					
				
		

							<div class="uk-grid">
								<button type="submit" name="sosyalmedyaguncelle" class="bobi-dark-button uk-align-right">&nbsp;&nbsp;&nbsp; kaydet <i class="icon icon-check-white"></i></button>
							</div>

						</fieldset>
					</form>	</div>
				</section>
			</div>

		</div>
	</main>
</div>
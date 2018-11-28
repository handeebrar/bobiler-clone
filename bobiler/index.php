<?php include 'header.php'; 

$montesor=$db->prepare("SELECT * FROM monte");
$montesor->execute();
$montecek=$montesor->fetch(PDO::FETCH_ASSOC);

?>

<main class="bobi-max-width bobi-main uk-container-center">
	<div style="width:100%;text-align:center;padding-bottom:10px"></div>
	<div class="uk-grid">
		<section class="uk-width-medium-10-10">
			<nav class="bobi-feed-tab bobi-page-tab uk-margin-bottom">
				<div class="bobi-feed-type-switch uk-float-right">
					<div>
						<button type="button" class="uk-button bobi-filter" style="display:none;">
							<i class="uk-icon-small uk-icon-cog"></i>
						</button>
					</div>
				</div>
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
		</section>
		<section class="uk-width-medium-6-10">
			<!-- FEED -->
			<ul id="bobi-content-feed" class="uk-list">
				<li id="" class="bobi-feed-monte" >


					<?php 
					date_default_timezone_set('Europe/Istanbul');
					function XZamanOnce($zaman){
						$zaman = strtotime($zaman);
						$zaman_farki = time() - $zaman;
						$saniye = $zaman_farki;
						$dakika = round($zaman_farki/60);
						$saat	= round($zaman_farki/3600);
						$gun	= round($zaman_farki/86400);
						$hafta	= round($zaman_farki/604800);
						$ay		= round($zaman_farki/2419200);
						$yil	= round($zaman_farki/29030400);

						if($saniye < 60 ){
							if($saniye == 0){
								return "az önce";
							}else {
								return $saniye .' saniye önce';
							}
						}else if($dakika < 60){
							return $dakika.' dakika önce';
						}else if($saat < 24){
							return $saat.' saat önce';
						}else if($gun < 7){
							return $gun.' gün önce';
						}else if($hafta < 4){
							return $hafta.' hafta önce';
						}else if($ay < 12){
							return $ay.' ay önce';
						}else{
							return $yil.' yıl önce';
						}
					}
					?>


					<?php
					$montesor=$db->prepare("SELECT * FROM monte INNER JOIN kullanici ON monte.kullanici_id=kullanici.kullanici_id ORDER BY monte_id DESC");
					$montesor->execute();
					while($montecek=$montesor->fetch(PDO::FETCH_ASSOC)) { ?>
						<article class="uk-grid uk-grid-small">
							<address class="bobi-feed-profile uk-width-small-1-6">
								<a href="profil.php?kullaniciID=<?=$montecek['kullanici_id'];?>" class="uk-thumbnail uk-border-rounded">
									<div class="uk-thumbnail-caption uk-text-small"><?=$montecek["kullanici_nick"]?></div>
									<div class="avatar-holder">
										<img src="avatar/<?php echo $montecek['kullanici_avatar']; ?>" alt="<?=$montecek["kullanici_nick"]?>" class="avatar uk-border-rounded">
									</div>
								</a>
								<aside class="bobi-feed-share uk-clearfix">
									<div class="bobi-monte-controls">
										<a href="#" class="btnBobiLike">
											<i class="icon icon-bobi-white "></i>
											<b>oy ver</b>
										</a>
									</div>
								</aside>
							</address>

							<div class="uk-width-small-5-6 bobi-feed-post">

								<div class="bobi-feed-headline uk-grid uk-grid-small" >
									<div class="uk-width-4-5 bobi-feed-headline-left">
										<h2 class="uk-margin-remove">
											<?php echo $montecek['monte_baslik'] ?>
										</h2>
									</div>



									<div class="uk-width-1-5 bobi-feed-headline-right">
										<abbr class="timeago uk-float-right" style="line-height: 100%;font-size:12px;color:#999" title=""> <?php echo XZamanOnce($montecek['monte_zaman']);  ?></abbr>
									</div>
								</div>



								<figure class="bobi-feed-image postImageWrapper uk-border-rounded">

									<div>
										<img src="monte/<?php echo $montecek['monte_gorsel']; ?>">
									</div>

									<figcaption class="bobi-monte-description uk-text-left">
										<?php echo $montecek['monte_aciklama']; ?>
									</figcaption>


								</figure>
						
								<div>

									<ul class="bobi-comment-list bobi-show-small">
										<li></li>
										<form action="admin/netting/islem.php" method="POST">
											<li class="bobiler-feed-comment-box uk-form">
												<ul class="bobi-comment-list bobi-show-small">
													<li></li>
													<li class="bobiler-feed-comment-box uk-form">
														<textarea class="uk-width-1-1" placeholder="yorum yazmak için giriş yapın" disabled=""></textarea>
													</li>
												</ul>

												<?php 
												$yorumsor=$db->prepare("SELECT * FROM yorum WHERE monte_id=:monte_id");
												$yorumsor->execute(array(
													'monte_id' => $montecek['monte_id']
												));

												while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) { 

													$kullanici_sor = $db->prepare("SELECT kullanici_nick FROM kullanici WHERE kullanici_id=:kullanici_id");
													$kullanici_sor->execute(array(
														'kullanici_id' => $yorumcek['kullanici_id']
													));
													$kullanici_cek=$kullanici_sor->fetch(PDO::FETCH_ASSOC);

													$yorumayorumsor=$db->prepare("SELECT * FROM yoruma_yorum WHERE yorum_id=:yorum_id");
													$yorumayorumsor->execute(array(
														'yorum_id' => $yorumcek['yorum_id']
													));

													?>
													<div class="bobi-comment uk-width-9-10">
														<p>
															<a href="profil.php?kullaniciID=<?=$yorumcek['kullanici_id'];?>"><strong><?=$kullanici_cek['kullanici_nick'] ?> :&nbsp;</strong></a>
															<span class="commentBody"><?=$yorumcek['yorum_icerik'] ?></span>
														</p>
													</div>

													<?php while ($yorumayorumcek=$yorumayorumsor->fetch(PDO::FETCH_ASSOC)) {

														$kullanici_sorr = $db->prepare("SELECT kullanici_nick FROM kullanici WHERE kullanici_id=:kullanici_id");
														$kullanici_sorr->execute(array(
															'kullanici_id' => $yorumayorumcek['kullanici_id']
														));
														$kullanici_cekk=$kullanici_sorr->fetch(PDO::FETCH_ASSOC);

														?>
														<div class="bobi-comment uk-width-9-10">
															<p style="margin-top: 20px;margin-left: 50px;">
																<a href="profil.php?kullaniciID=<?=$yorumayorumcek['kullanici_id'];?>"><strong><?=$kullanici_cekk['kullanici_nick'] ?> :&nbsp;</strong></a>
																<span class="commentBody"><?=$yorumayorumcek['yoruma_yorum_icerik'] ?></span>
															</p>
														</div>
														<?php } ?>

													</form>


													<?php } ?>
												</li>

											</ul>
										</div>
										
									</div>
								</article>
								<?php } ?>


							</li>
						</ul>
						<img id="img-bobi-loader" style="padding-left:90px;" class="uk-align-center uk-hidden" src="/img/loading-t.gif">
						
					</section>
					
					
					<style>
					.sidebarSektors ul li h3 a {
						color: #A7A39E;
					}

					.sidebarSektors ul li.uk-active h3 a {
						color: #646260 !important;
					}

					.sidebarSektors ul li .sidebar-most-rated-contents {
						max-height: 280px;
						padding-top: 15px;
						overflow: hidden;
						position: relative;
					}

					.imgSidebarContent {
						position: absolute;
						z-index: 999;
						width: 80px;
						top: 37%;
						left: 37%;
					}
				</style>

				<section id="bobi-sidebar" class="uk-panel bobi-hararet uk-width-medium-4-10 uk-margin-bottom uk-float-right uk-hidden-small">
					<style>
					.bobi-hararet ul li h3 a {
						color: #A7A39E;
					}

					.bobi-hararet ul li.uk-active h3 a {
						color: #8e8b87;
					}
				</style>

				<div class="bobi-panel-grey">
					<!-- facebook -->
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fbobiler&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=145176628832831" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:258px;" allowtransparency="true"></iframe>
				</div>


			</section>
		</div>
	</main>
</div>
</body>
</html>
	<?php include 'loginheader.php'; ?>

	<main class="bobi-max-width bobi-main uk-container-center">
		<div class="uk-grid">
			<div id="newContent" class="uk-width-1-1"></div>



			<form action="admin/netting/islem.php" class="uk-form uk-form-horizontal uk-width-1-1 uk-margin-bottom" id="contentform" method="POST" enctype="multipart/form-data">    <fieldset>
				<legend class="uk-margin-small-bottom">Orijinal Monte Yükleme Fasilitesi</legend>
				<div class="uk-grid">
					<div class="uk-width-5-10">

						

						<div id="rowUpload" class="uk-form-row">
							<label class="uk-form-label">Görsel dosyası <b>(*)</b></label>
							<div class="uk-form-controls">
								<a class="uk-form-file uk-button bobi-upload-button">dosya seçiniz<input id="upload-select" name="monte_gorsel" type="file"></a>
							</div> 
					</div>

					<div class="uk-form-row">
						<label class="uk-form-label">Başlık <b>(*)</b></label>
						<div class="uk-autocomplete uk-form-controls">
							<input autocomplete="off" id="monte_title" maxlength="60" name="monte_baslik" style="width:280px;" type="text" value="" > <span class="characters-left" style="color:#a4a4a4;display:none;">60</span>
						</div>
					</div>

					<div class="uk-form-row uk-margin-bottom">
						<label class="uk-form-label">Açıklaması</label>
						<div class="uk-form-controls">
							<textarea cols="20" id="model_description" name="monte_aciklama" rows="2" style="width:280px; height:100px; resize:none;"></textarea>
						</div>
					</div>

					<div class="uk-form-row ">
						<label class="uk-form-label">Etiketleri <b>(*)</b></label>

						<div class="uk-form-controls">
							<div id="montetagcontainer" class="uitag-container">
								<?php  

									//$monte_id=$montecek['etiket_id']; 
								$etiketsor=$db->prepare("select * from etiket where etiket_durum = '1' ");
								$etiketsor->execute();

								?>
								<select name="etiket_id" required="">
									<?php 

									while($etiketcek=$etiketsor->fetch(PDO::FETCH_ASSOC)) {

										$etiket_id=$etiketcek['etiket_id'];

										?>

										<option  value="<?php echo $etiketcek['etiket_id']; ?>"><?php echo $etiketcek['etiket_adi']; ?></option>

										<?php } ?>
									</select></div>
								</div>
							</div>

							<div class="uk-form-row">
								<span class="uk-form-label">Kim olarak göndereceksiniz?</span>
								<div class="uk-form-controls">
									<label>
										<input type="radio" name="monte_kim" value="1" checked="checked" > ... olarak gönder</label><br>
										<label><input type="radio" name="monte_kim" value="0" > isimsiz olarak gönder</label><br>
										<label><input type="radio" name="monte_kim" value="2" > süpır olursa ismim görünsün* (riyakar modu)</label><br>
									</div>
								</div>

								<div class="uk-form-row">
									<span class="uk-form-label">Kategorisi <b>(*)</b></span>
									<div class="uk-form-controls">
										<div id="contentTypeList">
											<?php  

									//$monte_id=$montecek['kategori_id']; 
											$kategorisor=$db->prepare("select * from kategori ");
											$kategorisor->execute();

											?>
											<?php 

											while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

												$kategori_id=$kategoricek['kategori_id'];

												?>

												<label><input type="radio" name="kategori_id" value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></label><br>
												<?php } ?>
											</div>
										</div>
									</div>


										<!-- <div class="uk-form-row">
											<span class="uk-form-label">&nbsp;</span>
											<div class="uk-form-controls">
												<label>
													<input checked="checked" id="CanComment" name="CanComment" type="checkbox" value="true" ><input name="CanComment" type="hidden" value="false" > Yorum eklenebilsin
												</label>

											</div>
										</div> -->



										<div class="uk-form-row">
											<span class="uk-form-label">&nbsp;</span>
											<button type="submit" name="monteekle" class="uk-button uk-button-primary" style="margin-left: 0;" > paralel evrene gönder </button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</main>
			</div>
		</div>
	</body>
	</html>
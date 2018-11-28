<?php 
ob_start();
session_start();
include 'baglan.php';

if (isset($_POST['logoduzenle'])) {

	$uploads_dir = '../../img';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));


	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


if (isset($_POST['kullanicikaydet'])) {

	$kullanici_nick=htmlspecialchars($_POST['kullanici_nick']); 
	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	$kulanici_sifrebir=$_POST['kulanici_sifrebir']; 
	$kulanici_sifreiki=$_POST['kulanici_sifreiki']; 

	if ($kulanici_sifrebir==$kulanici_sifreiki) {

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
		$kullanicisor->execute(array(
			'mail' => $kullanici_mail
		));

		$say=$kullanicisor->rowCount();

		if ($say==0) {

			$password=md5($kulanici_sifrebir);
			$kullanici_yetki=1;
			$kullanici_durum=1;

			//Kullanıcı kayıt işlemi
			$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
				kullanici_nick=:kullanici_nick,
				kullanici_mail=:kullanici_mail,
				kullanici_sifre=:kullanici_sifre,
				kullanici_yetki=:kullanici_yetki,
				kullanici_durum=:kullanici_durum
				");
			$insert=$kullanicikaydet->execute(array(
				'kullanici_nick' => $kullanici_nick,
				'kullanici_mail' => $kullanici_mail,
				'kullanici_sifre' => $password,
				'kullanici_yetki' => $kullanici_yetki,
				'kullanici_durum' => $kullanici_durum
			));

			if ($insert) {
				header("Location:../../hesapgiris.php?durum=kayitbasarili");
			} else {
				header("Location:../../hesapkaydol.php?durum=basarisiz");
			}

		} else {
			header("Location:../../hesapkaydol.php?durum=mukerrerkayit");
		}
	} else {
		header("Location:../../hesapkaydol.php?durum=farklisifre");
	}
}


if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_durum' => $_POST['kullanici_durum']
	));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if($_GET['kullanicisil']=="ok") {
	$sil = $db->prepare("DELETE FROM kullanici WHERE kullanici_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET['kullanici_id']
	));

	if($kontrol) {
		header("Location:../production/kullanici.php?sil=ok");
	} else {
		header("Location:../production/kullanici.php?sil=no");
	}
}


if(isset($_POST['kullanicigiris'])){

	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_sifre=md5($_POST['kullanici_sifre']); 



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_sifre=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_sifre,
		'durum' => 1
	));
	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

	$say=$kullanicisor->rowCount();	

	if ($say==1) {
		$_SESSION['oturum_kontrol'] = true;
		$_SESSION['kullanici_id'] =  $kullanicicek['kullanici_id'];
		$_SESSION['kullanici_nick'] = $kullanicicek['kullanici_nick'];
		$_SESSION['kullanici_mail']=$kullanicicek['kullanici_mail'];
		header("Location:../../loginindex.php?id=".$_SESSION["kullanici_id"]);
		exit;

	} else {


		header("Location:../../hesapgiris.php?durum=basarisizgiris");

	}

}


if(isset($_POST['admingiris'])) {

	$kullanici_mail = $_POST['kullanici_mail'];
	$kulanici_sifre = md5($_POST['kullanici_sifre']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_sifre=:sifre and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'sifre' => $kulanici_sifre,
		'yetki' => 5
	));

	$say = $kullanicisor->rowCount();

	if($say==1){

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;
	}else {
		header("Location:../production/login.php?durum=no");
		exit;
	}
}


if (isset($_POST['genelayarkaydet'])) {

	//Tablo Güncelleme
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0
		");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));

	if ($update) {
		header("Location:../production/genel-ayar.php?durum=ok");
	} else {
		header("Location:../production/genel-ayar.php?durum=no");
	}
}


if (isset($_POST['iletisimayarkaydet'])) {

	//Tablo Güncelleme
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0
		");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']
	));

	if ($update) {
		header("Location:../production/iletisim-ayar.php?durum=ok");
	} else {
		header("Location:../production/iletisim-ayar.php?durum=no");
	}
}


if (isset($_POST['kullanicibilgiguncelle'])) {

	$images=$_FILES['kullanici_avatar']['name'];
	$tmp_dir=$_FILES['kullanici_avatar']['tmp_name'];
	$imageSize=$_FILES['kullanici_avatar']['size'];

	$upload_dir='../../avatar/';
	$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
	$valid_extensions=array('jpeg','jpg','png','gif','pdf');
	$picMonte=rand(1000,1000000).".".$imgExt;
	move_uploaded_file($tmp_dir, $upload_dir.$picMonte);
	
	//Tablo Güncelleme
	$kullanicibilgikaydet=$db->prepare("UPDATE kullanici SET
		kullanici_avatar=:kullanici_avatar,
		kullanici_mail=:kullanici_mail,
		kullanici_ad=:kullanici_ad,
		kullanici_website=:kullanici_website,
		kullanici_ulke=:kullanici_ulke,
		kullanici_dtarihi=:kullanici_dtarihi,
		kullanici_ceptel=:kullanici_ceptel,
		kullanici_hakkinda=:kullanici_hakkinda
		WHERE kullanici_id=:kullanici_id
		");

	$bilgiupdate=$kullanicibilgikaydet->execute(array(
		'kullanici_avatar' => $picMonte,
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_website' => $_POST['kullanici_website'],
		'kullanici_ulke' => $_POST['kullanici_ulke'],
		'kullanici_dtarihi' => $_POST['kullanici_dtarihi'],
		'kullanici_ceptel' => $_POST['kullanici_ceptel'],
		'kullanici_hakkinda' => $_POST['kullanici_hakkinda'],
		'kullanici_id' => $_SESSION['kullanici_id']
	));

	if ($bilgiupdate) {
		header("Location:../../profilbilgilerim.php?durum=guncellendi");
	} else {
		header("Location:../../profilbilgilerim.php?durum=guncellenemedi");
	}
}

if (isset($_POST['sosyalmedyaguncelle'])) {

	//Tablo Güncelleme
	$sosyalmedyakaydet=$db->prepare("UPDATE kullanici SET
		kullanici_behance=:kullanici_behance,
		kullanici_blogger=:kullanici_blogger,
		kullanici_dribble=:kullanici_dribble,
		kullanici_eksi=:kullanici_eksi,
		kullanici_facebookfanpage=:kullanici_facebookfanpage,
		kullanici_facebook=:kullanici_facebook,
		kullanici_flickr=:kullanici_flickr,
		kullanici_foursquare=:kullanici_foursquare,
		kullanici_googleplus=:kullanici_googleplus
		WHERE kullanici_id=:kullanici_id
		");

	$sosyalmedyaupdate=$sosyalmedyakaydet->execute(array(
		'kullanici_behance' => $_POST['kullanici_behance'],
		'kullanici_blogger' => $_POST['kullanici_blogger'],
		'kullanici_dribble' => $_POST['kullanici_dribble'],
		'kullanici_eksi' => $_POST['kullanici_eksi'],
		'kullanici_facebookfanpage' => $_POST['kullanici_facebookfanpage'],
		'kullanici_facebook' => $_POST['kullanici_facebook'],
		'kullanici_flickr' => $_POST['kullanici_flickr'],
		'kullanici_foursquare' => $_POST['kullanici_foursquare'],
		'kullanici_flickr' => $_POST['kullanici_flickr'],
		'kullanici_googleplus' => $_POST['kullanici_googleplus'],
		'kullanici_id' => $_SESSION['kullanici_id']
	));

	if ($sosyalmedyaupdate) {
		header("Location:../../profilsosyalmedya.php?durum=guncellendi");
	} else {
		header("Location:../../profilbilgilerim.php?durum=guncellenemedi");
	}
}


if (isset($_POST['etiketduzenle'])) {

	$etiket_id=$_POST['etiket_id'];

	$kaydet=$db->prepare("UPDATE etiket SET
		etiket_adi=:ad,
		etiket_durum=:etiket_durum
		WHERE etiket_id={$_POST['etiket_id']}");
	$update=$kaydet->execute(array(
		'ad' => $_POST['etiket_adi'],
		'etiket_durum' => $_POST['etiket_durum']
	));

	if ($update) {

		Header("Location:../production/etiket-duzenle.php?durum=ok&etiket_id=$etiket_id");

	} else {

		Header("Location:../production/etiket-duzenle.php?durum=no&etiket_id=$etiket_id");
	}

}


if (isset($_POST['etiketekle'])) {

	$kaydet=$db->prepare("INSERT INTO etiket SET
		etiket_adi=:ad,
		etiket_durum=:etiket_durum
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['etiket_adi'],
		'etiket_durum' => $_POST['etiket_durum']		
	));

	if ($insert) {

		Header("Location:../production/etiket.php?durum=ok");

	} else {

		Header("Location:../production/etiket.php?durum=no");
	}

}


if (isset($_POST['apiayarkaydet'])) {

	//Tablo Güncelleme
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_maps=:ayar_maps,
		ayar_analystic=:ayar_analystic,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0
		");

	$update=$ayarkaydet->execute(array(
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_zopim' => $_POST['ayar_zopim']
	));

	if ($update) {
		header("Location:../production/api-ayar.php?durum=ok");
	} else {
		header("Location:../production/api-ayar.php?durum=no");
	}
}


if (isset($_POST['sosyalayarkaydet'])) {

	//Tablo Güncelleme
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube
		WHERE ayar_id=0
		");

	$update=$ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_youtube' => $_POST['ayar_youtube']
	));

	if ($update) {
		header("Location:../production/sosyal-ayar.php?durum=ok");
	} else {
		header("Location:../production/sosyal-ayar.php?durum=no");
	}
}


if (isset($_POST['mailayarkaydet'])) {

	//Tablo Güncelleme
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=0
		");

	$update=$ayarkaydet->execute(array(
		'ayar_smtphost' => $_POST['ayar_smtphost'],
		'ayar_smtpuser' => $_POST['ayar_smtpuser'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtpport' => $_POST['ayar_smtpport']
	));

	if ($update) {
		header("Location:../production/mail-ayar.php?durum=ok");
	} else {
		header("Location:../production/mail-ayar.php?durum=no");
	}
}


if ($_GET['montesil']=="ok") {
	
	$sil=$db->prepare("DELETE from monte where monte_id=:monte_id");
	$kontrol=$sil->execute(array(
		'monte_id' => $_GET['monte_id']
	));

	if ($kontrol) {

		Header("Location:../production/monte.php?durum=ok");

	} else {

		Header("Location:../production/monte.php?durum=no");
	}

}


if (isset($_POST['monteekle'])) {

	$images=$_FILES['monte_gorsel']['name'];
	$tmp_dir=$_FILES['monte_gorsel']['tmp_name'];
	$imageSize=$_FILES['monte_gorsel']['size'];

	$upload_dir='../../monte/';
	$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
	$valid_extensions=array('jpeg','jpg','png','gif','pdf');
	$picMonte=rand(1000,1000000).".".$imgExt;
	move_uploaded_file($tmp_dir, $upload_dir.$picMonte);

	$kullanici_id=$_SESSION["kullanici_id"];
	echo $kullanici_id;
	$kaydet=$db->prepare("INSERT INTO monte SET
		etiket_id=:etiket_id,
		kullanici_id=:kullanici_id,
		kategori_id=:kategori_id,
		monte_gorsel=:monte_gorsel,
		monte_baslik=:monte_baslik,
		monte_aciklama=:monte_aciklama,
		monte_kim=:monte_kim	
		");
	$insert=$kaydet->execute(array(
		'etiket_id' => $_POST['etiket_id'],
		'kullanici_id' => $kullanici_id,
		'kategori_id' => $_POST['kategori_id'],
		'monte_gorsel' => $picMonte,
		'monte_baslik' => $_POST['monte_baslik'],
		'monte_aciklama' => $_POST['monte_aciklama'],
		'monte_kim' => $_POST['monte_kim']
	));
	
	if ($insert) {

		header("Location:../../loginindex.php?durum=monteeklendi");

	} else {
		header("Location:../../monteyeni.php?durum=basarisizyukleme");
	}

}

if (isset($_POST['yorumekle'])) {
	
	$yorum_icerik = $_POST['yorum_icerik'];
	$monte_id = $_POST['monte_id'];

	$yorumkaydet=$db->prepare("INSERT INTO yorum SET
		yorum_icerik=:yorum_icerik,
		kullanici_id=:kullanici_id,
		monte_id=:monte_id
		"); 
	$yorumekle=$yorumkaydet->execute(array(
		'yorum_icerik' => $yorum_icerik,
		'kullanici_id' => $_SESSION['kullanici_id'],
		'monte_id' => $monte_id
	));

	if ($yorumekle) {

		header("Location:../../loginindex.php?durum=yorumeklendi");

	}

}

if (isset($_POST['yorumayorumekle'])) {
	
	$yoruma_yorum_icerik = $_POST['yoruma_yorum_icerik'];
	$yorum_id = $_POST['yorum_id'];

	$yorumayorumkaydet=$db->prepare("INSERT INTO yoruma_yorum SET
		yoruma_yorum_icerik=:yoruma_yorum_icerik,
		yorum_id=:yorum_id,
		kullanici_id=:kullanici_id
		"); 

	$yorumayorumekle=$yorumayorumkaydet->execute(array(
		'yoruma_yorum_icerik' => $yoruma_yorum_icerik,
		'yorum_id' => $yorum_id,
		'kullanici_id' => $_SESSION['kullanici_id'],
	));
	
	if ($yorumayorumekle) {

		header("Location:../../loginindex.php?durum=yorumeklendi");

	}
}

?>
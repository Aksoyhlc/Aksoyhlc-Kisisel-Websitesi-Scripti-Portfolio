<?php 
require 'baglan.php';
require '../fonksiyonlar.php';

$host_adresi=$ayarcek['site_mail_host'];
$mail_adresiniz=$ayarcek['site_mail_mail'];
$port_numarasi=$ayarcek['site_mail_port'];
$mail_sifreniz=$ayarcek['site_mail_sifre'];


if (isset($_POST['ayarkaydet'])) {
	$sorgu=$db->prepare("UPDATE ayarlar SET 
		facebook=:facebook,
		twitter=:twitter,
		instagram=:instagram,
		github=:github,
		site_baslik=:site_baslik,
		site_aciklama=:site_aciklama,
		site_anasayfa_aciklama=:site_anasayfa_aciklama,
		site_link=:site_link,
		site_sahip_mail=:site_sahip_mail,
		site_mail_host=:site_mail_host,
		site_mail_mail=:site_mail_mail,
		site_mail_port=:site_mail_port,
		site_mail_sifre=:site_mail_sifre WHERE id=1
		");

	$sonuc=$sorgu->execute(array(
		'facebook' => $_POST['facebook'],
		'twitter' => $_POST['twitter'],
		'instagram' => $_POST['instagram'],
		'github' => $_POST['github'],
		'site_baslik' => $_POST['site_baslik'],
		'site_aciklama' => $_POST['site_aciklama'],
		'site_anasayfa_aciklama' => $_POST['site_anasayfa_aciklama'],
		'site_link' => $_POST['site_link'],
		'site_sahip_mail' => $_POST['site_sahip_mail'],
		'site_mail_host' => $_POST['site_mail_host'],
		'site_mail_mail' => $_POST['site_mail_mail'],
		'site_mail_port' => $_POST['site_mail_port'],
		'site_mail_sifre' => $_POST['site_mail_sifre']
	));

	if ($_FILES['site_logo']['error']=="0") {
		$gecici_isim=$_FILES['site_logo']['tmp_name'];
		$dosya_ismi=rand(100000,999999).$_FILES['site_logo']['name'];
		move_uploaded_file($gecici_isim,"../dosyalar/$dosya_ismi");

		$sorgu=$db->prepare("UPDATE ayarlar SET 
			site_logo=:site_logo WHERE id=1
			");

		$sonuc=$sorgu->execute(array(
			'site_logo' => $dosya_ismi,

		));
	}


	if ($_FILES['site_arkaplan']['error']=="0") {
		$gecici_isim=$_FILES['site_arkaplan']['tmp_name'];
		$dosya_ismi=rand(100000,999999).$_FILES['site_arkaplan']['name'];
		move_uploaded_file($gecici_isim,"../dosyalar/$dosya_ismi");

		$sorgu=$db->prepare("UPDATE ayarlar SET 
			site_arkaplan=:site_arkaplan WHERE id=1
			");

		$sonuc=$sorgu->execute(array(
			'site_arkaplan' => $dosya_ismi,

		));
	}

	if ($sonuc) {
		header("location:../ayarlar.php?durum=ok");
	} else {
		header("location:../ayarlar.php?durum=no");
	}
	exit;
}

/********************************************************/
if (isset($_POST['sayfakaydet'])) {
	$sorgu=$db->prepare("UPDATE sayfalar SET 
		tanitim_sayfasi=:tanitim_sayfasi,
		calismalarim_sayfasi=:calismalarim_sayfasi,
		hakkimda_sayfasi=:hakkimda_sayfasi WHERE sayfa_id=1
		");

	$sonuc=$sorgu->execute(array(
		'tanitim_sayfasi' => $_POST['tanitim_sayfasi'],
		'calismalarim_sayfasi' => $_POST['calismalarim_sayfasi'],
		'hakkimda_sayfasi' => $_POST['hakkimda_sayfasi']
	));
	
	if ($sonuc) {
		header("location:../sayfalar.php?durum=ok");
	} else {
		header("location:../sayfalar.php?durum=no");
	}
	exit;
}


/********************************************************/

if (isset($_POST['oturumacma'])) {
	$sorgu=$db->prepare("SELECT * FROM kullanicilar WHERE kul_mail=:kul_mail AND kul_sifre=:kul_sifre");
	$sorgu->execute(array(
		'kul_mail' => $_POST['kul_mail'],
		'kul_sifre' => md5($_POST['kul_sifre'])
	));
	$sonuc=$sorgu->rowcount();
	$kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);

	if ($sonuc==0) {
		header("location:../index.php?durum=no");
	} else {
		$_SESSION['kul_isim'] = $kullanici['kul_isim'];
		$_SESSION['kul_mail'] = $kullanici['kul_mail'];
		$_SESSION['kul_id'] = $kullanici['kul_id'];
		header("location:../index.php?durum=ok");
	}
	exit;
}


/********************************************************/

if (isset($_POST['profilkaydet'])) {
	$sorgu=$db->prepare("UPDATE kullanicilar SET 
		kul_isim=:kul_isim,
		kul_mail=:kul_mail,
		kul_telefon=:kul_telefon WHERE kul_id=:kul_id
		");

	$sonuc=$sorgu->execute(array(
		'kul_isim' => $_POST['kul_isim'],
		'kul_mail' => $_POST['kul_mail'],
		'kul_telefon' => $_POST['kul_telefon'],
		'kul_id' => $_SESSION['kul_id']
	));

	if (strlen($_POST['kul_sifre'])>0) {
		$sorgu=$db->prepare("UPDATE kullanicilar SET 
			kul_sifre=:kul_sifre WHERE kul_id=:kul_id
			");

		$sonuc=$sorgu->execute(array(
			'kul_sifre' => md5($_POST['kul_sifre']),
			'kul_id' => $_SESSION['kul_id']
		));
	}

	if ($sonuc) {
		header("location:../profil.php?durum=ok");
	} else {
		header("location:../profil.php?durum=no");
	}

}



/********************************************************/



if (isset($_POST['iletisimformu'])) {
	
	require_once 'PHPMailer/Exception.php';
	require_once 'PHPMailer/PHPMailer.php';
	require_once 'PHPMailer/SMTP.php';

	$mailbasligi="İletişim Formu";
	$isim=$_POST['form_isim'];

	$mail = new PHPMailer\PHPMailer\PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = $host_adresi;
	$mail->Port = $port_numarasi; 
	$mail->IsHTML(true);
	$mail->Username = $mail_adresiniz;
	$mail->Password = $mail_sifreniz; 
	$mail->SetFrom($mail->Username, $isim);	
	$mail->Subject = $mailbasligi;
	$mail->CharSet = 'UTF-8';
	$mail->AddReplyTo($_POST['form_mail'], $isim);
	$mailicerigi=$_POST['form_mesaj']."<hr><br> ".$ayarcek['site_baslik']." sitesindeki iletişim formundan gönderildi.";
	$mail->Body = $mailicerigi;
	$mail->AddAddress($ayarcek['site_sahip_mail']);
	
	if ($mail->send()) {
		header("location:../../index.php#contact?durum=ok");
	} else {
		header("location:../../index.php#contact?durum=no");
	}
	exit;
}


?>
<?php 


function oturumkontrol(){
	if (!isset($_SESSION['kul_mail']) OR !isset($_SESSION['kul_isim'])  OR !isset($_SESSION['kul_id'])) {
		session_destroy();
		header("location:login.php");
		exit;
	}
}





function yetkikontrol()
{
	if (@$_SESSION['kul_yetki']==1) {
		return TRUE;
	} else {
		return FALSE;
	}
}


function guvenlik($gelen)
{
	$giden=strip_tags($gelen);
	$giden=htmlentities($giden);
	return $giden;
}



















?>
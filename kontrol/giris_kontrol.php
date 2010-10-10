<?php
	session_start();
	include('sifre.php');
	
	$veri_turu=$_SERVER['REQUEST_METHOD'];
	
	if($veri_turu=="POST") {
		
		$email=$_POST["email"];
		$sifre=$_POST["sifre"];
		
		if(empty($email) || empty ($sifre)) { echo "Bilgileri doldurunuz...";}
		else if($email!=$email_verisi || $sifre!=$sifre_verisi) {echo "Bilgilerinizi kontrol ediniz...";}
		else {
				echo "1";
				session_register("girismail");
				}
	}
	
	else {
		echo "Sadece POST ile veri gönderilir...";
	}
?>
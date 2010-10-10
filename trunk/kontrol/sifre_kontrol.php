<?php
	session_start();
	include('sifre.php');
	include('../baglan.php');
	if(!session_is_registered("girismail")) {header('location:../../index.php');}
	
	$veri_turu=$_SERVER['REQUEST_METHOD'];
	
	if($veri_turu=="POST") {
		
		$siteurl=$_POST["siteurl"];
		$ksifre=$_POST["ksifre"];
		$kemail=$_POST["kemail"];
		$kadi=$_POST["kadi"];
	
		$site_kontrol_et=mysql_query("SELECT * FROM sifre WHERE url='$siteurl'");
		$adet=mysql_num_rows($site_kontrol_et);
		
		if(empty($siteurl)) {echo "Şifre girilecek sitenin url adresini yazın...";}
		else if (empty($kadi) && empty($kemail)) {echo "Kullanıcı Adı veya Email adresini giriniz...";}
		else if(empty($ksifre)) {echo "Bir şifre giriniz veya şifre oluşturunuz...";}
		else {
		
			if($adet>=1) {echo "Bu siteye ait şifre bulunmaktadır...";}
			else{
					$kaydet=@mysql_query("INSERT INTO sifre(url,email,kadi,sifre) values('$siteurl','$kemail','$kadi','$ksifre')");
				
					if($kaydet) {echo "1"; }
					else { echo "kayıt sırasında bir hata meydana geldi";}
				}
		}
	}
	
	else {
		echo "Sadece POST ile veri gönderilir...";
	}
?>

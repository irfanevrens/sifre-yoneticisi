<?php
	session_start();
	include('sifre.php');
	include('../baglan.php');
	if(!session_is_registered("girismail")) {header('location:../../index.php');}
	
	$veri_turu=$_SERVER['REQUEST_METHOD'];
	
	if($veri_turu=="POST") {
		$id=$_POST["id"];
		$siteurl=$_POST["siteurl"];
		$ksifre=$_POST["ksifre"];
		$kemail=$_POST["kemail"];
		$kadi=$_POST["kadi"];
	

		
		if(empty($siteurl)) {echo "Þifre girilecek sitenin url adresini yazýn...";}
		else if (empty($kadi) && empty($kemail)) {echo "Kullanýcý Adý veya Email adresini giriniz...";}
		else if(empty($ksifre)) {echo "Bir þifre giriniz veya þifre oluþturunuz...";}
		else {
		
					$duzenle=@mysql_query("UPDATE sifre SET url='$siteurl',email='$kemail',kadi='$kadi',sifre='$ksifre' WHERE id='$id'");
				
					if($duzenle) {echo "1"; }
					else { echo "düzenleme sýrasýnsa bir hata meydana geldi...";}
				}
		}
	
	
	else {
		echo "Sadece POST ile veri gönderilir...";
	}
?>
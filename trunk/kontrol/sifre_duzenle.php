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
	

		
		if(empty($siteurl)) {echo "�ifre girilecek sitenin url adresini yaz�n...";}
		else if (empty($kadi) && empty($kemail)) {echo "Kullan�c� Ad� veya Email adresini giriniz...";}
		else if(empty($ksifre)) {echo "Bir �ifre giriniz veya �ifre olu�turunuz...";}
		else {
		
					$duzenle=@mysql_query("UPDATE sifre SET url='$siteurl',email='$kemail',kadi='$kadi',sifre='$ksifre' WHERE id='$id'");
				
					if($duzenle) {echo "1"; }
					else { echo "d�zenleme s�ras�nsa bir hata meydana geldi...";}
				}
		}
	
	
	else {
		echo "Sadece POST ile veri g�nderilir...";
	}
?>
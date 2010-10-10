<?php
	session_start();
	include("../baglan.php");
	if(!session_is_registered("girismail")) {header('location:../index.php');}
	
	$id=$_POST["id"];
	
	$sil=@mysql_query("DELETE FROM sifre WHERE id='$id'");
	
		if($sil) {echo "1";}
		else {echo "Kayıt silinemedi...";}
?>
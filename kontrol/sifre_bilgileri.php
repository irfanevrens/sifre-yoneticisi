<?php

	session_start();
	include("../baglan.php");
	if(!session_is_registered("girismail")) {header('location:../index.php');}
	
	$id=$_GET["id"];
	
	$baglan=mysql_query("SELECT * FROM sifre WHERE id='$id'");
	while($yaz=mysql_fetch_array($baglan)) {
	
		echo '{ "sifreler":[
			
					{"url":"'.$yaz["url"].'","kadi":"'.$yaz["kadi"].'","sifre":"'.$yaz["sifre"].'","email":"'.$yaz["email"].'"}
	]}';
	
	}
	


	
?>
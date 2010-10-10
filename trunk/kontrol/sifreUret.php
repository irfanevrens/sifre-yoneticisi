<?php

	$sifre=$_POST["sifre"];
	
	echo substr(md5($sifre),0,12);

?>
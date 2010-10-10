<?php
$host="localhost";
$kadi="root";
$sifre="vertrigo";
$vtabani="sifre";


	$baglan=@mysql_connect($host,$kadi,$sifre);
			mysql_select_db($vtabani,$baglan);
			mysql_query("SET NAMES utf8");

?>
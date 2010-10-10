<?php
	session_start();
	session_unregister("girismail");
	header('location:../index.php')
?>
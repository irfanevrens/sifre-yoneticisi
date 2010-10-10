<?php
session_start();
if(session_is_registered("girismail")) {header('location:sifre');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="tr-TR">
	<head>
		<!--Meta Bilgileri-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Şifrematik</title>
		<meta name="author" content="Sercan Aksoy, sercan@buraya.com" />
		<meta name="copyrigt" content="Her hakkı http://buraya.com sitesine aittir" />
		<meta name="robots" content="none" />
		<!--Css Bilgileri-->
		<link rel="stylesheet" type="text/css" href="css/site.css" media="all" charset="UTF-8"  />
		<!--Js Bilgileri--> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="js/site.js" charset="UTF-8"></script>
	</head>
	<body>
		<div id="sifreGenelIcerik">
				<div id="sifreSolBolum">
					<h3>Site Şifre Matik<em>{ sadece bir şifre }</em></h3>
					<ul>
						<li>Şifrelerinizi  artık unutmayayacaksınız.Bir siteye girdiğinizde kullanıcı adım veya şifrem neydi sorusu artık size zor gelmeyecek.</li>
						<li>Şifre farklılığı yaratın, her siteye aynı şifre ve kullanıcı adı kullanmak yerine sistem size her site için bir şifre üretiyor.Bu üretilen şifreyi kullanarak şifrelerinizin farklı olmasını sağlayın.</li>
						<li>Şifrelerinize ve hangi sitelere üye olduğunuza hızlıca ulaşın. </li>
						<li>Proje detayları ve diğer geliştirmeler için <strong><a href="http://buraya.com" title="Destek Sayfası" href="tr-TR" charset="UTF-8">Buraya.com</a></strong> sitesini ziyaret edin.</li>
					</ul>
				</div>
				<div id="sifreSagBolum">
					<div id="ustSekil"></div>
					<form>
						<label for="email">E-mail</label>
						<input type="text" title="Email" id="email" />
						<label for="sifre">Şifre</label>
						<input type="password" title="Email" id="sifre" />
						<div class="cevap"></div>
						<input type="submit" value="Giriş Yap" id="sifreGiris"/>
					</form>
				</div>
				<div class="temizle"></div>
		</div>
	</body>
</html>
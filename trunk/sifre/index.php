<?php
	session_start();
	if(!session_is_registered("girismail")) {header('location:../index.php');}
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
		<link rel="stylesheet" type="text/css" href="../css/site.css" media="all" charset="UTF-8"  />
		<!--Js Bilgileri--> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="../js/site.js" charset="UTF-8"></script>
	</head>
	<body>
		<div id="arama">
			<div id="kapat" title="kapat"></div>
			<h1>{ Arama Yap }</h1>
			<input type="text" id="aramaInput" /><br />
			<span id="yaz"></span>
		</div>
		<div id="ekran"></div>
		<div id="islem">
			<h2></h2>
			<a href="javascript:;" id="duzenle" title="Düzenlemek için tıklayın.">Düzenlemek İstiyorum</a>
			<a href="javascript:;" id="sil" title="Silmek için çift tıklayın.">Silmek İstiyorum</a>
			<a href="javascript:;" id="kapat" title="Kapatmak için tıklayın.">Kapat</a>
			<span></span>
		</div>
		<div id="yardimKutusu">
			<div id="kapatYardim" title="kapat"></div>
			<ul>
				<li>Şifrematiği kullanarak kendinize özgü şifreler üreterek saklayabilirsiniz.Bu sayede şifreleriniz birbirinden farklılık gösterir.</li>
				<li>Sağ tarafta bulunan form aracılığı yeni şifre oluşturabilirsiniz.İsterseniz kendi şifrenizi kullanının, isterseniz de anahtar aracılığı ile eşsiz şifre oluşturun.</li>
				<li>Sol tarafta listenen tabloya tek tıklama ile şifrenizi seçebilir.Ve istediğiniz yere hızlıca yapıştırabilirsiniz.</li>
				<li>Sol taraftaki listeye çift tıklayarak menüyü açabilirsiniz.Bu sayede şifre alanını düzenleyebilir veya silebilirsiniz.Silmek için çift tıklamanız gerekmektedir.Bu sayede yanlışlık ile silmenin önüne geçilir.</li>
				<li>Arama kısmını kullanarak sonuçlarınıza hızlıca ulaşabilir.Bu sayede üye olduğunuz sitelere bir kez daha üye olmaktan kurtulursunuz.</li>
				<li>Diğer gelişmeler için <strong><a href="http://buraya.com" title="Destek Sitesi" target="_blank">Destek Sitesini</a></strong> ziyaret edin.</li>
			</ul>
		</div>
		<div id="sayfaGenelIcerik">
				<div id="sayfaSolBolum">
					<div id="icerik">
					</div>
				</div>
				<div id="sagAlan">
					<div id="sifreSagBolum">
						<div id="ustSekil"></div>
						<form>
							<label for="siteurl">Site Url && Açıklama</label>
							<input type="text" title="Site Url" id="siteurl" />
							<label for="kemail">E-mail</label>
							<input type="text" title="Email" id="kemail" />
							<label for="kadi">Kullanıcı Adı</label>
							<input type="text" title="Kullanıcı Adı" id="kadi" />
							<label for="ksifre">Şifre</label>
							<input type="text" title="Şifre" id="ksifre" /> <img src="../css/icon/sifreuret.png" alt="Şifre üret" title="Şifre Üret" width="24" height="24" id="sifreUret">
							<div class="cevap"></div>
							<input type="submit" value="Şifre Ekle" id="sifreEkle" />
							<input type="submit" value="Şifre Düzenle" id="sifreDuzenle" />
							<div id="vazgec" title="İşlemi iptal et."></div>
							<div id="yeniSifre" title="Yeni kayıt oluştur."></div>
							<div class="temizle"></div>
						</form>
					</div>
					<div class="temizle"></div>
					<ul id="linkler">
						<li><a href="javascript:;" id="aramaYap">Arama Yap</a></li>
						<li><a href="javascript:;" id="yardim">Kullanım Rehberi</a></li>
						<li><a href="cikis.php">Çıkış Yap</a></li>
					</ul>
				</div>
				<div class="temizle"></div>
		</div>
	</body>
</html>


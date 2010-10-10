/*
*	author : Sercan Aksoy
*	site   : http://buraya.com 
*	copyright : http://buraya.com
*	reply-to  : sercan@buraya.com
*	date      : 2010-09-10T11:35
*/



$(function () {



	/*Load ile sayfa yükle*/
	$('#icerik').html('<img src="../css/icon/loading.gif"> İçerik yükleniyor...').load('sayfa_yukle.php');
	
	/*Şifre Üretmek amacıyla yazılan fonksiyon*/
	function sifreUret() {
		
		var sifre=Math.floor(Math.random()*1000000000);
		$('#ksifre').css({'background-image':'url("../css/icon/loading.gif")','background-repeat':'no-repeat','background-position':'right center'})
		$.ajax({
					type:'POST',
					url:'../kontrol/sifreUret.php',
					data:'sifre='+sifre,
					success:function (cevap) {
										$('#ksifre').css('background-image','none')
										$('#ksifre').val(cevap);
							}
			})
		
	}
	
	/*Ekran yükseklik ayarı yap*/
	var pencereYukseklik=$(window).height();
	var pencereGenislik=$(window).width();
	$('#ekran').height(pencereYukseklik);
	
	/*İşlem penceresi ve yardım penceresini ortala*/
	var olYukseklik=(pencereYukseklik-220)/2;
	var olGenislik=(pencereGenislik-500)/2;
	var olYukseklik2=(pencereYukseklik-300)/2;
	var olGenislik2=(pencereGenislik-600)/2;
	$('#islem').css({'left':olGenislik+'px','top':olYukseklik+'px'})
	$('#yardimKutusu').css({'left':olGenislik2+'px','top':olYukseklik2+'px'})
	
	/*Giriş sayfası butona tıklayınca*/
	$('#sifreGiris').click(function () {
		
		$('.cevap').html("<img src='css/icon/loading.gif' alt='ajax loading' title='yükleniyor'/> Bilgileriniz kontrol ediliyor..."); //İşlem sırasında yükleniyor gösterdim.
		var email=$('#email').val(); // Mail verisini sayfadan çektim.
		var sifre=$('#sifre').val(); // Şifre verisini sayfadan çektim.
		
		$.ajax({
			type:'POST',
			url:'kontrol/giris_kontrol.php',
			data:'email='+email+'&sifre='+sifre,
			success:function (cevap) {
			
				if(cevap==1) {$('.cevap').html('Lütfen bekleyin...'); window.location="sifre"}
				else {$('.cevap').html(cevap);}	
			}
		})
		return false;
	})
	
	/*şifre ekle butonuna tıklayınca çalışacak fonksiyon*/
	
	$('#sifreEkle').click(function () {
		
		$('.cevap').html("<img src='../css/icon/loading.gif' alt='ajax loading' title='yükleniyor'/> Lütfen bekleyin..."); //İşlem sırasında yükleniyor gösterdim.
		
		var siteurl=$('#siteurl').val(); // Site Url verisini sayfadan çektim.
		var kemail=$('#kemail').val(); // Mail verisini sayfadan çektim.
		var kadi=$('#kadi').val(); // Kullanıcı Adı verisini sayfadan çektim.
		var ksifre=$('#ksifre').val(); // Şifre verisini sayfadan çektim.
		
		$.ajax({
				type:'POST',
				url:'../kontrol/sifre_kontrol.php',
				data:'siteurl='+siteurl+'&kemail='+kemail+'&kadi='+kadi+'&ksifre='+ksifre,
				success:function (cevap) {
						if(cevap==1) {$('.cevap').text('Şifre kaydı yapıldı...'); $('#icerik').html('<img src="../css/icon/loading.gif"> İçerik yükleniyor...').load('sayfa_yukle.php');  $('#yeniSifre').fadeIn();  }
						else {$('.cevap').html(cevap);}	
			}
		})
		return false;
	})
	
	
	/*Şifre Üretme Butonuna tıklayınca gerçekleşen olaylar*/
	$('#sifreUret').click(function () {sifreUret(); });
	
	/*Tek tıklama yapılınca td ne yapsın*/
	$('#tablo tbody tr').live('click',function () {
		$(this).children('td').children('input.sifreCopy').select();

	});
	
	/*Çift tıklama yapılınca td ne yapsın*/
	$('#tablo tbody tr').live('dblclick',function () {
			var id=$(this).attr('siteid');
			var url=$(this).attr('siteurl')
			
			$('#ekran').fadeIn();
			$('#islem h2').html('<u>'+url +'</u> sitesi için işlem seçin');
			$('#islem').fadeIn();
			$('#islem a#sil,#islem a#duzenle').attr('siteid',id)
			$('#islem span').empty();

		})
		

		
	/*Ekran karardığı anda işlemden vaz geçme olayı*/
	$('#ekran,#kapat').click(function () {
			$('#ekran').fadeOut();
			$('#islem').fadeOut();
			$('#yardimKutusu').fadeOut();
		})
		
	/*Varolan kaydı silmek için kullanılır*/
	$('#sil').dblclick(function () {
			$('#islem span').empty();
			$('#islem span').html("<img src='../css/icon/loading.gif' alt='ajax loading' title='yükleniyor'/> İşlem yapılıyor...");
			var id=$(this).attr('siteid');
			
			$.ajax({
				type:'POST',
				data:'id='+id,
				url:'../kontrol/sifre_sil.php',
				success:function (cevap) {
							if(cevap==1) {$('#islem span').text('Kayıtlı şifre silindi...'); $('#icerik').html('<img src="../css/icon/loading.gif"> İçerik yükleniyor...').load('sayfa_yukle.php'); }
							else {$('#islem span').html(cevap);}			
						}
				})
		})
		
	/*Varolan kaydı düzenlemek için kullanılır*/
	$('#duzenle').click(function () {
			var id=$(this).attr('siteid');
			$('#islem span,.cevap').empty();
			$('#islem span').html("<img src='../css/icon/loading.gif' alt='ajax loading' title='yükleniyor'/> Bilgiler yükleniyor...");
			$('#sifreEkle').hide();
			$('#vazgec').fadeIn();
			$('#yeniSifre').fadeOut();
			$('#sifreDuzenle').attr('siteid',id).show();
				$.ajax({
					url:'../kontrol/sifre_bilgileri.php',
					dataType:'json',
					data:'id='+id,
					success:function (JSON) {
						$('#islem,#ekran').fadeOut();
						$.each(JSON.sifreler,function (i,item) { 
							$('#siteurl').val(item.url);
							$('#kemail').val(item.email);
							$('#ksifre').val(item.sifre);
							$('#kadi').val(item.kadi);
						
						})
					}
				})
				
				
				})
				
	/*şifre düzenle butonuna tıklayınca çalışacak fonksiyon*/
	$('#sifreDuzenle').click(function () {
		$('.cevap').html("<img src='../css/icon/loading.gif' alt='ajax loading' title='yükleniyor'/> Lütfen bekleyin..."); //İşlem sırasında yükleniyor gösterdim.
		
		var id=$(this).attr('siteid')	
		var siteurl=$('#siteurl').val(); // Site Url verisini sayfadan çektim.
		var kemail=$('#kemail').val(); // Mail verisini sayfadan çektim.
		var kadi=$('#kadi').val(); // Kullanıcı Adı verisini sayfadan çektim.
		var ksifre=$('#ksifre').val(); // Şifre verisini sayfadan çektim.
		
		$.ajax({
			type:'POST',
			url:'../kontrol/sifre_duzenle.php',
			data:'siteurl='+siteurl+'&kemail='+kemail+'&kadi='+kadi+'&ksifre='+ksifre+'&id='+id,
			success:function (cevap) {

				if(cevap==1) {$('.cevap').text('Şifre düzenlendi...'); $('#icerik').html('<img src="../css/icon/loading.gif"> İçerik yükleniyor...').load('sayfa_yukle.php'); $('#vazgec').hide();$('#yeniSifre').fadeIn();}
				else {$('.cevap').html(cevap);}	
			}
		})
		return false;
	})
	
	/*Arama yapma linkine tıklayınca*/
	$('#aramaYap').click(function () {
		$('#arama').fadeIn();
	})
	
	/*Arama kutusu kapatma tuşu*/
	$('#kapat').click(function () {
	
		$('#arama').fadeOut();
		$('#aramaInput').val("");
		$('#icerik').html('<img src="../css/icon/loading.gif"> İçerik yükleniyor...').load('sayfa_yukle.php');
	})
	
	/*Arama yapmaya başladığı anda sonuç göster*/
	$('#aramaInput').keyup(function () {
		$('#icerik').html('<img src="../css/icon/loading.gif"> İçerik yükleniyor...');
		$('#yaz').html('<img src="../css/icon/loading.gif"> Sonuçlar aranıyor...');
		var arama=$(this).val();
		
		$.ajax({
			type:'POST',
			data:'arama='+arama,
			url:'sayfa_arama.php',
			success:function (cevap) {
				$('#yaz').empty();
				$('#icerik').html(cevap);
				
			}
		})
	})
	
	/*yeni şifre oluşturma butonu sağ tarafta bulunan insan simgesi*/
	$('#yeniSifre').click(function () {
		$('#sifreSagBolum input[type="text"]').val("");
		$('#sifreEkle').show();
		$('#sifreDuzenle').hide();
		$('.cevap').empty();
	})
	
	/*yeni şifre oluşturma butonu*/
	$('#vazgec').click(function () {
		$('#sifreSagBolum input[type="text"]').val("");
		$('#sifreDuzenle').hide();
		$('#sifreEkle').show();
		$('.cevap').empty();
		$(this).fadeOut('slow');
	})
	
	/*yardım butonuna tıklanınca yardım kutusu aç*/
	$('#yardim').click(function () {
		$('#ekran').fadeIn();
		$('#yardimKutusu').fadeIn();
	})
	
	/*yardım kutusu kapatma tuşu*/
	$('#kapatYardim').click(function () {
	
			$('#ekran').fadeOut();
			$('#yardimKutusu').fadeOut();
	})
	
	/*Aram kutusunu draggable yap*/
		$('#arama').draggable();
		
})

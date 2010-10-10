<?php
	
	session_start();
	include("../baglan.php");
	if(!session_is_registered("girismail")) {header('location:../../index.php');}
	$baglan=mysql_query("SELECT * FROM sifre ORDER BY id ASC");
	$adet=mysql_num_rows($baglan);
	
	if($adet<1) {echo 'Listenizde kayıtlı şifre bulunmamaktadır.Sağ tarafta bulunan formu kullanarak şifrenizi kaydedin...';}
	else{

		echo "
			
			<table width='660' summary='Site şifreleri hakkında bilgi' cellspacing='2' id='tablo'>
				<thead>
					<tr>
						<th scope='col' abbr='site url' class='borderAta'>Site Url</th>
						<th scope='col' abbr='mail'>E-mail</th>
						<th scope='col' abbr='kadi'>Kullanıcı Adı</th>
						<th scope='col' abbr='sifre'>Şifre</th>
					</tr>
				</thead>
				<tbody>";

				
				while($yaz=mysql_fetch_array($baglan)) {
				
					echo "
						<tr siteid='".$yaz['id']."' siteurl='".$yaz['url']."' title='Tek tık ile şifreyi seçin.Çift tıklama ile şifre seçeneklerini açın.'>
							<td class='borderAta'>".$yaz['url']."</td>
							<td>".$yaz['email']."</td>
							<td>".$yaz['kadi']."</td>
							<td><input type='text' value='".$yaz['sifre']."' class='sifreCopy' readonly/></td>
						</tr>
					";
				}
				
				echo "
					</tbody>
			</table>
		
		";

	}
	
?>

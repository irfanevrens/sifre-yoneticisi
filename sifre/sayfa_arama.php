<?php
	
	session_start();
	include("../baglan.php");
	if(!session_is_registered("girismail")) {header('location:../../index.php');}
	
	$arama=$_POST["arama"];
	
	$baglan=mysql_query("SELECT * FROM sifre WHERE url LIKE '%$arama%' OR  url LIKE '$arama%' OR url LIKE '%$arama' OR email LIKE '%$arama%' OR email LIKE '%$arama' OR email LIKE '$arama%' OR kadi LIKE '%$arama%' OR kadi LIKE '%$arama' OR kadi LIKE '$arama%'ORDER BY id ASC");
	$adet=mysql_num_rows($baglan);
	
	if($adet>0) {
	
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
						<tr siteid='".$yaz['id']."' siteurl='".$yaz['url']."' title='İşlem yapmak için çift tıklayın...'>
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

else {
	echo "<img src='../css/icon/loading.gif' /> Böyle bir kayıt bulunamadı.Aradığınız site hakkında bilgi yoktur...";
}
	
?>

<?php 
$baglan=new mysqli("localhost","root","","arama_ornek") or die("mysql ba?lant? hatas?");
$baglan->set_charset("utf8");
$aranacak=$_POST["kelime"];//kelimeyi al?yoruz.
$al=$baglan->query('SELECT * FROM firmalar WHERE firma_adi  LIKE "%'.$aranacak.'%" || firma_adres  LIKE "%'.$aranacak.'%" || firma_sektor  LIKE "%'.$aranacak.'%"  || firma_tel  LIKE "%'.$aranacak.'%" ORDER BY firma_id desc LIMIT 10 ');
//etiket tablosunda tarat?yoruz bulunan verileri hiti y?ksek olana g?re s?ralay?p ilk 5 i al?yoruz
if($al->num_rows){
	while($yaz=$al->fetch_assoc()){
		echo '<li><a href="sonuc.php?firma_id='.$yaz["firma_id"].'">'.$yaz["firma_adi"].'</a></li>';
	//verileri ekrana yaz?yorum
	}
}
else{
	echo "<li>Arama Sonucu Yok</li>";
}

?>
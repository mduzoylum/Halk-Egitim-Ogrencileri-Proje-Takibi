<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="sanayim_db";

$con=new mysqli($servername,$username,$password,$dbname);

if ($con->connect_error) {
	die("Bağlantı Hatası");
}



$aranacak=$_POST['kelime'];//kelimeyi alıyoruz.

$sql2="CREATE TEMPORARY TABLE isim SELECT DISTINCT ad FROM sahis_bilgileri UNION all SELECT DISTINCT soyad FROM sahis_bilgileri UNION all SELECT DISTINCT sirket_adi FROM sirket_bilgileri UNION all SELECT DISTINCT konum FROM sirket_bilgileri UNION all SELECT DISTINCT web FROM sirket_bilgileri UNION all SELECT DISTINCT sektor_adi FROM sektor_bilgileri";
$con->query($sql2);
$sql="SELECT * from isim where ad like '%$aranacak%' limit 5";

/*
$sql="SELECT distinct sb.ad,sb.soyad,sib.sirket_adi,sib.web,sib.konum,sbb.sektor_adi,ub.urun_bilgisi,ub.marka FROM sahis_bilgileri sb,sirket_bilgileri sib,sirket_sektorleri ssb,sektor_bilgileri sbb,urun_bilgileri ub WHERE sb.id=sib.sahis_id and sb.id=ssb.sirket_id and sbb.id=ssb.sektor_id and ub.sirket_id=sib.id AND(sirket_adi LIKE '%a%' OR ad LIKE '%a%'OR soyad LIKE '%a%' OR web LIKE '%a%' OR konum LIKE '%a%' OR marka LIKE '%a%' OR urun_bilgisi LIKE '%a%' OR sektor_adi LIKE '%a%') and ust_id=0 LIMIT 5";*/
$result=$con->query($sql);

if ($result->num_rows>0) {
	
while ($yaz=$result->fetch_assoc()) {
	echo "<div class='kelime' onClick='tamamla(\"".$yaz["ad"]."\")'>".$yaz["ad"]."</div>";
}

}




?>
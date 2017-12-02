<?php

$servername="localhost";
$username="root";
$password="";
$db="komek";

$con=new mysqli($servername,$username,$password,$db);
$con->set_charset('UTF8');//türkçe karakter desteği için
if ($con->connect_error) {
	die("Hata".$con->connect_error);
}else{
	echo"Veritabanına erişim sağlandı."."<br>";
}

/*$gel="SELECT * FROM uye";
$cek=$con->query($gel);
$row=$cek->fetch_array();
print_r($row);
$con->close();
*/

/*
//prepare ile SQL sorgusu hazırlama
if($stmt = $con->prepare("SELECT * FROM uye")) {
	$stmt->execute(); // execute ile sorgu çalıştır
	$sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
	while($tab=$sonuc->fetch_assoc())//sütun adına göre elde et
	{
		printf("%s -(%s)<br>", $tab['id'],$tab['ad']);
	}
	$stmt->close(); //sorguyu sonlandır
}else{
	echo'Sorguda hata var:'.$con->error;;
}
$con->close();//bağlantıyı sonlandır
*/

/*
//get methodunu kullanma bind_param(metin de -s, rakam da -i kullanılır)
if($stmt = $con->prepare("SELECT * FROM uye WHERE id=? ")) {
	$_GET['id']=4; //dışardan get ile geldiğini varsayalım
	$stmt->bind_param("i",$_GET['id']); //? yere id türünde 2 değerini ver
	$stmt->execute(); // execute ile sorgu çalıştır
	$sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
	echo'<b>'.$sonuc->num_rows.'kayıt bulundu</b><br>';
	while($tab=$sonuc->fetch_assoc())//sütun adına göre elde et
	{
		printf("%s -(%s)<br>", $tab['id'],$tab['ad']);
	}
	$stmt->close(); //sorguyu sonlandır
}else{
	echo'Sorguda hata var:'.$con->error;;
}
$con->close();//bağlantıyı sonlandır
*/

/*
//fetch_array methodu
if($stmt = $con->prepare("SELECT * FROM uye")) {
	$stmt->execute(); // execute ile sorgu çalıştır
	$sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
	echo'<b>'.$sonuc->num_rows.'kayıt bulundu</b><br>';
	while($tab=$sonuc->fetch_array())
	{
		printf("%s -(%s)<br>", $tab['id'],$tab['ad']);
	}
	$stmt->close(); //sorguyu sonlandır
}else{
	echo'Sorguda hata var:'.$con->error;;
}
$con->close();//bağlantıyı sonlandır
*/

/*
//fetch_row methodu
if($stmt = $con->prepare("SELECT * FROM uye")) {
	$stmt->execute(); // execute ile sorgu çalıştır
	$sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
	echo'<b>'.$sonuc->num_rows.'kayıt bulundu</b><br>';
	while($tab=$sonuc->fetch_row())
	{
		echo "$tab[0]-$tab[1]<br>";
	}
	$stmt->close(); //sorguyu sonlandır
}else{
	echo'Sorguda hata var:'.$con->error;;
}
$con->close();//bağlantıyı sonlandır
*/

//fetch_object methodu
if($stmt = $con->prepare("SELECT * FROM uye")) {
	$stmt->execute(); // execute ile sorgu çalıştır
	$sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
	echo'<b>'.$sonuc->num_rows.'kayıt bulundu</b><br>';
	while($tab=$sonuc->fetch_object())
	{
		echo $tab->id."-)". $tab->ad.'<br>';
	}
	$stmt->close(); //sorguyu sonlandır
}else{
	echo'Sorguda hata var:'.$con->error;;
}
$con->close();//bağlantıyı sonlandır


// phpmyadmin yerine masaüstünden veritabanı yönetimi ve diyagram, tasarım yapabileceğiniz Navicat programını indirmek için tıklayınız https://we.tl/uBz4aVM6r2
?>

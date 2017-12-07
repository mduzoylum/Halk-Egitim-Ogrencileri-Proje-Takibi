<?php 
//Bu sayfa sny_login_tarik.php için bir form kontrol sayfasıdır.
require('sny_login_tarik.php');
session_start();


$kadi=$_POST['kadi'];
$sifre=$_POST['sifre'];

//Kullanıcı adı ve şifre için DB Kontrolü yap
$gel="SELECT * FROM kullanicib";
$cek=$con->query($gel);

if($cek->num_rows>0)
{

while($getir=$cek->fetch_assoc()) {
	$getir["kullaniciadi"]." ".$getir["sifre"]."<br>";




if ($getir['kullaniciadi']==$kadi and $getir["sifre"]==$sifre){
	//oturum oluşturuldu
	$_SESSION['kullaniciadi']=$kadi;
	$_SESSION['sifre']=$kadi;


//Eğer bilgiler doğruysa hosgeldin.php sayfasına yönlendir.
header("Location:hosgeldin.php");
}
else{
	//Yanlışsa login formları kızarsın ve ekrana alert bassın.
	echo ("<style>.login input[type=password]{border-color:#FF0000;}</style>");
	echo ("<style>.login input[type=text]{border-color:#FF0000;}</style>");
	echo "<style>::-webkit-input-placeholder{color: rgba(255,255,0);}</style>";
	echo "<script>alert('Kullanıcı adınız veya şifreniz yanlış! Lütfen tekrar deneyiniz.');</script>";
	echo "<style>.login button[type=submit]{color:#FFFFFF;background:#ff1919;border-color:#ff1919;}</style>";
}}}





 ?>
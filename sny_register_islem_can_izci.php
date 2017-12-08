<?php 
include("connection.php"); 

if (isset($_POST["ekle"])) {    /* islem.php sayfasına  ekle adıda  bir post yapılmışmı onu kontrol ediyoruz 
ve sonrasında post ile gönderdiğimi text nesnelerini ilgili değişken isimlerine bağluyoruz */
 


$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$eposta=$_POST["eposta"];
$tel=$_POST["tel"];
$kadi=$_POST["kadi"];
$sifre=$_POST["sifre"];
$sifretekrar=$_POST["sifretekrar"];



if(isset($_POST["tur"]))   
{$tur=1;}
else
{$tur=0;}







if ($sifre!=$sifretekrar) {

	 header('Location:sny_register.php?durum=nosifre');

}


else{




if (!filter_var($eposta,FILTER_VALIDATE_EMAIL)==true) {  /*  filter var komutu ile mail kontrolünü gerçekleştiriyoruz. eğer hatalı ise
bir önceki sayfada  eposta bölümünün altında uyarı verdirmek için "?durum=nomail" adında bir get gönderiyor ve uyarı verdiyoruz.*/ 

header('location:sny_register.php?durum=nomail');

	# code...
}
else

{

if ($result=$conn->query("select * from sahis_bilgileri where kadi='$kadi'")) {/* kullanıcı adını kontrol için sorgumuz aratıyor bu şekilde bir sonuç var ise bu nesneyi row değişkenine atıyor ve row sıfırdan büyük yani böyle bir satır var ise sny_registere yönlendirip get gönderip uyarısnı verdiyoruz.*/
     $row=$result->num_rows;

     if ($row>0) {

     	header('location:sny_register.php?durum=nokadi');
     }

     else
     {

   

$sql="insert into sahis_bilgileri(ad,soyad,eposta,tel,kadi,sifre,tur) values('$ad','$soyad','$eposta','$tel','$kadi','$sifre','$tur')"; /* insert komutu ile verileri ekletip bu sorgu sonucu doğru ise devam etmesini sağlıyoruz*/


if($conn->query($sql)===TRUE)
{
  
header('Location:sny_register.php?durum=ok');

}
else{

	header('Location:sny_register.php?durum=no');
  
}

}
  
}


}

}
}
?>
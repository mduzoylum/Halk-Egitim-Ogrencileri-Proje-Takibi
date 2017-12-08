<?php
/*
1 Gelerksiz hataları göstermemek için
error_reporting(0);
2 Tüm hataları göstermek için
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
error_reporting(0);
//yönlendirme halasını engellemek
ob_start();
session_start();
if($_SESSION["kullanici"]){
	//veritabanı bağlanma
	require_once "murat_baz_baglan.php";
	//tanımlanan fonksiyonların hepsi
	require_once "murat_baz_function.php";
}
else{
	@header("location:murat_baz_sny_login.php");
	exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sanayim Yeni Üye Ol</title>

  <!-- BOOTSTRAP STYLES-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- GOOGLE FONTS-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  </style>
</head>
<body >

  <style>
  </style>
</head>
<body >
    <div class="container">
        <div class="row text-center " >
            <div class="col-md-12">
                <img src="assets/img/logo.png" width="300px" />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

               
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Sanayici Giriş Bilgileri
                        </div>
                        <div class="panel-body">
							<div class="alert alert-warning">
								<strong>Hoş Geldin</strong> <?=$_SESSION["kullanici"]["ad"];?> <?=$_SESSION["kullanici"]["soyad"];?>
							</div>
						  <?php
						  //ip Adresi
							function ipadresi() 
							{ 
								if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
								{ 
									$ip=$_SERVER['HTTP_CLIENT_IP']; 
								} 
								elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
								{ 
									$ip=$_SERVER['HTTP_X_FORWARDED_FOR']; 
								} 
								else 
								{ 
									$ip=$_SERVER['REMOTE_ADDR']; 
								}
								return $ip; 
							}
							$ip=ipadresi();
							//json ile uzak siteden veri almak
							$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
							echo "Giriş Yapılan Şehir : ".$ipdat->geoplugin_city;
						  ?>
                        </div>  
                </div>

         </div>


     </div>
 </div>

</body>
</html>
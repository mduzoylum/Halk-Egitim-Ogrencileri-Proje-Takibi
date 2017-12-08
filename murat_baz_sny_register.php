<?php
error_reporting(0);
require_once "murat_baz_baglan.php";
require_once "murat_baz_function.php";
if($_POST["bas"]){
	$ad=post("ad");
	$soyad=post("soyad");
	$eposta=post("eposta");
	$tel=post("tel");
	$kadi=post("kadi");
	$sifre=post("sifre");
	$sifretekrar=post("sifretekrar");
	if($_POST["tur"]){
		$tur=1;
	}
	else{
		$tur=0;
	}
	if($ad=="" || $soyad=="" || $eposta=="" || $tel=="" || $kadi=="" || $sifre=="" || $sifretekrar!=$sifre){
		$hata='<div class="alert alert-danger">Lütfen Formu Tam Olarak Doldurun</div>';
	}
	else {
		$qr=$db->query("select * from sahis_bilgileri where eposta='".$eposta."' || tel='".$tel."' || kadi='".$kadi."'");
		if($qr->num_rows>0){
			$hata='<div class="alert alert-warning">Daha Önce Üyeliğiniz Bulunmaktadır. <a href="murat_baz_sny_login.php">Lütfen Giriş Yapın</a></div>';
		}
		else {
			$sql="insert into sahis_bilgileri(ad,soyad,eposta,tel,kadi,sifre,tur) values('".$ad."','".$soyad."','".$eposta."','".$tel."','".$kadi."','".$sifre."','".$tur."')";
			if($db->query($sql)){
				$hata='<div class="alert alert-success">Başarıyla Kayıt Yapıldı</div>';
			}
			else {
				$hata='<div class="alert alert-danger">Bir Hata Oluştu</div>';
			}
		}
	}
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
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://js.nicdn.de/bootstrap/formhelpers/docs/assets/js/bootstrap-formhelpers-phone.format.js"></script>
    <script src="http://js.nicdn.de/bootstrap/formhelpers/docs/assets/js/bootstrap-formhelpers-phone.js"></script>
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
                           Sanayici Üye Kaydı
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="">
                                        <?=$hata;?>
                                 <div class="form-group">
                                            <label>Ad</label>
                                            <input class="form-control" name="ad" type="text" required>
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Soyad</label>
                                            <input class="form-control" name="soyad" type="text" required>
                                    
                                        </div>
                                        <div class="form-group">
                                            <label>E-Posta</label>
                                            <input class="form-control" name="eposta" type="text" required>
                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Tel</label>
											<input type="text" name="tel" required class="form-control bfh-phone" data-format="+90 (ddd) ddd dd dd">
                                        </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" name="kadi" type="text" required>
                                     
                                        </div>
                                            <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" name="sifre" type="password" required>
                                     
                                        </div>
                                <div class="form-group">
                                            <label>Şifre Tekrar</label>
                                            <input class="form-control" name="sifretekrar" type="password" required>
                                     
                                        </div>
                                        <div class="form-group">
                                          <div class="checkbox">
                                          <label><input type="checkbox" name="tur" value="1">Sanayiciyim</label>
                                          </div>
                                        </div>
                                 
                                        <input type="submit" name="bas" class="btn btn-danger" value="Kayıt Ol"/>

                                    </form>
                            </div>
                        
                            </div>

         </div>


     </div>
 </div>

</body>
</html>
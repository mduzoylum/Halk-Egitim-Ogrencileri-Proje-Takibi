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
//veritabanı bağlanma
require_once "murat_baz_baglan.php";
//tanımlanan fonksiyonların hepsi

require_once "murat_baz_function.php";
//butona Giriş Butonu basıldığında
if($_POST["giris"]){
	//post fonksiyonu içine alınıyor ver sonuc getiriliyor.
	$kullanici=post("email");
	$sifre=post("sifre");
	//form gelen degerler boş mu
	if($kullanici=="" || $sifre==""){
		$hata='<div class="alert alert-danger">Kullanıcı & Şifre Boş Bırakılamaz</div>';
	}
	else {
		//sql veri çekme
		$sql="select * from sahis_bilgileri where kadi='".$kullanici."' && sifre='".$sifre."'";
		//sql kod parçasını çalıştırma
		$qr=$db->query($sql);
		//Sorgu Sonrası Etkilenen satır var mı ?
		if($qr->num_rows > 0){
			//sonuçları dizi halinde çekilmesi
			$row=$qr->fetch_assoc();
			//functionda session oluşturma
			session($row,"kullanici");
			if($_POST["hatirla"]==1){
				setcookie("kullanici",$kullanici,time()+3600);
				setcookie("sifre",$sifre,time()+3600);
			}
			else {
				setcookie("kullanici",$kullanici,time()-3600);
				setcookie("sifre",$sifre,time()-3600);
			}
			yonlendir("murat_baz_sny_home.php",2);
			$hata='<div class="alert alert-success">Başarıyla Giriş Yapıldı 2 sn.</div>';
		}
		else{
			$hata='<div class="alert alert-danger">Bu Kullanıcı Yok <a href="murat_baz_sny_register.php">Üye Ol</a></div>';
		}
	}
}
$db->close();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sanayim Giriş</title>

  <!-- BOOTSTRAP STYLES-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- GOOGLE FONTS-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

            

              <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
					<?=$hata;?>
                    <form role="form" method="post">
                        <hr />
                        <h2>Sisteme Giriş</h2>
						<hr/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" class="form-control" value="<?=$_COOKIE["kullanici"];?>" name="email" autocomplete="off" autofocus="" placeholder="Kulanıcı Adınız" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" value="<?=$_COOKIE["sifre"];?>" class="form-control" autocomplete="off" name="sifre" placeholder="Şifreniz" />
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
								<?php
								if($_COOKIE["kullanici"]){
									echo '<input type="checkbox" value="2" name="hatirla" /> Beni Unut Gitsin :(';
								}
								else {
									echo '<input type="checkbox" value="1" name="hatirla" /> Beni Unutma :)';
								}
								?>
                                
                            </label>
                            <span class="pull-right">
                             <a href="#" >Şifremi Unuttum ? </a> 
                              
                         </span>
                     </div>

                     <input type="submit" class="btn btn-success " value="Giriş Yap →" name="giris"/>
                     <a href="murat_baz_sny_register.php" class="btn btn-warning" style="float:right">← Hemen Üye Ol</a>
                 </form>
             </div>

         </div>

         


     </div>
 </div>

</body>
</html>
<?php
//Yönlendirme hataları için
ob_end_flush();
?>

<?php 

$durum=1;
$durum1=1;
if (isset($_POST["bas"])) {
include("connection.php");  
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$eposta=$_POST["eposta"];
$tel=$_POST["tel"];
$kadi=$_POST["kadi"];
$sifre=$_POST["sifre"];
$sifretekrar=$_POST["sifretekrar"];
$gel="SELECT * FROM sahis_bilgileri";
$cek=$con->query($gel);

if($cek->num_rows>0)
{
while($getir=$cek->fetch_assoc()) { //veri tabanında kayıtlı veriler ile yeni kaydedilecek değerin karşılaştırılmas
  if($kadi==$getir["kadi"])
    $durum=0;
  if($eposta==$getir["eposta"])
    $durum1=0;
}
if($sifre!=$sifretekrar) //şifreler uyuşuyor mu kontrol etme
    $durum=2;

if( $durum==1 and $durum1==1){ //hata yok ise veritabanına kaydet.
if(isset($_POST["tur"]))

{$tur=1;}
else
{$tur=0;}

$sql="insert into sahis_bilgileri(ad,soyad,eposta,tel,kadi,sifre,tur) values('$ad','$soyad','$eposta','$tel','$kadi','$sifre','$tur')";
if($con->query($sql)===TRUE)
{
  echo("kayıt işlemi gerçekleştirlmiştir.");
}
else{
  echo("kayıt işlemi başarısız ");
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
  <title>Responsive Bootstrap Advance Admin Template</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
                            <form role="form" method="post" action="register.php">
                                        
                                 <div class="form-group">
                                            <label>Ad</label>
                                            <input class="form-control" name="ad" type="text" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Soyad</label>
                                            <input class="form-control" name="soyad" type="text" required=>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">  
                                            <label>E-Posta</label>
                                            <input class="form-control" name="eposta" type="text" pattern ="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" required>
                                     <p class="help-block"><?php if($durum1==0){echo " Bu e-posta adresi daha önceden kullanılmıştır.";} else{ echo "Help text here.";}?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Tel</label>
                                             <p class="help-block">Örn:"0--- --- -- --" formatında giriniz.</p>  
                                            <input class="form-control" id="phone_number"; name="tel" type="text" pattern="(0(\d{3}) (\d{3}) (\d{2}) (\d{2}))"  required="">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" name="kadi" type="text" required>
                                     <p class="help-block"><?php if($durum==0){echo "Lütfen başka bir kullanıcı ismi giriniz";}else{echo "Help text here.";} ?></p>
                                        </div>
                                            <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" name="sifre" type="password" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                <div class="form-group">
                                            <label>Şifre Tekrar</label>
                                            <input class="form-control" name="sifretekrar" type="password"  required>
                                     <p class="help-block"><?php if($durum==2){echo" Lütfen şifrenizi kontrol ediniz.";} else{ echo"Help text here.";} ?></p>
                                        </div>
                                        <div class="form-group">
                                          <div class="checkbox">
                                          <label><input type="checkbox" name="tur" value="1">Sanayiciyim</label>
                                          </div>
                                        </div>
                                 
                                        <button type="submit" name="bas" class="btn btn-danger">Kayıt Ol</button>

                                    </form>
                            </div>
                        
                            </div>

         </div>


     </div>
 </div>

</body>
</html>

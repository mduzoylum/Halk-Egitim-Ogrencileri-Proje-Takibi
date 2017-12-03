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
                                            <input class="form-control" name="soyad" type="text" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>E-Posta</label>
                                            <input class="form-control" name="eposta" type="text" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input class="form-control" name="tel" type="text" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" name="kadi" type="text" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                            <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" name="sifre" type="password" required>
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                <div class="form-group">
                                            <label>Şifre Tekrar</label>
                                            <input class="form-control" name="sifretekrar" type="password" required>
                                     <p class="help-block">Help text here.</p>
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
<?php 

if (isset($_POST["bas"])) {
include("connection.php");  


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

$sql="insert into sahis_bilgileri(ad,soyad,eposta,tel,kadi,sifre,tur) values('$ad','$soyad','$eposta','$tel','$kadi','$sifre','$tur')";
if($con->query($sql)===TRUE)
{
  echo("Ekledik");
}
else{
  echo("Ekleyemedik !");
}

}
  



?>
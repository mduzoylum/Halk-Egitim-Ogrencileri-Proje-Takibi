<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sanayici Kayıt</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://js.nicdn.de/bootstrap/formhelpers/docs/assets/js/bootstrap-formhelpers-phone.format.js"></script>
    <script src="http://js.nicdn.de/bootstrap/formhelpers/docs/assets/js/bootstrap-formhelpers-phone.js"></script>
  <style>
  </style>
</head>
<body >
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
if($sifre==$sifretekrar)
{
	$sql='SELECT * FROM sahis_bilgileri WHERE kadi="'.$kadi.'" || eposta="'.$eposta.'" || tel="'.$tel.'"';
$qr=$con->query($sql);
if($qr->num_rows>0)
{
	$sonuc= '<div class="alert alert-danger">Üyeliğiniz mevcuttur</div>';
}
else
{
	$sql="insert into sahis_bilgileri(ad,soyad,eposta,tel,kadi,sifre,tur) values('$ad','$soyad','$eposta','$tel','$kadi','$sifre','$tur')";
	if($con->query($sql)===TRUE)
{
  $sonuc= '<div class="alert alert-success">Başarıyla Eklendi</div>';
  
}
else{
  $sonuc= '<div class="alert alert-warning">Bir Hata Oluştu</div>';
}
}
}
else
{
	$sonuc= '<div class="alert alert-info">Şifrenizi Aynı Değil</div>';
}



//veritabanına veri ekleme


}
  
 
   

?>
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
                            <form role="form" method="post" action="sny_register_seyda.php">
                                        <?php echo $sonuc;?>
                                 <div class="form-group">
                                            <label>Ad</label>
                                            <input class="form-control" name="ad" type="text" required>
											
                                     <p class="help-block">Adınızı giriniz.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Soyad</label>
                                            <input class="form-control" name="soyad" type="text" required>
                                     <p class="help-block">Soyadınızı giriniz.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>E-Posta</label>
                                            <input class="form-control" name="eposta" type="email" required>
                                     <p class="help-block">E-Postanızı giriniz.</</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input type="text" name="tel" required class="form-control bfh-phone" data-format="+90 (ddd) ddd dd dd">
                                     <p class="help-block">Telefon numaranızı giriniz.</</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" name="kadi" type="text" required>
                                     <p class="help-block">Kullanıcı adı seçiniz.</p>
                                        </div>
                                            <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" name="sifre" type="password" required>
                                     <p class="help-block">Şifrenizi giriniz.</</p>
                                        </div>
                                <div class="form-group">
                                            <label>Şifre Tekrar</label>
                                            <input class="form-control" name="sifretekrar" type="password" required>
                                     <p class="help-block">Şifrenizi tekrar giriniz.</</p>
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

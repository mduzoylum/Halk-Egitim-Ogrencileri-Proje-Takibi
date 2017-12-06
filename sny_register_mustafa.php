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
<?php 

if (isset($_POST["bas"])) {
//include("connection.php");  
$servername="localhost";
$username="root";
$password="";
$dbname="sanayi";

$con=new mysqli($servername,$username,$password,$dbname);
$con->set_charset("utf8");//Veritabanında Türkçe karakter desteği için
if ($con->connect_error)
{
  die("Hata".$con->connect_error);
}
//else {  echo "Db Connected"."<br>";}

$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$eposta=$_POST["eposta"];
$tel=$_POST["tel"];
$kadi=$_POST["kadi"];
$sifre=$_POST["sifre"];
$sifretekrar=$_POST["sifretekrar"];
if ($sifre!==$sifretekrar) {//iki şifre karşılaştırılıyor doğru ise else'den devam ediyor yanlışsa altta alert içinde hata veriyor.
  echo("<SCRIPT language='JavaScript'> alert('Şifreler eşleşmiyor !')</SCRIPT>");
}
  else{
  
  if (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) { //eposta kontrol ediliyor hatalıysa hata veriyor doğru ise else den devam ediyor. 
     echo("<SCRIPT language='JavaScript'> alert('E-Postanız hatalı görünüyor !')</SCRIPT>");
       }
else {   
if(isset($_POST["tur"]))
{$tur=1;}
else
{$tur=0;}

if($stmt = $con->prepare("SELECT kadi FROM sahis_bilgileri WHERE kadi='$kadi'")) //Şahıs Bilgileri tablosundan kadi sütünundan girilen kullanıcı adına eşit olan bir kaydın olup olmadığını gösterin sql sorgusu oluşturuluyor.
  {
      $stmt->execute(); // execute ile sorgu çalıştır
     $sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
  $tab=$sonuc->fetch_row(); //sorgu sonucu bir nesne olduğu için Fetch row() özelliği ile bunu bir dizi değişkene atıyoruz. 
    
     if ($tab[0]==$kadi) //dizinin ilk ve son :) değeri olan sql sonucunu kullanıcının girdiği değerle kıyaslıyoruz.
     {
    echo("<SCRIPT language='JavaScript'> alert('Seçtiğiniz kullanıcı adı önceden başkası tarafından alınmış görünüyor!')</SCRIPT>"); //girilen değer ile veri tabanı aynı ise alert ile hata veriyoruz. 
    }

   elseif($stmt = $con->prepare("SELECT eposta FROM sahis_bilgileri WHERE eposta='$eposta'")) //şahıs bilgileri tablosunun eposta sütununda kullanıcının girdiği eposta değerini aratatan bir sorgu oluşturuyoruz.
  {
      $stmt->execute(); // execute ile sorgu çalıştır
     $sonuc=$stmt->get_result(); //sql sorgusundan dönen sonuçları al
  $tab=$sonuc->fetch_row();//sorgu sonucu bir nesne olduğu için Fetch row() özelliği ile bunu bir dizi değişkene atıyoruz. 
    
     if ($tab[0]==$eposta) //dizinin ilk ve son :) değeri olan sql sonucunu kullanıcının girdiği değerle kıyaslıyoruz.
     {
    echo("<SCRIPT language='JavaScript'> alert('Yazdığınız e-posta adresi daha öneceden kayıt olmuş görünüyor!')</SCRIPT>"); //sonuç eşit çıkarsa e-posta adresinin daha önceden kayıt için kullanıldığına dair hatamızı veriyoruz.
    }
    else //yukarıdaki hatalardan herhangi birini veremediysek bari girilen değerleri veritabanımızda şahıs bilgileri tablomuza yazalım diyoruz.
    {
      $sql="insert into sahis_bilgileri(ad,soyad,eposta,tel,kadi,sifre,tur) values('$ad','$soyad','$eposta','$tel','$kadi','$sifre','$tur')";//girilen değerleri tablo sütunları ile eşleştiren bir sorgu oluşturuyoruz. 
if($con->query($sql)===TRUE)// sorguyu çalıştırıyoruz bakıyoruz True mi diye.. 
{
  echo("Kayıt Başarıyla Tamamlandı.");//hata yoksa yani true döndürdüyse kaydın başarıyla gerçekleştiğini kullanıcıya müjdeliyoruz. 
}
else{
  echo("Kayıt tamamlanamadı !");//olmaz olmaz da herhangi bir nedenle sorgumuz TRUE döndüremeyecek olursa veritabanına kaydın başarısız olduğu kara haberini hemen ulaştırıyoruz ki kullanıcı kayıt olma fikrinden caymadan bir kere daha deneyebilsin :)
}
  }


    }


  }
    }
      }

}
?>
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
                            <form role="form" method="post" action="sny_register.php">
                                        
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
                                            <label>Telefon Numarası 10 hane giriniz.</label>
                                            <input class="form-control" name="tel" type="text" pattern="[0-9]{10}" maxlength="10" required>
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

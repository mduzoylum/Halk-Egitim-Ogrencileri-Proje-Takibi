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
        <div class="row "  class="col-md-12">

            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

               
               <div class="panel panel-danger">
                        <div class="panel-heading" class="">
                           Sanayici Üye Kaydı
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="islem.php">
                                        
                                 <div class="form-group">
                                            <label>Ad</label>
                                            <input class="form-control" name="ad" type="text"  required="">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Soyad</label>
                                            <input class="form-control" name="soyad" type="text" required="">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>E-Posta</label>
                                            <input class="form-control" name="eposta" type="text" required="" >
                                     <p class="help-block">
                                       
                                       <?php 
                                        if ($_GET['durum']==nomail) {
                                          echo  "Mail standartlarına uygun bir mail giriniz"; 
                                          
                                        }
                                        else
                                        {

                                        }


                                        ?>



                                     </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Tel</label>
                                      <input class="form-control" name="tel" type="text" placeholder="" required="" value="">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" name="kadi" type="text" required="">
                                     <p class="help-block">
                                       


                                        <?php  /* get ile islem sayfasında gönderdiğimiz nokadi yi alıyor ve durumu =nokadi değerine eşitse css php ortaklığı ile kırmızı renkte aynı sayfada uyarı verdirmesini sağlıyoruz*/

                                            if ($_GET['durum']==nokadi) {?>  

                                               <h5 style="color: red" ><?php echo "AYNI KULLANICI ADI MEVCUT"; ?></h5>
                                            <?php } 
                                         
                                           else 
                                            {
                                            
                                              

                                            }



                                           ?>






                                     </p>
                                        </div>
                                            <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" name="sifre" type="password" required="">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                <div class="form-group">
                                            <label>Şifre Tekrar</label>
                                            <input class="form-control" name="sifretekrar" type="password" required="">
                                     <p class="help-block">
                                       
                                      <?php 

                                            if ($_GET['durum']==nosifre) {?>

                                                <h5 style="color: red" ><?php echo "ŞİFRE İLE TEKRARI AYNI OLMALI"; ?></h5>
                                              
                                            <?php } 
                                         
                                           else if ($_GET['durum']==ok) 
                                            {
                                            
                                              echo "KAYIT GERÇEKLEŞTİRİLDİ";


                                            }

                                            ?>

                                          




                                     </p>
                                        </div>
                                        <div class="form-group">
                                          <div class="checkbox">
                                          <label><input type="checkbox" name="tur" value="1">Sanayiciyim</label>
                                          </div>
                                        </div>
                                 
                                        <button type="submit" name="ekle" class="btn btn-danger">Kayıt Ol</button>
                                        <p class="help-block">
                                          
                                          <?php 

                                            if ($_GET['durum']==no) {

                                              echo "KAYIT GERÇEKLEŞTİRİLEMEDİ";
                                              # cod"  e...
                                            }
                                         
                                           else if ($_GET['durum']==ok) 
                                            {
                                            
                                              echo "KAYIT GERÇEKLEŞTİRİLDİ";

                                            }



                                           ?>







                                        </p>

                                    </form>
                            </div>
                        
                            </div>

         </div>


     </div>
 </div>

</body>
</html>

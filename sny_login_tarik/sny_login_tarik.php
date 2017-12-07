<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sanayim</title>
  
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(/endustri.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #264faf
	 !important;
	font-weight:bold;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login button[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.checkbox{
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 900;
	padding: 4px;
}

}


.login button[type=submit]:hover{
	opacity: 0.8;
}

.login button[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login button[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>sanayim<span>.net</span></div>
		</div>
		<br>
		<div class="login"><!-- LOGIN FORMUMUZ-->
				<form action="kontrol.php" action="sny_login_tarik.php" method="post">
				<input type="text" placeholder="Kullanıcı adı veya Eposta" name="kadi" required><br>
				<input type="password" placeholder="Şifre" name="sifre" required><br>
				<button type="submit" value="Giriş">Giriş</button></br>
				<tr>
    <td colspan="2"><input type="checkbox" name="hatirla" value="1" 
    	<?php 
 //BENİ HATIRLA COOKİE İLE YAPILDI COOKİE ATAMALARI SIRASINDA @ KULLANILDI ÇÜNKÜ SAYFA YÜKLENDİĞİNDE POST EDİLEN BİRŞEY YOK VE ERROR BASIYOR
if(isset($_POST['hatirla']))
{
 echo "checked";
 if(isset($_POST['kadi']) && isset($_POST['sifre']))
 {
  @setcookie("kullaniciadi",$_POST['kadi'], time()+60*60*24);
  @setcookie("sifre",$_POST['sifre'], time()+60*60*24);
 }
}
else
{
@setcookie("kullaniciadi",$_POST['kadi'], time()-60*60*24);
@setcookie("sifre",$_POST['sifre'], time()-60*60*24);
}

?> />
      Beni hatırla</td>
  </tr>
  <tr>
				</form>
		</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php
//DB bilgileri girildi 
$host="localhost";
$user="root";
$pass="";
$db="sanayimnet";


//DB Bağlantısı yapıldı
$con = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





?>




</body>
</html>

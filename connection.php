<?php
$servername="localhost";
$username="root";
$password="";
$db="sanayim_db";
$con=new mysqli($servername,$username,$password,$db);
$con->set_charset('UTF8');//türkçe karakter desteği için
if ($con->connect_error) {
	die("Hata".$con->connect_error);
}
?>
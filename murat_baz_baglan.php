<?php
//host adı localhost veya 127.0.0.1 gibi 
$servername = "localhost";
//Kullanıcı adı
$username = "root";
//veritabanı şifresi
$password = "";

//veritabanı adı
$dbname = "sanayim";

// Veritabanı Bağlantısı
$db = new mysqli($servername, $username, $password, $dbname);
// Veritabanına bağlandı mı
if ($db->connect_error) {
    die("Hata Kodu " . $db->connect_error);
}
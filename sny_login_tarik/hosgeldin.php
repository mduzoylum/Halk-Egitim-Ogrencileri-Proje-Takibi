<?php
//DB bilgileri girildi 
$host="localhost";
$user="root";
$pass="";
$db="sanayimnet";

session_start();
//DB Bağlantısı yapıldı
$con = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//Kullanıcı adı şifre ve isim bilgileri için DB Kontrolü yap
mysqli_set_charset($con,"utf8");
$gel="SELECT * FROM kullanicib";
$cek=$con->query($gel);

if($cek->num_rows>0)
{

while($getir=$cek->fetch_assoc()) {
	$getir["kullaniciadi"]." ".$getir["sifre"].$getir['isim'];

//Burada DB de kayıtlı olan kullanıcının ismi alındı ve ekrana hoşgeldiniz mesajı basıldı
echo "Hoşgeldin ".$getir['isim']."<br>";
//Sessionlar alındı
$_SESSION['kullaniciadi']=$getir["kullaniciadi"];
$_SESSION['sifre']=$getir["sifre"];
//sessionlar yazıldı
echo "Session 1: ".$_SESSION['kullaniciadi']."<br>Session 2: ".$_SESSION['sifre'];
}}







//IP yi çekmek için hazır fonksiyon kullanıldı.Domain ve Hosting olmayınca çalışmıyor maalesef ama kendi web sitemde denedim tarikcaliskan.16mb.com/blog/ip.php adresinden ulaşabilirsiniz. :/
function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}



echo "<br>"."IP Adresiniz: ".GetIP();
echo "<br>";



//Yine hazır bir fonksiyonla konum bilgisi çekilip ekrana yazılabilir.Bunun için domain hosting olan bir siteye ihtiyacımız var.Bunu sitemde tarikcaliskan.16mb.com/blog/ip.php adresine örneğini yükledim.
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}


echo ip_info("Visitor", "City"); 
echo "<br>";
echo ip_info("Visitor", "Country"); 
echo "<br>";
echo ip_info("Visitor", "Country Code"); 
echo "<br>";

?>
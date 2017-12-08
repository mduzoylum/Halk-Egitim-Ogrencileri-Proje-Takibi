<?php
//Post Kontrol
function post($name="",$html="true"){
	if($name==""){
		return false;
	}
	else {
		$post=$_POST[$name];
		$post=trim($post);
		if($html=="true"){
			return $post;
		}
		else{
			$post=strip_tags($post);
			return $post;
		}
	}
}
//get gelen veri Kontrol
function get($name="",$html="true"){
	if($name==""){
		return false;
	}
	else {
		$post=$_GET[$name];
		$post=trim($post);
		if($html=="true"){
			return $post;
		}
		else{
			$post=strip_tags($post);
			return $post;
		}
	}
}
//Session Oluşturma
function session($veri=array(),$tip="admin"){
	foreach($veri as $row=>$item){
		$_SESSION[$tip][$row]=$item;
	}
}
//Yönlendirme
function yonlendir($git,$time=0)
{
    if($time==0)
    {
        @header("location:".$git);
    }
    else
    {
        @header("Refresh:".$time."; url=".$git);
    }
}

//Tarih formatı
function tarih($par)
{
    $explode = explode(" ", $par);
    $explode2 = explode("-", $explode[0]);
    $zaman = substr($explode[1], 0, 5);
    if ($explode2[1] == "1") $ay = "Ocak";
    elseif ($explode2[1] == "2") $ay = "Şubat";
    elseif ($explode2[1] == "3") $ay = "Mart";
    elseif ($explode2[1] == "4") $ay = "Nisan";
    elseif ($explode2[1] == "5") $ay = "Mayıs";
    elseif ($explode2[1] == "6") $ay = "Haziran";
    elseif ($explode2[1] == "7") $ay = "Temmuz";
    elseif ($explode2[1] == "8") $ay = "Ağustos";
    elseif ($explode2[1] == "9") $ay = "Eylül";
    elseif ($explode2[1] == "10") $ay = "Ekim";
    elseif ($explode2[1] == "11") $ay = "Kasım";
    elseif ($explode2[1] == "12") $ay = "Aralık";
    return $explode2[2]." ".$ay." ".$explode2[0];
}
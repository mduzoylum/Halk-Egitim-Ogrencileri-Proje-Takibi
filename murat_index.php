<?php
$con=new mysqli("localhost","root","","arama_ornek") or die("mysql ba?lant? hatas?");
?>
<!doctype html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>AnaSayfa</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(function(){
	var kelime="";
    $("#kelime").keyup(function(e){
        var key = e.keyCode;
        if (key == 40 || key == 13 || key==38){
            var $prev, $next, $current = $("#aramaliste li.secilen");
            if (key == 40) {
                if(!$current.length){
                    $("#aramaliste li:first").addClass("secilen");
                    var deger=$("#aramaliste li:first").text();
                    $("#kelime").val(deger);

                }
                else{
                    $next = $current.next("li");
                    var deger= $next.text();
                    $("#kelime").val(deger);
                    if ($next.length) {
                        $current.removeClass("secilen");
                        $next.addClass("secilen");
                    }
                    else {
                        $("#aramaliste li").removeClass("secilen");
                        $("#kelime").val(kelime);
                    }
                }

            }
            else if(key== 38){
                $prev = $current.prev("li");
                var deger= $prev.text();
                $("#kelime").val(deger);
                if ($prev.length) {
                    $current.removeClass("secilen");
                    $prev.addClass("secilen");
                }
                else if(!$current.length){
                    $("#aramaliste li:last").addClass("secilen");
                    var deger=$("#aramaliste li:last").text();
                    $("#kelime").val(deger);
                }
                else{
                    $("#aramaliste li").removeClass("secilen");
                    $(this).val(kelime);
                }
            }
        }
        else {
            $("#aramaliste").show();
            $("#aramaliste").html('<img src="http://www.ikincielhyundai.com/assets/img/loading.gif" style="width:80px; display: block; margin:auto;"/>');
            var urlm="ara.php";//arama yapılacak site
            kelime=$(this).val();//değerini al
            $.post(urlm,{"kelime":kelime},function(al){ //ara.php ye gönder
                $("#aramaliste").html(al);//gelen verileri .kerlimeler clasına ait divin içine yaz
            });
        }
    });
});
function tamamla(al){//tamamla fonsiyonu çağırılınca gönderilen veriyi al
	$("#kelime").val(al);//inputa koy
	$("#aramaliste").html("");//kelimeler clasına ait divi temizle
}
</script>
<style type="text/css">
/*basit tasarım*/
#ana{width:175px;position:relative;margin:auto;}
#kelime{width:150px;height:20px;position:absolute;left:0px;top:0px;}
#ana #aramaliste {float: left; width: 100%; display: none; height: auto; position: absolute; list-style-type: none; margin:30px 0 0 0;padding:0; background: #FFFFFF;}
#ana #aramaliste li{width: calc( 100% - 20px); cursor: pointer; float: left; border-bottom: solid 1px #eee; padding:5px 10px;}
#ana #aramaliste li:hover{background:#eee;}
#ana #aramaliste .secilen{background:#eee;}
#ana #aramaliste li::selection{background:#eee;}

</style>
</head>
<body>

<div id="ana">
	<form action="" id="arama_frm">
		<input type="text" name="q" id="kelime" autocomplete="off"/>
		
		<ul id="aramaliste">
			<!--Arama Sorgusunda Öneriler Bu Alanda Çıkack -->
		</ul>
	</form>
	
</div>


</body>
</html>

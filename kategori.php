<?php
$db= @new mysqli("localhost", "root", "", "komek");
if($db->connect_error){die('Bağlantı Hatası: ' . $db->connect_error); }
	$db->set_charset("utf8");

	$sonuc = $db->query("SELECT * FROM kategori ORDER BY ad");
	$kategori = $sonuc->fetch_all(MYSQLI_ASSOC);
	function menu($kategori, $ust_id=NULL){
		echo "<ul>";
		foreach ($kategori as $liste) {
			if ($liste['ust_id']== $ust_id) {
				echo "<li>{$liste['ad']}";
				menu($kategori,$liste['id']);
				echo "</li>";
			}
		}
		echo "</ul>";
	}
menu($kategori);
$db->close();

?>

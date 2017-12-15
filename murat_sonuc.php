<?php
$con=new mysqli("localhost","root","","arama_ornek") or die("mysql bağlantı hatası");
$con->set_charset("utf8");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sonuclar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<style type="text/css">
	.row{margin:10px 0;}
	</style>
</head>
<body>
	<div class="row">
		<div class="container">
		<?php
		if($_GET["firma_id"]){
			$sql="select * from firmalar where firma_id='".$_GET["firma_id"]."'";
			$qr=$con->query($sql);
			if($qr->num_rows){
				$row=$qr->fetch_assoc();
				?>
				<div class="col-xs-12">
				<ol class="breadcrumb">
				<?php
					echo '<li class="breadcrumb-item"><a href="aramalar.php?q='.$row["firma_il"].'&btn_ara=ara">'.$row["firma_il"].'</a></li>';
					echo '<li class="breadcrumb-item"><a href="aramalar.php?q='.$row["firma_ilce"].'&btn_ara=ara">'.$row["firma_ilce"].'</a></li>';
					echo '<li class="breadcrumb-item"><a href="aramalar.php?q='.$row["firma_sanayi"].'&btn_ara=ara">'.$row["firma_sanayi"].'</a></li>';
				?>
				  </ol>
				  <div class="col-xs-12">
					<div class="row" style="border-bottom:solid 1px #000">
					<div class="col-xs-4">
						<h1>Logo</h1>
					</div>
					<div class="col-xs-8">
						<strong>Firma Adı</strong> :<?=$row["firma_adi"];?><br/>
						<strong>Firma Adres</strong> :<?=$row["firma_adres"];?><br/>
						<strong>Firma Sektör</strong> :<?=$row["firma_sektor"];?> <br>
						<strong>Firma Tel</strong> :<?=$row["firma_tel"];?> <br>
						<strong>Firma İl-İlçe</strong> :<?=$row["firma_il"];?> /  <?=$row["firma_ilce"];?><br>
					</div>
				</div>
				  </div>
			</div>
				<?php
			}
			else{
				echo '<center><h2>Sonuc Bulunamadı.... :(</center>';
			}
		}
		?>
		</div>
	</div>
</body>
</html>
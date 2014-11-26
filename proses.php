<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Registrasi - Sukses!</title>
	</head>

	<body>
		<?php
		include('koneksi.php');

		$nama = $_POST['nama'];
		$sekolah = $_POST['sekolah'];

		$query = $conn->query("INSERT INTO `ppdb`.`siswa` (`id_siswa`, `nama`, `sekolah`) VALUES (NULL, '$nama', '$sekolah')");

		if($query === false){
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		} else {?>

		<p id="textIDnya">IDS<?php echo $conn->insert_id;?></p>
		<div id="qrcode"></div>
		<?php } ?>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/qrcode.js"></script>
		<script type="text/javascript">
		var idnya = document.getElementById("textIDnya").innerHTML;
		new QRCode(document.getElementById("qrcode"), idnya);
		</script>
	</body>
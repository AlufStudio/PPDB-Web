<?php
	include('koneksi.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>List Pendaftar</title>
	</head>
	<body>
		<table>
			<tr>
				<th>No</th>
				<th>IDS</th>
				<th>Nama</th>
				<th>Nama Sekolah</th>
				<th colspan="2">Action</th>
			</tr>
			<?php
				$sql = "SELECT * FROM siswa ORDER BY id_siswa";

				if($result = $conn->query($sql)){
					$no = 1;
					while($obj = $result->fetch_object()){
						?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo "IDS".$obj->id_siswa;?></td>
						<td><?php echo $obj->nama;?></td>
						<td><?php echo $obj->sekolah;?></td>
						<td><a href="form_konfirmasi.php?code=IDS<?php echo $obj->id_siswa;?>">Konfirmasi</button></td>
						<td><button>Delete</button></td>
					</tr>

					<?php $no++;}
				}
			?>
			
	</body>
</html>
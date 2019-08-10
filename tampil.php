<style type="text/css">
table {
	border-collapse: collapse;
}
th, td {
	padding: 5px;
	color: 

}
body {
		background-color : #fff;
		margin: 10px;
		color: #4F5155;
		 font-family: sans-serif,arial;
        font-size: 16px;
}



</style>
<table border="1">
	<tr>
		<th>#</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Opsi</th>
	</tr>
	<?php
	include 'koneksi.php';
	$no = 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM tb_anggota");
		while($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo ucfirst($data['jk']); ?></td>
				<td><?php echo $data->alamat; ?></td>
				<td><?php echo $data->telp; ?></td>
				<td>
					<button class="edit" id="<?php echo $data['0']; ?>">Edit</button>
					<button class="hapus" id="<?php echo $data['0']; ?>">Hapus</button>
				</td>
			</tr>
		<?php
		}
	} catch (Exception $e) {
		echo $e-->getMessage();
	}
	?>
	
</table>
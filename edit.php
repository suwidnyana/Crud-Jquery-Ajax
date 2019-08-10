<fieldset style='width: 330px'>
	<legend><b>Edit Data</b></legend>
		<?php
		include 'koneksi.php';
		$id = @$_POST['id'];
		$tampilperID = $db->query("SELECT * FROM tb_anggota WHERE id = '$id'");
		$data = $tampilperID->fetch(PDO::FETCH_OBJ);
		?>
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="hidden" id="id_anggota" value="<?php echo $data->id; ?>">
					<input type="text" id="nama" value="<?php echo $data->nama; ?>">
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<select id="jk">
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan" <?php if($data->jk == 'perempuan') { echo "selected";} ?>>Perempuan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<textarea id="alamat"><?php echo $data->alamat; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td>
					<input type="text" id="telp" value="<?php echo $data->telp; ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button id="simpanedit">Simpan</button>
				</td>
			</tr>
		</table>
</fieldset>
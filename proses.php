<?php
include "koneksi.php";

		$nama = @$_POST['nama'];
		$jk = @$_POST['jk'];
		$alamat = @$_POST['alamat'];
		$telp = @$_POST['telp'];
		
		$id = @$_POST['id'];

if(@$_GET['page'] == 'tambah') {
	$insert = $db->prepare("INSERT INTO tb_anggota(nama,jk,alamat,telp) VALUES(?,?,?,?)");
	$insert->bindParam(1,$nama);
	$insert->bindParam(2,$jk);
	$insert->bindParam(3,$alamat);
	$insert->bindParam(4,$telp);
	$insert->execute();
	if($insert->rowCount() > 0) {
		echo "sukses";
	}

} else if(@$_GET['page'] == 'edit') {

	$edit = $db->prepare("UPDATE tb_anggota SET nama = ?, jk = ?, alamat = ?, telp = ? where id = ?");
	$edit->execute(array($nama, $jk, $alamat, $telp, $id));
	/*$edit->bindParam(1,$nama);
	$edit->bindParam(2,$jk);
	$edit->bindParam(3,$alamat);
	$edit->bindParam(4,$telp);
	$edit->bindParam(5,$id);
	$edit->execute();*/
	if ($edit->rowCount() > 0 ) {
		 echo "sukses";
	}

} else if(@$_GET['page'] == 'hapus') {

	$del = $db->prepare("DELETE FROM tb_anggota WHERE id =:id");
	$del->bindParam(":id", $id);
	$del->execute();
	if ($del->rowCount() > 0 ) {
		 echo "sukses";
	}
}
?>
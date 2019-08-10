<!DOCTYPE html>
<html>
<head>
	<title>Belajar CRUD PDO</title>
	<style type="text/css">
		body {
			font-family: arial;
		}
	</style>
</head>
<body>

<div style="margin-bottom:10px;">
	<button id="tambahdata">Tambah</button>
</div>

<div id="tampildata" style="margin-bottom:10px;">
	<?php include 'tampil.php'; ?>
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah.php").fadeIn(1000);
});


$("#cruddata").on("click", "#simpantambah", function() {
	var nama = $("#nama").val();
	var jk = $("#jk").val();
	var alamat = $("#alamat").val();
	var telp = $("#telp").val();
	if(nama == '' || jk == '' || alamat == '' || telp == '') {
		alert("Inputan tidak boleh kosong");
	} else {
		 $.ajax({
			url : 'proses.php?page=tambah',
			type : 'post',
			data : 'nama='+nama+'&jk='+jk+'&alamat='+alamat+'&telp='+telp,
			success :  function(msg) {
				if(msg == 'sukses')  {
					$("#tampildata").load("tampil.php");
				} else {
					alert("Gagal Menambahkan Data")
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function() {
	var id =  $(this).attr("id");
	$.ajax({
		url : 'edit.php',
		type : 'post',
		data : 'id='+id,
		success : function(msg) {
			$("#cruddata").hide().fadeIn(1000).html(msg);
		}
	});
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama = $("#nama").val();
	var jk = $("#jk").val();
	var alamat = $("#alamat").val();
	var telp = $("#telp").val();
	var id = $("#id_anggota").val();
	if(nama == '' || jk == '' || alamat == '' || telp == '') {
		alert("Inputan tidak boleh kosong");
	} else {
		 $.ajax({
			url : 'proses.php?page=edit',
			type : 'post',
			data : 'nama='+nama+'&jk='+jk+'&alamat='+alamat+'&telp='+telp+'&id='+id,
			success :  function(msg) {
				if(msg == 'sukses')  {

					$("#tampildata").load("tampil.php");
					$("#cruddata").hide();
				} else {
					alert("Gagal Edit Data")
				}
			}
		});
	}
});

$("#tampildata").on("click", ".hapus", function() {
	var id =  $(this).attr("id");
	var conf = confirm("Yakin Ingin Menghapus Data ?");
	if (conf == true) {
		$.ajax({
			url : 'proses.php?page=hapus',
			type : 'post',
			data : 'id='+id,
			success : function(msg) {
				if(msg == 'sukses')  {
						$("#tampildata").load("tampil.php");
						$("#cruddata").hide();
					} else {
						alert("Gagal Hapus Data")
					}
			}
		});
	}
});
</script>

</body>
</html>
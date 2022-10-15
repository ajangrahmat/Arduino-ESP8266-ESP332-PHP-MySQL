<?php
include('koneksi.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "DELETE FROM data WHERE id=$id";
	$hapus = mysqli_query($koneksi, $sql);

	if($hapus){
		echo "Berhasil Hapus";
	}else{
		echo "Gagal Hapus" . mysqli_query_error($koneksi);
	}
}else{
	echo "no data";
}
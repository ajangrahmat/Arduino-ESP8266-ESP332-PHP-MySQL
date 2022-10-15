<?php
include('koneksi.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "UPDATE data SET suhu=36.8 WHERE id=$id";
	$update = mysqli_query($koneksi, $sql);

	if($update){
		echo "Berhasil Update";
	}else{
		echo "Gagal Update" . mysqli_query_error($koneksi);
	}
}else{
	echo "no data";
}
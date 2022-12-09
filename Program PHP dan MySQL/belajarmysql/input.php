<?php
include('koneksi.php');

if (isset($_POST['suhu']) && isset($_POST['kelembaban'])) {

	$suhu = $_POST['suhu'];
	$kelembaban = $_POST['kelembaban'];

	//Tanggal dan Waktu
	$tanggal = date("Y-m-d");
	$waktu = date("H:i:s");

	$sql = "INSERT INTO data VALUES(NULL,'$tanggal','$waktu',$suhu,$kelembaban)";
	$input = mysqli_query($koneksi, $sql);

	if ($input) {
		echo "2000";
	} else {
		echo "Gagal Input" . mysqli_query_error($koneksi);
	}
} else {
	echo "no data";
}

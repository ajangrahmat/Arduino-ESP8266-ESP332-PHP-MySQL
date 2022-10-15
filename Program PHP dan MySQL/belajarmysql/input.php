<?php 
include('koneksi.php');

if(isset($_POST['jarak'])){

	$jarak = $_POST['jarak'];

	//Tanggal dan Waktu
	$tanggal = date("Y-m-d");
	$waktu = date("H:i:s");

	$sql = "INSERT INTO data VALUES(NULL,'$tanggal','$waktu',$jarak)";
	$input = mysqli_query($koneksi,$sql);

	if($input){
		echo "Berhasil Input Data: " . $jarak;
	}else{
		echo "Gagal Input" . mysqli_query_error($koneksi);
	}

}else{
	echo "no data";
}

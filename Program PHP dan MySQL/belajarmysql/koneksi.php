<?php
$server = "localhost";
$user 	= "root";
$pass	= "";
$dbname	= "belajarmysql";

$koneksi = mysqli_connect($server,$user,$pass,$dbname);

if(!$koneksi){
	echo "Gagal Terhubung" . mysqli_connect_error();
}
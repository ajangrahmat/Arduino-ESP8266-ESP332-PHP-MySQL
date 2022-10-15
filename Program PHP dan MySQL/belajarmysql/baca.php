<?php

header("refresh: 2");

include('koneksi.php');

$sql = "SELECT * FROM data ORDER By id DESC";
$data = mysqli_query($koneksi, $sql);

$no = 1;
while($row = mysqli_fetch_assoc($data)){
	echo $no++ . " " . $row['suhu'] . " " . $row['kelembaban'] . "<br>";
}
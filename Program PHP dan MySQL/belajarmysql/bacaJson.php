<?php

include('koneksi.php');

$sql = "SELECT * FROM data ORDER By id DESC";
$data = mysqli_query($koneksi, $sql);

$json = array();
while($row = mysqli_fetch_assoc($data)){
	$json[] = $row;
}

echo json_encode($json);
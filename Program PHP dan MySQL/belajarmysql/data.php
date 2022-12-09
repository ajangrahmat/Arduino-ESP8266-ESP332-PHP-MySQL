<?php
include('koneksi.php');
$sql = "SELECT * FROM data ORDER By id DESC LIMIT 1";
$data = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($data);
?>
<div class="row">
    <div class="col">
        <div class="card border-0 bg-light">
            <div class="card-body">
                <p>Suhu</p>
                <h1><?php echo $row['suhu'] ?> C</h1>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-0 bg-light">
            <div class="card-body">
                <p>Kelembaban</p>
                <h1><?php echo $row['kelembaban'] ?> %</h1>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu</th>
            <th scope="col">Suhu</th>
            <th scope="col">Kelembaban</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM data ORDER By id ASC LIMIT 20";
        $data = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_array($data)) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['tanggal'] ?></td>
                <td><?php echo $row['waktu'] ?></td>
                <td><?php echo $row['suhu'] ?></td>
                <td><?php echo $row['kelembaban'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
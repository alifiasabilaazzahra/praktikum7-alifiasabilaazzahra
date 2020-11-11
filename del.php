<?php
include 'koneksi.php';

$nik   = $_GET['nik'];

$query="DELETE from penduduk where nik='$nik'";
mysqli_query($koneksi, $query);

header("location:masuk.php");
?>
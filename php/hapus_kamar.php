<?php

include 'koneksi.php';

// Menangkap kode yang dikirim dari url view_barang.php
$code = $_GET['kode'];

// menghapus data dari database
mysqli_query($con, "delete from kamar where id_kamar='$code'");

// mengalihkan halaman kembali ke frminsert.php
header("location:frmkamar.php");
?>
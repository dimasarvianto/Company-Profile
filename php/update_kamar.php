<?php
	
	include "koneksi.php";
	// menangkap data yang dikirim dari form
		$id_kamar		= $_POST['id_kamar'];
		$tipe_kamar		= $_POST['tipe_kamar'];
		$hrg_malam		= $_POST['hrg_malam'];

	//  update data ke database
		mysqli_query($con, "UPDATE kamar set tipe_kamar 		= '$tipe_kamar',
											  hrg_malam 		= '$hrg_malam'
											  where id_kamar 	= '$id_kamar'");

header("location:frmkamar.php");
?>
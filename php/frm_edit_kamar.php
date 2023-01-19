<!DOCTYPE html>
<html>
<head>
	<title>Harga malam</title>
	<style>

	.kepala {
		margin : 20px auto 0 auto;
		width  : 600px;
		font-weight: bold;
		font-size: 20px;
		font-family: times new roman;
		height  : auto; 
		padding  : 5px;
		background-color: #99b3ff;
		color: white;
		text-align-last: center;
	}

	.tubuh {
		margin  : 0 auto; 
		width  : 600px;
		padding  : 5px;
		height: auto;
		border: 3px;
		font-size: 18px;
		background-color: white;
		border-color: black;
		border-width: 1px;
		border-style: solid;
	}


	label {
		width: 200px;
		font-size: 17px;
		display: block;
	}

	input [type="text"]{
		border-radius: 3px;
		width: 400px;
		font-size: 15px;
	}
	
	</style>
</head>
<body>
	<?php
		include 'koneksi.php';
		// menangkap kode yang dikirim dari url view_barang.php
		$code = $_GET['kode'];
		$data = mysqli_query($con, "select * from kamar where id_kamar='$code'");
		while ($dt_kamar = mysqli_fetch_array($data))
		{
?>

<form method ="POST" action="update_kamar.php">
	<input type="hidden" name="kode" value="<?php echo $dt_kamar['idkamar']; ?>">

	<div class="kepala"> == UPDATE KAMAR == </div>
	<div class="tubuh">
			<label> Kode Barang :</label> 
			<input type="text" name="id_kamar" value="<?php echo $dt_kamar['id_kamar']; ?>" readonly> <br> <br>

			<label> Nama Barang :</label> 
			<input type="text" name="tipe_kamar" value="<?php echo $dt_kamar['tipe_kamar']; ?>" > <br> <br>

			<label> Harga Satuan :</label> 
			<input type="text" name="hrg_malam" value="<?php echo $dt_kamar['hrg_malam']; ?>"> <br> <br>

			<input type="submit" name="btn_update" Value="update"> 
	</div>
</form>	
	<?php 
		}	
	 ?>
</body>
</html> 


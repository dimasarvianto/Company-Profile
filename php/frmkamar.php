<?php
	
	include "koneksi.php";

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$id_kamar		= $_POST['id_kamar'];
		$tipe_kamar		= $_POST['tipe_kamar'];
		$hrg_malam		= $_POST['hrg_malam'];

		// memeriksa keberadaan data didatabase
		$data = mysqli_query($con, "select * from kamar where id_kamar = '$id_kamar'");
		$result = mysqli_num_rows($data);
		if ($result > 0) {
?>			
			<script>
				alert("Data Sudah Ada!!!");
			</script>

<?php
		}
		mysqli_query($con, "INSERT INTO kamar(id_kamar, tipe_kamar, hrg_malam)
			values ('$id_kamar','$tipe_kamar','$hrg_malam')");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>harga kamar</title>
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
<form method ="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
	<div class="kepala">===+KAMAR+====</div>
	<div class="tubuh">
			<label> ID KAMAR :</label> 
			<input type="text" name="id_kamar" required> <br> <br>

			<label> TIPE KAMAR :</label> 
			<input type="text" name="tipe_kamar" required> <br> <br>

			<label> HARGA MALAM :</label> 
			<input type="text" name="hrg_malam" required> <br> <br>

			<input type="submit"  Value="Submit"> 
	</div>
</form>	
	<?php include "view_kamar.php" ?>
</body>
</html>
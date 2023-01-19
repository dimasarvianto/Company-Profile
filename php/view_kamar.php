<style>
	#kamar {
		font-family: times new roman, helvetica, sans-serif;
		border-collapse: collapse;
		width     : 70%;
		margin    : 20px auto;
		text-align: center;
	}

	#kamar td, #kamar th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#kamar tr:nth-child(even) {
		background-color: #ffe6e6;
	}

	#kamar th {
		padding: 12px;
		text-align: center;
		background-color: #4dc3ff;
		color: white;
	}

	.pagination {
		width: 70%;
		margin: 20px auto;
		font-family: times new roman, helvetica, sans-serif;
	}

	span {
		border: 1px solid #ddd;
		background: #ddd;
		padding: 5px 8px;
		margin-right: 5px;
	}

	a:link {
		text-decoration: none;
	}


	a:hover {
		/*background: #4caf50;*/
		color: white;
	}

	span:hover {
		background: #4caf50;
		color: white;
	}
	
</style>


<table id="kamar">
	<th>NO</th>
	<th>ID KAMAR</th>
	<th>TIPE KAMAR</th>
	<th>HARGA/MALAM</th>
	<th colspan="2">AKSI</th>


<?php
	include "koneksi.php";

	$per_page= 5;
	$page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 1;
	$mulai = ($page>1) ? ($page *$per_page) - $per_page : 0;
	$result = mysqli_query($con, "select * from kamar") ;
	$total = mysqli_num_rows($result);
	$pages = ceil($total/$per_page);

	$no = $mulai+1;
	$data = mysqli_query ($con, "select * from kamar LIMIT $mulai, $per_page");
	while ($dt_kamar = mysqli_fetch_array($data))
	{
		echo "<tr>";
			echo "<td>$no</td>";
			echo "<td>$dt_kamar[id_kamar]</td>";
			echo "<td>$dt_kamar[tipe_kamar]</td>";
			echo "<td>$dt_kamar[hrg_malam]</td>";
			echo "<td><a href=frm_edit_kamar.php?kode=$dt_kamar[id_kamar]>EDIT</a></td>";
			echo "<td><a href=hapus_kamar.php?kode=$dt_kamar[id_kamar]>HAPUS</a></td>";
			echo "</tr>";
			$no++;
	}
?>
</table>
<div class ="pagination">
	<?php
		for ($i=1; $i<=$pages ; $i++)
		{
			echo "<a href=?per_page=$i><span>$i</span><a/>";
		}
?>
</div>
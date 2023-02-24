<?php
	include("koneksi.php");
		$id = $_GET['id_anggota'];	
		$sql = "DELETE FROM anggota WHERE id_anggota='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: index.php?act=delete&msg=success");
?>
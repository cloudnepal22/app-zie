<?php
	include("koneksi.php");
	
	if(isset($_GET['id_anggota'])){
		$sql = "SELECT * FROM anggota WHERE id_anggota='". $_GET['id_anggota'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}


	if(isset($_POST['perbarui'])){
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$nohp=$_POST['nohp'];
		$alamat=$_POST['alamat'];

		$sql = "UPDATE anggota SET
				nama_anggota='". $nama ."',
				no_anggota='". $nohp ."',
				alamat_anggota='". $alamat ."'
				WHERE id_anggota='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		if($ress){
			echo "<script>alert('Edit Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			echo "<script type='text/javascript'> document.location = 'update.php?id_anggota=$id'; </script>";
		}
	}
	// deskripsi halaman
	$pagedesc = "Data Anggota OSIS";
	$menuparent = "anggota";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Anggota OSIS</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama_anggota']; ?>" required>
											<input type="hidden" name="id" class="form-control" placeholder="Nama" value="<?php echo $data['id_anggota']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="nohp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['no_anggota']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-4">
											<textarea name="alamat" class="form-control" placeholder="Alamat" rows="4" required><?php echo $data['alamat_anggota']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Foto  (Max 2MB)</label>
										<div class="col-sm-4">
											<a href="efs/foto/<?php echo htmlentities($data['foto_anggota']);?>" target="blank"><img src="efs/foto/<?php echo htmlentities($data['foto_anggota']);?>" width="100"></a>
											<a href="ubahfoto.php?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger">Ubah Foto</a>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Formulir (Max 2MB)</label>
										<div class="col-sm-4">
											<a href="efs/formulir/<?php echo htmlentities($data['formulir_anggota']);?>" target="blank">Lihat Formulir</a>
											<a href="ubahformulir.php?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger">Ubah Formulir</a>										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="perbarui" class="btn btn-success">Update</button>
									<a href="index.php" class="btn btn-default">Batal</a>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>
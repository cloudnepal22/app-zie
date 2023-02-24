<?php
	include("koneksi.php");
	
	// deskripsi halaman
	$pagedesc = "Anggota OSIS";
	$menuparent = "anggota";
	include("layout_top.php");
	
	if(isset($_POST['simpan'])){
		$nama = $_POST['nama'];
		$nohp	= $_POST['nohp'];
		$alamat = $_POST['alamat'];

		$maxsize = 2000000;
		$sizefoto =$_FILES["foto"]["size"];
        $foto=$_FILES["foto"]["name"];
        $str1 = substr($foto,-5);
        $image = date('dmYHis').$str1;
        
		$sizeform =$_FILES["formulir"]["size"];
        $bukti=$_FILES["formulir"]["name"];
        $str2 = substr($bukti,-5);
        $bukti2 = date('dmYHis').$str2;

		if($sizefoto>$maxsize || $sizeform>$maxsize){
				echo "<script>alert('Foto/Formulir lebih dari 2MB!');</script>";
				echo "<script type='text/javascript'> document.location = 'anggota_tambah.php'; </script>";
		}else{
			
        move_uploaded_file($_FILES["foto"]["tmp_name"],"efs/foto/".$image);
        move_uploaded_file($_FILES["formulir"]["tmp_name"],"efs/formulir/".$bukti2);
        
        //Query input menginput data kedalam tabel anggota
        $sql="INSERT INTO anggota (nama_anggota,no_anggota,alamat_anggota,foto_anggota,formulir_anggota) values
		('$nama','$nohp','$alamat','$image','$bukti2')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);


		if($hasil){
			echo "<script>alert('Tambah Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
			echo("Error description: " . mysqli_error($conn));
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			echo "<script type='text/javascript'> document.location = 'anggota_tambah.php'; </script>";
		}
		}
	}
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
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="nohp" min="0" class="form-control" placeholder="Telepon" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-4">
											<textarea name="alamat" class="form-control" placeholder="Alamat" rows="4" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Foto (Max 2MB)</label>
										<div class="col-sm-4">
											<input type="file" name="foto" required="required" accept="image/*" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Formulir (Max 2MB)</label>
										<div class="col-sm-4">
											<input type="file" name="formulir" required="required" accept="Application/Pdf" required>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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
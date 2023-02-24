<?php
	// deskripsi halaman
	$pagedesc = "Data Anggota";
	include("layout_top.php");
	include("koneksi.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Anggota Osis</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="anggota_tambah.php" class="btn btn-success">Tambah</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">Nama</th>
											<th width="5%">Telepon</th>
											<th width="10%">Alamat</th>
											<th width="10%">Foto</th>
											<th width="10%">Formulir</th>
											<th width="5%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM anggota ORDER BY nama_anggota ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td>'. $data['nama_anggota'] .'</td>';
												echo '<td class="text-center">'. $data['no_anggota'] .'</td>';
												echo '<td>'. $data['alamat_anggota'] .'</td>';
												?>
												<td><a href="efs/foto/<?php echo htmlentities($data['foto_anggota']);?>" target="blank"><img src="efs/foto/<?php echo htmlentities($data['foto_anggota']);?>" width="100"></a></td>
												<td><a href="efs/formulir/<?php echo htmlentities($data['formulir_anggota']);?>" target="blank">Lihat Formulir</a></td>
												<td>
													<a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">Edit</a>
													<a href="delete.php?id_anggota=<?php echo $data['id_anggota'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nama_anggota'];?>?')" class="btn btn-danger" role="button">Hapus</a>
												</td>
											</tr>
											<?php
												$i++;
											}
										?>
									</tbody>
								</table>
							</div>
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>One fine body…</p>
						</div>
					</div>
				</div>
			</div>    
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [6] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
	<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('karyawan_detail.php?code='+code);
						app.code = code;
						
					}
		});		
    </script>
<?php
	include("layout_bottom.php");
?>
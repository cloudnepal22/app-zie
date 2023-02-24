<?php
	// setting tanggal
	$haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
	$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$bulans_count = count($bulans);
	// tanggal bulan dan tahun hari ini
	$hari_ini = $haries[date("l")];
	$bulan_ini = $bulans[date("n")];
	$tanggal = date("d");
	$bulan = date("m");
	$tahun = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Anggota OSIS <?php echo $pagedesc ?></title>

	<link href="libs/image/osis.jpg" rel="icon" type="images/x-icon">

    <!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="libs/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="libs/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="libs/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-xs" href="index.php">
					<img src="libs/images/osis.jpg" alt="brand" width="32" class="float-left image-brand">
					<div class="float-right">&nbsp;<strong>Anggota OSIS SMKN 1 Pemalang</strong></div>
					<div class="clear-both"></div>
				</a>
				<a class="navbar-brand visible-xs" href="index.php">
					<img src="libs/images/osis.jpg" alt="brand" width="32" class="float-left image-brand">
					<div class="float-right">&nbsp;<strong>Anggota OSIS SMKN 1 Pemalang</strong></div>
					<div class="clear-both"></div>
				</a>
			</div><!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<li class="dropdown dropdown-right">
				</li><!-- /.dropdown -->
			</ul><!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
							<h4>Data Anggota Osis</h4>
							<h5 class="text-muted"><i class="fa fa-calendar fa-fw"></i>&nbsp;<?php echo $hari_ini.", ".$tanggal." ".$bulan_ini." ".$tahun ?></h5>
						</li>
						<?php
							if($pagedesc == "Beranda") {
								echo '<li><a href="index.php" class="active"><i class="fa fa-home fa-fw"></i>&nbsp;Data Anggota OSIS</a></li>';
							}
							else {
								echo '<li><a href="index.php"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
							}
							?>
						</li>
	                </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
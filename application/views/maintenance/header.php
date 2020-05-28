<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/bootstrap.min.css" type="text/css">
	<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/morris/morris.css') ?>">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/jvectormap/jquery-jvectormap-1.2.2.css') ?>">    
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/datepicker/datepicker3.css') ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/daterangepicker/daterangepicker-bs3.css') ?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/AdminLTE.css') ?>">
	<!-- Data Tables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/datatables/dataTables.bootstrap.css') ?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	  <![endif]-->
  </head>
  <body class= "skin-blue">
	<!-- header logo: style can be found in header.less -->
	<header class="header">
		<a href="index.php" class="logo">
			<!-- Add the class icon to your logo image or logo icon to add the margining -->
			Administrator
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-right ">
				<ul class="nav navbar-nav ">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						   <i class="glyphicon glyphicon-user"></i>Hi, <span><?= $this->session->userdata('nama');?><i class="caret"></i></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-footer">
								<a href="<?= base_url('logout')?>" class="btn btn-default btn-flat" onClick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- side bar -->
	 <body class="skin-blue">
 <div class="wrapper row-offcanvas row-offcanvas-left">
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar"><br />
					<ul class="sidebar-menu">
						<li <?= $this->session->flashdata('menu')=="dashboard"?"class=\"active\"":"" ?>>
							<a href='<?php echo base_url("admin"); ?>'>
								<i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
					   <li class="treeview">
							<a href="#">
								<i class="glyphicon glyphicon-hdd"></i>
								<span>Master Data</span>
							   <i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li <?= $this->session->flashdata('menu')=="data-produk"?"class=\"active\"":"" ?>><a href='<?php echo base_url("admin/produk"); ?>'><i class="fa fa-angle-double-right"></i> Produk</a></li>
								
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="glyphicon glyphicon-link"></i>
								<span>Kelola</span>
							   <i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li <?= $this->session->flashdata('menu')=="kelola-pemesanan"?"class=\"active\"":"" ?>><a href='<?php echo base_url("admin/kelola/pemesanan"); ?>'><i class="fa fa-angle-double-right"></i>Barang Masuk</a></li>
								
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="glyphicon glyphicon-file"></i> <span>Laporan</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li <?= $this->session->flashdata('menu')=="laporan-produk"?"class=\"active\"":"" ?>><a href="<?= base_url('admin/laporan/produk'); ?>"><i class="fa fa-angle-double-right"></i> Laporan Barang Masuk</a></li>
								
							</ul>
						</li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
	   

		   

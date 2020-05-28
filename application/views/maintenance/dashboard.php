<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('maintenance/header');
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>maintenance</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>


	<!-- Main content -->
	<section class="content">

		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->

				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>
							ss
						</h3>
						<p>
							Jumlah Produk
						</p>
					</div>
					<div class="icon">
						<span class="glyphicon glyphicon-tag"></span>
					</div>
					<a href="produk.php" class="small-box-footer">
						Lihat Detail Produk <span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->

				<div class="small-box bg-green">
					<div class="inner">
						<h3>
							ss
						</h3>
						<p>
							Jumlah Pemesanan
						</p>
					</div>
					<div class="icon">
						<span class="glyphicon glyphicon-usd"></span>
					</div>
					<a href="po_terima.php" class="small-box-footer">
						Lihat Detail PO <span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div><!-- ./col -->
			
			
		</div><!-- /.row -->

		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">                            


				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-user"></i> Data Produk </h3> 
					</div>
					<div class="panel-body">
						<!-- <div class="table-responsive"> -->

							
				</div> 
			</div>


		</section><!-- /.Left col -->
		<!-- right col (We are only adding the ID to make the widgets sortable)-->
		<section class="col-lg-5 connectedSortable"> 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-user"></i> Data maintenance </h3> 
				</div>
				<div class="panel-body">
					<!-- <div class="table-responsive"> -->

						<!-- <table id="example" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th><center>No </center></th>
									<th><center>Username </center></th>
									<th><center>Fullname </center></th>
								</tr>
							</thead>

						</tr></div>

					</tbody>
				</table> -->
				<!-- </div>-->
			</div> 
		</section><!-- right col -->
	</div><!-- /.row (main row) -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php $this->load->view('maintenance/footer'); ?>


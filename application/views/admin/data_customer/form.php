<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side ">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Customer
			<small>Administrator</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Customer</a></li> 
			<li class="active">Input Data Customer</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- /.row -->
		<br />
		<!-- Main row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-user"></i> Input Data Customer </h3> 
					</div>

					<div class="panel-body">
						<div class="form-panel">
							<div class="form-horizontal style-form">
								<?php echo form_open(isset($data)?'admin/customer/update/'.$data->id_user:'admin/customer/create'); ?> 
								<?php echo validation_errors(); ?>
								<?php if (isset($data)): ?>
									<input type="hidden" name="id_user" value="<?= $data->id_user; ?>">
								<?php endif ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-10">
										<input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama Customer" required value="<?= isset($data)?$data->nama:''; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Alamat</label>
									<div class="col-sm-10">
										<input name="alamat" type="text" id="alamat" class="form-control" autocomplete="off" placeholder="Alamat" required value="<?= isset($data)?$data->alamat:''; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">No Telp</label>
									<div class="col-sm-10">
										<input name="no_telp" type="number" id="no_telp" class="form-control" autocomplete="off" placeholder="No Telp" required value="<?= isset($data)?$data->no_telp:''; ?>"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input name="email" type="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required value="<?= isset($data)?$data->email:''; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input name="username" type="text" id="username" class="form-control" autocomplete="off" placeholder="Username" required value="<?= isset($data)?$data->username:''; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input name="password" type="text" id="password" class="form-control" autocomplete="off" placeholder="Password" required value="<?= isset($data)?$data->password:''; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
										<a href="<?php echo base_url('admin/customer')?>" class="btn btn-sm btn-danger">Batal </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div><!-- col-lg-8--> 
		</div><!-- /.row (main row) -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php $this->load->view('admin/footer'); ?>

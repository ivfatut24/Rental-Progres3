<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side ">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Admin
			<small>Administrator</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li> 
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
						<h3 class="panel-title"><i class="fa fa-user"></i> Input Data Admin </h3> 
					</div>

					<div class="panel-body">
						<div class="form-panel">
							<div class="form-horizontal style-form">
								<?php echo form_open(isset($data)?'admin/admin/update/'.$data->id_user:'admin/admin/create'); ?> 
								<?php echo validation_errors(); ?>
								<?php if (isset($data)): ?>
									<input type="hidden" name="id_user" value="<?= $data->id_user; ?>">
								<?php endif ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-10">
										<input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama Admin" required value="<?= isset($data)?$data->nama:''; ?>" />
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

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
			<li class="active">Input Data Produk</li>
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

						<h3 class="panel-title"><i class="fa fa-user"></i> Input Data Produk </h3> 
					</div>

					<div class="panel-body">

						<div class="form-panel">

							<div class="form-horizontal style-form">

								<?php echo form_open_multipart(isset($data)?'admin/produk/update/'.$data->id_barang:'admin/produk/create'); ?> 

								<?php echo validation_errors(); ?>
								<?php if (isset($data)): ?>
									<input type="hidden" name="id_barang" value="<?= $data->id_barang; ?>">
								<?php endif ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
									<div class="col-sm-10">
										<input name="nama_barang" type="text" id="nama_barang" class="form-control" autocomplete="off" placeholder="Nama Produk" autocomplete="off" required value="<?= isset($data)?$data->nama_barang:''; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Stok Produk</label>
									<div class="col-sm-10">
										<input name="stok" type="number" id="stok" class="form-control" autocomplete="off" placeholder="Stok Produk" autocomplete="off" required value="<?= isset($data)?$data->stok:''; ?>"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Harga Sewa</label>
									<div class="col-sm-10">
										<input name="harga_sewa" type="number" id="harga_sewa" class="form-control" autocomplete="off" placeholder="Harga Produk" autocomplete="off" required value="<?= isset($data)?$data->harga_sewa:''; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Keterangan Produk</label>
									<div class="col-sm-10">
										<input name="deskripsi" type="text" id="deskripsi" class="form-control" autocomplete="off" placeholder="Keterangan Produk" autocomplete="off" required value="<?= isset($data)?$data->deskripsi:''; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Ukuran</label>
									<div class="col-sm-10">
										<select name="ukuran" id="ukuran" class="form-control">
											<option value="kecil" <?= isset($data) && $data->ukuran == "kecil"? 'selected':''; ?>>Kecil</option>
											<option value="sedang" <?= isset($data) && $data->ukuran == "sedang"? 'selected':''; ?>>Sedang</option>
											<option value="besar" <?= isset($data) && $data->ukuran == "besar"? 'selected':''; ?>>Besar</option>
										</select>
									</div>
								</div>
								<?php if (isset($data)): ?>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Gambar Sebelumnya</label>
										<div class="col-sm-10">
											<img src="<?= base_url('assets/uploads/produk/'.$data->gambar_barang)?>" style="width: 100px;height: 100px">
										</div>
									</div>
								<?php endif ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Gambar Produk</label>
									<div class="col-sm-10">
										<input name="userfile" type="file" class="form-control"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
										<a href="<?php echo base_url('admin/produk')?>" class="btn btn-sm btn-danger">Batal </a>
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

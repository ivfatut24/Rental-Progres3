<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// dd($pembayaran);
	$this->load->view('admin/header');
?>
	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pembayaran
                <small>Administrator</small>
            </h1>
            
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
                <li class="active">Pembayaran</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-4">
                  <a href="<?php echo base_url('admin/pembayaran/create/')?>" class="btn btn-sm btn-warning">Tambah Pembayaran <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- /.row -->
            <br/>
            <!-- Main row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Data Pembayaran </h3> 
                        </div>
                        <div class="panel-body col-12">
                         <div class="table-responsive">
                          <table id="table" class="table table-hover table-bordered">
                              <thead>
                                  <tr>
                                    <th><center>No</center></th>
                                    <th><center>No Booking</center></th>
                                    <th><center>Tgl Deadline</center></th>
                                    <th><center>Status</center></th>
                                    <th><center>Tgl Bayar</center></th>
                                    <th><center>Bukti Bayar</center></th>
                                    <th><center>Konfirmasi</center></th>
                                    <th><center>Tools</center></th>
                                </tr>
                            </thead>
							<tbody>
							<?php $no=1; ?>
							<?php foreach ($pembayaran as $val) : ?>
								<?php
									switch ($val->status) {
										case 0:
											$status = 'Belum dibayar';
											break;
										case 1:
											$status = 'Sudah dibayar';
											break;
										case 2:
											$status = 'Expired';
											break;
										
										default:
											$status = '';
											break;
									}
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $val->id_transaksi ?></td>
									<td><?php echo idDateFormat($val->tgl_deadline, TRUE) ?></td>
									<td><?= $status ?></td>
									<td><?php echo idDateFormat($val->tgl_bayar, TRUE) ?></td>
									<td>
										<center><img src="<?= base_url('assets/uploads/bukti bayar/').$val->bukti_bayar ?>" alt="placeholder+image" style="width:100px;max-width:200px" /></center>
									</td>
									<td><?php echo $val->is_verified ? 'Sudah' : 'Belum' ?></td>
									<td class="text-center">
										<div id="thanks">
											<?php if($val->status != 2 && !$val->is_verified) : ?>
												<a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Pembayaran" href="<?php echo base_url('admin/kelola/pembayaran/konfirmasi/'.$val->id_pembayaran)?>">
													<span class="glyphicon glyphicon-check"></span>
												</a>
											<?php endif; ?>
									</td>
								</tr>
								<?php $no++ ?>
							<?php endforeach; ?>
							</tbody>
						</table>
                      </div> 
                  </div>
              </div><!-- col-lg-12--> 
          </div><!-- /.row (main row) -->
    	</section><!-- /.content -->
  	</aside><!-- /.right-side -->
<?php $this->load->view('admin/footer'); ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Produk
                        <small>Administrator</small>
                    </h1>
            
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Produk</a></li>
                        <li class="active">Data Produk</li>
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Produk </h3> 
                        </div>
                    <div class="panel-body">
                      <table id="example" class="table table-hover table-bordered">
                    <tr>
                    <td>Kode Produk</td>
                    <td><?= $data->id_barang ?></td>
                    <td rowspan="9"><div class="pull-right image">
                            <img src="<?php echo base_url('assets/uploads/produk/'.$data->gambar_barang) ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                        </div></td>
                    </tr>
                    <tr>
                    <td width="250">Nama Produk</td>
                    <td width="550"><?= $data->nama_barang ?></td>
                    </tr>
                    <tr>
                    <td>Stok</td>
                    <td><?= $data->stok ?></td>
                    </tr>
                    <td>Ukuran</td>
                    <td><?= $data->ukuran ?></td>
                    </tr>
                    <tr>
                    <td>Harga Sewa</td>
                    <td><?=  $data->harga_sewa ?></td>
                    </tr>
                    <tr>
                    <td>Keteragan</td>
                    <td><?= $data->deskripsi ?></td>
                    </tr>
                    <tr>
                    
                    </tr>
                   </table>

                <div class="text-right">
                <a href="<?php echo base_url('admin/produk/')?>" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
                </div>  
                                </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php $this->load->view('admin/footer'); ?>

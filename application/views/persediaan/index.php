<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="page-header">Tabel Persediaan Bahan</h2>
                </div>
                <div class="col-md-4 col-md-offset-4">
                <h2 class="page-header">
                <?php echo "Tanggal " . date("d/m/Y") . "<br>";?>
                </h2>
                </div>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                             <a href="http://localhost/simgizi/index.php/persediaan/tambah" type="button" class="btn btn-outline btn-primary col-md-2 col-md-offset-0">Tambah Barang</a>
                            <br>
                            <br>
                            <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th >NO.</th>
                                            <th >ID BAHAN</th>
                                            <th >NAMA</th>
                                            <th >JENIS BAHAN</th>
                                            <th >HARGA</th>
                                            <th >PERSEDIAAN</th>
                                            <th >SATUAN</th>
                                            <th >AKSI</th>
                                        </tr>
                                    </thead>

                                                            
                                <?php
                                
                                    $i = 0;
                                    if (count($data))
                                        foreach ($data as $key => $value) {
                                            $i++;
                                            echo "  <tr>
                                                        <td>".$i."</td>
                                                        <td>".$value['id_bahan']."</td>
                                                        <td>".$value['nama']."</td>
                                                        <td>".$value['jenis']."</td>
                                                        <td> Rp ".$value['harga']."</td>
                                                        <td>".$value['persediaan']."</td> 
                                                        <td>".$value['satuan']."</td>
                                                        <td>
                                        <a href='".site_url('persediaan/stok/'.$value['id_bahan'])."'><button class=\"btn btn-primary btn-sm\" data-toggle=\"tooltip\" title=\"Stok\"><i class=\"fa fa-plus\"></i></button></a>
										<a href='".site_url('persediaan/ubah/'.$value['id_bahan'])."'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"fa fa-edit\"></i></button></a>
										<a href='".site_url('persediaan/hapus/'.$value['id_bahan'])."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'><button class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></button></a> </td>
                                                    </tr>";         
                                        }
                                    else    
                                        echo "  <tr>
                                                    <td colspan='5'><center>data persediaan kosong</center></td>
                                                </tr>";
                                ?>
                                            
                                </table>
                                <a href="http://localhost/simgizi/index.php/persediaan/pdf" class="btn btn-danger btn-lg">
                                <i  class="fa fa-file-text"> PRINT</i>
                                </a>
                             </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
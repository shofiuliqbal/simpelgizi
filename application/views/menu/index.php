<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="page-header">Tabel Data Menu Makanan</h2>
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
                                <a href="http://localhost/simgizi/index.php/menu/tambah" type="button" class="btn btn-outline btn-primary col-md-2 col-md-offset-0">Tambah Menu Makanan</a>
                                <br>
                                <br>
                                <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th >NO.</th>
                                            <th >NAMA</th>
                                            <th >JENIS DIIT</th>
                                            <th >JADWAL</th>
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
                                                            <td>".$value['nama']."</td>
                                                            <td>".$value['ndiit']."</td>
                                                            <td>".$value['jadwal']."</td>
															";?>

                                       <?php echo "</td>
                                        <td>
                                            <a href='".site_url('menu/detil/'.$value['id_makanan'])."'><button class=\"btn btn-info btn-sm\" data-toggle=\"tooltip\" title=\"Detail\"><i class=\"fa fa-eye\"></i></button></a> | <a href='".site_url('menu/hapus/'.$value['id_makanan'])."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></button></a> </td>
                                    </tr>";         
                                            }
                                        else    
                                            echo "  <tr>
                                                        <td colspan='5'><center>Data Menu Makanan Kososng</center></td>
                                                    </tr>";
                                    ?>
                                            
                                </table>
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
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="page-header">Data Makan Pasien Pagi</h2>
                </div>
                <div class="col-md-4 col-md-offset-4">
                <h2 class="page-header">

                <?php
                date_default_timezone_set('Asia/Jakarta');
                echo "Tanggal " . date("d-m-Y h:i:sa") . "<br>";?>
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
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >NO.</th>
                                            <th >NOMOR REGISTER</th>
                                            <th >NAMA</th>
											<th >JENIS DIIT</th>
                                            <th >NAMA MAKANAN</th>
											<th >KAMAR</th>
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
																					<td>".$value['nomor_register']."</td>
                                                                                    <td>".$value['npasien']."</td>
                                                                                    <td>".$value['ndiit']."</td>
                                                                                    <td>".$value['nmakan']."</td>
																					<td>".$value['nkamar']."</td>
                                                                        
																		<td>
                                                                    <a href='".site_url('jadwal/hapus/'.$value['nomor_register'])."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></button></a> </td>
                                                                                </tr>";         
                                                                    }
                                                                else    
                                                                    echo "  <tr>
                                                                                <td colspan='5'><center>data pasien kosong</center></td>
                                                                            </tr>";
                                                            ?>
                                            
                                </table>
                                <a href="http://localhost/simgizi/index.php/jadwal/pdfPagi" class="btn btn-danger btn-lg">
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
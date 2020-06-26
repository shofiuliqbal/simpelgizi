<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="page-header">Tabel Pengeluaran Bahan</h2>
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
                             <br>
                            <br>
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>

                                        <tr>
                                            <th >NO.</th>
                                            <th >TANGGAL</th>
                                            <th >BAHAN</th>
                                            <th >BANYAK</th>
                                            <th >HARGA</th>
                                            <th >TOTAL</th>
                                        </tr>
                                    </thead>

                                                            
                                <?php
                                
                                    $i = 0;
                                    if (count($data))
                                        foreach ($data as $key => $value) {
                                            $i++;
                                            echo "  <tr>
                                                        <td>".$i."</td>
                                                        <td>".$value['tgl']."</td>
                                                        <td>".$value['bahan']."</td>
                                                        <td>".$value['banyak']."</td>
                                                        <td> Rp ".$value['harga']."/".$value['satuan']."</td>
                                                        <td>".$value['total']."</td> 
                                                        </tr>";         
                                        }
                                    else    
                                        echo "  <tr>
                                                    <td colspan='5'><center>data persediaan kosong</center></td>
                                                </tr>";
                                ?>
                                            
                                </table>
                                <a href="http://localhost/simgizi/index.php/pengeluaran/pdf" class="btn btn-danger btn-lg">
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
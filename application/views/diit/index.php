<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Persebaran Diit Pasien per Hari</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <?php
                                echo "Tanggal " . date("Y/m/d") . "<br>";
                                ?>
                                <br>
                                    <thead>
                                        <tr>
                                            <th>KELAS</th>
                                        <!--?php 

                                        if (count($data))
                                           foreach ($data as $key => $value) {

                                                echo "<th>".$value["diit"]."</th>";}

                                            ?-->
                                            <th >BH</th>
                                            <th >BK</th>
                                            <th >NT</th>
                                            <th >NS</th>
                                            <th >TS</th>
                                            <th >CAIR</th>
                                            <th >DJ</th>
                                            <th >DM</th>
                                            <th >RG</th>
                                            <th >DH</th>
                                            <th >DL</th>
                                            <th >RS</th>
                                            <th >BG</th>
                                            <th >BSTIK</th>
                                            <th >R.PURIN</th>
                                            <th >R.PROT</th>
                                            <th >PUASA</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <th >HCU</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >2</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            </tr>

                                        <tr>
                                        <th >KELAS I</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >2</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            </tr>

                                            <tr>
                                        <th >KELAS II</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >1</th>
                                            <th >2</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            </tr>

                                            <tr>
                                        <th >KELAS III</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >2</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            </tr>

                                            <tr>
                                        <th >VIP</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >2</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >1</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            <th >0</th>
                                            </tr>

                                        <!--?php

                                        //$i = 0;
                                           if (count($data))
                                           foreach ($data as $key => $value) {
                                           //$i++;
                                                echo "  <tr>
		                                                    <td>".$value["kelas"]."</td>
		                                                    <td>
		                                                        
		                                                    </td>
                                                  		</tr>";         
                                                    }
                                                     else    
                                                echo "  <tr>
                                                        	<td colspan='5'><center>data diit kosong</center></td>
                                                        </tr>";
                                        ?-->
                                            
                                </table>
                                </a>
                                <a class="btn btn-success btn-lg">
                                <i  class="fa fa-file-excel-o"> SIMPAN EXCEL</i>
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
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="page-header">Tabel Data Pasien</h2>
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
                            <?php 
                            if($this->session->userdata('jabatan') != "dokter")
                                { 
                            ?>
                                <a href="http://localhost/simgizi/index.php/pasien/tambah" type="button" class="btn btn-outline btn-primary col-md-2 col-md-offset-0">Tambah Pasien</a>
                            <?php } ?>
                                <br>
                                <br>
                                <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th >NO.</th>
                                            <th >REGISTER</th>
                                            <th >NAMA</th>
                                            <th >TANGGAL LAHIR</th>
                                            <th >DIET</th>
                                            <th >KAMAR</th>
                                            <th >KELAS</th>
                                            <?php 
                                                if($this->session->userdata('jabatan') != "dokter")
                                                    echo "<th >STATUS</th><th >AKSI</th>"
                                            ?>
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
                                                            <td>".$value['nama']."</td>
                                                            <td>".$value['tgl_lahir']."</td>
                                                            <td>".$value['diit']."</td>
                                                            <td>".$value['kamar']."</td>
                                                            <td>".$value['kelas']."</td>";?>
                                                            

                                                            <?php
                                                                
                                                                    if($this->session->userdata('jabatan') != "dokter")
                                                                    {
                                                                        echo "<td>";

                                                                        if ($value['status'] == 'aktif')
                                                                            echo "<a href='".site_url('pasien/status/'.$value['nomor_register'].'/tidak_aktif/')."' onclick='return confirm(\"Nonaktifkan Status ?\")'><button class=\"btn btn-info btn-sm\"data-toggle=\"tooltip\" title=\"Nonaktifkan\" ><i class=\"fa fa-check\"></i></button></a>";
                                                                        else
                                                                            echo "<a href='".site_url('pasien/status/'.$value['nomor_register'].'/aktif/')."' onclick='return confirm(\"Aktifkan Status ?\")'><button class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" title=\"Aktifkan\"><i class=\"fa fa-minus\"></i></button></a>";
                                                                        echo "</td>";
                                                                        echo "<td>
                                                                                <a href='".site_url('pasien/ubah/'.$value['nomor_register'])."'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"fa fa-edit\"></i></button></a> | <a href='".site_url('pasien/hapus/'.$value['nomor_register'])."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></button></a> </td>
                                                                                </tr>";         
                                                                    }
                                            }
                                                                    else    
                                                                        echo "  <tr>
                                                                                    <td colspan='5'><center>data pasien kosong</center></td>
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
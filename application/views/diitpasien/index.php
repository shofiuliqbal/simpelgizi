<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="page-header">Data Diit Pasien</h2>
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
                            <form action="<?php echo base_url();?>index.php/diitpasien/index">
                                    <p>Masukkan Nomor Register</p>

                            <div class="input-group custom-search-form" >
                                <input style="width:100px"  type="text" name="cari" class="form-control" placeholder="Search...">
                                <span style="width:100px" class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search" ></i>
                                    </button>
                                </span>
                            </div>
                            </form>
                                <br><br>
                                <a type="button" class="btn btn-warning btn-sm" id="hide" title="Sembunyikan" ><i class="fa fa-minus"></i></a>
                                <a type="button" class="btn btn-warning btn-sm" id="show" title="Munculkan"><i class="fa fa-plus"></i></a>
                                <br>
                                <br>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>

                                        <tr>
                                            <th >NO.</th>
                                            <th >REGISTER</th>
                                            <th >NAMA</th>
                                            <th >TANGGAL LAHIR</th>
                                            <th >DIET</th>
                                            <th >KAMAR</th>
                                            <th >KELAS</th>
                                            <th >STATUS</th>
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
                                                            <td>".$value['nama']."</td>
                                                            <td>".$value['tgl_lahir']."</td>
                                                            <td>".$value['diit']."</td>
                                                            <td>".$value['kamar']."</td>
                                                            <td>".$value['kelas']."</td>
                                                            <td>";?>

                                                            <?php
                                                    if ($value['status'] == 'aktif')
                                                        echo "<a href='".site_url('pasien/status/'.$value['nomor_register'].'/tidak_aktif/')."' onclick='return confirm(\"Nonaktifkan Status ?\")'><button class=\"btn btn-info btn-sm\"data-toggle=\"tooltip\" title=\"Nonaktifkan\" disabled><i class=\"fa fa-check\"></i></button></a>";
                                                    else
                                                        echo "<a href='".site_url('pasien/status/'.$value['nomor_register'].'/aktif/')."' onclick='return confirm(\"Aktifkan Status ?\")'><button class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" title=\"Aktifkan\" disabled><i class=\"fa fa-minus\"></i></button></a>";?>


                                       <?php echo "</td>
                                        <td>";

                                            if($this->session->userdata('jabatan') == "dokter")
                                                {
                                                    echo "<a href='".site_url('diitpasien/ubah/'.$value['nomor_register'])."'><button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"fa fa-edit\"></i></button></a>";
                                                }
                                            else
                                                {
                                                    echo "<a href='".site_url('jadwal/ubah/'.$value['nomor_register'])."'><button class=\"btn btn-primary btn-sm\" data-toggle=\"tooltip\" title=\"jadwal\"><i class=\"fa fa-plus\"></i></button></a></td>";
                                                }
                                   
                                        echo "</tr>";         
                                            }
                                        else    
                                            echo "  <tr>
                                                        <td colspan='5'><center>data pasien kosong</center></td>
                                                    </tr>";
                                    ?>
                                            
                                </table>
                                </div>
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
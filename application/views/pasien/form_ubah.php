
			<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perbarui Data Pasien</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
						
							<form action="<?php echo site_url("pasien/ubah")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="nomor_register" value="<?php echo $data['nomor_register']?>"> 
							<table border="0" style="width:100%;">
								<tr>
								<fieldset disabled>
									<td style="width:200px">Nomor Register</td>
									<td><input class="form-control" type="text" name="nomor_register" value="<?php echo @$data['nomor_register']?>" disabled></td>
								</fieldset>
								</tr>
								<tr>
									<td style="width:200px">Nama</td>
									<td><input class="form-control" type="text" name="nama" value="<?php echo @$data['nama']?>"></input></td>
								</tr>
								<tr>
									<td style="width:200px">Tanggal Lahir</td>
									<td><input class="form-control" data-date-format="yyyy/mm/dd" name="tgl_lahir" value="<?php echo @$data['tgl_lahir']?>"></td>
								</tr>
								<!--tr>
									<td>Jenis Diit</td>
									<td>
										<select name="id_diit" class="form-control">
											<?php
											//foreach($data_diit as $tb_diit)
												//echo "<option value='$tb_diit[id_diit]' selected>$tb_diit[nama_diit]</option>";
											?>
										</select>
									</td>
								</tr-->
								<tr>
									<td>Kamar</td>
									<td>
										<select name="id_kamar" class="form-control">
											<?php
											foreach($data_kamar as $tb_kamar)
												echo "<option value='$tb_kamar[id_kamar]' selected>$tb_kamar[nama_kamar]</option>";
											?>
										</select>
									</td>
								</tr>
								
								<!--tr>
									<td>foto</td>
									<td>
									<?php
									//if (is_file('uploads/' . $data['foto']))
										//echo '<img src="' . base_url (). 'uploads/' .$data['foto'].'" width="150" height="150"><br/>';
									?>
									<br />
									<input type="file" name="foto">
									</td>
								</tr-->
								
								<tr>
									<td colspan="2">
										<input type="submit" class="btn btn-primary" value="Ubah Data">
											<a href="<?php echo site_url ("pasien/index")?>">
											<input type="button" class="btn btn-primary" value="Kembali">
											</a>
									</td>		
										
								</tr>
								
							</table>
							</form>
							</div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
						
						
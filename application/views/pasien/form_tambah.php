
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Tambah Pasien</h1>
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
                                    						
						<form action="<?php echo site_url("pasien/tambah")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Nama</td>
									<td><input class="form-control" type="text" name="nama" value="<?php echo @$data['nama']?>"></td>
								</tr>
								<tr>
									<td style="width:200px">Tanggal Lahir</td>
									<td>
										<input class="form-control" data-date-format="yyyy/mm/dd" name="tgl_lahir" value="<?php echo @$data['tgl_lahir']?>"placeholder="Tahun-Bulan-Tanggal">
									</td>
								</tr>
								<tr>
									<td>Kamar</td>
									<td>
										<select name="id_kamar" class="form-control">
											<option value="" disabled selected>Pilih Kamar</option>
											<?php
											foreach($data_kamar as $tb_kamar)
												echo "<option value='$tb_kamar[id_kamar]'>$tb_kamar[nama_kamar]</option>";
											?>
										</select>
									</td>
								</tr>
								
							</table>
							<br>
							<input type="submit" class="btn btn-primary" name="Submit" value="Simpan">
							<a href="<?php echo site_url ("pasien/index")?>">
											<input type="button" class="btn btn-primary" value="Kembali">
											</a>
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
				
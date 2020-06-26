
			<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perbarui Data Persediaan</h1>
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
						
							<form action="<?php echo site_url("persediaan/ubah")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_bahan" value="<?php echo $data['id_bahan']?>"> 
							<table border="0" style="width:100%;">
								<tr>
								<fieldset disabled>
									<td style="width:200px">ID Bahan</td>
									<td><input class="form-control" type="text" name="nomor_register" value="<?php echo @$data['id_bahan']?>" disabled></td>
								</fieldset>
								</tr>
								<tr>
									<td style="width:200px">Nama</td>
									<td><input class="form-control" type="text" name="nama" value="<?php echo @$data['nama']?>" ></input></td>
								</tr>
								<tr>
									<td>Jenis Bahan</td>
									<td>
										<input type="radio" name="jenis" value="basah" <?php if(@$data['jenis'] == 'basah'){echo "checked";}?> >Basah
										<input type="radio" name="jenis" value="kering" <?php if(@$data['jenis'] == 'kering'){echo "checked";}?> >Kering
									</td>
								</tr>
								<tr>
									<td style="width:200px">Harga</td>
									<td><input class="form-control" type="text" name="harga" value="<?php echo @$data['harga']?>" placeholder="Masukkan Nilai Angka"></td>
								</tr>
								<tr>
									<td style="width:200px">Jumlah Stok Persediaan</td>
									<td><input class="form-control" type="text" name="persediaan" value="<?php echo @$data['persediaan']?>" placeholder="Masukkan Nilai Angka"></td>
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
											<a href="<?php echo site_url ("persediaan/index")?>">
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
						
						
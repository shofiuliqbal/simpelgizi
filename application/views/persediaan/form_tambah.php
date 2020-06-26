<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Tambah Barang</h1>
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
                                    						
						<form action="<?php echo site_url("persediaan/tambah")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Nama</td>
									<td><input class="form-control" type="text" name="nama" value="<?php echo @$data['nama']?>" placeholder="Masukkan Nama Bahan"></td>
								</tr>
								<tr>
									<td>Jenis Bahan</td>
									<td>
										<input type="radio" name="jenis" value="basah" <?php @$data['jenis'] == 'basah'?> >Basah
										<input type="radio" name="jenis" value="kering" <?php @$data['jenis'] == 'kering'?> >Kering
									</td>
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
								<tr>
									<td>Satuan</td>
									<td>
										<select name="satuan" class="form-control">
											<option value="" disabled selected>Pilih Satuan</option>
											<option>kg</option>
											<option>g</option>
											<option>liter</option>
											<option>ikat</option>
											<option>buah</option>
										</select>
									</td>
								</tr>
								
							</table>
							<br>
							<input type="submit" class="btn btn-primary" name="Submit" value="Simpan">
							<a href="<?php echo site_url ("persediaan/index")?>">
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
				
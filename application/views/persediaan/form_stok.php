
			<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Stok</h1>
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
						
							<form action="<?php echo site_url("persediaan/stok")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_bahan" value="<?php echo $data['id_bahan']?>"> 
							<table border="0" style="width:100%;">
								<tr>
								<fieldset disabled>
									<td style="width:200px">ID Bahan</td>
									<td><?php echo @$data['id_bahan']?></td>
								</fieldset>
								</tr>
								<tr>
									<td style="width:200px">Nama</td>
									<td><?php echo @$data['nama']?></td>
								</tr>
								<tr>
									<td>Jenis Bahan</td>
									<td><?php echo @$data['jenis']?></td>
								</tr>
								<tr>
									<td style="width:200px">Harga</td>
									<td>Rp <?php echo @$data['harga']; echo ' /'; echo @$data['satuan'];?></td>
								</tr>
								<tr>
									<td style="width:200px">Jumlah Stok Persediaan</td>
									<td><?php echo @$data['persediaan']?> <input style="width:50px" class="form-control-inline" type="text" name="persediaan" placeholder="Stok"> <?php echo @$data['satuan']?></td>
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
										<input type="submit" class="btn btn-primary" value="Tambah Stok">
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
						
						
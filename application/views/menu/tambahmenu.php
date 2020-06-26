	<div id="page-wrapper">
	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Menu Makan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
						
							<form action="<?php echo site_url("menu/tambah")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_makanan" value="<?php echo @$data['id_makanan']?>"> 
							<table border="0" style="width:100%;">
								<tr>
									<td style="width:200px">Nama Menu</td>
									<td><input class="form-control" type="text" name="nama" value="<?php echo @$data['nmakan']?>"></td>
								</tr>
								<tr>
									<td>Diit</td>
									<td>
										<select name="id_diit" class="form-control">
											<option value="" disabled selected>Pilih Diit</option>
											<?php
											foreach($diit as $diitp)
												echo "<option value='$diitp[id_diit]'>$diitp[nama_diit]</option>";
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Jadwal</td>
									<td>
										<select name="jadwal" class="form-control">
											<option value="" disabled selected>Pilih Jadwal</option>
											<option value="pagi">Pagi</option>
											<option value="siang">Siang</option>
											<option value="malam">Malam</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<h4>Detail Bahan Menu Makanan</h4>
										<table class="table table-bordered" style="width:100%;">
											<tr>
												<th>NAMA BAHAN</th>
												<th>HARGA (Rp.)</th>
												<th>JUMLAH</th>
												<th>SATUAN</th>
											</tr>
											<?php for($i=0;$i<7;$i++){?>
											<tr>
												<td style="width:150px">
													<select name="id_bahan[]" class="form-control">
														<option value=""></option>
														<?php
														foreach($bahan as $bahane)
															echo "<option value='$bahane[id_bahan]' data-harga='$bahane[harga]' data-satuan='$bahane[satuan]'>$bahane[nama]</option>";
														?>
													</select>
												</td>
												<td style="width:100px">
													<input name="harga[]" readonly class="form-control" />
												</td>
												<td style="width:10px">
													<input name="persediaan[]" class="form-control" />
												</td>
												<td style="width:10px">
													<input name="satuan[]" readonly class="form-control" />
												</td>
											</tr>
											<?php }?>
										</table>
									</td>
								</tr>
								
								<tr>
									<td colspan="2">
										<input type="submit" class="btn btn-primary" value="Simpan Data">
											<a href="<?php echo site_url ("menu/index")?>">
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
            </div>
			
<script src="<?php echo base_url()?>/assets/jquery-1.12.3.js"></script>			
<script type="text/javascript">
$(function(){
$('select[name="id_bahan[]"]').change(function(){
	$(this).parents('tr:eq(0)').find('input[name="harga[]"]').val($(this).find("option:selected").attr('data-harga'));
});
});
</script>
<script type="text/javascript">
$(function(){
$('select[name="id_bahan[]"]').change(function(){
	$(this).parents('tr:eq(0)').find('input[name="satuan[]"]').val($(this).find("option:selected").attr('data-satuan'));
});
});
</script>
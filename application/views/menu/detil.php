	<div id="page-wrapper">
	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Menu Makan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
						
							<form action="<?php echo site_url("menu/index")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_makanan" value="<?php echo @$data['id_makanan']?>"> 
							<table border="0" style="width:100%;">
								<tr>
											<td style="width:200px">ID Makanan</td>
											<td><?php echo @$data['id_makanan'] ?></td>
										</tr>
										<tr>
											<td>Nama Makanan</td>
											<td>
												<?php echo @$data['nama'] ?>
											</td>
										</tr>
										<tr>
											<td>Jenis Diit</td>
											<td>
												<?php echo @$data['id_diit'] ?>
											</td>
										</tr>										
										<tr>
											<td>Jadwal</td>
											<td>
												<?php echo @$data['jadwal'] ?>
											</td>
										</tr>
										<tr>
											<td>Total Biaya</td>
											<td>
												<?php echo @$data['harga_akhir'] ?>
											</td>
										</tr>
								<tr>
									<td colspan="2">
										<h4>Detail Bahan Menu Makanan</h4>
										<table class="table table-bordered" style="width:100%;">
											<tr>
												<th>NO.</th>
												<th>NAMA BAHAN</th>
												<th>HARGA (Rp.)</th>
												<th>JUMLAH</th>
												<th>SATUAN</th>
												<th align="center">TOTAL</th>
											</tr>
											<?php
											
												$i = 0;
												if (count($data))
													foreach ($data['detail'] as $key => $value) {
														$i++;
														echo "  <tr>
																	<td>".$i."</td>
																	<td>".$value['nbahan']."</td>
																	<td><p align=right>".$value['harga']."</p></td>
																	<td>".$value['persediaan']."</td>
																	<td>".$value['satuan']."</td>
																	<td><p align=right>".$value['total']."</p></td>
																</tr>";			
													}
												else	
												{
													echo "  <tr>
																<td colspan='6'><center>Tabel detail menu makanan tidak memiliki Record</center></td>
															</tr>";}
											
														echo "<tr>
																<td colspan=5><center>Total</center></td>
																<td><p align=right>".$data['harga_akhir']."</p></td>
															  <tr>";
															  
											?>
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
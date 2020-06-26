	<div id="page-wrapper">
	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Jadwal Makan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
						
							<form action="<?php echo site_url("jadwal/ubah")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="nomor_register" value="<?php echo @$data['nomor_register']?>"> 
							<table border="0" style="width:100%;">

								<tr>
									<td style="width:200px">Nama</td>
									<td><?php echo @$data['nama']?></td>
								</tr>
								<tr>
									<td style="width:200px">Jenis Diit</td>
									<td><?php echo @$data['diit']?></td>
								</tr>
								<tr>
									<td style="width:200px">Keterangan Diit</td>
									<td><?php echo @$data['ket']?></td>
								</tr>
								<tr>
									<td colspan="2">
										<h4>Pilih Jadwal Makan (Pagi, Siang, Malam)</h4>
										<table class="table table-bordered" style="width:100%;">
											<tr>
												<th>JADWAL MAKAN</th>
												<th>MENU</th>
											</tr>
											<?php for($i=0;$i<3;$i++){?>
											<tr>
												<td>
													<select name="jadwal[]" class="form-control">
														<option selected disabled>- jadwal -</option>
														<?php
														foreach($makan as $makanan)
															echo "<option value='$makanan[jadwal]' data-jadwal[]='$makanan[id_makanan]'>$makanan[jadwal]</option>";
														?>
													</select>
												</td>
												<td>
													<!--input name="id_makan[]" readonly class="form-control" /-->
													<select name="id_makan[]" class="form-control">
														<option value=""></option>
														<?php
														foreach($makan as $makanan)
															echo "<option value='$makanan[id_makanan]'>$makanan[nama]</option>";
														?>
													</select>
												</td>
											</tr>
											<?php }?>
										</table>
									</td>
								</tr>
								
								<tr>
									<td colspan="2">
										<input type="submit" class="btn btn-primary" value="Simpan Data">
											<a href="<?php echo site_url ("diitpasien/index")?>">
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
$('select[name="jadwal[]"]').change(function(){
	$(this).parents('tr:eq(0)').find('select[name="id_makan[]"]').val($(this).find("option:selected").attr('data-jadwal[]'));
});
});
</script>
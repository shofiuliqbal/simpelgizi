<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Detail Menu Makanan
	</h1>
	
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Detail Penerimaan Kas</h3>
						<div class="box-tools">
							<form action="<?php echo site_url('menu/index')?>" method="get">
								<div class="input-group">
									<input type="text" name="cari" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>"/>
									<div class="input-group-btn">
										<button class="btn btn-sm btn-default pull-right"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
						</div>
				</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="">
								
								<div class="box-body table-responsive no-padding">
									
									<table class="table table-striped">
									
										<tr>
											<td style="width:200px">Nomor Bukti Kas Masuk</td>
											<td><?php echo @$data['NO_BKM'] ?></td>
										</tr>
										<tr>
											<td>Nama Pegawai</td>
											<td>
												<?php echo @$data['NPEG'] ?>
											</td>
										</tr>
										<tr>
											<td>Tanggal</td>
											<td>
												<?php echo @$data['TANGGAL_BKM'] ?>
											</td>
										</tr>										
										<tr>
											<td>Total</td>
											<td>
												<?php echo @$data['TOTAL_BKM'] ?>
											</td>
										</tr>
										<tr>
											<td>Keterangan</td>
											<td>
												<?php echo @$data['KETERANGAN'] ?>
											</td>
										</tr>

									</table>
									
									<hr>
								
									<table class="table table-striped">

									<!--table id="example1" class="table table-bordered table-striped"-->
										<thead>
											<tr>
												<th>NO</th>
												<th>KETERANGAN</th>
												<th>POS TRANSAKSI</th>
												<th>AKUN</th>
												<th>JENIS KAS</th>
												<th>TOTAL</th>
												
											</tr>
										</thead>

										<tbody>
											<?php
											
												$i = 0;
												if (count($data))
													foreach ($data['detail'] as $key => $value) {
														$i++;
														echo "  <tr>
																	<td>".$i."</td>
																	<td>".$value['KETERANGAN']."</td>
																	<td>".$value['POS']."</td>
																	<td>".$value['AKUN']."</td>
																	<td>".$value['KAS']."</td>
																	<td>".$value['TOTAL']."</td>
																</tr>";			
													}
												else	
													echo "  <tr>
																<td colspan='6'><center>Tabel Bukti Kas Masuk tidak memiliki Record</center></td>
															</tr>";
											
											?>
										</tbody>
										
									</table>
									
								</div><!-- /.box-body -->
								
							</div><!-- /.box -->
							
						</div>
					</div>
			</div>
		</div>
	</div>
	<a class ="btn btn-success"  href="<?php echo site_url ("detail_penerimaan_kas/excelone/".@$data['NO_BKM'])?>"><i class="fa fa-file-text-o"></i> Export Excel</a> 	
	<a class ="btn btn-danger"  href="<?php echo site_url ("detail_penerimaan_kas/pdfone/".@$data['NO_BKM'])?>"><i class="fa fa-file-text-o"></i> Export PDF</a> 	
	<!--a class ="btn bg-navy"  href="<?php echo site_url ("detail_penerimaan_kas/grafik")?>"><i class="fa fa-file-text-o"></i> Export Grafik</a--> 		
</section>
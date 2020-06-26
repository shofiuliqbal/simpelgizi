<p align="right"><?php 
date_default_timezone_set('Asia/Jakarta');
echo 'Kartu Diit dicetak pada '. date('j F, Y h:i:sa') ."\n"; ?></p>
<br />
<table border=0>
		<?php
		
			$i = 0;
			if (count($data))
				foreach ($data as $key => $value) {
					$i++;
					echo "  
							<table border=1>
								<tr>
									<th rowspan=6 border=0>".$i."</th>
									<td colspan=3> Unit Pelayanan Gizi</td>
								</tr>
								<tr>
									<td colspan=3> RS dr ETTY ASHARTO</td>
								</tr>
								<tr>								
									<td> Nama Pasien</td>
									<td>:</td>
									<td>".$value['npasien']."</td>
								</tr>
								<tr>
									<td> Kamar</td>
									<td>:</td>
									<td>".$value['nkamar']."</td>
								</tr>
								<tr>
									<td> Diit</td>
									<td>:</td>
									<td colspan=2>".$value['ndiit']."</td>
								</tr>
								<tr>
									<td> Nama Makanan</td>
									<td>:</td>
									<td colspan=2>".$value['nmakan']."</td>
								</tr>
							</table>";			
				}
			else	
				echo "  <tr>
							<td colspan='3'>tidak memiliki Record</td>
						</tr>";
		
		?>
	</tbody>
</table>
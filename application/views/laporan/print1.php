<h3 align="center" ><strong>LAPORAN PENGELUARAN BAHAN MAKANAN</strong></h3>
<h3 align="center">Rumah Sakit dr. Etty Asharto Kota Batu</h3>
<?php 
date_default_timezone_set('Asia/Jakarta');
echo 'Laporan pembelian bahan makanan dicetak pada '. date('j F, Y h:i:sa') ."\n"; ?></p>
<br />
<table border=1 style="width:100%">
	<thead>
        <tr>
            <th >NO.</th>
            <th >TANGGAL</th>
            <th >BAHAN</th>
            <th >BANYAK</th>
            <th >HARGA</th>
            <th >TOTAL</th>
        </tr>
    </thead>
		<?php
		
			$i = 0;
			if (count($data))
				foreach ($data as $key => $value) {
					$i++;
					echo "  
							
								<tr>
									<td>".$i."</td>
                                    <td>".$value['tgl']."</td>
                                    <td>".$value['bahan']."</td>
                                    <td>".$value['banyak']."</td>
                                    <td> Rp ".$value['harga']."/".$value['satuan']."</td>
                                    <td>".$value['total']."</td> 
                                    </tr>"; 	
				}
			else	
				echo "  <tr>
							<td colspan='6'>tidak memiliki Record</td>
						</tr>";
		
		?>
</table>
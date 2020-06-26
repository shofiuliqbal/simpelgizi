<h3 align="center" ><strong>LAPORAN PERSEDIAAN BAHAN MAKANAN</strong></h3>
<h3 align="center">Rumah Sakit dr. Etty Asharto Kota Batu</h3>
<?php 
date_default_timezone_set('Asia/Jakarta');
echo 'Laporan persediaan bahan makanan dicetak pada '. date('j F, Y h:i:sa') ."\n"; ?></p>
<br />
<table border=1 style="width:100%">
	<thead>
        <tr>
            <th >NO.</th>
            <th >ID BAHAN</th>
            <th >JENIS</th>
			<th >NAMA</th>
            <th >HARGA</th>
			<th >PERSEDIAAAN</th>
            <th >SATUAN</th>
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
									<td>".$value['id_bahan']."</td>
									<td>".$value['jenis']."</td>
									<td>".$value['nama']."</td>
									<td>".$value['harga']."</td>
									<td>".$value['persediaan']."</td>
									<td>".$value['satuan']."</td>
								</tr>
							";			
				}
			else	
				echo "  <tr>
							<td colspan='7'>tidak memiliki Record</td>
						</tr>";
		
		?>
</table>
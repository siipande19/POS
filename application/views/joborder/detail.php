<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
		<div class="card-header py-3">
           <a href="<?php echo base_url('joborder'); ?>" class="btn btn-md btn-secondary"><i class="fas fa-arrow-left"></i> BACK</a>  
			<button onclick="printDiv('print-area')" class="btn btn-md btn-primary"><i class="fas fa-print"></i> PRINT</button>
		</div>
	</div>
</div>
<div id="print-area">
<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">DETAIL DATA JOB ORDER</h4>
		</div>
		<table class="table">
			<tr>
				<th>Consignee</th>
				<td><?php echo $detail->consignee ?></td>
				<th>Customer</th>
				<td><?php echo $detail->id_customer ?></td>
			</tr>
			<tr>
				<th>Colli</th>
				<td><?php echo $detail->colli ?> <?php echo $detail->colliSat ?></td>
				<th>No. Job</th>
				<td><?php echo $detail->no_job ?></td>
			</tr>
			<tr>
				<th>Gross Weight</th>
				<td><?php echo $detail->gweight ?> <?php echo $detail->gsat ?></td>
				<th>MAWB</th>
				<td><?php echo $detail->mawb ?></td>
			</tr>
			<tr>
				<th>Desc LCL</th>
				<td><?php echo $detail->lcl ?> <?php echo $detail->lclSat ?></td>
				<th>HAWB</th>
				<td><?php echo $detail->hawb ?></td>
			</tr>
			<tr>
				<th>Sales</th>
				<td><?php echo $detail->sales ?></td>
			</tr>
		</table>
		<hr/>
          
	</div>
</div>

<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">DETAIL DATA BARANG</h4>	
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Kode Job</th>
					<th>No. Invoice</th>					
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Quantity</th>
					<th>PPN(%)</th>
					<th>PPN(Rp)</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detail_barang as $key => $dtl) : ?>
				<tr>
					<td><?php echo $dtl['kd_job'] ?></td>
					<td><?php echo $dtl['no_invoice'] ?></td>
					<td><?php echo $dtl['nm_item'] ?></td>
					<td><?php echo "Rp. ".number_format( $dtl['harga'], 0,"," , "." ); ?></td>
					<td><?php echo $dtl['qty'] ?></td>
					<td><?php echo $dtl['ppn'] ?></td>
					<td><?php echo "Rp. ".number_format( $dtl['Hppn'], 0,"," , "." ); ?></td>
					<td><?php echo "Rp. ".number_format( $dtl['jumlah'], 0,"," , "." ); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tr>
				<th colspan="7">TOTAL HARGA</th>
				<td><?php echo "Rp. ".number_format( $detail_invoice['tharga'] , 0,"," , "." ); ?></td>
			</tr>
			<tr>
				<th colspan="7">VAT</th>
				<td><?php echo "Rp. ".number_format( $dtl['vat'], 0,"," , "." ); ?></td>
			</tr>
			<tr>
				<th colspan="7">TOTAL INVOICE</th>
				<td><?php echo "Rp. ".number_format( $detail_invoice['tot'] , 0,"," , "." ); ?></td>
			</tr>
			<tr>
				<th colspan="7">COST</th>
				<td><?php echo "Rp. ".number_format( $dtl['cost'], 0,"," , "." ); ?></td>
			</tr>
			
			<tr>
				<th colspan="7">TOTAL COST</th>
				<td><?php echo "Rp. ".number_format( $dtl['tcost'], 0,"," , "." ); ?></td>
			</tr>
			<tr>
				<th colspan="7">GROSS PROFIT</th>
				<td><?php echo "Rp. ".number_format( $dtl['gross_profit'], 0,"," , "." ); ?></td>
			</tr>
			<tr>
				<th colspan="7">PPH 23 (2%)</th>
				<td><?php echo "Rp. ".number_format( $dtl['pph23'], 0,"," , "." ); ?></td>
			</tr>
			<tr>
				<th colspan="7">NET PROFIT</th>
				<td><?php echo "Rp. ".number_format( $dtl['net_profit'], 0,"," , "." ); ?></td>
			</tr>
		</table>

	</div>

</div>
</div>
<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
		<div class="card-header py-3">
           <a href="<?php echo base_url('joborder'); ?>" class="btn btn-md btn-secondary"><i class="fas fa-arrow-left"> BACK</i></a>  
			<button onclick="printDiv('print-area')" class="btn btn-md btn-primary"><i class="fas fa-print"> PRINT</i></button>
		</div>
	</div>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        let printContents = document.getElementById(divName).innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(true);
        setTimeout(function() {}, 1000);
    }
</script>
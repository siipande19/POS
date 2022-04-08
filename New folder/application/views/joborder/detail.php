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
          <div class="form-group mb-4 ml-3 mr-3">
             <a href="<?php echo base_url('joborder'); ?>" class="btn btn-sm btn-secondary">BACK</a>
           </div>
	</div>
</div>

<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">DETAIL DATA BARANG</h4>
		</div>
				<!-- <?php var_dump($detail_barang)?> -->
				<select class="form-control" name="kd_job" id="kd_job">
                                                    <option selected value="" size="100">Pilih Kode Job</option>
                                                    <?php foreach ($get_kode as $key=> $value) : ?>
                                                    <option value="<?php echo $value['kd_job'] ?>"><?php echo $value['kd_job'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
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
				<th colspan="7">TOTAL INVOICE</th>
				<td><?php echo "Rp. ".number_format( $dtl['tinvoice1'], 0,"," , "." ); ?></td>
			</tr>
		</table>	
	</div>
</div>
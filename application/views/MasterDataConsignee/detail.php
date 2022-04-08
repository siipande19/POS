<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Detail Data Consignee</h4>
        </div>
      <div class="card-body">
		<table class="table">
			<tr>
				<th>ID Customer</th>
				<td><?php echo $detail->id_consignee ?></td>
				<th>Nama Customer</th>
				<td><?php echo $detail->nm_consignee ?></td>
			</tr>
			<tr>
				<th>Nama Alias</th>
				<td><?php echo $detail->nm_alias ?></td>
				<th>Lokasi</th>
				<td><?php echo $detail->place ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?php echo $detail->address ?></td>
				<th>Kelurahan</th>
				<td><?php echo $detail->kel ?></td>
			</tr>
			<tr>
				<th>Kecamatan</th>
				<td><?php echo $detail->kec ?></td>
				<th>Kota</th>
				<td><?php echo $detail->city ?></td>
			</tr>
			<tr>
				<th>Negara</th>
				<td><?php echo $detail->country ?></td>
				<th>Kode Pos</th>
				<td><?php echo $detail->post_code ?></td>
			</tr>
			<tr>
				<th>Telepon</th>
				<td><?php echo $detail->phone ?></td>
				<th>FAX</th>
				<td><?php echo $detail->fax ?></td>
			</tr>
			<tr>
				<th>Kontak</th>
				<td><?php echo $detail->contact ?></td>
				<th>NPWP</th>
				<td><?php echo $detail->npwp ?></td>
			</tr>
			<tr>
				<th>Remark</th>
				<td><?php echo $detail->remark ?></td>
			</tr>
			
		</table>
	   </div>
		<hr/>
                <div class="form-group ml-2">
                    <a href="<?php echo base_url('consignee'); ?>" class="btn btn-md btn-secondary">Cancel</a>
                </div>
	</div>
</div>
<div class="container-fluid">
	<div class="card shadow mb-4 ml-3 mr-3">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Detail Data Barang</h4>
        </div>
      <div class="card-body">
		<table class="table">
			<tr>
				<th>Nomor</th>
				<td><?php echo $detail->id ?></td>
			</tr>
			<tr>
				<th>Nama Barang</th>
				<td><?php echo $detail->nm_item ?></td>
			</tr>
			<tr>
				<th>Type Barang</th>
				<td><?php echo $detail->type_item ?></td>
			</tr>
		</table>
	  </div>
		<hr/>
                <div class="form-group ml-2">
                    <a href="<?php echo base_url('product'); ?>" class="btn btn-md btn-secondary">Cancel</a>
                </div>
	</div>
</div>
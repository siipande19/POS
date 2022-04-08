<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Ubah Barang</h1>
            <hr/>
            <form action="<?php echo site_url('Product/update/' . $data->id); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nm_item">Nama Barang</label>
                        <input type="text" class="form-control" name="nm_item" id="nm_item" value="<?php echo $data->nm_item; ?>">
                        <?php echo form_error('nm_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="type_item">Jenis Barang</label>
                        <input type="text" class="form-control" name="type_item" id="type_item" value="<?php echo $data->type_item; ?>">
                        <?php echo form_error('type_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>  
                <hr/>
                <div class="form-group">
                    <a href="<?php echo base_url('Product'); ?>" class="btn btn-sm btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
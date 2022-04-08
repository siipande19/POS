<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Tambah Barang</h1>
            <hr/>
            <form action="<?php echo site_url('MasterData/Product/insert'); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="nm_item">Nama Barang</label>
                        <input type="text" class="form-control" name="nm_item" id="nm_item" value="<?php echo set_value('nm_item'); ?>">
                        <?php echo form_error('nm_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="typeitem">Kode Barang</label>
                                <select class="form-control" name="type_item" id="type_item" required="required">
                                    <option selected value=""> Pilih Kode Barang</option>
                                    <?php foreach ($this->db->get('tb_typeitem')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_typeitem'] ?>"><?php echo $value['nm_typeitem'] ?></option>
                                    <?php endforeach ?>
                                </select>
                        <?php echo form_error('nm_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                </div>
                <hr/>
                <div class="form-group">
                    <a href="<?php echo base_url('MasterDataProduct/product'); ?>" class="btn btn-sm btn-secondary">Cancel</a>
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
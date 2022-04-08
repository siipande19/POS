<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Ubah Job Order</h1>
            <hr/>
            <form action="<?php echo site_url('joborder/update/' . $data->id); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="consignee">Consignee</label>
                        <select class="form-control" name="consignee" id="consignee" required="required">
                                    <option selected value=""> Pilih Consignee</option>
                                    <?php foreach ($this->db->get('tb_consignee')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_consignee'] ?>"><?php echo $value['nm_consignee'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('consignee', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="id_customer">Customer</label>
                        <select class="form-control" name="id_customer" id="id_customer" required="required">
                                    <option selected value=""> Pilih Customer</option>
                                    <?php foreach ($this->db->get('tb_customer')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_customer'] ?>"><?php echo $value['nm_customer'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('id_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nm_item">Nama Barang</label>
                        <select class="form-control" name="nm_item" id="nm_item" required="required">
                                    <option selected value=""> Pilih Barang</option>
                                    <?php foreach ($this->db->get('tb_item')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['nm_item'] ?>"><?php echo $value['nm_item'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('nm_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="colli">Colli</label>
                        <input type="text" class="form-control form-control-sm" name="colli" id="colli" value="<?php echo $data->colli; ?>">
                        <?php echo form_error('colli', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="colliSat">Colli Sat</label>
                        <input type="text" class="form-control form-control-sm" name="colliSat" id="colliSat" value="<?php echo $data->colliSat; ?>">
                        <?php echo form_error('colliSat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="no_job">No. Joborder</label>
                        <input type="text" class="form-control form-control-sm" name="no_job" id="no_job" value="<?php echo $data->no_job; ?>">
                        <?php echo form_error('no_job', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="gweight">Gweight</label>
                        <input type="text" class="form-control form-control-sm" name="gweight" id="gweight" value="<?php echo $data->gweight; ?>">
                        <?php echo form_error('gweight', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="gsat">Gsat</label>
                        <input type="text" class="form-control form-control-sm" name="gsat" id="gsat" value="<?php echo $data->gsat; ?>">
                        <?php echo form_error('gsat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="shipper">Shipper</label>
                        <select class="form-control" name="shipper" id="shipper" required="required">
                                    <option selected value=""> Pilih Shipper</option>
                                    <?php foreach ($this->db->get('tb_shipper')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_shipper'] ?>"><?php echo $value['nm_shipper'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('shipper', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="mawb">MAWB</label>
                        <input type="text" class="form-control form-control-sm" name="mawb" id="mawb" value="<?php echo $data->mawb; ?>">
                        <?php echo form_error('mawb', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hawb">HAWB</label>
                        <input type="text" class="form-control form-control-sm" name="hawb" id="hawb" value="<?php echo $data->hawb; ?>">
                        <?php echo form_error('hawb', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="lcl">LCL</label>
                        <input type="text" class="form-control form-control-sm" name="lcl" id="lcl" value="<?php echo $data->lcl; ?>">
                        <?php echo form_error('lcl', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="lclSat">LCL Sat</label>
                        <input type="text" class="form-control form-control-sm" name="lclSat" id="lclSat" value="<?php echo $data->lclSat; ?>">
                        <?php echo form_error('lclSat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="sales">Sales</label>
                        <input type="text" class="form-control form-control-sm" name="sales" id="sales" value="<?php echo $data->sales; ?>">
                        <?php echo form_error('sales', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <a href="<?php echo base_url('joborder'); ?>" class="btn btn-sm btn-secondary">Cancel</a>
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
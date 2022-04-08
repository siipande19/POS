<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Tambah Shipper</h1>
            <hr/>
            <form action="<?php echo site_url('Shipper/insert'); ?>" method="post">
                
                <div class="form-row">
                    <!-- ID Customer -->

                    <div class="form-group col-md-3">
                        <label for="id_shipper">ID Shipper</label>
                        <input type="text" class="form-control" name="id_shipper" id="id_shipper"
                        value="<?php echo set_value('id_shipper'); ?>" >
                        <?php echo form_error('id_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Nama Shipper -->
                    <div class="form-group col-md-3">
                        <label for="nm_shipper">Nama Shipper</label>
                        <input type="text" class="form-control" name="nm_shipper" id="nm_shipper" value="<?php echo set_value('nm_shipper'); ?>">
                        <?php echo form_error('nm_shipper', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Nama Alias -->
                    <div class="form-group col-md-3">
                        <label for="nm_alias">Nama Alias</label>
                        <input type="text" class="form-control" name="nm_alias" id="nm_alias" value="<?php echo set_value('nm_alias'); ?>">
                        <?php echo form_error('nm_alias', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- Lokasi -->
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="place">Lokasi</label>
                        <input type="text" class="form-control" name="place" id="place" value="<?php echo set_value('place'); ?>">
                        <?php echo form_error('place', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Alamat -->
                    <div class="form-group col-md-3">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo set_value('address'); ?>">
                        <?php echo form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Kelurahan -->
                    <div class="form-group col-md-3">
                        <label for="kel">Kelurahan</label>
                        <input type="text" class="form-control" name="kel" id="kel" value="<?php echo set_value('kel'); ?>">
                        <?php echo form_error('kel', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Kecamatan -->
                    <div class="form-group col-md-3">
                        <label for="kec">Kecamatan</label>
                        <input type="text" class="form-control" name="kec" id="kec" value="<?php echo set_value('kec'); ?>">
                        <?php echo form_error('kec', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                
                
                <div class="form-row">
                    <!-- Kota -->
                    <div class="form-group col-md-3">
                        <label for="city">Kota</label>
                        <input type="text" class="form-control" name="city" id="city" value="<?php echo set_value('city'); ?>">
                        <?php echo form_error('city', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Negara -->
                    <div class="form-group col-md-3">
                        <label for="country">Negara</label>
                        <input type="text" class="form-control" name="country" id="country" value="<?php echo set_value('country'); ?>">
                        <?php echo form_error('country', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                     <!-- Kode Pos -->
                    <div class="form-group col-md-3">
                        <label for="post_code">Kode Pos</label>
                        <input type="text" class="form-control" name="post_code" id="post_code" value="<?php echo set_value('post_code'); ?>">
                        <?php echo form_error('post_code', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Nomor Telepon -->
                    <div class="form-group col-md-3">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone'); ?>">
                        <?php echo form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>                
                
               
                <div class="form-row">
                    <!-- Fax -->
                    <div class="form-group col-md-3">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" name="fax" id="fax" value="<?php echo set_value('fax'); ?>">
                        <?php echo form_error('fax', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Kontak -->
                    <div class="form-group col-md-3">
                        <label for="contact">Kontak</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="<?php echo set_value('contact'); ?>">
                        <?php echo form_error('contact', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- NPWP -->
                    <div class="form-group col-md-3">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" name="npwp" id="npwp" value="<?php echo set_value('npwp'); ?>">
                        <?php echo form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Remark -->
                    <div class="form-group col-md-3">
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" name="remark" id="remark" value="<?php echo set_value('remark'); ?>">
                        <?php echo form_error('remark', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <hr/>
                
                    <a href="<?php echo base_url('shipper'); ?>" class="btn btn-sm btn-secondary">Cancel</a>
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
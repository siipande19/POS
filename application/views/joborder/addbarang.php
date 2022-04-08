<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Tambah Barang</h1>
            <hr/>
            <form action="<?php echo site_url('joborder/insert'); ?>" method="post">
                <div class="form-row formtambah">
                    <div class="form-group col-md-3">
                        <label for="id_item">Pilih Barang</label>
                        <select class="form-control" name="id_item" id="id_item" required="required">
                                    <option selected value=""> Pilih Barang</option>
                                    <?php foreach ($this->db->get('tb_item')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_item'] ?>"><?php echo $value['nm_item'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('id_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                         <button type="button" class="btn btn-info btnaddform">Tambah Form</button>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('.btnaddform').click(function(e) {
            e.preventDefault();

            $('.formtambah').append(`
                <div class="form-row formtambah row">
                    <div class="form-group col-md-3">
                        <label for="id_item">Pilih Barang</label>
                        <select class="form-control" name="id_item" id="id_item" required="required">
                                    <option selected value=""> Pilih Barang</option>
                                    <?php foreach ($this->db->get('tb_item')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_item'] ?>"><?php echo $value['nm_item'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('id_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-danger btnremoveform">Hapus Form</button>
                        </div>
                      </div>
                </div>`);
        });

        $(document).on('click', '.btnremoveform', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    });      
</script>
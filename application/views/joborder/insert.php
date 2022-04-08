<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Tambah Job Order </h1>

            <hr/>
            <form action="<?php echo site_url('joborder/insert'); ?>" method="post">
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
                        <label for="shipper">Shipper</label>
                        <select class="form-control" name="shipper" id="shipper" required="required">
                                    <option selected value=""> Pilih Shipper </option>
                                    <?php foreach ($this->db->get('tb_shipper')->result_array() as $key => $value) : ?>
                                        <option value="<?php echo $value['id_shipper'] ?>"><?php echo $value['nm_shipper'] ?></option>
                                    <?php endforeach ?>
                        </select>
                        <?php echo form_error('shipper', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="no_job">No. Joborder</label>
                        <input type="text" class="form-control form-control-sm" name="no_job" id="no_job" value="<?php echo set_value('no_job'); ?>">
                        <?php echo form_error('no_job', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="colli">Colli</label>
                        <input type="text" class="form-control form-control-sm" name="colli" id="colli" value="<?php echo set_value('colli'); ?>">
                        <?php echo form_error('colli', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="colliSat">Colli Sat</label>
                        <input type="text" class="form-control form-control-sm" name="colliSat" id="colliSat" value="<?php echo set_value('colliSat'); ?>">
                        <?php echo form_error('colliSat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="gweight">Gweight</label>
                        <input type="text" class="form-control form-control-sm" name="gweight" id="gweight" value="<?php echo set_value('gweight'); ?>">
                        <?php echo form_error('gweight', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="gsat">Gsat</label>
                        <input type="text" class="form-control form-control-sm" name="gsat" id="gsat" value="<?php echo set_value('gsat'); ?>">
                        <?php echo form_error('gsat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="lcl">LCL</label>
                        <input type="text" class="form-control form-control-sm" name="lcl" id="lcl" value="<?php echo set_value('lcl'); ?>">
                        <?php echo form_error('lcl', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="lclSat">LCL Sat</label>
                        <input type="text" class="form-control form-control-sm" name="lclSat" id="lclSat" value="<?php echo set_value('lclSat'); ?>">
                        <?php echo form_error('lclSat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="mawb">MAWB</label>
                        <input type="text" class="form-control form-control-sm" name="mawb" id="mawb" value="<?php echo set_value('mawb'); ?>">
                        <?php echo form_error('mawb', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hawb">HAWB</label>
                        <input type="text" class="form-control form-control-sm" name="hawb" id="hawb" value="<?php echo set_value('hawb'); ?>">
                        <?php echo form_error('hawb', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="sales">Sales</label>
                        <input type="text" class="form-control form-control-sm" name="sales" id="sales" value="<?php echo $user['name']; ?>" readonly>
                        <?php echo form_error('sales', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- <legend>Barang</legend>
                <div class="table-responsive"> 
                <table class="table table-bordered table-hover table-sm display nowrap" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>PPN (%)</th>
                                            <th>Harga Satuan (Rp)</th>
                                            <th>Jumlah (Rp)</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       
                                        <tr>
                                            <td>
                                                <select class="form-control" name="nm_item[]" id="nm_item" required="required">
                                                    <option selected value="" size="5">Pilih Barang</option>
                                                    <?php foreach ($this->db->get('tb_item')->result_array() as $key=> $value) : ?>
                                                    <option value="<?php echo $value['nm_item'] ?>"><?php echo $value['nm_item'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td><input class="hitung" type="number" id="qty-0" name="qty[]" size="1" value=1 /></td>
                                            <td><input class="hitung" type="text" id="ppn-0" name="ppn[]" size="1"  /></td>
                                            <td><input class="hitung" type="text" id="harga-0" name="harga[]" size="10"/></td>
                                            <td><input class="form-control jumlah" type="text" id="jumlah-0" name="jumlah[]" size="10" readonly /></td>
                                            <td><button type="button" class="btn btn-info" id="add" name="add" size="10">Tambah Form</button></td>
                                            
                                        </tr>
                                        </tbody>
                                        <tr>
                                            <td>
                                                Total Bayar (Rp)
                                            </td>
                                            <td colspan="6">
                                                <input type="text" id="grand_total" name="grand_total" size="80" readonly="readonly"/>
                                            </td>
                                        </tr>
                                    
                </table>
            </div> -->
            
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


<script type="text/javascript">

    $(document).on('click', "#add", function(){
       var i = $('input').length+1, element='<tr>';
        element+=' <td> <select class="form-control formtambah" name="nm_item[]" id="nm_item" required="required" > <option selected value="" size="5">Pilih Barang</option> <?php foreach ($this->db->get('tb_item')->result_array() as $key=> $value) : ?> <option value="<?php echo $value['nm_item'] ?>"><?php echo $value['nm_item'] ?></option> <?php endforeach ?> </select></td>';
        element+='<td><input class="hitung" type="number" id="qty-'+i+'" name="qty[]" size="1"  value=1></td>';
        element+='<td><input class="hitung" type="text" id="ppn-'+i+'" name="ppn[]" size="1"  ></td>';
        element+='<td><input class="hitung" type="text" id="harga-'+i+'" name="harga[]" size="10"  ></td>';
        element+='<td><input class="form-control jumlah" type="text" id="jumlah-'+i+'" name="jumlah[]" size="10" readonly></td>';
        element+='<td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td>';
        element+='</tr>';
        $('#dataTable').append(element);      
        i++;
        return false; 
        });
     
     $(document).on('focus', ".hitung",function(){
        var aydi=$(this).attr('id'), berhitung=aydi.split('-');
        $(this).keydown(function(){
            setTimeout(function(){
                var qty=($('#qty-'+berhitung[1]).val()!='' ? $('#qty-'+berhitung[1]).val():0), 
                    ppn=($('#ppn-'+berhitung[1]).val()!='' ? $('#ppn-'+berhitung[1]).val():0), 
                    harga=($('#harga-'+berhitung[1]).val()!='' ? $('#harga-'+berhitung[1]).val():0);
                var  subtotal= (parseInt(qty)*parseInt(harga)) + (parseInt(qty)*parseInt(harga)*parseInt(ppn)/100) ;

                if(!isNaN(subtotal)){
                    $('#jumlah-'+berhitung[1]).val(subtotal);
                    var alltotal=0;
                    $('.jumlah').each(function(){
                        alltotal += parseFloat($(this).val());
                    });
                    $('#grand_total').val(alltotal);
                }
            }, 50);
        });
    });



    $("#dataTable").on('click','#remove',function(){
    $(this).closest('tr').remove();
    });  
  
 
</script>


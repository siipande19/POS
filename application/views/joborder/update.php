<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Ubah Job Order</h1>
            <hr/>
            <form id="formD" name="formD" action="<?php echo site_url('joborder/update/' . $data->id_dtljoborder .'/'.$data->id_kodejob); ?>"  
                method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <input type="text" class="form-control form-control-sm" name="id[]" id="id" value="<?php echo $data->id; ?>">
                    <input type="text" class="form-control form-control-sm" name="id_kodejob[]" id="id_kodejob" value="<?php echo $data->id_kodejob; ?>">
                    <input type="text" class="form-control form-control-sm" name="id_dtljoborder" id="id_dtljoborder" value="<?php echo $data->id_dtljoborder; ?>">
                    <div class="form-group col-md-3">
                        <label for="consignee">Consignee</label>
                        <select class="form-control" name="consignee" id="consignee" required="required">
                                    <option selected value="">Pilih Consignee</option>
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
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="colli">Colli</label>
                        <input type="text" class="form-control form-control-sm" name="colli" id="colli" value="<?php echo $data->colli; ?>">
                        <?php echo form_error('colli', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="colliSat">Colli Sat</label>
                        <input type="text" class="form-control form-control-sm" name="colliSat" id="colliSat" 
                        value="<?php echo $data->colliSat; ?>">
                        <?php echo form_error('colliSat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="no_job">No. Joborder</label>
                        <input type="text" class="form-control form-control-sm" name="no_job" id="no_job" value="<?php echo $data->no_job; ?>">
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="kd_job">Kode Job</label>
                        <input type="text" class="form-control form-control-sm" name="kd_job" id="kd_job" value="<?php echo $data->kd_job; ?>">
                        <?php echo form_error('kd_job', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="no_invoice">No. Invoice</label>
                        <input type="text" class="form-control form-control-sm" name="no_invoice" id="no_invoice" value="<?php echo $data->no_invoice; ?>">
                        <?php echo form_error('no_invoice', '<small class="text-danger pl-3">', '</small>'); ?>
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
                <legend>SALES</legend>
                <div class="table-responsive"> 
                <table class="table table-bordered table-hover table-sm display nowrap" id="dataTable" width="100%" cellspacing="0">
                                        
                                        <tbody>  
                                        <tr>
                                            <th>ID DTL JOB</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>PPN (%)</th>
                                            <th>Selling (Rp)</th>
                                            <th>PPN (Rp)</th>
                                            <th>Selling + PPN (Rp)</th>
                                            <!-- <th>#</th> -->
                                        </tr>

                                        <tr>
                                            <?php foreach ($detail_barang as $key => $dtl) : ?>
                                            <td><input class="form-control " name="id[]" id="id" value="<?php echo $data->id; ?>"></td>
                                            <td>
                                                <select class="form-control" name="nm_item[]" id="nm_item-0" required="required">
                                                    <option selected value="" size="100"><?php echo $dtl['nm_item'] ?></option>
                                                    <?php foreach ($this->db->get('tb_item')->result_array() as $key=> $value) : ?>
                                                    <option value="<?php echo $value['nm_item'] ?>"><?php echo $value['nm_item'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td><input class="form-control hitung" type="text" id="qty-0" name="qty[]" size="1" 
                                                value="<?php echo $data->qty; ?>" /></td>
                                            <td><input class="form-control hitung" type="text" id="ppn-0" name="ppn[]" size="5"  
                                                value="<?php echo $data->ppn; ?>"/></td>
                                            <td><input class="form-control hitung" type="text" id="harga-0" name="harga[]" size="10" 
                                                value="<?php echo $data->harga; ?>"/></td>
                                            <td><input class="form-control hppn" type="text" id="hppn-0" name="Hppn[]" size="10" readonly 
                                                value="<?php echo $data->Hppn; ?>"/></td>
                                            <td><input class="form-control jumlah" type="text" id="jumlah-0" name="jumlah[]" size="10" readonly value="<?php echo $data->jumlah; ?>"/></td>
                                            <!-- <td><button type="button" class="form-control btn btn-info" id="add" name="add" size="10">Tambah Form</button></td> -->
                                            
                                        </tr>
                                                                     
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tr> 
                                            <td colspan="5">Total Invoice (Rp)</td>
                                            <td colspan="1">
                                                <input class="form-control" type="text" id="grand_total" name="grand_total" size="35" readonly="readonly" value="<?php echo $dtl['grand_total'] ?>"/>
                                            </td>
                                        </tr>
                </table>
            </div>
            <legend>COST</legend>
                <div class="table-responsive"> 
                <table class="table table-bordered table-hover table-sm display nowrap" id="dataTable" width="100%" cellspacing="0" >
                                        <tr> 
                                            <td colspan="4">COST OPERATIONAL EXPORT DADANG (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control cost" type="text" id="cost" name="cost" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" size="35"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Value Added Taxes (VAT)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="vat" name="vat" size="35" readonly="readonly" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" value="<?php echo $data->vat; ?>"/>
                                            </td>
                                        </tr>                                  
                </table>
            </div>
            <br>
                <div class="table-responsive"> 
                <table class="table table-bordered table-hover table-sm display nowrap" id="dataTable" width="100%" cellspacing="0">
                                    
                                        <tr>
                                            <td colspan="4">Total COST (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="tcost" name="tcost" size="35" readonly="readonly" 
                                                  value="<?php echo $data->tcost; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">GROSS PROFIT (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="gross_profit" name="gross_profit" size="35" readonly="readonly" value="<?php echo $data->gross_profit; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">PPH 23 (2%)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="pph23" name="pph23" size="35" readonly="readonly" value="<?php echo $data->pph23; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">NET PROFIT (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="net_profit" name="net_profit" size="35" readonly="readonly" value="<?php echo $data->net_profit; ?>"/>
                                            </td>
                                        </tr>
                                                                          
                </table>
            </div>
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
<script type="text/javascript" language="Javascript">

    $(document).on('click', "#add", function(){
       var i = $('input').length+1, element='<tr>';
        element+=' <td> <select class="form-control formtambah" name="nm_item[]" id="nm_item" required="required" > <option selected value="" size="20">Pilih SALES</option> <?php foreach ($this->db->get('tb_item')->result_array() as $key=> $value) : ?> <option value="<?php echo $value['nm_item'] ?>"><?php echo $value['nm_item'] ?></option> <?php endforeach ?> </select></td>';
        element+='<td><input class="form-control hitung" type="text" id="qty-'+i+'" name="qty[]" size="1"  value=1></td>';
        element+='<td><input class="form-control hitung" type="text" id="ppn-'+i+'" name="ppn[]" size="5"  ></td>';
        element+='<td><input class="form-control hitung" type="text" id="harga-'+i+'" name="harga[]" size="10"  ></td>';
        element+='<td><input class="form-control hppn" type="text" id="hppn-'+i+'" name="hppn[]" size="1" readonly ></td>';
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
                var HargaPPN = (parseInt(qty)*parseInt(harga)*parseInt(ppn)/100) ;
                var subtotal= (parseInt(qty)*parseInt(harga)) + (parseInt(qty)*parseInt(harga)*parseInt(ppn)/100) ;
                if(!isNaN(HargaPPN)){
                    $('#hppn-'+berhitung[1]).val(HargaPPN);
                    var allppn=0;
                    
                    $('.hppn').each(function(){
                        allppn += parseFloat($(this).val());
                    });
                    $('#vat').val(allppn); 
                }
                if(!isNaN(subtotal)){
                    $('#jumlah-'+berhitung[1]).val(subtotal);
                    var alltotal=0;
                    $('.jumlah').each(function(){
                        alltotal += parseFloat($(this).val());
                    });
                   
                    $('#grand_total').val(alltotal);
                    // $('#tinvoice1').val(alltotal+(alltotal));
                }
            }, 50);
        });
    });
    
    $("#dataTable").on('click','#remove',function(){
    $(this).closest('tr').remove();
    });

    function OnChange(value){

     Cost = document.formD.cost.value;
     vat = document.formD.vat.value;
     TotalInvoice = document.formD.grand_total.value;
     GrandTotal = document.formD.grand_total.value;
     
     TotalCost = parseInt(Cost) + parseInt(vat);
     document.formD.tcost.value = TotalCost;

     GrossProfit = parseInt(TotalInvoice) - parseInt(TotalCost);
     document.formD.gross_profit.value = GrossProfit;

     PPH23 = (parseInt(GrandTotal)-parseInt(vat))*0.02;
     document.formD.pph23.value = PPH23;

     NetProfit = parseInt(GrossProfit) - parseInt(PPH23);
     document.formD.net_profit.value = NetProfit;
   }  
</script>

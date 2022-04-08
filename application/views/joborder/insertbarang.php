<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h4 mb-4 text-gray-800">Tambah Invoice</h1>
            <hr/>
            <form id="formD" name="formD" action="<?php echo site_url('joborder/insertbarang/' . $data->id); ?>"  
                method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="no_job">No. Joborder</label>
                        <input type="text" class="form-control form-control-sm" name="no_job" id="no_job" value="<?php echo $data->no_job; ?>" readonly>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="kd_job">Kode Job</label>
                        <input type="text" class="form-control form-control-sm" name="kd_job" id="kd_job" value="<?php echo set_value('kd_job'); ?>">
                        <?php echo form_error('kd_job', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="no_invoice">No. Invoice</label>
                        <input type="text" class="form-control form-control-sm" name="no_invoice" id="no_invoice" value="<?php echo set_value('no_invoice'); ?>">
                        <?php echo form_error('no_invoice', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-md-3">   
                        <input type="hidden" class="form-control form-control-sm" name="id_dtljoborder" id="id_dtljoborder" value="<?php echo $data->id; ?>" readonly>
                        <?php echo form_error('id_dtljoborder', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <hr/>
                <legend>SALES</legend>
                <div class="table-responsive"> 
                <table class="table table-bordered table-hover table-sm display nowrap" id="dataTable" width="100%" cellspacing="0">
                                        
                                        <tbody>  
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>PPN (%)</th>
                                            <th>Selling (Rp)</th>
                                            <th>PPN (Rp)</th>
                                            <th>Selling + PPN (Rp)</th>
                                            <th>#</th>
                                        </tr>
                                        
                                                                            
                                        <tr>
                                            <td>
                                                <select class="form-control" name="nm_item[]" id="nm_item" required="required">
                                                    <option selected value="" size="100">Pilih SALES</option>
                                                    <?php foreach ($this->db->get('tb_item')->result_array() as $key=> $value) : ?>
                                                    <option value="<?php echo $value['nm_item'] ?>"><?php echo $value['nm_item'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td><input class="form-control hitung" type="text" id="qty-0" name="qty[]" size="1" value=1 /></td>
                                            <td><input class="form-control hitung" type="text" id="ppn-0" name="ppn[]" size="5"  /></td>
                                            <td><input class="form-control hitung" type="text" id="harga-0" name="harga[]" size="10"/></td>
                                            <td><input class="form-control hppn" type="text" id="hppn-0" name="hppn[]" size="10" readonly /></td>
                                            <td><input class="form-control jumlah" type="text" id="jumlah-0" name="jumlah[]" size="10" readonly /></td>
                                            <td><button type="button" class="form-control btn btn-info" id="add" name="add" size="10">Tambah Form</button></td>
                                            
                                        </tr>
                                        </tbody>
                                        <!-- <tr> 
                                            <td colspan="4">Total Selling (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control harga1" type="text" id="harga1-0" name="harga1[]" size="10" readonly="readonly" />
                                            </td>
                                        </tr> -->
                                        <tr> 
                                            <td colspan="4">Total Invoice (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="grand_total" name="grand_total" size="35" readonly="readonly"/>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="4">Total Invoice (Rp)</td>
                                            <td colspan="2"><input class="form-control" type="text" id="tinvoice1" name="tinvoice1" size="35"  readonly="readonly" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"/></td>
                                        </tr> -->                                    
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
                                                <input class="form-control" type="text" id="vat" name="vat" size="35" readonly="readonly" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"/>
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
                                                 />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">GROSS PROFIT (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="gross_profit" name="gross_profit" size="35" value="" readonly="readonly" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">PPH 23 (2%)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="pph23" name="pph23" size="35" readonly="readonly" value=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">NET PROFIT (Rp)</td>
                                            <td colspan="2">
                                                <input class="form-control" type="text" id="net_profit" name="net_profit" size="35" readonly="readonly" value=""/>
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

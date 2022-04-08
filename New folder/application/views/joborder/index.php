<style>
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  left: 0;
}
td, th {

}

.fix {
  position: sticky;
  position: -webkit-sticky;
  left: 0;
  background: white;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
    $(".tip-top").tooltip({
        placement : 'top'
    });
    $(".tip-right").tooltip({
        placement : 'right'
    });
    $(".tip-bottom").tooltip({
        placement : 'bottom'
    });
    $(".tip-left").tooltip({
        placement : 'left'
    });
});
</script>

<!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">JOB ORDER</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Job Order Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="sticky"><a href="<?php echo site_url('joborder/insert'); ?>" class="btn btn-lg btn-primary mb-3 mr-auto">Tambah Job Order</a></div>
                                <table class="table table-bordered table-hover table-striped table-sm display nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <!-- <?php var_dump($joborder) ?> -->
                                        <tr>
                                            <th>No.</th>
                                            <th>Action</th>
                                            <th>No. Joborder</th>
                                            <th>Kode Joborder</th>
                                            <th>No. Invoice</th>
                                            <th>Customer</th>
                                            <th>MAWB/MBL</th>
                                            <th>HAWB/HBL</th>
                                            <th>Selling</th>
                                            <th>PPN</th>
                                            <th>Selling + PPN</th>
                                            <th>Cost</th>
                                            <th>PPH23</th>
                                            <th>Profit</th>
                                            <th>Sales</th>
                                            <th>User</th>
                                            <th>Date Created</th>
                                            <th>Edited</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($joborder as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td class="fix">
                                                <a href="<?php echo site_url('joborder/update/' . $value->id); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="<?php echo site_url('joborder/delete/' . $value->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo site_url('joborder/insertbarang/' . $value->id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a>
                                                <a href="<?php echo site_url('joborder/detail/' . $value->id); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td><?php echo $value->no_job ?></td>
                                            <td><?php echo $value->kd_job ?></td>                                            
                                            <td><?php echo $value->no_invoice ?></td>
                                            <td><div data-toggle="tooltip" class="tip-top" title="<?php echo $value->id_customer ?>"><?php echo substr($value->id_customer ,0,10).'...'?>
                                                </div>
                                            </td> 
                                           <!--  <td>
                                                <div data-toggle="tooltip" class="tip-top" title="<?php echo $value->consignee ?>"><?php echo substr($value->consignee ,0,10).'...'?>
                                                </div>
                                            </td>
                                            <td>
                                                <div data-toggle="tooltip" class="tip-top" title="<?php echo $value->shipper ?>"><?php echo substr($value->shipper ,0,10).'...'?>
                                                </div>
                                            </td> -->
                                            <td><?php echo $value->mawb ?></td>
                                            <td><?php echo $value->hawb ?></td>
                                            <td><!-- <?php echo $value->grand_total ?> --></td>
                                            <td></td>
                                            <td><!-- <?php echo $value->jumlah ?> --></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $value->sales ?></td>
                                            <td><?php echo $value->control_user ?></td>
                                            <td><?php echo $value->date_create ?></td>
                                            <td>
                                                <?php echo $value->user_edit ?>
                                                <?php echo $value->date_edit ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
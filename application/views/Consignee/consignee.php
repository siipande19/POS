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
<!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">CONSIGNEE</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Consignee Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="sticky">
                                <a href="<?php echo site_url('Consignee/insert'); ?>" class="btn btn-lg btn-primary mb-3 mr-auto">Tambah Consignee</a>
                                </div>
                                <table class="table table-bordered table-hover table-striped table-sm display nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID Consignee</th>
                                            <th>Nama Consignee</th>
                                            <th>Nama Alias</th>
                                            <th>Lokasi</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Kota</th>
                                            <th>Negara</th>
                                            <th>Kode Pos</th>
                                            <th>Nomor Telepon</th>
                                            <th>Fax</th>
                                            <th>Kontak</th>
                                            <th>NPWP</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($consignee as $key => $value) : ?>
                                        <tr>
                                            <td class="fix">
                                                <a href="<?php echo site_url('Consignee/update/' . $value->id_consignee); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="<?php echo site_url('Consignee/delete/' . $value->id_consignee); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo site_url('Consignee/detail/' . $value->id_consignee); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-search-plus"></i></a>
                                            </td>
                                            <td><?php echo $value->id_consignee ?></td>
                                            <td><?php echo $value->nm_consignee ?></td>
                                            <td><?php echo $value->nm_alias ?></td>
                                            <td><?php echo $value->place ?></td>
                                            <td><?php echo $value->address ?></td>
                                            <td><?php echo $value->kel ?></td>
                                            <td><?php echo $value->kec ?></td>
                                            <td><?php echo $value->city ?></td>
                                            <td><?php echo $value->country ?></td>
                                            <td><?php echo $value->post_code ?></td>
                                            <td><?php echo $value->phone ?></td>
                                            <td><?php echo $value->fax ?></td>
                                            <td><?php echo $value->contact ?></td>
                                            <td><?php echo $value->npwp ?></td>
                                            <td><?php echo $value->remark ?></td>
                                            <!-- <td>
                                                <?php echo $value->user_edit ?>
                                                <?php echo $value->date_edit ?>
                                            </td> -->
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

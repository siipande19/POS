<!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">PRODUCT</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="<?php echo site_url('Product/insert'); ?>" class="btn btn-lg btn-primary mb-3 mr-auto">Tambah Product</a>
                                <table class="table table-bordered table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($product as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo $value->id ?></td>
                                            <td><?php echo $value->nm_item ?></td>
                                            <td><?php echo $value->type_item ?></td>
                                            
                                            <td>
                                                <a href="<?php echo site_url('Product/update/' . $value->id); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="<?php echo site_url('Product/delete/' . $value->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo site_url('Product/detail/' . $value->id); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-search-plus"></i></a>
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

            <!-- End of Main Content -->
            <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

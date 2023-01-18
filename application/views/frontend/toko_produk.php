<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Menu Utama Dashboard Toko "<?php echo $namaToko->namaToko; ?>"</h1>
        </div>

        <div class="section-body">

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Toko</h4>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('frontend/menu_toko'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <?php if (count($produk) > 0) { ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?php echo site_url('mmember/toko/create_produk/' . $this->uri->segment(4)); ?>">Silakan Tambah Produk Baru</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Produk</h4>



                                        <div class="card-header-action">

                                        </div>
                                    </div>

                                    <?php if (!empty($this->session->flashdata('berhasil'))) {; ?>
                                        <div class="alert alert-primary alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>&times;</span>
                                                </button>
                                                <?php echo $this->session->flashdata('berhasil'); ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($this->session->flashdata('hapus'))) {; ?>
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>&times;</span>
                                                </button>
                                                <?php echo $this->session->flashdata('hapus'); ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="card-body p-0">
                                        <div class="table-responsive table-invoice">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Action</th>
                                                </tr>

                                                <?php foreach ($produk as $val) { ?>
                                                    <tr>
                                                        <td><?php echo $val['namProduk']; ?></td>
                                                        <td class="font-weight-600"><?php echo $val['harga']; ?></td>
                                                        <td><?php echo $val['stok']; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('mmember/toko/edit_produk/' . $val['idToko'] . '/' . $val['idProduk']); ?>" class="btn btn-warning">Edit</a>
                                                            <a href="<?php echo site_url('mmember/toko/delete_produk/' . $val['idProduk'] . '/' . $val['idToko']); ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?php echo site_url('mmember/toko/create_produk/' . $this->uri->segment(4)); ?>">Silakan Memasukkan Data Produk Baru</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    <?php } ?>

                </div>
            </div>
    </section>
</div>


</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="http://localhost/tokokita_dev/assets/admin/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="http://localhost/tokokita_dev/assets/admin/assets/js/scripts.js"></script>
<script src="http://localhost/tokokita_dev/assets/admin/assets/js/custom.js"></script>
</body>

</html>
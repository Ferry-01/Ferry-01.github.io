<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Keranjang Belanja</h1>

        </div>

        <div class="section-body">


            <div id="output-status"></div>
            <div class="row">


                <div class="col-md-12">
                    <?php if (count($this->cart->contents()) > 0) { ?>


                        <div class="row">
                            <div class="col-md-15">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Keranjang Belanja</h4>
                                        <div class="card-header-action">

                                        </div>
                                    </div>
                                    <div class="card w-150">
                                        <div class="card-body">
                                            <div class="table-responsive table-invoice">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Produk</th>
                                                        <th>Gambar</th>
                                                        <th>Harga</th>
                                                        <th>qty</th>
                                                        <th>Sub Total</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    <?php
                                                    $total = 0;
                                                    $i = 1;
                                                    $cart = $this->cart->contents();
                                                    foreach ($cart as $val) {
                                                        $total = $total + $val['subtotal']; ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $val['name']; ?></td>
                                                            <td><img src="<?php echo base_url() . '/upload_produk' . '/' . $val['gambar'] ?> " ; class="card-img-top" height="250" width="250"></td>
                                                            <td><?php echo number_format($val['price']); ?></td>
                                                            <td><input type="number" min="1" value="<?php echo $val['qty']; ?>"></td>
                                                            <td><?php echo number_format($val['price'] * $val['qty']); ?></td>
                                                            <td><a href="<?php echo site_url('mmember/member/hapus_cart/' . $val['rowid']); ?>" class="btn btn-danger">Hapus</a></td>
                                                        </tr>
                                                    <?php } ?>

                                                    <tr>
                                                        <th>Total</th>
                                                        <th><?php echo $total; ?></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th><a href="<?php echo site_url('mmember/member/selesai_belanja'); ?>" class="btn btn-success">Selesai Belanja</a></th>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
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
                                        <a class="nav-link active" href="#">TIDAK ADA PRODUK DI KERANJANG BELANJA</a>
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
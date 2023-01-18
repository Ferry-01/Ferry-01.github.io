<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Menu Utama Dashboard Member</h1>

        </div>

        <div class="section-body">

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Member</h4>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('frontend/menu_member'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <?php if (count($wishlist) > 0) { ?>


                        <div class="section-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Wishlist Anda</h4>
                                        <div class="card-header-action">

                                        </div>
                                    </div>

                                    <div class="section-body">
                                        <div class="row">

                                            <?php foreach ($wishlist as $val) { ?>
                                                <a href="<?php echo site_url('home/see_more/' . $val->idProduk); ?>">

                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-5">
                                                        <article class="article article-style-b">
                                                            <div class="article-header">
                                                                <div class="article-image" data-background="<?php echo base_url('upload_produk/' . $val->foto); ?>">
                                                                </div>
                                                </a>
                                        </div>
                                        <div class="article-details">
                                            <p style="font-size: 18px;"><?php echo $val->namProduk; ?></p>
                                            <div style="color: #FFA500; font-size: 20px">Rp<?php echo number_format($val->harga); ?></div>
                                            <br />
                                            <div class="article-cta">
                                                <a href="<?php echo site_url('mmember/member/cart_tambah/' . $val->idProduk); ?>" class="btn btn-primary">Add to Cart</a>
                                                <a href="<?php echo site_url('mmember/member/delete_wishlist/' . $val->idProduk); ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                        </article>
                                    </div>

                                <?php } ?>

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
                            <div>Anda Belum Menambahkan Produk Kedalam Wishlist Anda</div>
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
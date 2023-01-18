<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-15 col-sm-8 col-md-8 col-lg-4">
                <article class="article article-style-b">
                    <div class="article-header">
                        <input type="hidden" name="idProduk" value="<?php echo $dproduk->idProduk; ?>">
                        <div class="article-image" data-background="<?php echo base_url('upload_produk/' . $produk->foto); ?>">
                        </div>
                    </div>

                </article>
            </div>
            <div>
                <h4><?php echo $produk->namProduk; ?></h4>
                <div style="color: #FFA500; font-size: 20px">Rp<?php echo number_format($produk->harga); ?></div>

                <div>Pengiriman</div>
                <div class="form-group row">
                    <label style="text-align: center;" class="col-sm-4 col-form-label">Dikirim Ke</label>
                    <div class="col-8">
                        <select style="align-content: center;" class="form-control" name="asal">
                            <option value="0">-Pilih Kota Asal-</option>
                            <?php foreach ($ongkir as $item) { ?>
                                <option value="<?php echo $item->idBiayaKirim; ?>">
                                    <?php echo $item->asal; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label style="text-align: center;" class="col-sm-4 col-form-label">Ongkos</label>
                    <div class="col-8">
                        <select style="align-content: center;" class="form-control" name="asal">
                            <option value="0">-Biaya kirim-</option>
                            <?php foreach ($ongkir as $item) { ?>
                                <option value="<?php echo $item->biaya; ?>">
                                    <?php echo $item->biaya; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <a href="<?php echo site_url('mmember/member/cart_tambah/' . $produk->idProduk); ?>" class="btn btn-primary">Add to Cart</a>
                <a href="<?php echo site_url('mmember/member/add_wishlist/' . $produk->idProduk); ?>" class="btn btn-primary">Add to Wishlist</a>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="<?php echo base_url('upload_logo_toko/' . $dproduk->logo); ?>" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $dproduk->namaToko; ?></div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Produk</div>
                                        <div class="profile-widget-item-value"><?php echo $produk->stok; ?></div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <a href="#" class="btn btn-primary">Chat Sekarang</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <div class="row">
            <div class="col-12 ">
                <div class="card mb-0">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    Spesifikasi Produk
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <label class="col-sm-4 col-form-label">Kategori &emsp; <?php echo $produk->idKat; ?></label><br />
                                    <label class="col-sm-4 col-form-label">Stok &emsp; &emsp; &emsp; <?php echo $produk->stok; ?></label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Deskripsi Produk
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <pre style="font-family: Arial, Helvetica, sans-serif;"><?php echo $produk->deskripsiProduk; ?></pre>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
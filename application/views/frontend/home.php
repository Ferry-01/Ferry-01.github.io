      <!-- Main Content -->
      <div class="main-content">
          <section class="section">

              <div class="row">
                  <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">

                          <div class="card-body">
                              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner">
                                      <div class="carousel-item active">
                                          <img class="d-block w-100" src="<?php echo base_url('assets/admin/assets/img/1.png'); ?>" alt="First slide">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>Heading</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                  tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <div class="carousel-item">
                                          <img class="d-block w-100" src="<?php echo base_url('assets/admin/assets/img/2.png'); ?>" alt="Second slide">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>Heading</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                  tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <div class="carousel-item">
                                          <img class="d-block w-100" src="<?php echo base_url('assets/admin/assets/img/3.png'); ?>" alt="Third slide">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>Heading</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                  tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Produk Terbaru</h2>
                  <p class="section-lead">This article component is based on card and flexbox.</p>

                  <div class="row">

                      <?php foreach ($produk_terbaru as $val) { ?>
                          <a href="<?php echo site_url('home/see_more/' . $val->idProduk); ?>">
                              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                  <article class="article">
                                      <div class="article-header">
                                          <div class="article-image" data-background="<?php echo base_url('upload_produk/' . $val->foto); ?>">
                                          </div>
                                          <div class="article-title">
                                              <h2><a href="#"></a></h2>
                                          </div>
                                      </div>
                                      <div class="article-details">
                                          <p style="font-size: 18px;"><?php echo $val->namProduk; ?></p>
                                          <div style="color: #FFA500; font-size: 20px">Rp<?php echo number_format($val->harga); ?></div>
                                          <br />
                                          <div class="article-cta">
                                              <a href="<?php echo site_url('mmember/member/cart_tambah/' . $val->idProduk); ?>" class="btn btn-primary">Add to Cart</a>
                                          </div>
                                      </div>
                                  </article>
                              </div>
                          </a>
                      <?php } ?>

                  </div>

                  <h2 class="section-title">Produk</h2>
                  <div class="row">

                      <?php foreach ($produk as $val) { ?>
                          <a href="<?php echo site_url('home/see_more/' . $val->idProduk); ?>">
                              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                  <article class="article">
                                      <div class="article-header">
                                          <div class="article-image" data-background="<?php echo base_url('upload_produk/' . $val->foto); ?>">
                                          </div>
                                          <div class="article-title">
                                              <h2><a href="#"></a></h2>
                                          </div>
                                      </div>
                                      <div class="article-details">
                                          <p style="font-size: 18px;"><?php echo $val->namProduk; ?></p>
                                          <div style="color: #FFA500; font-size: 20px">Rp<?php echo number_format($val->harga); ?></div>
                                          <br />
                                          <div class="article-cta">
                                              <a href="<?php echo site_url('mmember/member/cart_tambah/' . $val->idProduk); ?>" class="btn btn-primary">Add to Cart</a>
                                          </div>
                                      </div>
                                  </article>
                              </div>
                          </a>
                      <?php } ?>

                  </div>

              </div>
          </section>
      </div>
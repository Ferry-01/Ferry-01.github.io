      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Kurir</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Kurir</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Ongkos Kirim</h2>

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Ongkos Kirim</h4><a href="<?php echo site_url('jaskir/ongkir/add'); ?>" class="btn btn-primary">Tambah Ongkos Kirim</a>
                              </div>
                              <div class="card-body">
                                  <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
                                      <div class="alert alert-primary alert-dismissible show fade">
                                          <div class="alert-body">
                                              <button class="close" data-dismiss="alert">
                                                  <span>x</span>
                                              </button>
                                              <?php echo $this->session->flashdata('pesan'); ?>
                                          </div>
                                      </div>
                                  <?php } ?>
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>#</th>
                                              <th>Kurir</th>
                                              <th>Kota Asal</th>
                                              <th>Kota Tujuan</th>
                                              <th>Ongkos</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php
                                            $no = 1;
                                            foreach ($ongkos as $item) { ?>
                                              <tr>
                                                  <td><?php echo $no++ ?></td>
                                                  <td><?php echo $item->namaKurir; ?></td>
                                                  <td><?php echo $item->asal; ?></td>
                                                  <td><?php echo $item->tujuan; ?></td>
                                                  <td><?php echo $item->biaya; ?></td>
                                                  <td><a href="<?php echo site_url('jaskir/ongkir/getid/' . $item->idBiayaKirim); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('jaskir/ongkir/hapus/' . $item->idBiayaKirim); ?>" class="btn btn-danger">Hapus</a></td>
                                              </tr>
                                          <?php } ?>
                                      </table>
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <nav class="d-inline-block">
                                      <ul class="pagination mb-0">
                                          <li class="page-item disabled">
                                              <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                          </li>
                                          <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                          <li class="page-item">
                                              <a class="page-link" href="#">2</a>
                                          </li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item">
                                              <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                          </li>
                                      </ul>
                                  </nav>
                              </div>
                          </div>
                      </div>

                  </div>


              </div>
          </section>
      </div>
      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Toko</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item"><a href="#">Toko</a></div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">List Toko</h2>

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>List Toko</h4>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>#</th>
                                              <th>Nama Toko</th>
                                              <th>Deskripsi</th>
                                              <th>Status</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php
                                            $no = 1;
                                            foreach ($toko as $item) { ?>
                                              <tr>
                                                  <td><?php echo $no++; ?></td>
                                                  <td><?php echo $item->namaToko; ?></td>
                                                  <td><?php echo $item->deskripsi; ?></td>
                                                  <td>
                                                      <?php
                                                        if ($item->statusAktif == 'Y') {
                                                        ?>
                                                          <div class="badge badge-success">Aktif</div>
                                                      <?php
                                                        } else {
                                                        ?>
                                                          <div class="badge badge-danger">Tidak Aktif</div>
                                                      <?php
                                                        }
                                                        ?>
                                                  </td>
                                                  <td>
                                                      <?php
                                                        if ($item->statusAktif == 'Y') {
                                                        ?>
                                                          <a href="<?php echo site_url('toko/non_aktif/' . $item->idToko); ?>" class="btn btn-warning">Non Aktif</a>
                                                      <?php
                                                        } else {
                                                        ?>
                                                          <a href="<?php echo site_url('toko/aktif/' . $item->idToko); ?>" class="btn btn-primary">Aktif</a>
                                                      <?php
                                                        }
                                                        ?>
                                                  </td>
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
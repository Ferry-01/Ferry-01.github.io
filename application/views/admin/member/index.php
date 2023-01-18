      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Member</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item"><a href="#">Member</a></div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">List Member</h2>

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-7">
                          <div class="card">
                              <div class="card-header">
                                  <h4>List Member</h4>
                              </div>
                              <div class="card-body">
                                  <div class="card-body">
                                      <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
                                          <div class="alert alert-primary alert-dismissible show fade">
                                              <div class="alert-body">
                                                  <button class="close" data-dismiss="alert">
                                                  </button>
                                                  <?php echo $this->session->flashdata('pesan'); ?>
                                              </div>
                                          </div>
                                      <?php } ?>
                                      <div class="table-responsive">
                                          <table class="table table-bordered table-md">
                                              <tr>
                                                  <th>#</th>
                                                  <th>Username</th>
                                                  <th>Nama Konsumen</th>
                                                  <th>Alamat</th>
                                                  <th>Email</th>
                                                  <th>Telepon</th>
                                                  <th>Status</th>
                                                  <th>action</th>
                                              </tr>
                                              <?php
                                                $no = 1;
                                                foreach ($member as $item) { ?>
                                                  <tr>
                                                      <td><?php echo $no++; ?></td>
                                                      <td><?php echo $item->username; ?></td>
                                                      <td><?php echo $item->namaKonsumen; ?></td>
                                                      <td><?php echo $item->alamat; ?></td>
                                                      <td><?php echo $item->email; ?></td>
                                                      <td><?php echo $item->tlpn; ?></td>
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
                                                              <a href="<?php echo site_url('member/non_aktif/' . $item->idKonsumen); ?>" class="btn btn-warning">Non Aktif</a>
                                                          <?php
                                                            } else {
                                                            ?>
                                                              <a href="<?php echo site_url('member/aktif/' . $item->idKonsumen); ?>" class="btn btn-primary">Aktif</a>
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
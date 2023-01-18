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
                  <h2 class="section-title">Data Kurir</h2>

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <form method="POST" action="<?php echo site_url('jaskir/ongkir/edit'); ?>">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>HTML5 Form Basic</h4>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Kurir</label>
                                          <div class="col-sm-9">
                                              <select class="form-control" name="kurir">
                                                  <option value="0">-Pilih Kurir-</option>
                                                  <?php foreach ($kurir as $item) { ?>
                                                      <option value="<?php echo $item->idKurir; ?>">
                                                          <?php echo $item->namaKurir; ?>
                                                      </option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Kota Asal</label>
                                          <div class="col-sm-9">
                                              <select class="form-control" name="asal">
                                                  <option value="0">-Pilih Kota Asal-</option>
                                                  <?php foreach ($ongkir as $item) { ?>
                                                      <option value="<?php echo $item->idKota; ?>">
                                                          <?php echo $item->namaKota; ?>
                                                      </option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Kota Tujuan</label>
                                          <div class="col-sm-9">
                                              <select class="form-control" name="tujuan">
                                                  <option value="0">-Pilih Kota Tujuan-</option>
                                                  <?php foreach ($ongkir as $item) { ?>
                                                      <option value="<?php echo $item->idKota; ?>">
                                                          <?php echo $item->namaKota; ?>
                                                      </option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Ongkos</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" required='required' id="inputEmail3" name="biaya" placeholder="Ongkos">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                      <button class="btn btn-primary" type="submit">Submit</button>
                                  </div>
                              </div>
                      </div>
          </section>
      </div>
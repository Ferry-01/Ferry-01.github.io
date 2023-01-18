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
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">

                                <form id="setting-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('mmember/member/insert_toko'); ?>">

                                    <div class="card-header">
                                        <h4>Form Membuat Toko Baru</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Toko</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="nama_toko" class="form-control" id="site-title">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-description" class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                            <div class="col-sm-6 col-md-9">
                                                <textarea class="form-control" name="deskripsi" id="site-description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Logo Toko</label>
                                            <div class="col-sm-6 col-md-9">
                                                <div class="custom-file">
                                                    <input type="file" name="logo_toko" class="custom-file-input" id="site-logo">
                                                    <label class="custom-file-label">Choose File</label>
                                                </div>
                                                <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke text-md-right">
                                        <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                        <button class="btn btn-secondary" type="button">Reset</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div><br>


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
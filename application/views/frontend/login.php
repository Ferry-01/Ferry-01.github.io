<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-4 col-xl-5 ">

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo site_url('home/act_login'); ?>" class="needs-validation" novalidate="">
                            <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
                                <div class="alert alert-primary alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <?php echo $this->session->flashdata('pesan'); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($this->session->flashdata('pesan_salah'))) {; ?>
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <?php echo $this->session->flashdata('pesan_salah'); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="email" type="text" class="form-control" name="username" tabindex="1" value="<?php echo set_value('username') ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        <a href="auth-forgot-password.html" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="auth-register.html">Create One</a>
                </div>

            </div>
        </div>
</div>
</section>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url('assets/stisla/assets/js/stisla.js'); ?>"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?php echo base_url('assets/admin/assets/js/scripts.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/assets/js/custom.js'); ?>"></script>

<!-- Page Specific JS File -->
</body>
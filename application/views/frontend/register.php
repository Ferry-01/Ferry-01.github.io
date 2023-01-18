<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo site_url('home/act_reg'); ?>">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="first_name">Nama Lengkap</label>
                                    <input id="first_name" type="text" class="form-control" name="nama" autofocus value="<?php echo set_value('nama') ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group col-6">
                                    <label for="last_name">Email</label>
                                    <input id="last_name" type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="email" type="text" class="form-control" name="username">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password" class="form-control" name="password_confirm">
                                </div>
                            </div>

                            <div class="form-divider">
                                Your Home
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="email">Alamat</label>
                                    <input id="email" type="text" class="form-control" name="alamat">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Kota</label>
                                    <select class="form-control selectric" name="kota">
                                        <?php foreach ($kota as $val) { ?>
                                            <option value="<?php echo $val->idKota; ?>"><?php echo $val->namaKota; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>No Telephon</label>
                                    <input type="text" class="form-control" name="no_telp">
                                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Stisla 2018
                </div>
            </div>
        </div>

    </section>
</div>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1>Registrasi</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign up to your login session </p>
            <form action="<?= BASEURL; ?>/auth/create" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="UserName" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="Passwd" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmPasswd" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="layout-login-btn d-grid gap-2 p-3">
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </div>
                <p class="description-form p-3">Sudah punya akun?
                    <a class="btn btn-link font-weight-bold" href="<?= BASEURL; ?>/auth">Login</a>
                </p>
                <div class="col-sm-12 mt-2">
                    <?php
                    Flasher::flash();
                    ?>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
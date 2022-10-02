<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1>Ubah kata sandi</h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Kamu dapat mengubah kata sandi jika kamu menginginkannya.</p>
            <form action="<?= BASEURL; ?>/auth/updatePassword/<?= $data['user']['UserId']; ?>" method="post">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Old Password" name="OldPassword" required>
                    <input type="hidden" class="form-control" placeholder="Old Password" name="OldPassword1" value="<?= $data['user']['OldPassword1']; ?>" required>
                    <input type="hidden" class="form-control" placeholder="Old Password" name="OldPassword2" value="<?= $data['user']['OldPassword2']; ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="New Password" name="Passwd" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmNewPassword" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Change password</button>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <?php
                        Flasher::flash();
                        ?>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="<?= BASEURL; ?>/home">Home</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
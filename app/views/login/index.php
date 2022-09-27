<div class="container">
    <form action="<?= BASEURL; ?>/login/loginProcess" method="POST">
        <div class="bg-form-login border bg-light mx-auto">
            <h1 class="title-heading-login">Hi There !</h1>
            <p class="description-form">Silahkan isi username dan kata sandi untuk login</p>
            <div class="form-layout  mt-3 mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" name="UserName" class="form-control">
            </div>
            <div class="form-layout  mt-3 mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" name="Passwd" class="form-control">
            </div>
            <div class="form-check mt-3 mb-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember</label>
            </div>
            <div class="layout-login-btn mx-auto d-grid gap-2">
                <input type="submit" value="Login" name="login" class="btn btn-primary" id="sumbit-btn">
            </div>
            <div class="lupa-sandi">
                <a href="forgot-password.php">Lupa Sandi?</a>
            </div>
            <div class="col-sm-12">
                <?php
                Flasher::flash();
                ?>
            </div>
            <hr class="garisBatas">
            <p class="description-form">Belum punya akun? Silahkan menuju halaman register</p>
            <ul class="login-or-register">
                <li>Login</li>
                <span>|</span>
                <li><a href="<?= BASEURL; ?>/register">Register</a></li>
            </ul>
            <div class="mx-auto">
                <p class="credit">Made with &lt;3 by Virtuas Kelompok 5</p>
            </div>
        </div>
    </form>
</div>
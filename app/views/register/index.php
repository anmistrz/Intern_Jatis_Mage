<div class="container">
    <form action="<?= BASEURL; ?>/register/addAccount" method="POST">
        <div class=" bg-form-login border bg-light mx-auto">
            <h1 class="title-heading-login">Registrasi Akun</h1>
            <p class="description-form">Silahkan isi identitas untuk mendaftarkan akun</p>

            <div class="form-layout  mt-3 mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" name="UserName" class="form-control">
            </div>
            <div class="form-layout  mt-3 mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" name="Passwd" class="form-control">
            </div>
            <!-- <div class="form-layout  mt-3 mb-3">
                <label for="password" class="form-label">Verifikasi Kata Sandi</label>
                <input id="password" type="password" name="Passwd" class="form-control">
            </div> -->
            <div class="layout-login-btn mx-auto d-grid gap-2">
                <input type="submit" class="btn btn-primary" id="sumbit-btn">
            </div>
            <hr class="garisBatas">
            <p class="description-form">Belum punya akun? Silahkan menuju halaman register</p>
            <ul class="login-or-register">
                <li> <a href="<?= BASEURL; ?>/login">Login</a></li>
                <span>|</span>
                <li>Register</li>
            </ul>
            <div class="mx-auto">
                <p class="credit">Made with &lt;3 by Fajar Muhammad Al-Hijri</p>
            </div>
        </div>
    </form>
</div>
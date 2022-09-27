<div class="container">
    <form action="<?= BASEURL; ?>/changepassword/forgotPassword/<?= $data['user']['UserId']; ?>" method="POST">
        <div class="bg-form-login border bg-light mx-auto">
            <h1 class="title-heading-login">Ubah kata sandi</h1>
            <div class="form-layout  mt-3 mb-3">
                <label for="oldpassword" class="form-label">Kata Sandi Lama</label>
                <input id="oldpassword" type="password" name="OldPassword" class="form-control">
                <input id="oldpassword" type="hidden" name="OldPassword1" value="<?= $data['user']['OldPassword1']; ?>" class="form-control">
                <input id="oldpassword" type="hidden" name="OldPassword2" value="<?= $data['user']['OldPassword2']; ?>" class="form-control">
            </div>
            <div class="form-layout  mt-3 mb-3">
                <label for="Passwd" class="form-label">Kata Sandi Baru</label>
                <input id="Passwd" type="password" name="Passwd" class="form-control">
            </div>
            <div class="form-layout  mt-3 mb-3">
                <label for="Passwd" class="form-label">Verifikasi Kata Sandi Baru</label>
                <input id="Passwd" type="password" name="Passwd1" class="form-control">
            </div>
            <div class="layout-login-btn mx-auto d-grid gap-2">
                <button type="submit" name="changePassword" class="btn btn-primary" id="sumbit-btn">Submit</button>
            </div>
            <div class="col-sm-12">
                <?php
                Flasher::flash();
                ?>
            </div>
            <div class="mx-auto">
                <p class="credit">Made with &lt;3 by Virtuas Kelompok 5</p>
            </div>
        </div>
    </form>
</div>
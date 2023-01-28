<nav class="navbar  fixed-top  navbar-light navbar1">
    <div class="container-fluid me-5">
        <div class="item">
            <ul class="d-flex">
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div>
        <div class="item mx-5">
            <h4 class="logo">MAGER</h4>
        </div>
    </div>
</nav>

<!-- /.login-logo -->
<div class=" d-flex">
    <div class="image col-6">
        <div class="row justify-content-center">
            <img src="<?= BASEURL; ?>/img/auth/poto_SignUp.png" alt="" style="width: 60%; height: 50%; margin-top:25%; ">
        </div>
    </div>
    <div class="col-6">
        <div class="container">
            <div class=" login-box ">
                <h2 class="text-start mb-3">Changge Password Account</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        Flasher::flash();
                        ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>/auth/updatePassword/<?= $data['user']['UserId']; ?>" method="post">

                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <label for="OldPassword" class="h6">Old Password : </label>
                            <div class="d-flex">
                                <input type="password" name="OldPassword" class="form-control br-0" placeholder="Enter your old password" required>
                                <input type="hidden" class="form-control" placeholder="Old Password" name="OldPassword1" value="<?= $data['user']['OldPassword1']; ?>" required>
                                <input type="hidden" class="form-control" placeholder="Old Password" name="OldPassword2" value="<?= $data['user']['OldPassword2']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="NewPassword" class="h6">New Password : </label>
                            <div class="d-flex">
                                <input type="password" name="Passwd" id="username" class="form-control br-0" placeholder="Enter your new password" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ConfirmPassword" class="h6">Confirm Password : </label>
                            <div class="d-flex">
                                <input type="password" name="ConfirmNewPassword" id="ConfirmPassword" class="form-control br-0" placeholder="Confirm New Password">
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="form-group">
                            <div class="form-group d-flex" style="gap:30px;">
                                <!-- Button trigger modal -->
                                <button type="submit" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success fw-bold " style="width: 100%; height: 40px; font-size: 18px; margin-top: 20px;">Change Password</button>
                                <a type="button" class="btn btn-danger fw-bold " href="<?= BASEURL; ?>/public/home" style="width: 100%; height: 40px; font-size: 18px; margin-top: 20px;">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer col-12 text-center">
    <p class="p-3" style="font-size: 14px  "> @MAGER 2022. All rights reserved</p>
</div>
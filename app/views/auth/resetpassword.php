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
            <img src="<?= BASEURL; ?>/img/auth/poto_reset.png" alt="" style="width: 60%; height: 50%; margin-top:25%; ">
        </div>
    </div>
    <div class="col-6">
        <div class="container">
            <div class=" login-box ">
                <h1 class="text-center">Reset Password</h1>
                <p class="text-center" style="font-size: 18px; margin-bottom: 50px;">
                    Create your new password and confirm
                </p>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        Flasher::flash();
                        ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>/auth/updateResetPassword" method="post">
                    <input type="text" name="UserId" value="<?= $_SESSION['UserId']; ?>" hidden>
                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <label for="Passwd" class="h6"> New Password : </label>
                            <div class="d-flex">
                                <input type="password" name="Passwd" id="Passwd" class="form-control br-0" placeholder="Create your new password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ConfirmnewPasswd" class="h6"> Confirm Password : </label>
                            <div class="d-flex">
                                <input type="password" name="ConfirmNewPasswd" id="ConfirmNewPasswd" class="form-control br-0" placeholder="Confirm your new password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide_confirm();">
                                        <i class="fas fa-eye" id="show_eye_confirm"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group mt-2">
                            <!-- Button trigger modal -->
                            <button type="submit" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success fw-bold " style="width: 100%; height: 40px; font-size: 18px; margin-top: 20px;">Submit</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <!-- <div class="modal fade rounded" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row justify-content-center">
                                <img src="<?= BASEURL; ?>/dist/img/success_verif_email.png" alt="" 
                                style="width: 40%; height: 50%; ">
                              </div>
                              <p class="text-center" style="font-size: 18px; margin-top: 20px;"> 
                                Email address is valid
                              </p>
                            </div>
                          </div>
                        </div>
                    </div> -->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="footer col-12 text-center">
    <p class="p-2" style="font-size: 14px"> @MAGER 2022. All rights reserved</p>
</div>
</body>
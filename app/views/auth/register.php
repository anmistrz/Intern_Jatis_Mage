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
                <h2 class="text-start mb-3">Create Account</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        Flasher::flash();
                        ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>/auth/saveUser" method="post">

                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <label for="username" class="h6">Full Name : </label>
                            <div class="d-flex">
                                <input type="text" name="fullname" class="form-control br-0" placeholder="Enter your full name">

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="h6">Username : </label>
                            <div class="d-flex">
                                <input type="text" name="UserName" id="username" class="form-control br-0" placeholder="Create your username">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="h6">E-mail Address : </label>
                            <div class="d-flex">
                                <input type="text" name="email" id="email" class="form-control br-0" placeholder="Enter your e-mail address">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="h6">Password : </label>
                            <div class="d-flex">
                                <input type="password" name="Passwd" id="password" class="form-control br-0" placeholder="Create your password">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="h6"> Confirm Password : </label>
                            <div class="d-flex">
                                <input type="password" name="ConfirmPasswd" id="confirm_passwd" class="form-control br-0" placeholder="Confirm your password">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide_confirm();">
                                        <i class="fas fa-eye" id="show_eye_confirm"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <input type="checkbox" style="width: 20px; height: 20px; margin-right: 20px;" name="remember" id="remember">
                                <label for="remember" class="form-check-label">I agree with the <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="form-group">
                            <div class="form-group d-flex" style="gap:30px;">
                                <!-- Button trigger modal -->
                                <button type="submit" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success fw-bold " style="width: 100%; height: 40px; font-size: 18px; margin-top: 20px;">Submit</button>
                                <a type="button" class="btn btn-danger fw-bold " href="<?= BASEURL; ?>/auth/" style="width: 100%; height: 40px; font-size: 18px; margin-top: 20px;">Back</a>
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
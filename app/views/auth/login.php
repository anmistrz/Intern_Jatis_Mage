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
      <img src="<?= BASEURL; ?>/img/auth/poto_SignIn.png" alt="" style="width: 60%; height: 50%; margin-top:20%; ">
    </div>
  </div>
  <div class="col-6">
    <div class="container">
      <div class=" login-box ">
        <h1 class="text-center">Welcome!</h1>
        <p class="text-center" style="font-size: 18px;">Please enter your details.</p>
        <div class="row">
          <div class="col-sm-12">
            <?php
            Flasher::flash();
            ?>
          </div>
        </div>
        <form action="<?= BASEURL; ?>/auth/login" method="post">

          <div class="form-group mb-3">
            <div class="form-group mb-3">
              <label for="UserName" class="h6">Username : </label>
              <div class="d-flex">

                <input type="text" name="UserName" class="form-control br-0" aria-describedby="UserName" placeholder="Enter your username" required>
              </div>

            </div>
            <div class="form-group mb-3">
              <label for="password" class="h6">Password : </label>
              <div class="d-flex">
                <input type="password" name="Passwd" id="password" class="form-control br-0" placeholder="Enter your password" required>
                <div class="input-group-append">
                  <span class="input-group-text" onclick="password_show_hide();">
                    <i class="fas fa-eye" id="show_eye"></i>
                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" style="width: 100%">
            <div class="d-flex justify-content-between">
              <div class="form-check">
                <input type="checkbox" style="width: 20px; height: 20px;" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1" style="margin-left: 10px; padding: 4px;">Remember me</label>
              </div>
              <a href="<?= BASEURL; ?>/auth/submitemail" class="text" style="padding: 4px; color: #4CB946;">Forgot Password?</a>
            </div>
            <div class="form-group">
              <div class="form-group mt-3">
                <!-- Button trigger modal -->
                <button type="submit" name="submit" data-toggle="modal" id="staticBackdrop" class="btn btn-success fw-bold " style="width: 100%; height: 40px; font-size: 18px; margin-top: 20px;">Login</button>

              </div>
              <p class="text">Don't have an account? <a href="<?= BASEURL; ?>/auth/register" style="color: #4CB946;">Sign Up</a></p>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<div class="footer col-12 text-center">
  <p class="p-2" style="font-size: 14px"> @MAGER 2022. All rights reserved</p>
</div>
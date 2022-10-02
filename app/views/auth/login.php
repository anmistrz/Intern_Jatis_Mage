<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1>Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="<?= BASEURL; ?>/auth/login" method="post">
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
        <!-- <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        </div> -->
        <div class="layout-login-btn d-grid gap-2 p-3">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <div class="col-sm-12 mt-2">
          <?php
          Flasher::flash();
          ?>
        </div>
      </form>
      <!-- <p class="mb-1">
        <a href="forgot-password.html">Forgot Password ?</a>
      </p> -->
      <p class="mb-1">Belum punya akun?
        <a class="btn btn-link font-weight-bold" href="<?= BASEURL; ?>/auth/register">Register</a>
      </p>
    </div>
  </div>
</div>
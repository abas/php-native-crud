<?php
  require_once 'DB.php';
  require_once 'user.php';

  $user = new User($db);

  if ($user->isLogin()) {
    header("location:index.php");
  }

  if(isset($_POST['kirim'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $success = false;

    if($user->Register($nama,$email,$password)){
      $success = true;
    }else{
      $error = $user->getLastError();
    }
  }
  $title = "Register";
  $bgBody = "https://www.pixelstalk.net/wp-content/uploads/2016/11/Backgrounds-HD-Flat-Design.jpg";
  include 'layout/header.php';
?>

<div class="container">
  <div class="row" style="padding-top:25%">
    <div class="col-md-6 col-md-offset-3">
      <h3 style="color:#FFF;">Register User</h3>
    </div>
  </div>
  <div class="row">
    <div class="page-login">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <form class="" method="post">
                  <?php if(isset($error)): ?>
                    <div class="alert alert-danger">
                      <?php echo $error; ?>
                    </div>
                  <?php endif; ?>
                  <?php if(isset($success)): ?>
                    <div class="alert alert-success">
                      Register successfull!
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <label for="nama">Username</label>
                    <input required class="form-control" type="text" name="nama" placeholder="type u're Username">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input required class="form-control" type="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input required class="form-control" type="password" name="password" placeholder="password">
                  </div>
                  <p class="message">
                  <input type="submit" class="btn btn-warning" name="kirim" value="Register">
                    have an account? <a href="login.php" class="btn btn-info">Login</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <div class="container">
     <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="#" method="post" role="form" style="display: block;">
                  <h2>LOGIN</h2>
                    <div class="form-group">
                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-xs-6 form-group pull-left checkbox">
                      <input id="checkbox1" type="checkbox" name="remember">
                      <label for="checkbox1">Remember Me</label>
                    </div>
                    <div class="col-xs-6 form-group pull-right">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                    </div>
                </form>
                <form id="register-form" action="#" method="post" role="form" style="display: none;">
                  <h2>REGISTER</h2>
                    <div class="form-group">
                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6 tabs">
                <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
              </div>
              <div class="col-xs-6 tabs">
                <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
      <div class="container">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h6 style="font-size:14px;font-weight:100;color: #fff;">Coded with <i class="fa fa-heart red" style="color: #BC0213;"></i> by <a href="http://hashif.com" style="color: #fff;" target="_blank">Hashif</a></h6>
          </div>
      </div>
  </footer> -->
<?php include 'layout/footer.php'; ?>

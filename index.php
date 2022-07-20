<?php  
  session_start();
  if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $Id=$_COOKIE['username'];
    $pass=$_COOKIE['password'];
  }
  else {
    $Id ="";
    $pass="";
  }
;?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Kirei Laundry | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Aplikasi Pengelolaan Laundry
					</span>
				</div>
				
				<?php if (isset($_GET['msg'])) {
					$msg = $_GET['msg'];
					if ($msg == 1) {
				?>
						<div class="alert alert-success" role="alert">Password salah!</div>
					<?php
					} else if ($msg == 2) {
					?>
						<div class="alert alert-success" role="alert">Error database!</div>
				<?php
					}
				}
				?>
				<form class="login100-form validate-form" method="POST" action="ceklogin.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input value="<?php echo $Id ?>"class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100  m-b-18">
						<span class="label-input100">Password</span>
						<input value="<?php echo $pass ?>"  class="input100" type="password" name="password" placeholder="Enter password">
						
						<span class="focus-input100"></span>
					</div>
					<div class="form-row py-3">
  <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?>>
  <label class="form-check-label" for="remember-me">
    Remember Me
  </label>
</div>
					<button class="btn btn-primary" name="btn_login" type="submit">
						Login
					</button>
				</form>
			</div>
		</div>
	</div>

</body>

</html>
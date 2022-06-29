<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Page | Ask Unla</title>

	<!--===============================================================================================-->
	<link href="<?php echo base_url('assets/images/icons/favicon.ico') ?>" rel="icon" type="image/png">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/fontawesome-free-5.15.3-web/css/all.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css') ?>">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets/login/images/new.jpg') ?>" alt="IMG">
				</div>

				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						LOGIN
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid username is required: Dadang, Asep, Kumis dll">
						<input class="input100" type="text" name="username" placeholder="Username / NPM">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" name="login" class="login100-form-btn" value="LOGIN">
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="<?= site_url('auth/respass') ?>">
							<i class="fas fa-key m-l-5" aria-hidden="true"></i>
							Password?
						</a>
					</div>
					<?= $this->session->flashdata('msg') ?>
					<div><?= validation_errors() ?></div>
					<div class="text-center p-t-136">
						<a class="txt2" href="<?= site_url('auth/regist') ?>">
							Create your Account
							<i class="fas fa-user-circle m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/tilt/tilt.jquery.min.js') ?>"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.3
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/js/main.js') ?>"></script>

</body>

</html>

<!--

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Ask Unla</title>
</head>

<body>
    <h1>ASK UNLA</h1>
    <h3>LOGIN PAGE</h3>
    <hr>
    <?= $this->session->flashdata('msg') ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="LOGIN"></td>
            </tr>
        </table>
    </form>
    <hr>
    <p>Don't have Account ? <a href="<?= site_url('auth/regist') ?>">Click Here..!</a></p>
</body>

</html>
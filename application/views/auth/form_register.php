<!doctype html>
<html lang="en">
  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Register Page | Ask Unla</title>
	
	<!--===============================================================================================-->	
	<link href="<?php echo base_url('assets/images/icons/favicon.ico') ?>" rel="icon" type="image/png" >

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

<style>
.login100-pic {
  width: 316px;
  padding-top:130px;
}
</style>

<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets/login/images/new.jpg') ?>" alt="IMG">
				</div>

				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						REGISTER

					</span>
					<div class="wrap-input100 validate-input" data-validate="Valid NPM is required: 41155050000">
						<input class="input100" type="text" name="username" placeholder="NPM / NIP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>
					<?=form_error('username') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid fullname is required: Asep Kadek, Dadang Conelo dll">
						<input class="input100" type="text" name="fullname" placeholder="fullname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-id-card" aria-hidden="true"></i>
						</span>
					</div>
					<?= form_error('fullname') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid type is required: Mahasiswa, Dosen, Tenaga Kependidikan">
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					<select class="input100" type="text" name="type" placeholder="Type">
					<option value="">User Type</option>
						<option value="Dosen">Dosen</option>
						<option value="Mahasiswa">Mahasiswa</option>
						<option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
					</select>
					</div>
					<?= form_error('type') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid type is required: Mahasiswa, Dosen, Tenaga Kependidikan">
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-university" aria-hidden="true"></i>
						</span>
					<select class="input100" type="text" name="fakultas" placeholder="Fakultas">
					<option value="">Fakultas</option>
						<option value="Hukum">Hukum</option>
						<option value="Ekonomi">Ekonomi</option>
						<option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
						<option value="Keguruan dan Ilmu Pendidikan">Keguruan dan Ilmu Pendidikan</option>
						<option value="Teknik">Teknik</option>
						<option value="Pascasarjana">Pascasarjana</option>
					</select>
					</div>
					<?= form_error('fakultas') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid type is required: Mahasiswa, Dosen, Tenaga Kependidikan">
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-building" aria-hidden="true"></i>
						</span>
					<select class="input100" type="text" name="prodi" placeholder="Prodi">
					<option value="">Prodi</option>
						<option value="Ilmu Hukum S1">Ilmu Hukum S1</option>
						<option value="Manajemen S1">Manajemen S1</option>
						<option value="Akuntansi S1">Akuntansi S1</option>
						<option value="Ilmu Pemerintahan S1">Ilmu Pemerintahan S1</option>
						<option value="Ilmu Kesejahteraan S1">Ilmu Kesejahteraan S1</option>
						<option value="Ilmu Komunikasi S1">Ilmu Komunikasi S1</option>
						<option value="Kepolisian D3">Kepolisian D3</option>
						<option value="Pend. Ekonomi/Akuntansi S1">Ilmu Komunikasi S1</option>
						<option value="Pend. Matematika S1">Pend. Matematika S1</option>
						<option value="PGSD S1">PGSD S1</option>
						<option value="Teknik Industri S1">Teknik Industri S1</option>
						<option value="Teknik Sipil S1">Teknik Sipil S1</option>
						<option value="Arsitektur S1">Arsitektur S1</option>
						<option value="Teknik Elektro S1">Teknik Elektro S1</option>
						<option value="Teknik Informatika S1">Teknik Informatika S1</option>
						<option value="Pascasarjana">Pascasarjana</option>
					</select>
					</div>
					<?= form_error('prodi') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<?= form_error('email') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid no. tlp is required: 0888888888">
						<input class="input100" type="text" name="notelp" placeholder="No. Telp">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-tty" aria-hidden="true"></i>
						</span>
					</div>
					<?= form_error('notelp') ?>

					<div class="wrap-input100 validate-input" data-validate="Valid no. tlp is required: 0888888888">
						<input class="input100" type="text" name="whatsapp" placeholder="WhatsApp">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-phone-square-alt " aria-hidden="true"></i>
						</span>
					</div>
					<?= form_error('whatsapp') ?>

					<div class="container-login100-form-btn">
						<input type="submit" name="submit" class="login100-form-btn" value="REGISTER">
						</input>
					</div>
					
					<?= $this->session->flashdata('msg') ?>

					<div class="text-center p-t-136">
						<a class="txt2" href="<?= site_url('auth/login') ?>">
							Back to Login
							<i class="fas fa-arrow-alt-circle-left m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	<script src="<?php echo base_url('https://kit.fontawesome.com/ec9c1ba38b.js') ?>" crossorigin="anonymous"></script>
<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/tilt/tilt.jquery.min.js') ?>"></script>
	<script >
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
    <title>Register Page | Ask Unla</title>
</head>

<body>
    <h1>ASK UNLA</h1>
    <h3>Register Page</h3>
    <hr>
    <?= $this->session->flashdata('msg') ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>NPM</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Fullname</td>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td><input type="text" name="notelp" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="SUBMIT"></td>
            </tr>

        </table>
    </form>
    <hr>
</body>

</html>
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Colorlib Templates">
	<meta name="author" content="Colorlib">
	<meta name="keywords" content="Colorlib Templates">

	<!-- Title Page-->
	<title>ASK UNLA | EDIT PROFILE DEVELOPMENT nnnnnnnn</title>

	<!-- Icons font CSS-->
	<link href="<?php echo base_url('assets/newform/vendor/mdi-font/css/material-design-iconic-font.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/newform/vendor/font-awesome-4.7/css/font-awesome.min.css') ?>" rel="stylesheet" media="all">

	<!-- Font special for pages-->
	<link href="<?php echo base_url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') ?>" rel="stylesheet">

	<!-- Vendor CSS-->
	<link href="<?php echo base_url('assets/newform/vendor/select2/select2.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/newform/vendor/datepicker/daterangepicker.css') ?>" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="<?php echo base_url('assets/newform/css/main.css') ?>" rel="stylesheet" media="all">
</head>
<style>
	.title {
		font-size: 30px;
		text-align: center;
		padding: 10px;
		width: auto;
		font-weight: 900;
	}

	.btn {
		display: inline-block;
		padding: 5px 10px;
		font-size: 15px;
		font-weight: 900;
		letter-spacing: 2px;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		outline: none;
		color: black;
		background-color: white;
		border-radius: 15px;
	}

	.btn:hover {
		background-color: black;
		color: white;
	}

	.btn:active {
		background-color: white;
		color: black;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}

	.listbox1 {
		padding: 10px;
		font-size: 15px;
		border-radius: 5px;
		border-height: 5px;
	}
</style>

<body>
	<?php
	$name = '';
	$type = '';
	$jobdesk = '';
	$prodi = '';
	$fakultas = '';
	$telp1 = '';
	$telp2 = '';
	$fax = '';
	$email = '';
	$wa = '';
	$sosmed = '';

	if (isset($contact)) {
		$name = $contact->cont_nama;
		$type = $contact->cont_type;
		$jobdesk = $contact->cont_jobdesk;
		$prodi = $contact->cont_prodi;
		$fakultas = $contact->cont_fakultas;
		$telp1 = $contact->cont_telp1;
		$telp2 = $contact->cont_telp2;
		$fax = $contact->cont_fax;
		$email = $contact->cont_email;
		$wa = $contact->cont_wa;
		$sosmed = $contact->cont_sosmed;
	}

	?>
	<div class="page-wrapper2">
		<div class="wrapper wrapper--w680">
			<div class="card card-4" style="opacity:0.9">
				<div class="card-body">
					<h1 class="title">CONTACT FORM</h1>
					<form action="" method="POST">
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">Name</label>
									<input class="input--style-4" type="text" name="cont_nama" value="<?= set_value('cont_nama', $name) ?>" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Jobdesk</label>
									<select name="cont_jobdesk" class="listbox1">
										<div class="dropdown-content">
											<option value="<?= set_value('cont_jobdesk', $jobdesk) ?>">Tenaga Kependidikan</option>
											<option value="<?= set_value('cont_jobdesk', $jobdesk) ?>">Dosen</option>
										</div>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="input-group">
								<label class="label">Contact Type</label>
								<div class="p-t-10">
									<label class="radio-container m-r-45">General
										<input type="radio" name="cont_type" value="General" <?= set_radio('cont_type', 'General', $type == 'General' ? TRUE : FALSE) ?> required>
										<span class="checkmark"></span>
									</label>
									<label class="radio-container">Private
										<input type="radio" name="cont_type" value="Private" <?= set_radio('cont_type', 'Private', $type == 'Private' ? TRUE : FALSE) ?> required>
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>

						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">Prodi</label>
									<input class="input--style-4" type="text" name="cont_prodi" value="<?= set_value('cont_prodi', $prodi) ?>" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Fakultas</label>
									<input class="input--style-4" type="text" name="cont_fakultas" value="<?= set_value('cont_fakultas', $fakultas) ?>" required>
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">Telp 1</label>
									<input class="input--style-4" type="number" name="cont_telp1" value="<?= set_value('cont_telp1', $telp1) ?>" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Telp 2</label>
									<input class="input--style-4" type="number" name="cont_telp2" value="<?= set_value('cont_telp2', $telp2) ?>">
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">Fax</label>
									<input class="input--style-4" type="text" name="cont_fax" value="<?= set_value('cont_fax', $fax) ?>">
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Email</label>
									<input class="input--style-4" type="text" name="cont_email" value="<?= set_value('cont_email', $email) ?>" required>
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<label class="label">WhatsApp</label>
									<input class="input--style-4" type="text" name="cont_wa" value="<?= set_value('cont_wa', $wa) ?>" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<label class="label">Sosmed</label>
									<input class="input--style-4" type="text" name="cont_sosmed" value="<?= set_value('cont_sosmed', $sosmed) ?>">
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<input type="submit" value="SAVE" name="submit" class="btn">
							</div>
							<div class="col-2">
								<a href="<?= site_url('contacts') ?>"><input type="button" value="CANCEL" class="btn"></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Jquery JS-->
	<script src="<?php echo base_url('assets/newform/vendor/jquery/jquery.min.js') ?>"></script>
	<!-- Vendor JS-->

	<!-- Main JS-->
	<script src="<?php echo base_url('assets/newform/js/global.js') ?>"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<!--<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ASK UNLA</title>
</head>

<body>
	<h1>ASK UNLA</h1>
	<h3>ADD CONTACT</h3>
	<hr>
	<?php
	$name = '';
	$type = '';
	$jobdesk = '';
	$prodi = '';
	$fakultas = '';
	$telp1 = '';
	$telp2 = '';
	$fax = '';
	$email = '';
	$wa = '';
	$sosmed = '';

	if (isset($contact)) {
		$name = $contact->cont_nama;
		$type = $contact->cont_type;
		$jobdesk = $contact->cont_jobdesk;
		$prodi = $contact->cont_prodi;
		$fakultas = $contact->cont_fakultas;
		$telp1 = $contact->cont_telp1;
		$telp2 = $contact->cont_telp2;
		$fax = $contact->cont_fax;
		$email = $contact->cont_email;
		$wa = $contact->cont_wa;
		$sosmed = $contact->cont_sosmed;
	}

	?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="cont_nama" value="<?= set_value('cont_nama', $name) ?>" required></td>
			</tr>
			<tr>
				<td>Contact Type</td>
				<td>
					<input type="radio" name="cont_type" value="General" <?= set_radio('cont_type', 'General', $type == 'General' ? TRUE : FALSE) ?> required>General
					<input type="radio" name="cont_type" value="Private" <?= set_radio('cont_type', 'Private', $type == 'Private' ? TRUE : FALSE) ?> required>Private
				</td>
			</tr>
			<tr>
				<td>Jobdesk</td>
				<td><input type="text" name="cont_jobdesk" value="<?= set_value('cont_jobdesk', $jobdesk) ?>" required></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td><input type="text" name="cont_prodi" value="<?= set_value('cont_prodi', $prodi) ?>" required></td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td><input type="text" name="cont_fakultas" value="<?= set_value('cont_fakultas', $fakultas) ?>" required></td>
			</tr>
			<tr>
				<td>Telp1</td>
				<td><input type="number" name="cont_telp1" value="<?= set_value('cont_telp1', $telp1) ?>" required></td>
			</tr>
			<tr>
				<td>Telp2</td>
				<td><input type="number" name="cont_telp2" value="<?= set_value('cont_telp2', $telp2) ?>"></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><input type="text" name="cont_fax" value="<?= set_value('cont_fax', $fax) ?>"></td>
			</tr>
			<tr>
				<td>E-Mail</td>
				<td><input type="text" name="cont_email" value="<?= set_value('cont_email', $email) ?>" required></td>
			</tr>
			<tr>
				<td>WA</td>
				<td><input type="text" name="cont_wa" value="<?= set_value('cont_wa', $wa) ?>"></td>
			</tr>
			<tr>
				<td>Sosmed</td>
				<td><input type="text" name="cont_sosmed" value="<?= set_value('cont_sosmed', $sosmed) ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="SAVE" name="submit">
					<a href="<?= site_url('contacts') ?>"><input type="button" value="CANCEL"></a>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>

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
    <title>ASK UNLA | EDIT PROFILE</title>

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
	font-size:30px;
    text-align: center;
    padding: 10px;
	width:auto;
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
  background-color:white;
  border-radius: 15px;
}

.btn:hover {
	background-color: black;
	color: white;
}

.btn:active {
  background-color:white;
  color: black;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<body>
	<?php
	$id = $this->session->userdata('userid');
	$noid = $this->session->userdata('identity');
	$name = $this->session->userdata('fullname');
	?>
    <div class="page-wrapper2">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="opacity:0.9">
                <div class="card-body">
                    <h1 class="title">USER FORM</h1>
                    <form action="" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User ID</label>
                                    <input class="input--style-4" type="text" name="userid" id="" value="<?= $id; ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Your ID</label>
                                    <input class="input--style-4" type="text" name="" id="" value="<?= $noid ?>">
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Your Name</label>
                                    <input class="input--style-4" type="text" name="" id="" value="<?= $name ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Contact ID</label>
                                    <input class="input--style-4" type="text" name="cont_id" id="" value="<?= $contacts->cont_id; ?>">
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Contact Name</label>
                                    <input class="input--style-4" type="text" name="" id="" value="<?= $contacts->fullname; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Contact As</label>
                                    <input class="input--style-4" type="text" name="" id="" value="<?= $contacts->type; ?>" disabled>
                                </div>
                            </div>
                        </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Specific Contact</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Phone/Telp.
                                            <input type="radio" name="contact" value="Phone/Telp." id="" required>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">WhatsApp
                                            <input type="radio"name="contact" value="WhatsApp" id="" required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
									<div class="p-t-10">
                                        <label class="radio-container m-r-45">Social Media
                                            <input type="radio" name="contact" value="Social Media" id="" required>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">All Contact
                                            <input type="radio"name="contact" value="All Contact" id="" required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Requirements</label>
                                    <textarea class="area"  name="reason" id="" cols="54" rows="4"></textarea><small><i>*The reason for asking</i> </small>
									
                               </div>
                            </div>
						<div class="row row-space">
                            <div class="col-2">
								<input type="submit" value="REQUEST" name="submit" class="btn">
							</div>
							<div class="col-2">
								<a href="<?=site_url('requests/cont_privt')?>"><input type="button" value="CANCEL" class="btn"></a>
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

<!--
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ASK UNLA</title>
</head>

<body>
	<h1>ASK UNLA</h1>
	<h3>Request Contact</h3>
	<hr>
	<?php
	$id = $this->session->userdata('userid');
	$noid = $this->session->userdata('identity');
	$name = $this->session->userdata('fullname');
	?>
	<form action="" method="post">
		<table>
			<tr>
				<td>User ID </td>
				<td>: <input type="text" name="userid" id="" value="<?= $id; ?>"> </td>
			</tr>
			<tr>
				<td>Your ID </td>
				<td>: <input type="text" name="" id="" value="<?= $noid ?>"> </td>
			</tr>
			<tr>
				<td>Your Name </td>
				<td>: <input type="text" name="" id="" value="<?= $name ?>"> </td>
			</tr>
			<tr>
				<td>Contact ID</td>
				<td>
					: <input type="text" name="cont_id" id="" value="<?= $contacts->cont_id; ?>">
				</td>
			</tr>
			<tr>
				<td>Contact Name</td>
				<td>
					: <input type="text" name="" id="" value="<?= $contacts->cont_nama; ?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Contact as</td>
				<td>
					: <input type="text" name="" id="" value="<?= $contacts->cont_jobdesk; ?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Specific Contact</td>
				<td>
					: <input type="radio" name="contact" value="Phone/Telp." id="" required>Phone/Telp.
					<input type="radio" name="contact" value="WhatsApp" id="" required>WhatsApp
					<input type="radio" name="contact" value="Social Media" id="" required>Social Media
					<input type="radio" name="contact" value="All Contact" id="" required>All Contact
				</td>
			</tr>
			<tr>
				<td>Requirements</td>
				<td>
					<textarea name="reason" id="" cols="30" rows="10" required></textarea> <small><i>*The reason for asking</i> </small>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="REQUEST" name="submit">
					<a href="<?= site_url('requests/cont_privt') ?>"><input type="button" value="CANCEL"></a>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>
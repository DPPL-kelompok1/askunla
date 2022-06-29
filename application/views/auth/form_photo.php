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

    <div class="page-wrapper" style="padding-top:50px;">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="opacity:0.9" >
                <div class="card-body" >
                    <h1 class="title">CHANGE PHOTO</h1>
                    <form action="" method="post" enctype="multipart/form-data">
					<div style="background-color:black; letter-spacing: 3px; color:white; opacity:0.8; text-align:center; padding:5px; border-radius:5px; width:auto; margin: auto"><?= $this->session->flashdata('msg') ?><?= $error ?></div><br>
					<div class="row row-space">
						<div class="col-1">
                                <div class="input-group">
                                    <label class="label">CURRENT PHOTO</label>
                                    <img src="<?= base_url('uploads/users/' . $this->session->userdata('photo')) ?>" width="150" height="150" style="border-radius:0px 20px 0px 20px ;">
                               </div>
                            </div>
						
						<div class="col-3">
                                <div class="input-group">
                                    <label class="label">NEW PHOTO</label>
                                    <input class="input--style-4" type="file" name="photo" required>
                               </div>
                            </div>
						</div>
						<div class="row row-space">
                            <div class="col-2">
								<input type="submit" name="upload" value="UPLOAD PHOTO" class="btn">
							</div>
							<div class="col-2">
								<a href="<?=base_url()?>"><input type="button" value="BACK" class="btn"></a>
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
    <script src="<?php echo base_url('assets/newform/vendor/select2/select2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/newform/vendor/datepicker/moment.min.js') ?>"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('assets/newform/js/global.js') ?>"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Photo</title>
</head>

<body>
    <h1>ASK UNLA</h1>
    <h3>CHANGE PHOTO</h3>
    <hr>
    <?= $this->session->flashdata('msg') ?>
    <div style="color: red;"><?= $error ?></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>CURRENT PHOTO</td>
                <td><img src="<?= base_url('uploads/users/' . $this->session->userdata('photo')) ?>" width="128" height="128"></td>
            </tr>
            <tr>
                <td>NEW PHOTO</td>
                <td><input type="file" name="photo" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="upload" value="UPLOAD PHOTO"></td>
            </tr>
        </table>
    </form>
    <hr>
    <a href="<?= base_url() ?>">
        <h4>Back to Home</h4>
    </a>
</body>

</html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
    <div class="page-wrapper2">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="opacity:0.9">
                <div class="card-body">
                    <h1 class="title">SEND MAIL</h1>
                    <form action="" method="POST">
						<div class="col-6">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" name="address" id="" value="<?= $cont->cont_email ?>" required>
                               </div>
                        </div>
						<div class="col-6">
                                <div class="input-group">
                                    <label class="label">Subject</label>
                                    <input class="input--style-4" type="text"  name="subject" id="" value="Admin | Askunla.com">
                               </div>
                        </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Message</label>
                                    <textarea class="area"  name="message" id="" cols="54" rows="4"><?= $usr->fullname; ?> and NPM <?= $usr->no_identitas; ?> Ask for your contact!. The reason is "<?= $req->reason ?>".</textarea>
									
                               </div>
                            </div>						
						<div class="row row-space">
                            <div class="col-2">
								<input type="submit" value="SEND" name="submit" class="btn">
							</div>
							<div class="col-2">
								<a href="<?=site_url('requests')?>"><input type="button" value="CANCEL" class="btn"></a>
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
  <h3>SEND MAIL</h3>
  <hr>
  <form action="" method="post">
    <table>
      <tr>
        <td>To </td>
        <td>: <input type="text" name="address" id="" value="<?= $cont->cont_email ?>"> </td>
      </tr>
      <tr>
        <td>Subject </td>
        <td>: <input type="text" name="subject" id="" value="Admin | Askunla.com"> </td>
      </tr>
      <tr>
        <td>Message </td>
        <td>
          : <textarea name="message" id="" cols="30" rows="10">
        <?= $usr->fullname; ?> and NPM <?= $usr->no_identitas; ?> Ask for your contact!. The reason is "<?= $req->reason ?>".
          </textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" value="SEND" name="submit">
          <a href="<?= site_url('requests') ?>"><input type="button" value="CANCEL"></a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
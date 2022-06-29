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
	<link href="<?php echo base_url('assets/login/fonts/fontawesome-free-5.15.3-web/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	
    <!-- Font special for pages-->
    <link href="<?php echo base_url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') ?>" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url('assets/newform/vendor/select2/select2.min.css') ?>" rel="stylesheet" media="all">

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
.input--style-4 {
	letter-spacing: 5px;
}

#toggle{
    position: absolute;
    top: 65%;
    right: 20px;
    transform: translateY(-50%);
    width: 25px;
    height: 25px;
    background-size: cover;
    cursor: pointer;
}
#toggle.hide{
    background-size: cover;
}

.fa-eye-slash, .fa-eye {
	font-size:20px;
	padding-top:3px;
}


</style>
<body>

    <div class="page-wrapper" style="padding-top:80px;">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="opacity:0.9" >
                <div class="card-body" >
                    <h1 class="title">CHANGE PASSWORD</h1>
                    <form action="" method="post">
                        <?= $this->session->flashdata('msg') ?>
						<div class="col-6">
                                <div class="input-group">
                                    <label class="label">Old Password</label>
                                    <input class="input--style-4" type="password" name="oldpassword" id="oldpassword" required>
									<i id="toggle" onclick="show('oldpassword')" class="fas fa-eye-slash" id="display"></i>
                               </div>
                            </div>
							
						<div class="col-6">
                                <div class="input-group">
                                    <label class="label">New Password</label>
                                    <input class="input--style-4" type="password" name="newpassword" id="newpassword" required>
									<i id="toggle" onclick="show('newpassword')" class="fas fa-eye-slash" id="display"></i>
                               </div>
                            </div>
							
						<div class="row row-space">
                            <div class="col-2">
								<input type="submit" name="change" value="CHANGE PASSWORD" class="btn">
							</div>
							<div class="col-2">
								<a href="<?=base_url()?>"><input type="button" value="CANCEL" class="btn"></a>
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

    <!-- Main JS-->
    <script src="<?php echo base_url('assets/newform/js/global.js') ?>"></script>
	
	<script type="text/javascript">
        function show(a) {
		  var x=document.getElementById(a);
		  var c=x.nextElementSibling
		  if (x.getAttribute('type') == "password") {
		  c.removeAttribute("class");
		  c.setAttribute("class","fas fa-eye");
		  x.removeAttribute("type");
			x.setAttribute("type","text");
		  } else {
		  x.removeAttribute("type");
			x.setAttribute('type','password');
		 c.removeAttribute("class");
		  c.setAttribute("class","fas fa-eye-slash");
		  }
		}
        </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <h1>ASK UNLA</h1>
    <h3>CHANGE PASSWORD</h3>
    <hr>
    <?= $this->session->flashdata('msg') ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Old Password</td>
                <td><input type="password" name="oldpassword" required></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="newpassword" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="change" value="CHANGE PASSWORD"></td>
            </tr>
        </table>
    </form>
    <hr>
    <a href="<?= base_url() ?>"><h4>Back to Home</h4></a>
</body>

</html>
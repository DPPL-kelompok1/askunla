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
    $username = '';
    $fullname = '';
    $no_identitas = '';
    $alamat = '';
    $jenis_kelamin = '';
    $tmpt_tgl_lahir = '';
    $no_telp = '';
    $email = '';

    if (isset($user)) {
        $username       = $user->username;
        $fullname       = $user->fullname;
        $no_identitas   = $user->no_identitas;
        $alamat         = $user->alamat;
        $jenis_kelamin  = $user->jenis_kelamin;
        $tmpt_tgl_lahir = $user->tmpt_tgl_lahir;
        $no_telp        = $user->no_telp;
        $email          = $user->email;
    }
    ?>
    <div class="page-wrapper">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="opacity:0.9">
                <div class="card-body">
                    <h1 class="title">EDIT PROFILE</h1>
                    <form action="" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4" type="text" name="username" value="<?= set_value('username', $username) ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Fullname</label>
                                    <input class="input--style-4" type="text" name="fullname" value="<?= set_value('fullname', $fullname) ?>" required">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No. Identitas / NPM</label>
                                    <input class="input--style-4" type="text"  name="no_identitas" value="<?= set_value('no_identitas', $no_identitas) ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"  <?= set_radio('jenis_kelamin', 'Laki-laki', $jenis_kelamin == 'Laki-laki' ? TRUE : FALSE) ?> required>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" <?= set_radio('jenis_kelamin', 'Perempuan', $jenis_kelamin == 'Perempuan' ? TRUE : FALSE) ?> required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tempat, Tanggal Lahir</label>
                                    <input class="input--style-4" type="text" name="tmpt_tgl_lahir" value="<?= set_value('tmpt_tgl_lahir', $tmpt_tgl_lahir) ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="no_telp" value="<?= set_value('no_telp', $no_telp) ?>" required>
                                </div>
                            </div>
                        </div>

                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Alamat</label>
                                    <textarea class="area"  name="alamat" cols="54" rows="4"><?= set_value('alamat', $alamat) ?></textarea>
                               </div>
                            </div>
                        
						<div class="col-6">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?= set_value('email', $email) ?>" required>
                               </div>
                            </div>
						
<!--						
                        <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
		-->
						<div class="row row-space">
                            <div class="col-2">
								<input type="submit" value="SAVE" name="submit" class="btn">
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
    <script src="<?php echo base_url('assets/newform/vendor/datepicker/moment.min.js') ?>"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('assets/newform/js/global.js') ?>"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ASK UNLA</h1>
    <h3>USER FORM</h3>
    <?php
    $username = '';
    $fullname = '';
    $no_identitas = '';
    $alamat = '';
    $jenis_kelamin = '';
    $tmpt_tgl_lahir = '';
    $no_telp = '';
    $email = '';

    if (isset($user)) {
        $username       = $user->username;
        $fullname       = $user->fullname;
        $no_identitas   = $user->no_identitas;
        $alamat         = $user->alamat;
        $jenis_kelamin  = $user->jenis_kelamin;
        $tmpt_tgl_lahir = $user->tmpt_tgl_lahir;
        $no_telp        = $user->no_telp;
        $email          = $user->email;
    }
    ?>
    <hr>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= set_value('username', $username) ?>" required></td>
            </tr>
            <tr>
                <td>Fullname</td>
                <td><input type="text" name="fullname" value="<?= set_value('fullname', $fullname) ?>" required></td>
            </tr>
            <tr>
                <td>No. Identitas</td>
                <td><input type="text" name="no_identitas" value="<?= set_value('no_identitas', $no_identitas) ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="" cols="30" rows="10"><?= set_value('alamat', $alamat) ?></textarea></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= set_radio('jenis_kelamin', 'Laki-laki', $jenis_kelamin == 'Laki-laki' ? TRUE : FALSE) ?> required>Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?= set_radio('jenis_kelamin', 'Perempuan', $jenis_kelamin == 'Perempuan' ? TRUE : FALSE) ?> required>Perempuan
                </td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td><input type="text" name="tmpt_tgl_lahir" value="<?= set_value('tmpt_tgl_lahir', $tmpt_tgl_lahir) ?>" required></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td><input type="text" name="no_telp" value="<?= set_value('no_telp', $no_telp) ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?= set_value('email', $email) ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="SAVE" name="submit">
                    <a href="<?= base_url() ?>"><input type="button" value="CANCEL"></a>
                </td>
            </tr>
        </table>
    </form>
    <hr>
    <a href="<?= base_url() ?>">
        <h4>Back to HOME</h4>
    </a>
</body>

</html>
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
</style>

<body>
  <div class="page-wrapper2">
    <div class="wrapper wrapper--w680">
      <div class="card card-4" style="opacity:0.9">
        <div class="card-body">
          <h1 class="title">PREVIEW REQUEST</h1>
          <form action="" method="POST">
            <div class="col-6">
              <div class="input-group">
                <label class="label">Request Contact</label>
                <input class="input--style-4" type="text" name="contact" id="" value="ID Contact <?= $cont->cont_id ?> / Contact Name <?= $cont->fullname; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="input-group">
                <label class="label">Specific Contact</label>
                <input class="input--style-4" type="text" name="specific" id="" value="<?= $req->specify ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="input-group">
                <label class="label">Message</label>
                <textarea class="area" name="message" id="" cols="50" rows="5">
<?php if ($req->specify == 'All Contact') { ?>
Accepted [<?php date_default_timezone_set('Asia/Jakarta');
          echo date("Y-m-d h:i:sa"); ?>] by [<?= $this->session->userdata('username'); ?>]
Telp. : <?= $cont->no_telp; ?>

Email : <?= $cont->email; ?>

Whatsapp : <?= $cont->whatsapp; ?>

<?php } else if ($req->specify == 'Phone/Telp.') { ?>
Accepted [<?php date_default_timezone_set('Asia/Jakarta');
          echo date("Y-m-d h:i:sa"); ?>]

Telp. : <?= $cont->no_telp; ?>

<?php } else if ($req->specify == 'WhatsApp') { ?>
Accepted [<?php date_default_timezone_set('Asia/Jakarta');
          echo date("Y-m-d h:i:sa"); ?>]

Whatsapp : <?= $cont->whatsapp ?>

<?php } ?>
									  </textarea>
              </div>
            </div>
            <div class="row row-space">
              <div class="col-2">
                <input type="submit" value="SEND" name="submit" class="btn">
              </div>
              <div class="col-2">
                <a href="<?= site_url('requests') ?>"><input type="button" value="CANCEL" class="btn"></a>
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
  <h3>PREVIEW REQUEST</h3>
  <hr>
  <form action="" method="post">
    <table>
      <tr>
        <td>Request Contact</td>
        <td>: <input type="text" name="contact" id="" value="ID Contact <?= $cont->cont_id ?> / Contact Name <?= $cont->cont_nama ?>"> </td>
      </tr>
      <tr>
        <td>Specific Contact </td>
        <td>: <input type="text" name="specific" id="" value="<?= $req->specify ?>"> </td>
      </tr>
      <tr>
        <td>Result</td>
        <td>
          : <textarea name="message" id="" cols="30" rows="10">
          <?php if ($req->specify == 'All Contact') { ?>
          Accepted[<?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo date("Y-m-d h:i:sa"); ?>]
          Telp. : <?= $cont->cont_telp1 ?> / <?= $cont->cont_telp2 ?>
          Fax. : <?= $cont->cont_fax ?>
          Email : <?= $cont->cont_email ?>
          Whatsapp : <?= $cont->cont_wa ?>
          Social Media : <?= $cont->cont_sosmed ?>
          <?php } else if ($req->specify == 'Phone/Telp.') { ?>
          Accepted[<?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo date("Y-m-d h:i:sa"); ?>]
          Telp. : <?= $cont->cont_telp1 ?> / <?= $cont->cont_telp2 ?>
          <?php } else if ($req->specify == 'WhatsApp') { ?>
          Accepted[<?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo date("Y-m-d h:i:sa"); ?>]
          Whatsapp : <?= $cont->cont_wa ?>
          <?php } else if ($req->specify == 'Social Media') { ?>
          Accepted[<?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo date("Y-m-d h:i:sa"); ?>]
          Social Media : <?= $cont->cont_sosmed ?>
          <?php } ?>
          </textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" value="ACCEPT" name="submit">
          <a href="<?= site_url('requests') ?>"><input type="button" value="CANCEL"></a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
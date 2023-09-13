<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Meetvi</title>

  <link href="<?= base_url('assets/'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form class="user" method="post" action="<?php echo base_url(); ?>index.php/Auth/register">
          <h1>Create Account</h1>
          <div class="form_group">
            <select name="input_peran" class="form-control" required="">
              <option value="1">Pimpinan</option>
              <option value="2">Peserta</option>
              <option value="3">Staf</option>
            </select>
            <br>
          </div>
          <div class="form_group">
            <input type="text" class="form-control" placeholder="NIK/NIP" required="" value="<?php set_value('input_nik') ?>"/>
          </div><br>
          <div class="form_group">
            <input type="text" class="form-control" placeholder="Nama" required="" value="<?php set_value('input_nama') ?>"/>
          </div><br>
          <div class="form_group">
            <input type="password" class="form-control" placeholder="Password" required="" value="<?php set_value('input_password') ?>" />
          </div><br>
          <div class="form_group">
            <button type="submit" class="btn btn-default submit">Submit</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
              <a href="<?php echo base_url() ?>index.php/Auth" class="to_register"> Log in </a>
            </p>
            <div class="clearfix"></div>
            <br />
          </div>
        </form>
      </section>
    </div>
  </body>
  </html>

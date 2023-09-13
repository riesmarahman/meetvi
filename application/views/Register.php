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

       <div class="x_content">
        <?php echo $this->session->flashdata('msg'); ?>

        <form class="user" method="post" action="<?php echo base_url(); ?>index.php/Auth/registernip">
          <h1>Register </h1>
          <div>
            <input type="text" class="form-control" placeholder="NIP" id="input_NIP" name="input_NIP" required />
          </div>
          <div >
            <button class="btn btn-primary submit" type="submit">Simpan</button>
          </div>

          <div class="clearfix"></div>

          <p class="change_link">Already a member ?
            <a href="<?php echo base_url(); ?>index.php/Auth" class="to_register"> Log in </a>
          </p>
      </form>
    </div>
  </section>
</div>
</body>
</html>
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

        <form class="user" method="post" action="<?php echo base_url(); ?>index.php/Auth/login">
          <h1>Login Form</h1>
          <div>
            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required />
          </div>
          <div>
            <button class="btn btn-default submit" type="submit">Log in</button>
          </div>

          <div class="clearfix"></div>
        </fieldset>
      </form>
    </div>
  </section>
</div>
</body>
</html>
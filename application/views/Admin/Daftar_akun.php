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
  <link href="<?= base_url('assets/'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><h1><span>Meetvi</span></h1></a>
          </div>

          <div class="clearfix"></div>

          <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>index.php/Auth/load_home"><i class="fa fa-home"></i> Dashboard<span></span></a>
                  </li>
                  <li><a href="<?php echo base_url() ?>index.php/Dosen_Kontrol/daftar_dosen"><i class="fa fa-list"></i> Daftar Dosen<span></span></a>
                  </li>
                  <li><a href="<?php echo base_url() ?>index.php/Auth/daftar_akun"><i class="fa fa-list"></i> Daftar Akun<span></span></a>
                  </li>
                </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span><?= $this->session->userdata['info']['nama']; ?></span>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#"> Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daftar Akun</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Peran</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($akun->result() as $row): ?>
                            <tr>
                              <td><?php echo $no++;?></td>
                              <td><?php echo $row->username; ?></td>
                              <td><?php echo $row->password; ?></td>
                              <td><?php echo $row->peran; ?></td>
                           </tr><?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('assets/'); ?>/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('assets/'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/'); ?>/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?= base_url('assets/'); ?>/vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?= base_url('assets/'); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url('assets/'); ?>/vendors/iCheck/icheck.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?= base_url('assets/'); ?>/vendors/moment/min/moment.min.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="<?= base_url('assets/'); ?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendors/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="<?= base_url('assets/'); ?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="<?= base_url('assets/'); ?>/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url('assets/'); ?>/vendors/select2/dist/js/select2.full.min.js"></script>
  <!-- Parsley -->
  <script src="<?= base_url('assets/'); ?>/vendors/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="<?= base_url('assets/'); ?>/vendors/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="<?= base_url('assets/'); ?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="<?= base_url('assets/'); ?>/vendors/starrr/dist/starrr.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?= base_url('assets/'); ?>/build/js/custom.min.js"></script>
  
</body>
</html>

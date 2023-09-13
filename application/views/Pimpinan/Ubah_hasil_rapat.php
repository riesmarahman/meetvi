<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Meetvi</title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('assets/'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="<?= base_url('assets/'); ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <!-- Custom Theme Style -->
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
                <li><a><i class="fa fa-edit"></i> Rapat <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url() ?>index.php/Rapat_Kontrol"><i class="fa fa-list"></i> Daftar</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/Rapat_Kontrol/Jurusan"><i class="fa fa-plus"></i> Tambah</a></li>  
                  </ul> 
                </li>
                <li><a href="<?php echo base_url() ?>index.php/Dosen_kontrol"><i class="fa fa-home"></i> Dosen<span></span></a>
                </li>              </div>
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
                <h3>Ubah Hasil Rapat</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <br />

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"method="post" action="<?php echo base_url() ?>index.php/Rapat_Kontrol/ubah_hasil_rapat">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> ID Rapat :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="keterangan" name="input_id_hasil" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id ?>" disabled>
                        </div>
                      </div>

                      <input type="hidden" name="input_id_undangan" value="<?php echo $rapat_undangan_id; ?>" required>
                      <input type="hidden" name="input_dosen" value="<?php echo $dosen_id; ?>" required>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Notula :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <!--  <input type="text" id="keterangan" name="input_notul" required="required" class="form-control col-md-7 col-xs-12" > -->
                         <textarea id="notula" required="required" class="form-control" name="input_notula"  value="<?php echo $notula; ?>"><?php echo $notula; ?></textarea>
                       </div>
                     </div>

                     <div class="ln_solid"></div>
                     <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?php echo base_url() ?>index.php/Peserta_Kontrol/Lihat_undangan" type="reset" class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <br />
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
  <!-- NProgress -->
  <script src="<?= base_url('assets/'); ?>/vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?= base_url('assets/'); ?>/vendors/moment/min/moment.min.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?= base_url('assets/'); ?>/build/js/custom.min.js"></script>


  <!-- Initialize datetimepicker -->
  <script>
    $(document).ready(function () {
      $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
      });

      $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
            //call function get data edit
            get_data_edit();

            $('.jurusan').change(function(){ 
              var id=$(this).val();
              var id_program_studi = "<?php echo $id_program_studi;?>";
              $.ajax({
                url : "<?php echo site_url('Rapat_Kontrol/get_prodi');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){

                  $('select[name="prodi"]').empty();

                  $.each(data, function(key, value) {
                    if(id_program_studi==value.id_program_studi){
                      $('select[name="prodi"]').append('<option value="'+ value.id_program_studi +'" selected>'+ value.nama_prodi +'</option>').trigger('change');
                    }else{
                      $('select[name="prodi"]').append('<option value="'+ value.id_program_studi +'">'+ value.nama_prodi +'</option>');
                    }
                  });

                }
              });
              return false;
            }); 

            //load data for edit
            function get_data_edit(){
              var id_rapat = $('[name="id_rapat"]').val();
              $.ajax({
                url : "<?php echo site_url('Rapat_Kontrol/get_data_edit');?>",
                method : "POST",
                data :{id_rapat :id_rapat},
                async : true,
                dataType : 'json',
                success : function(data){
                  $.each(data, function(i, item){
                    $('[name="pimpinan"]').val(data[i].pimpinan);
                    $('[name="input_jurusan"]').val(data[i].id_jur).trigger('change');
                    $('[name="prodi"]').val(data[i].id_prodi).trigger('change');
                    $('[name="input_topik"]').val(data[i].topik);
                    $('[name="input_waktu"]').val(data[i].waktu);
                  });
                }
              });
            }

          });
        </script>
      </body>
      </html>

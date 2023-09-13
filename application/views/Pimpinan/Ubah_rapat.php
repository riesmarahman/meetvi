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
                <li><a href="<?php echo base_url() ?>index.php/pimpinan_kontrol/lihat_hasil_rapat"><i class="fa fa-list"></i> Hasil Rapat<span></span></a>
                </li>
                <li><a href="<?php echo base_url() ?>index.php/pimpinan_kontrol/lihat_jadwal_dosen"><i class="fa fa-list"></i> Jadwal Dosen<span></span></a>
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
                <h3>Ubah Rapat</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('Rapat_Kontrol/ubah_Rapat');?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Pemimpin Rapat :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="" name="pimpinan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata['info']['nama']; ?>" disabled="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Jurusan :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="jurusan" id="jurusan" required>
                            <option value="1">Teknik Informatika</option>
                            <option value="2">Sistem Informasi</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Program Studi :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="prodi" name="input_prodi" class="form-control" required="">
                            <option value="1">S1 Teknik Informatika</option>
                            <option value="2">S1 Teknik Komputer</option>
                            <option value="3">S1 Sistem Informasi</option>
                            <option value="4">S1 Teknologi Informasi</option>
                            <option value="5">S1 Pendidikan Teknologi Informasi</option>
                            <option value="6">S2 Magister Ilmu Komputer</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Topik Bahasan :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="input_topik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $topik; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Tanggal :<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" id="tanggal" name="input_tanggal" value="<?php echo $tanggal;?>"/>
                            <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                         </div>
                       </div>
                     </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Waktu :<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepicker3'>
                          <input type='text' class="form-control" name="input_waktu" value="<?php echo $waktu; ?>"/>
                          <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                       </div>
                       <small>format 12H</small>
                     </div>
                   </div>
                   <input type="hidden" name="id_rapat" value="<?php echo $id; ?>" required>

                   <div class="ln_solid"></div>
                   <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                     <?php 
                     $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
                     ?>
                     <a href="<?=$url;?>" class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
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
    $('#jurusan').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo site_url('Rapat_Kontrol/get_prodi');?>",
        method : "POST",
        data : {id: id},
        asyn : true,
        dataType : 'json',
        success: function(data){

          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html += '<option value=' +data[i].id_program_studi+'>'+data[i].nama_prodi+'</option>';
          }
          $('#prodi').html(html)
        }
      });
      return false;
    });
  });
</script>
</body>
</html>

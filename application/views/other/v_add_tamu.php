
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrator | Data Buku Tamu</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url()?>assets/images/favicon.ico">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/tooltips.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/toast/jquery.toast.min.css"/>
	<!-- Select2 -->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>assets/plugins/select2/select2.css">
	<style>
		#preloader {
			position: fixed;
			z-index: 99999999999;
			top: 0;
			left: 0;
			overflow: visible;
			width: 100%;
			height: 100%;
			background: #fff url("<?php echo base_url()?>assets/images/hourglass.svg") no-repeat center center;
			background-color: #ffffff8f;
		}
		body{
			/*background-color: #222d32 !important; */
		}
		.select2{
			width: 100% !important;
		}

		
		/* The Modal (background) */
		#myModalImage{
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (image) */
		#myModalImage .modal-content {
		  margin: auto;
		  display: block;
		  max-width: 700px;
		  border-radius: 20px;
		}

		/* Add Animation */
		#myModalImage .modal-content, #caption {  
		  -webkit-animation-name: zoom;
		  -webkit-animation-duration: 0.6s;
		  animation-name: zoom;
		  animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
		  from {-webkit-transform:scale(0)} 
		  to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
		  from {transform:scale(0)} 
		  to {transform:scale(1)}
		}

		/* The Close Button */
		#myModalImage .close {
		  position: absolute;
		  top: 50px;
		  right: 40px;
		  color: #f1f1f1;
		  font-size: 40px;
		  font-weight: bold;
		  transition: 0.3s;
		  opacity: 100;
		}

		#myModalImage .close:hover,
		#myModalImage .close:focus {
		  color: #bbb;
		  text-decoration: none;
		  cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		  #myModalImage .modal-content {
		    width: 100%;
		  }
		}
	</style>
</head>
<body class="hold-transition skin-purple sidebar-mini">
	<div id="preloader"></div>
	<div class="wrapper">
<!--Counter Inbox-->
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url()?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">BTS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">BTS <span style="color: orange;">EVENT!</span> </span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">0</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Anda memiliki 0 pesan</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <!-- start message -->
                  <a href="<?php echo base_url()?>inbox">
                    <div class="pull-left">
                      <img src="<?php echo base_url()?>assets/images/user_blank.png" class="img-circle" alt="User Image">
                    </div>
                    <h4>nama inbox
                      <small><i class="fa fa-clock-o"></i> tgl_inbox</small>
                    </h4>
                    <p>pesan inbox</p>
                  </a>
                </li>
                <!-- end message -->

              </ul>
            </li>
            <li class="footer"><a href="<?php echo base_url()?>inbox">Lihat Semua Pesan
                5e76c0f5a4561769e13e807cba352f9c.jpg</a></li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src='<?php echo base_url()?>assets/images/user_blank.png' class='user-image' alt=''>            <span class="hidden-xs">Admin</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src='<?php echo base_url()?>assets/images/user_blank.png' class='img-circle' alt=''>              <p>
                Admin                                  <small>Administrator</small>
                              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url()?>login/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>

          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="<?php echo base_url()?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
        </li>
      </ul>
    </div>

  </nav>
</header><!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
            <img src='<?php echo base_url()?>assets/images/user_blank.png' class='user-image' alt=''>			</div>
			<div class="pull-left info">
				<p>Admin</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- /.User panel -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Cari data...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MENU UTAMA</li>
			<li class="active">
				<a href="<?php echo base_url()?>data_buku_tamu">
					<i class="fa fa-tasks"></i>
					<span>Daftar Tamu</span>
					<span class="pull-right-container">
						<small class="label pull-right"></small>
					</span>
				</a>
			</li>
			<li class="treeview ">
				<a href="#">
					<i class="fa fa-cog"></i>
					<span>Data Master</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="">
						<a  href="<?php echo base_url()?>user">
							<i class="fa fa-user"></i> <span>User </span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
					<li class="">
						<a  href="<?php echo base_url()?>bagian">
							<i class="fa fa-users"></i> <span>Bagian/Department</span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
					<li class="">
						<a  href="<?php echo base_url()?>jabatan">
							<i class="fa fa-users"></i> <span>Master Jabatan</span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
					<li class="">
						<a  href="<?php echo base_url()?>pegawai">
							<i class="fa fa-users"></i> <span>Pegawai </span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="<?php echo base_url()?>laporan">
					<i class="fa fa-book"></i>
					<span>Laporan</span>
					<span class="pull-right-container">
						<small class="label pull-right"></small>
					</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>login/logout">
					<i class="fa fa-sign-out"></i> <span>Logout</span>
					<span class="pull-right-container">
						<small class="label pull-right"></small>
					</span>
				</a>
			</li>
		</ul>
	</section>
<!-- /.sidebar -->
</aside>

  <style>
.drop-box{  
	border: 7px solid rgb(34, 45, 50);  
	cursor: pointer;
	margin: 5px auto 30px auto;
	position: relative;
	text-align: center;
	width: 300px;
	min-height: 200px;
	background-color: rgb(34, 45, 50);
	z-index: 1;
}
.drop-box p{
	width: 100%;
	display: block;
	color: #fff;
	margin: 25% auto;
}

.drop-box:before {
	content: " ";
	position: absolute;
	z-index: 2;
	top: 1px;
	left: 1px;
	right: 1px;
	bottom: 1px;
	border: 2px dashed rgba(243, 237, 237, 0.32); 
}
#upl{
	display: none;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Input Tamu
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url()?>data_buku_tamu">Daftar Tamu</a></li>
			<li class="active">Add Tamu Baru</li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<form action="<?php echo base_url()?>events/simpan_tamu" method="post" enctype="multipart/form-data">
		    <input type="hidden" name="ci_csrf_token" value="" style="display: none">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 ">
						<div class="box box-success">
				            <div class="box-header with-border">
				            	<span class="box-title"><i class="fa fa-check-square"></i> Identitas Tamu</span>
				            </div>
				            <div class="box-body">
								<div class="form-group">
									<label for="xnama">Nama Tamu:</label>
									<input type="text" class="form-control" id="xnama" name="xnama" placeholder="Masukkan Nama" required>
								</div>
				            	<div class="form-group">
				            		<label for="xalamat">Alamat:</label>
				            		<textarea class="form-control" id="xalamat" name="xalamat" placeholder="alamat" required></textarea>
				            	</div>
				            	<div class="form-group">
				            		<label for="xjenkel">Jenis Kelamin:</label>
				            		<select class="form-control" id="xjenkel" name="xjenkel">
				            			<option value=""></option>
				            			<option value="L">Laki-laki</option>
				            			<option value="P">Perempuan</option>
				            		</select>
				            	</div>
				            	<div class="form-group">
				            		<label for="xnohp">No Whatsapp:</label>
				            		<input type="text" class="form-control" id="xnohp" name="xnohp" placeholder="No WA" required>
				            	</div>
				            	<div class="box-header with-border">
				            		<span class="box-title"><i class="fa fa fa-arrow-circle-right"></i> Tujuan</span>
				            	</div>
					            <div class="form-group">
					            	<label for="xtujuan">Bagian:</label>
					            	<select class="form-control" name="xtujuan" id="xtujuan"  required>
					            		<option value="Event Pernikahan" selected="">Event Pernikahan</option>
					            	</select>
					            </div>
					            <!-- <div class="form-group"> -->
					            	<!-- <label for="xnamatujuan">Nama Pegawai Yang Dituju:</label> -->
					            	<input type="hidden" name="xnamatujuan" value="-">
					            <!-- </div> -->
					            
					            <!-- <div class="form-group"> -->
					            	<label for="xkeperluan">Keperluan Bertamu:</label>
					            	<textarea class="form-control" id="xkeperluan" name="xkeperluan" rows="6" placeholder="Masukkan Tujuan bertamu" required>Menghadiri Pernikahan</textarea>
					            <!-- </div> -->
				            </div>
				            <!-- /.box-body -->
				        </div>
				        <!-- /.box -->
				    </div>
				    <div class="col-md-6">
				    	<div class="info-box">
							<span class="info-box-icon"><i class="fa fa-tag"></i></span>
							<div class="info-box-content text-center" style="padding:20px;margin: 0 auto">
								<button type="submit" class="btn btn-lg btn-primary" >
									Simpan Tamu
								</button>
								<a href="<?php echo base_url()?>data_buku_tamu" type="button" class="btn btn-lg btn-default"> Batal</a>
							</div>
						</div>
						<div class="box box-success">
						    	<div class="box-header with-border">
						    		<i class="fa fa-credit-card"></i>
						    		<h3  class="box-title">Kartu Visitor</h3><br>
						    		<small>Focuskan kursor pada input dan scan kartu rfid</small>
						    	</div>
						    	<div class="box-body">
						    		<div id="xrfid0">
						    			<div class="form-group">
						    				<label class="control-label" for="item_xrfid">ID Kartu Visitor:</label>
						    				<input type="number" class="form-control" name="item_xrfid[]" placeholder="focuskan kursor pada input dan scan kartu nfc" >
						    			</div>
						    		</div>
						    		<div id="xrfid1"></div>
						    		<div class="form-group">
						    			<div class="col-xs-12">
						    				<div class="text-right">
						    					<a href="javascript:_remove_more_rfid(0);" class="btn btn-xs btn-danger">
						    						<b><i class="fa fa-minus-square"></i> Hapus</b>
						    					</a>
						    					&nbsp;
						    					<a href="javascript:_add_more_rfid(0);" class="btn btn-primary btn-xs">
						    						<b><i class="fa fa-plus-square"></i> Tambah</b>
						    					</a>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
						    	<!-- /.box-body -->
						</div> <!-- /.box -->
						<div class="box box-success">
					        	<div class="box-header with-border">
					        		<i class="fa fa-file"></i>
					        		<h3 class="box-title">Lampiran File</h3>
					        		<br>
					        		<small>Sertakan file jika tamu membawa softcopy file</small>
					        	</div>
					        	<div class="box-body">
						            <div id="xfile0" >
						            	<div class="form-group">
						            		<input type="file" name="item_xnamalampiran[]" class="btn btn-default col-sm-12 " onChange="checkExtension(this.value)">
						             	</div>
						             </div>
						             <div id="xfile1"></div>
						             
						             <div class="form-group">
						             	<label class="control-label">&nbsp;</label>
						             	<div class="col-xs-12">
							             	<div class="text-right">
								             	<a href="javascript:_remove_more(0);" class="btn btn-xs btn-danger">
								             		<b><i class="fa fa-minus-square"></i> Hapus</b>
								             	</a>
								             	&nbsp;
							             		<a href="javascript:_add_more(0);" class="btn btn-primary btn-xs">
							             			<b><i class="fa fa-plus-square"></i> Tambah</b>
							             		</a>
							             	</div>
						             	</div>
						             </div>
					            </div>
					            <!-- /.box-body -->
						</div>
						<div class="box">
							<div class="box-header with-border">
								<i class="fa fa-camera"></i>
				            	<h3 class="box-title">Foto Tamu</h3>
				            </div>
				            <div class="box-body">
				            	<div class="form-group">
				            		<div class="column-small-12 padd0 align-center">
				            			<div id="ambil_foto_tamu" class="drop-box" onclick="ambil_foto()">
				            				<p><i class="fa fa-camera" aria-hidden="true"></i><br>Ambil Foto Tamu </p>
				            			</div>
				            			<div class="text-center" id="hapus_foto_temporer" hidden>
				            				<i class="fa fa-times btn btn-danger" onclick="hapus_foto_temporer_tamu()" aria-hidden="true" > Hapus Foto Tamu</i> 
				            			</div>
				            		</div>
				            		<input type="hidden" class="form-control" id="xnama_file_foto" name="xnama_file_foto"  > 
				            	</div>
				            </div>
				        </div>
				    </div>  <!-- /.col-6 -->
			    </div>
			</div>
		</form>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div id="modal-foto" class="modal fade" style="z-index: 99999 !important;" >
	<div class="modal-dialog" style="width:670px">
		<div class="modal-content">
			<div class="modal-body">
				<div id="webcam"></div>
				<div id="nama_file_foto"></div>
				<select id="webcamdevice" class="form-control"></select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning pull-left" id="foto_ulang" onclick="foto_ulang()">Reset Cam</button>
				<button type="button" class="btn btn-success" id="ambil_foto">ambil foto</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0
		</div>
		<strong>Copyright &copy; 2024 <a href="<?php echo base_url()?>"></a>.</strong> All rights reserved.
	</footer>
	<div class="control-sidebar-bg"></div>
	
	<div id="myModalImage" class="modal">
		<span onclick="closemodal()" data-dismiss="modal" class="close">&times;</span>
		<img class="modal-content" id="img01">
	</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url()?>assets/plugins/chartjs_old/Chart.js"></script>
<!-- toast -->
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/toast/jquery.toast.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript"  src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<script type="text/javascript">
	$(window).on('load', function(){
		$("#preloader").fadeOut(300);
	});
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	function modalimage(img){
		var modal = document.getElementById("myModalImage");
		var modalImg = document.getElementById("img01");
    	modal.style.display = "block";
    	modalImg.src = img;
	}
	function closemodal(){
		var modal = document.getElementById("myModalImage");
		modal.style.display = "none";
	}
	$('#pagination').on('click','a',function(e){
		e.preventDefault(); 
		var pageno = $(this).attr('data-ci-pagination-page');
		$("#pagenomer").val(pageno);
		loadPagination(pageno);
	});
</script>



<script src="<?php echo base_url()?>assets/webcamjs/webcam.js"></script>
<script type="text/javascript">
	loadpegawai();
    function loadpegawai(){
		$.ajax({
			url: '<?php echo base_url()?>events/loadpegawai',
			type: 'get',
			success: function(response){
				$('#xnamatujuan').html(response);
				$('#xnamatujuan').select2();
			}
		});
	}
	loadbagian();
	function loadbagian(){
		$.ajax({
			url: '<?php echo base_url()?>events/loadbagian',
			type: 'get',
			success: function(response){
				$('#xtujuan').html(response);
				$('#xtujuan').select2();
			}
		});
	}
	function hapus_foto_temporer_tamu(){
		var isitext = "<p><i class=\"fa fa-camera\" aria-hidden=\"true\"></i><br>Ambil Foto Tamu </p>";
		$("#ambil_foto_tamu").html(isitext);
		$('#xnama_file_foto').val("");
		$('#hapus_foto_temporer').hide();
	}
	//AMBIL FOTO 
	function ambil_foto(){
		$("#modal-foto").modal('show');
	}
	//Foto Ulang 
	function foto_ulang(){
		Webcam.reset();
		$("#ambil_foto").show();
		$('#webcam' ).val("");
		Webcam.set('constraints', {
			width: 640,//width: 320,//width: 640,
			height: 480,//height: 250,//height: 480,
			image_format: 'jpeg',
			jpeg_quality: 100,
			//force_flash: 'true',
			fps: 50,
			'constraints': {
				width: 640,
				height: 480,
				facingMode:'environment' 
			}
		});
		Webcam.attach( '#webcam' );
	} 

	var cameras = new Array();
	navigator.mediaDevices.enumerateDevices().then(function(devices) {
		var i = 1;
		devices.forEach(function(device) {
			if(device.kind=== "videoinput"){
				cameras[i]= device.deviceId;
				$("#webcamdevice").append("<option value='"+ i +"'> Kamera "+ i +"</option>");
				i
			}
		});
	});
	$('#modal-foto').on('shown.bs.modal', function (e) {
		Webcam.set({
			width: 640,//width: 320,//width: 640,
			height: 480,//height: 250,//height: 480,
			image_format: 'jpeg',
			jpeg_quality: 100,
			//force_flash: 'true',
			video: true,
			'constraints': {
				width: 640,
				height: 480,
				facingMode:'environment' 
			}
	
		});
		Webcam.attach( '#webcam' );
	
		$("#webcamdevice").change(function (){
			if ($("#webcamdevice").val() == 0 ) {
			Webcam.reset();
			Webcam.set({
					width: 640,//width: 320,//width: 640,
					height: 480,//height: 250,//height: 480,
					image_format: 'jpeg',
					jpeg_quality: 100,
					//force_flash: 'true',
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'environment' 
					}
				}); 
				Webcam.attach( '#webcam' );
			} else if($("#webcamdevice").val() == 1 ) {
				Webcam.reset();
				Webcam.set({
					width: 640,//width: 320,//width: 640,
					height: 480,//height: 250,//height: 480,
					image_format: 'jpeg',
					jpeg_quality: 100,
					//force_flash: 'true',
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'users' 
					}
				}); 
				Webcam.attach( '#webcam' );
			} else {
				Webcam.reset();
				Webcam.set({
					width: 640,//width: 320,//width: 640,
					height: 480,//height: 250,//height: 480,
					image_format: 'jpeg',
					jpeg_quality: 100,
					//force_flash: 'true',
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'environment' 
					}
				}); 
				Webcam.attach( '#webcam' );
			}
		});
		$("#ambil_foto").click(function () { 
			$("#foto_ulang").show();
			Webcam.snap( function(data_uri) {
				image = "";
				image = data_uri;
				
				$('#webcam').html('<img src="'+data_uri+'" />');
				$('#ambil_foto_tamu').html('<img  src="'+image+'" style="width:100%" />');
				$('#xnama_file_foto').val(image);
				$('#hapus_foto_temporer').show();
			});
	
		});
		
		
		$('#modal-foto').on('hidden.bs.modal', function () {
			Webcam.reset();
		});
	});
	

	//cek extension
	var exts = "jpg|jpeg|gif|png|bmp|tiff|pdf|doc|rtf|docx|xls|xlsx"; 
	function checkExtension(value) {
		if(value=="")return true;
		var re = new RegExp("^.+\.("+exts+")$","i");
		if(!re.test(value)) {
			alert("Extesi file Tidak di ijinkan: \n" + value + "\n\nHanya File dengan extensi berikut yang diperbolehkan: "+exts.replace(/\|/g,',')+" \n\n");
			return false;
		}
		return true;
	}
	
	function validate(f){
		var chkFlg = false;
		for(var i=0; i < f.length; i++) {
			if(f.elements[i].type=="file" && f.elements[i].value != "") {
				chkFlg = true;
			}
		}
		if(!chkFlg) {
			alert('Silahkan browse/pilih minimal 1 file dokumen');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
	//TOMBOL tambah file 
	var next_id=0;
	var max_number =10;
	
	function _add_more() {    
		if (next_id>=max_number) {
			alert("File lampiran telah mencapai batas maximum dari "+max_number+" files!");
			return;
		}
		
		next_id=next_id+1;
		var next_div=next_id+1;
		var txt = "<div class=\"form-group\">";
		txt += "<input type=\"file\" name=\"item_xnamalampiran[]\" class=\"btn btn-default col-sm-12\" onChange=\"checkExtension(this.value)\"></div>";
		txt += '<div id=\"xfile'+next_div+'\"></div>';            
		document.getElementById("xfile" + next_id ).innerHTML = txt;
	}
	
	function _remove_more() {
		document.getElementById("xfile" + next_id ).innerHTML="";
		
		next_id --;
	}
	
	//TOMBOL tambah file 
	var next_id_rfid=0;
	var max_number_rfid =50;
	
	function _add_more_rfid() {
		if (next_id_rfid>=max_number) {
			alert("File lampiran telah mencapai batas maximum dari "+max_number_rfid+" files!");
			return;
		}
		
		next_id_rfid=next_id_rfid+1;
		var next_div_rfid=next_id_rfid+1;

		            			
		var txt = "<div class=\"form-group\">";
		txt += "<label class=\"control-label\" for=\"item_xrfid\">ID Kartu Visitor:</label>";
		txt += "<input type=\"number\" class=\"form-control\" name=\"item_xrfid[]\" placeholder=\"Focuskan kursor pada Kotak input dan scan kartu RFID\" required></div>";
		txt += '<div id=\"xrfid'+next_div_rfid+'\"></div>';            
		document.getElementById("xrfid" + next_id_rfid ).innerHTML = txt;
	}
	
	function _remove_more_rfid() {
		
		document.getElementById("xrfid" + next_id_rfid ).innerHTML="";
		
		next_id_rfid --;
	}
	
    </script>



 </body>
 </html>
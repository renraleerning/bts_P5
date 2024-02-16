<?php
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
            <?php

            $fileName = $this->session->userdata('foto');
            $path = FCPATH . 'assets/images/';
            $fotoPath = $path . $fileName;

            if (!empty($fileName) && file_exists($fotoPath)) {
              echo "<img src=" . base_url() . "assets/images/" . $fileName . " class='user-image' alt=''>";
            } else {
              echo "<img src='" . base_url() . "assets/images/user_blank.png' class='user-image' alt=''>";
            }
            
            ?>
			</div>
			<div class="pull-left info">
				<p><?php echo $this->session->userdata('nama');?></p>
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
			<li class="<?php if($controller == 'data_buku_tamu' ) { echo 'active'; } ?>">
				<a href="<?php echo base_url().'data_buku_tamu'?>">
					<i class="fa fa-tasks"></i>
					<span>Daftar Tamu</span>
					<span class="pull-right-container">
						<small class="label pull-right"></small>
					</span>
				</a>
			</li>
			<li class="treeview <?php if($controller == 'user' || $controller == 'pegawai' || $controller == 'bagian' || $controller == 'jabatan') { echo 'active'; } ?>">
				<a href="#">
					<i class="fa fa-cog"></i>
					<span>Data Master</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($controller == 'user' ) { echo 'active'; } ?>">
						<a  href="<?php echo base_url().'user'?>">
							<i class="fa fa-user"></i> <span>User </span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
					<li class="<?php if($controller == 'bagian' ) { echo 'active'; } ?>">
						<a  href="<?php echo base_url().'bagian'?>">
							<i class="fa fa-users"></i> <span>Bagian/Department</span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
					<li class="<?php if($controller == 'jabatan' ) { echo 'active'; } ?>">
						<a  href="<?php echo base_url().'jabatan'?>">
							<i class="fa fa-users"></i> <span>Master Jabatan</span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
					<li class="<?php if($controller == 'pegawai' ) { echo 'active'; } ?>">
						<a  href="<?php echo base_url().'pegawai'?>">
							<i class="fa fa-users"></i> <span>Pegawai </span>
							<span class="pull-right-container">
								<small class="label pull-right"></small>
							</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="<?php if($controller == 'laporan' ) { echo 'active'; } ?>">
				<a href="<?php echo base_url().'laporan'?>">
					<i class="fa fa-book"></i>
					<span>Laporan</span>
					<span class="pull-right-container">
						<small class="label pull-right"></small>
					</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url().'login/logout'?>">
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

  
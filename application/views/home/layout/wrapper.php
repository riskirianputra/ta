<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>System Sidang Tugas Akhir STTPYK</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url()?>assets/upload/image/logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=base_url()?>assets/template/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=base_url()?>assets/template/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url()?>assets/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/template/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/template/css/demo.css">
    <style>
        .custom-template .custom-toggle {
            background: rgb(132 193 35);
        }
        .custom-template .title {
            background: rgb(132 193 35);
        }
		.blink_me {
		animation: blinker 1s linear infinite;
		}

		@keyframes blinker {  
		50% { opacity: 0; }
		}
    </style>
</head>
<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="index.html" class="logo">
					<img src="<?=base_url()?>assets/upload/image/logo.png" alt="navbar brand" class="navbar-brand" width="40">
                    <span style="color: white;margin-left: 16px;"><b>STTPYK</b></span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<!-- <form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form> -->
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?=base_url();?>assets/upload/image/user.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?=base_url();?>assets/upload/image/user.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
                                            <?php 
                                                $this->load->model('user_model');
                                                if ($this->session->userdata('akses_level')=='mahasiswa') {
                                                    $get = $this->user_model->detail_user($this->session->userdata('id_user'));
                                                    $email = $get->email;
                                                    $user = $get->nama_mahasiswa;
                                                }else{
                                                    $email = 'admin';
                                                    $user = 'Admin';
                                                }
                                            ?>
												<h4><?=$user?></h4>
												<p class="text-muted"><?=$email?></p><a href="#" class="btn btn-xs btn-secondary btn-sm"></a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?=base_url('login/logout')?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?=base_url();?>assets/upload/image/user.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
                                <?=$user?>
									<span class="user-level"><?=$email?></span>
									<!-- <span class="caret"></span> -->
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item">
							<a href="<?=base_url('home/dasbor')?>" class="collapsed" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('home/data_sidang')?>" class="collapsed" >
								<i class="fas fa-pen"></i>
								<p>Data Sidang</p>
									<?php if(!$get->judul_ta || !$get->bimbingan1 || !$get->bimbingan2 || $get->judul_ta == '' || $get->bimbingan1 == '' || $get->bimbingan2 == ''): ?>
									<span class="badge badge-danger blink_me">Lengkapi</span>
									<?php else: ?>
									<span class="badge badge-success">Sudah Lengkap</span>
									<?php endif; ?>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
						<?php if ($get->status_mahasiswa == 0) : ?>
							<a href="#" class="collapsed" onclick="alert('Mohon maaf saudara belum melakukan sidang alat')">
						<?php else: ?>
							<a href="<?=base_url('home/nilai_sidang_alat')?>" class="collapsed" >
						<?php endif; ?>
								<i class="fa fa-file"></i>
								<p>Nilai Sidang Alat</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
						<?php if ($get->status_mahasiswa == 0 || $get->status_mahasiswa == 1 ) : ?>
							<a href="#" class="collapsed" onclick="alert('Mohon maaf saudara belum melakukan sidang Komprenshif')">
						<?php else: ?>
							<a href="<?=base_url('home/nilai_sidang_kompre')?>" class="collapsed" >
						<?php endif; ?>
								<i class="fa fa-file"></i>
								<p>Nilai Sidang Komprenshif</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<!-- <li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<!-- <li class="mx-4 mt-2">
							<a href="http://themekita.com/atlantis-bootstrap-dashboard.html" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Buy Pro</a> 
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    <?php require_once('content.php'); ?>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
					</nav>
									
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<!-- <div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="selected changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div> -->
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="selected changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="selected changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?=base_url()?>assets/template/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/template/js/core/popper.min.js"></script>
	<script src="<?=base_url()?>assets/template/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?=base_url()?>assets/template/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/template/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=base_url()?>assets/template/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?=base_url()?>assets/template/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=base_url()?>assets/template/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?=base_url()?>assets/template/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?=base_url()?>assets/template/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<!-- <script src="<?=base_url()?>assets/template/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

	<!-- jQuery Vector Maps -->
	<script src="<?=base_url()?>assets/template/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?=base_url()?>assets/template/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?=base_url()?>assets/template/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?=base_url()?>assets/template/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?=base_url()?>assets/template/js/setting-demo.js"></script>
	<script src="<?=base_url()?>assets/template/js/demo.js"></script>
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>
</body>
</html>


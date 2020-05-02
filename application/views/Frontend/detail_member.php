<!DOCTYPE html>
<html lang="en">
<head>
		<?php $this->load->view('Frontend/_Partials/head.php'); ?>
</head>
<body>

<!-- Content Wrapper -->
<div id="content-wrapper landingpage" class="d-flex flex-column">
  <!-- Main Content -->
    <div id="content">
<nav class="navbar navbar-expand topbar mb-4 navbar-custom fixed-top navbar-default navbar-cart">
<div class="container">
	<a class="navbar-brand" > <img src="<?php echo base_url('assets/images/logo.png') ?>"width="100px"> </a>


<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
	<i class="fa fa-bars"></i>
</button>


<!-- Topbar Search -->
<form action="<?php echo base_url('produk/hasil') ?>" class="d-none d-sm-inline-block form-inline m-auto mw-100 navbar-search" action="GET">
	<div class="input-group">
		<input type="text" class="form-control border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="cari" id="cari">
		<div class="input-group-append">
			<button class="btn btn-search" type="submit">
				<i class="fas fa-search fa-sm text-light"></i>
			</button>
		</div>
	</div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
<?php if($this->session->userdata('nm_kons')) { ?>
	<!-- Nav Item - Search Dropdown (Visible Only XS) -->
	<li class="nav-item dropdown no-arrow d-sm-none">
		<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-search fa-fw"></i>
		</a>
		<!-- Dropdown - Messages -->
		<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
			<form class="form-inline mr-auto w-100 navbar-search">
				<div class="input-group">
					<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn  btn-search" type="button">
							<i class="fas fa-search fa-sm text-light"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</li>

	<!-- Nav Item - Alerts -->
	<li class="nav-item dropdown no-arrow mx-1">
		<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-shopping-cart fa-fw"></i>
			<!-- Counter - Alerts -->
			<span class="badge badge-danger badge-counter"><?php echo $this->cart->total_items() ?></span>
		</a>
		<!-- Dropdown - Alerts -->
		<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
			<h6 class="dropdown-header">
				Keranjang Anda
			</h6>
					<?php 
						foreach ($this->cart->contents() as $items){
					?>
						<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="<?php echo base_url('upload/produk/'.$items['images']) ?>" alt="">
								</div>
								<div class="font-weight-bold">
									<div class="text-truncate"><?php echo $items['name'] ?></div>
									<div class="small text-gray-500"><?php echo "Rp. ".number_format($items['price'],0,',',',') ?></div>
								</div>
							<div class="status-indicator position-absolute col-sm-11"> <span class="badge badge-pill badge-info float-right"><?php echo $items['qty'] ?></span>  </div>
						</a>
						
					<?php } ?>
					<a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('produk/cart') ?>">Detail Keranjang</a>
				</div>
	</li>


	<div class="topbar-divider d-none d-sm-block"></div>

	<!-- Nav Item - User Information -->
	<li class="nav-item dropdown no-arrow">
		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nm_kons')?></span>
			<img class="img-profile rounded-circle" src="<?php echo base_url('upload/user/'.$this->session->userdata('foto_kons')) ?>">
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			<a class="dropdown-item" href="#">
				<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
				Profile
			</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutCusModal">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				Logout
			</a>
		</div>
	</li>
	<?php } else { ?>
		
	<!-- Nav Item - Search Dropdown (Visible Only XS) -->
	<li class="nav-item dropdown no-arrow d-sm-none">
		<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-search fa-fw"></i>
		</a>
		<!-- Dropdown - Messages -->
		<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
			<form class="form-inline mr-auto w-100 navbar-search">
				<div class="input-group">
					<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn  btn-search" type="button">
							<i class="fas fa-search fa-sm text-light"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</li>

	<!-- Nav Item - Alerts -->
	<li class="nav-item dropdown no-arrow mx-1">
		<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-shopping-cart fa-fw"></i>
			<!-- Counter - Alerts -->
			<span class="badge badge-danger badge-counter"><?php echo $this->cart->total_items() ?></span>
		</a>
		<!-- Dropdown - Alerts -->
		<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
			<h6 class="dropdown-header">
				Keranjang Anda
			</h6>
					<?php 
						foreach ($this->cart->contents() as $items){
					?>
						<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="<?php echo base_url('upload/produk/'.$items['images']) ?>" alt="">
								</div>
								<div class="font-weight-bold">
									<div class="text-truncate"><?php echo $items['name'] ?></div>
									<div class="small text-gray-500"><?php echo "Rp. ".number_format($items['price'],0,',',',') ?></div>
								</div>
							<div class="status-indicator position-absolute col-sm-11"> <span class="badge badge-pill badge-info float-right"><?php echo $items['qty'] ?></span>  </div>
						</a>
						
					<?php } ?>
					<a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('produk/cart') ?>">Detail Keranjang</a>
				</div>
	</li>


	<div class="topbar-divider d-none d-sm-block"></div>
		<li>
			<a href="<?php echo site_url('user'); ?>" class="btn btn-sm btn-login-cus px-2 mr-2 mt-3">Masuk</a>
		</li>
		<li>
			<a href="<?php echo site_url('register'); ?>" class="btn btn-register btn-sm px-2 mr-2 mt-3">Daftar</a>
		</li>
	<?php } ?>
</ul>
</div>
</nav>

<?php $this->load->view('Frontend/_Partials/modal.php'); ?>

			<!-- id Produk -->
		<div id="produk-detail">
		<br> <br> <br>
			<div class="container mt-5">
				<div class="row justify-content-md-center">
					<div class="col-md-5">
							<div class="card-detail-member">
								<div class="card-header font-weight-bold bg-info text-gray-100">
									PROFILE MEMBER
									<div class="float-right ">
										<a href="<?php echo site_url('user/edit_member/').$detail->kd_kons ?>"><i class="fas fa-edit text-gray-100 font-weight-normal"></i></a>
									</div>
								</div>
							<img class="rounded-circle mx-auto d-block my-2" name="foto" src="<?php echo base_url('upload/user/'.$this->session->userdata('foto_kons')) ?>" width="100">
							<div class="card-body ml-3">
								<h6 class="text-gray-500">Nama :</h6>
								<h5 class="text-detail-member font-weight-bold"><?php echo $detail->nm_kons ?></h5>
									<hr style="margin-top : -5px">

								<h6 class="text-gray-500">Alamat :</h6>
								<h5 class="text-detail-member"><?php echo $detail->alm_kons ?></h5>
									<hr style="margin-top : -5px">

								<h6 class="text-gray-500">Email :</h6>
								<h5 class="text-detail-member"><?php echo $detail->email ?></h5>
									<hr style="margin-top : -5px;">
									<br>
								<div class="text-right mt-3">
								<a onclick="deleteConfirm('<?php echo site_url('user/hapus_member/'.$detail->kd_kons) ?>')"
														href="#!" class="btn btn-outline-danger btn-sm" style="font-family : Montserrat Medium">
														<i class="fas fa-trash-alt"></i> Hapus akun</a>
								</div>
						
							</div>
						</div>
					</div>

				</div>
			</div>
  	</div>
	</div>				
</div>

<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>	
</body>
</html>

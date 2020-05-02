<html lang="en">
	<head>
		<?php $this->load->view('Frontend/_Partials/head.php') ?>
	</head>
<body id="cart">
<!-- Content Wrapper -->
<div id="content-wrapper landingpage" class="d-flex flex-column">
  <!-- Main Content -->
    <div id="content">
<nav class="navbar navbar-expand topbar mb-4 navbar-custom fixed-top navbar-cart">
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

<br><br><br><br>

<div class="container">
<div class="row align-items-center">
    <div class="col">
      <h3>Detail Keranjang</h3>
    </div>
    <div class="col">
      <a href="<?php echo base_url() ?>" class="btn btn-add-to-cart btn-sm"> <i class="fas fa-arrow-left"></i> Kembali Belanja</a>
    </div>
  </div>

	<div class="row">
		<div class="col-md-8">
		<?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success" role="alert">
										<?php echo $this->session->flashdata('success'); ?>
										Kode Pembayaran Anda : 
								</div>
				<?php endif; ?>
			<?php 
					foreach ($this->cart->contents() as $items){
			?>
			<div class="my-3 card-style-cart">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">
							<img src="<?php echo base_url('upload/produk/'.$items['images']) ?>" width="100px">
						</div>
						<div class="col-md-7 mt-3">
							<h5 class="card-title"><?php echo $items['name'] ?> <span class="badge bg-gray-200 mx-3">  <?php echo $items['qty'] ?>  </span> </h5>
							<h6 class="card-text-price-cart"><?php echo 'Rp. '.number_format($items['price']) ?></h6>
						</div>
						<div class="col-md-3 ">
						<a href="#"  data-toggle="modal" data-target="#modalHapusBarang" class="btn btn-hapus text-danger btn-md fas fa-trash-alt float-right"></a><br> <br>
						<h6 class="card-text-subtotal float-right mt-2"><span class="small text-gray-500">  Sub Total </span><br><?php echo 'Rp. '.number_format($items['subtotal']) ?></h6>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div>
		<div class="col-md-4">
			<div class="card-style my-3 position-fixed col-md-3">
				<div class="card-body">
					<h5 class="card-title">Total Harga</h5>
						<h5 class="card-text-total card-style-cart py-3 text-center"><?php echo 'Rp. '.number_format($this->cart->total()) ?></h6>
						<button class="btn btn-success btn-block shadow mt-5"  data-toggle="modal" data-target="#modalCheckout">Beli <?php echo '('.$this->cart->total_items().')'?></button>
					</div>
			</div>
		</div>
	</div>
</div>
	<?php $this->load->view('Frontend/_Partials/modal.php') ?>
</body>
</html>

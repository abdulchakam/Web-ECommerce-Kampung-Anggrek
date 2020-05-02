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

			<!-- id Produk -->
<div id="produk-detail">
	<br>

  <div class="container pt-5">
		<div class="row align-items-center">
			<div class="col-md-12 p-4">
				<div class="card-detail">
					<div class="card-body">
						<div class="row ">
								<div class="col-lg-4 col-md-4 my-auto">
										<div class="card-img-detail">
												<div class="text-center" >
													<img class="p-3" src="<?php echo base_url('upload/produk/'.$detail->gambar) ?>" width="330px"  alt="Card image cap">
												</div>
										</div>
								</div>
								
								<div class="col-lg-8">
									<div class="row">
										<div class="col-10">
											<h3 class="card-title-detail"><?php echo $detail->nm_brg ?></h3>
										</div>
									</div>

									<div class="row my-3">
										<div class="col-10">
											<h6 class="text-detail-title text-gray-600">Stok Tersisa :</h6>
												<h5 class="text-detail text-gray-500"><?php echo $detail->stok.' '.$detail->satuan ?></h5>
										</div>
									</div>

									<div class="row my-3">
										<div class="col-11">
											<h6 class="text-detail-title text-gray-600">Deskripsi :</h6>
											<div class="text-justify">
												<h5 class="text-detail text-gray-500"><?php echo $detail->deskripsi ?></h5>
											</div>	
										</div>
									</div>

									<div class="row my-3">
										<div class="col-10">
											<h6 class="text-detail-title text-gray-600">Harga :</h6>
											<h5 class="text-detail-harga" name="harga"><?php echo'Rp. '.number_format($detail->harga) ?></h5>
										</div>
									</div>

									<form action="<?php echo site_url('produk/add_to_cart/'.$detail->kd_brg) ?>" method="post">
									<div class="row my-4">
										<div class="col-md-3">
											<div class="input-group">
														<span class="input-group-btn mr-3">
																<button type="button" class="btn btn-default btn-number btn-min btn-sm" disabled="disabled" 
																				data-type="minus" data-field="qty">
																	<i class="fas fa-minus"></i>
																</button>
														</span>
														<input  name="qty" 
																	class="qty input-number frm-qty text-gray-600" id="<?php echo $detail->kd_brg;?>"  
																	value="1" min="1" max="<?php echo $detail->stok ?>" readonly >
														<span class="input-group-btn ml-2">
																<button type="button" class="btn btn-default btn-number btn-plus btn-sm " 
																				data-type="plus" data-field="qty">
																		<i class="fas fa-plus icon"></i>
																</button>
														</span>
												</div>
										</div>

										<div class="col-md-8">
											<h6 class="text-detail-title text-gray-600">Sub Total :</h6>
											<h5 class="subtotal text-detail-subtotal"><?php echo'Rp. '.number_format($detail->harga) ?></h5>
										</div>
									</div>

								<div class="row my-3">
									<div class="col-12">
										<button id="addtocart" type="submit" class="add_cart btn btn-md btn-add-to-cart mt-4 float-right px-4">Add to Cart</button>
									</div>
								</div>
							</div>
						</div>	
						</form>
						</div>
					</div>
					<a href="<?php echo base_url() ?>" class="btn btn-add-to-cart btn-sm mt-4"> <i class="fas fa-arrow-left"></i> Kembali Belanja</a>
				</div>
			</div>
		</div>
  </div>
</div>
</div>
							
<script>
// Javascript Button minus plus Input
$('.btn-number').click(function(e){
	e.preventDefault();

	fieldName = $(this).attr('data-field');
	type      = $(this).attr('data-type');
	var input = $("input[name='"+fieldName+"']");
	var currentVal = parseInt(input.val());

	if (!isNaN(currentVal)) {
			if(type == 'minus') {
					
					if(currentVal > input.attr('min')) {
							input.val(currentVal - 1).change();

					} 
					if(parseInt(input.val()) == input.attr('min')) {
							$(this).attr('disabled', true);
					}
			} else if(type == 'plus') {
					if(currentVal < input.attr('max')) {
							input.val(currentVal + 1).change();

					}
					if(parseInt(input.val()) == input.attr('max')) {
							$(this).attr('disabled', true);
					}

			}
	} else {
			input.val(0);
	}
});



$('.input-number').focusin(function(){
 $(this).data('oldValue', $(this).val());
});


$('.input-number').change(function() {
	
	minValue =  parseInt($(this).attr('min'));
	maxValue =  parseInt($(this).attr('max'));
	valueCurrent = parseInt($(this).val());
	name = $(this).attr('name');
	
	$('.subtotal').text(parseInt($('.qty').val()) * parseInt("<?=$detail->harga?>") ).formatCurrency();
	
	if(valueCurrent >= minValue) {
			$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled');
	} else {
			alert('Sorry, the minimum value was reached');
			$(this).val($(this).data('oldValue'));
	}
	if(valueCurrent <= maxValue) {
			$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
	} else {
			alert('Sorry, the maximum value was reached');
			$(this).val($(this).data('oldValue'));
	}
});

	// End javaScript Button minus plus input
</script>

    <!-- Jumbotron -->
			<?php $this->load->view('Frontend/_Partials/modal.php'); ?>
		<!-- End Jumbotron -->

  <script>
    AOS.init({
        duration : 1200,
    })
</script>
</body>
</html>

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

        <!-- Topbar -->
					<?php $this->load->view('Frontend/_Partials/navbar.php'); ?>
        <!-- End of Topbar -->


        <!-- Jumbotron -->
					<?php $this->load->view('Frontend/_Partials/jumbotron.php'); ?>
        <!-- End Jumbotron -->


<!-- id Produk -->
<div id="produk">
  <br>
  <br>
  <br>
  <div class="container pt-5">
    <div class="row ">

		<?php foreach ($produks as $produk) { ?>
			<div class="col-lg-3 col-md-4 col-sm-5 mb-3 ">
				<a href="<?php echo site_url('produk/detail/').$produk->kd_brg ?>" style="text-decoration:none">
					<div class="card-style">
						<div class="images-product text-center">
							<img class="p-3" src="<?php echo base_url('upload/produk/'.$produk->gambar) ?>" width="150"  alt="Card image cap">
						</div>
						<div class="card-body">
							<h5 class="card-title text-gray-600"><?php echo $produk->nm_brg ?></h5>
							<p class="card-text">
								<?php
									echo (str_word_count($produk->deskripsi) > 5 ? 
									substr($produk->deskripsi,0,45)."..." :  $produk->deskripsi);
								?>		
							</p>
							<h6 class="card-text-price"><?php echo 'Rp. '.number_format($produk->harga) ?></h6>
								<div class="col-10 position-absolute">
									<form action="<?php echo site_url('produk/add_to_cart/'.$produk->kd_brg) ?>" method="post" style="margin-top : -5px;">
											<input type="hidden" name="qty" value="1">
											<button id="addtocart" type="submit" class="btn btn-md btn-add-to-cart mt-4 float-right px-4">Add to Cart</button>
									</form>
								</div>


						</div>
					</div>
				</a>
			</div>
		<?php } ?>
  </div>
  </div>
</div>
</div>
	<!-- Modal Detail Barang -->

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

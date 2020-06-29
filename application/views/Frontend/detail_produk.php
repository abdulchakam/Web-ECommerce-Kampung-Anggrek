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
		<?php $this->load->view('Frontend/_Partials/navbar2.php'); ?>

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


			<?php $this->load->view('Frontend/_Partials/modal.php'); ?>


  <script>
    AOS.init({
        duration : 1200,
    })
</script>
</body>
</html>

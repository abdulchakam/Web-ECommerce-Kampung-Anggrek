<html lang="en">
	<head>
		<?php $this->load->view('Frontend/_Partials/head.php') ?>

		<style>
			input[type=radio]
			{
			display:none;
			}
			input[type=radio]:checked + label
			{
				border-radius: 5px;
				background: #ffffff !important;
				box-shadow:  2px 2px 5px #e2e3e5;
			}
		</style>

	</head>
<body id="cart">
<!-- Content Wrapper -->
<div id="content-wrapper landingpage" class="d-flex flex-column">
  <!-- Main Content -->
    <div id="content">
		<?php $this->load->view('Frontend/_Partials/navbar2.php'); ?>

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
		<div class="col-md-7">
		<?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success" role="alert">
										<?php echo $this->session->flashdata('success'); ?>
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
		<div class="col-md-5">
			<div class="card-style-total my-3 col-md-12">
				<div class="card-body">
					<form action="<?php echo site_url('order') ?>" method="post">
					<div class="row justify-content-between">
						<div class="col-8">
							<h5 class="card-title">Data Penerima</h5>
						</div>
						<div class="col-4">
							<h6 class="text-data text-gray-500">Belanja :</h6>
							<p class="font-weight-bold text-danger" id="total"><?php echo 'Rp. '.$this->cart->total() ?></p>
						</div>
					</div>
					

							<div class="row">
								<div class="col-md-12 mb-2 mt-3">
									<h6 class="text-data text-gray-500">Nama Konsumen :</h6>
									<h5 class="text-data2 text-gray-600"><?php echo $this->session->userdata('nm_kons')?></h5>
									<input type="hidden" name="alamat" value="<?php echo $this->session->userdata('alm_kons')?>">
								</div>
							</div>

							<div class="row">
							<div class="col-md-12 mb-2">
								<form action="<?=site_url('order')?>" method="post">
									<div class="form-row">
									<div class="row">
										<div class="col-md-6">
											<label for="province"><h6 class="text-data text-gray-500">Provinsi</h6> </label>             
											<select class="form-control form-control-sm autocomplete" id="province" name="province">
											<option selected>-- Pilih Provinsi --</option> 
												<?php                
													$data = json_decode($province, true);                 
													for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {                      
														echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";                 
													}             
												?>
											</select>
										</div>
										<div class="col-md-6">
											<label for="kabKota"><h6 class="text-data text-gray-500">Kab/Kota</h6> </label>             
												<select class="form-control form-control-sm autocomplete" id="kabKota" name="kabKota" disabled>             
													<option selected>-- Pilih Kab/Kota --</option>                                                                         
												</select> 
										</div>
									</div>
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mb-2">
							<label for="jasa pengiriman"> <h6 class="text-data text-gray-500">Jasa Pengiriman</h6> </label>   
							<div class="row justify-content-md-center">
								<div class="col-md-4">
									<input type="radio" name="kurir" value="pos" id="pos" checked>             
									<label for="pos" class="col-12 card py-2 bg-gray-100">             
										<img src="<?php echo base_url('assets/images/pos.png') ?>" width="70px" alt="" class="mx-auto d-block">             
									</label> 
								</div>
								<div class="col-md-4">
									<input type="radio" name="kurir" value="jne" id="jne">             
									<label for="jne" class="col-12 card py-2 bg-gray-100">             
										<img src="<?php echo base_url('assets/images/jne.png') ?>" width="70px" alt="" class="mx-auto d-block">         
									</label>   
								</div>
								<div class="col-md-4">
									<input type="radio" name="kurir" value="tiki" id="tiki">             
									<label for="tiki" class="col-12 card py-2 bg-gray-100">             
										<img src="<?php echo base_url('assets/images/tiki.png') ?>" width="70px" alt="" class="mx-auto d-block">            
									</label>
								</div>
							</div> 
							</div>
						</div>

						<div class="form-group">         
						<label> <h6 class="text-data text-gray-500">Biaya Pengiriman</h6> </label>       

						<div class="col-12 d-flex flex-column kurir" id="biaya">
						</div>

						<div class="total col-8 float-right my-3 text-data text-gray-500 ">
							<div class="row my-2">
								<div class="col-md-6">Biaya Ongkir : </div>
								<div class="col-md-6 text-right text-muted" id="ongkir">Rp. 0</div>
							</div>
							<div class="row my-2">
								<div class="col-md-6">Total Bayar:</div>
								<div class="col-md-6 text-right text-muted" id="totalAll"></div>
							</div>
						</div>     
						
						<button type="submit" class="btn btn-success btn-block shadow mt-5" id="myBtn" disabled>Beli <?php echo '('.$this->cart->total_items().')'?> </button>
						<!-- <button class="btn btn-success btn-block shadow mt-5"  data-toggle="modal" data-target="#modalCheckout">Beli <?php echo '('.$this->cart->total_items().')'?></button> -->
					</form>
					</div>
			</div>
		</div>
	</div>
</div>
	<?php $this->load->view('Frontend/_Partials/modal.php') ?>

	<script>
		$('#province').change(function(){      
			$('#kabKota').attr('disabled', false);     
			var id=$(this).val();    
			$.ajax({        
				  url : "<?php echo site_url('produk/load_kabKota');?>",        
					headers: {  'Access-Control-Allow-Origin': '*' },         
					method : "POST",        
					data : {id: id},        
					async : true,         
						success: function(data){            
								$('#kabKota').html(data); //mengisi option pada kab/kota            
								$('#biaya').html("");   //membuat div biaya kosong                     
								}    
				});    
		return false;
		});

//ketika kabupaten dipilih 
	$('#kabKota').change(function(){      
		var kab=$('#kabKota').val(); //mengambil id kab     
		var kurir= 'pos'; //menentukan kurir     
			load_ongkir(kab,kurir);     
			return false; 
		}); 

//ketika kurir dipilih   
	$('input[name="kurir"]').change(function(){    
		$('#ongkir').html('Rp. 0');
		$('#totalAll').html($('#total').html());
		
		var kab=$('#kabKota').val(); //mengambil id kab     
		var kurir=$(this).val();     //mengambil value kurir
		load_ongkir(kab,kurir);                
		return false; 
	});


	//fungsi menampilkan biaya ongkir 
	function load_ongkir(kab,kurir){    
		$.ajax({         
			url : "<?php echo site_url('produk/load_ongkir');?>",         
			headers: {  'Access-Control-Allow-Origin': '*' },        
			method : "POST",         
			data : {kab: kab, kurir: kurir},        
			async : true,         
			success: function(data){             
				if(kab>0){                
					$('#biaya').html(data); 

					$('input[name="ongkir"]').change(function(){
						ongkir = $(this).val();
						$('#ongkir').html('Rp. '+ongkir);
						total = $('#total').html().replace('Rp. ','').replace(',','');
						$('#totalAll').html( 'Rp . '+(parseInt(total) + parseInt(ongkir)) );
						
						if(ongkir > 0){
							document.getElementById("myBtn").disabled = false;
						}
					});
				}       
			}        
		}); 

}
</script>
</body>
</html>

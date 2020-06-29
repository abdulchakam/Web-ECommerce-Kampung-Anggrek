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
							<img class="rounded-circle mx-auto d-block my-2" name="foto" src="<?php echo $this->session->userdata('foto_kons') ?>" width="100">
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

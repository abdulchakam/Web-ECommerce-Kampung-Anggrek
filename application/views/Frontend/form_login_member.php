<!DOCTYPE html>
<html lang="en">
<head>
		<?php $this->load->view('admin/_partials/head.php'); ?>
</head>
<body class="bg-gray-100" id="form">

		<!-- CONTENT -->
<div class="container-fluid">
	<div class="row my-3 justify-content-md-center">
  <div class="col-sm-5">
			<div class="card-form mt-5 px-5">
			<div class="card-body">
			<h3 class="text-center mt-3 ">Masuk</h3>
				<div><?=validation_errors()?></div>
				<?php if ($this->session->flashdata('error')): ?>
								<div class="alert alert-danger" role="alert" timer="1000">
								<a href="#" class="close" data-dismiss="alert">&times;</a>
										<?php echo $this->session->flashdata('error'); ?>
								</div>
				<?php endif; ?>
				</div>
				<div class="row justify-content-md-center">
						<div class="col-12">
							<?=form_open('user', ['class'=>'form-horizontal'])?>
								<div class="form-group">
								<label for="email" class="col-sm-10 control-label">Email</label>
								<div class="col-sm-12">
									<input type="email" class="form-style col-12" name="femail" required>
								</div>
								</div>
								<div class="form-group">
								<label for="password" class="col-sm-10 control-label">Password</label>
								<div class="col-sm-12">
									<input type="password" class="form-style col-12" name="fpassword" required>
								</div>
								</div>
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-12">
									<div class="checkbox">
									<label>
										<input type="checkbox"> Remember me
									</label>
									</div>
								</div>
								</div>
								<div class="col-12 my-3">
										<div class="form-group ">
											<div class="col-sm-offset-2 col-sm-8 m-auto">
												<button type="submit" class="btn btn-register btn-md btn-block ">Masuk</button>
											</div>
											<p class="text-center text-gray-600 mt-3">Belum Punya Akun? <a href="<?php echo site_url('register'); ?>">Daftar</a> </p>
										</div>
								</div>
								</div>
								</div>
							</form>
						</div>
						<a href="<?php echo base_url() ?>" class="btn btn-add-to-cart btn-sm mt-4"> <i class="fas fa-arrow-left"></i> Kembali Belanja</a>
				</div>
		</div>
		</div>
		<!-- END CONTENT  -->

		<!-- Load JS File -->
		<?php $this->load->view('admin/_partials/js.php'); ?>
		<!-- End Load JS File -->
</body>
</html>


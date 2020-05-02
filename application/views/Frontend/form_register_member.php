<!DOCTYPE html>
<html lang="en">
<head>
		<?php $this->load->view('frontend/_partials/head.php'); ?>
</head>
<body id="form" >

	<div class="container-fluid">
	<div class="row my-3 justify-content-md-center">
  <div class="col-sm-6">
	<div class="card-form" >
  <div class="card-body">
		<h3 class="text-center mt-2">Daftar Sekarang</h3>
			<p class="text-center text-gray-600">Sudah Punya Akun? <a href="<?php echo site_url('user'); ?>">Masuk</a> </p>
			<div class="container-fluid">
						<?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success" role="alert">
										<?php echo $this->session->flashdata('success'); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
						<?php endif; ?>
						</div>
      <div class="modal-body">
				<div class="row justify-content-md-center">
				<div class="col-12">
				<form action="<?php echo site_url('register/add') ?>" method="post" enctype="multipart/form-data" >
				
					<div class="form-group">
						<label class="col-sm-10 control-label">Nama </label>
						<div class="col-sm-12">
							<input type="text" class="form-style col-12" name="fnm_kons" placeholder="Nama" required	>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
								<label for="Alamat">Alamat </label>
								<textarea id="falm_kons" class="form-style col-12" name="falm_kons" rows="3"></textarea>
							</div>
						</div>	
					
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Kota </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="fkota_kons" placeholder="Kota " required	>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Kode Pos </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="fkd_pos" placeholder="Kode Pos " required	>
							</div>
						</div>
					</div>
					</div>

					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Phone </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="fphone" placeholder="Phone " required	>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Email</label>
							<div class="col-sm-12">
								<input type="email" class="form-style col-12" name="femail" placeholder="Email" required >
							</div>
						</div>
					</div>
					</div>

					<div class="form-group">
						<label class="col-sm-10 control-label">Password</label>
						<div class="col-sm-12">
							<input type="password" class="form-style col-12" name="fpassword" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						
						<div class="col-sm-12">
						<label for="foto">Foto</label>
							<input class="form-control-file" type="file" name="foto" />
						</div>
					</div>
					
					<div class="col-12">
					<div class="form-group mt-2 ">
						<div class="col-sm-offset-2 col-sm-8 m-auto">
							<button type="submit" class="btn btn-register btn-block">Daftar</button>
						</div>
					</div>
					</div>
				</form>
		</div>
		</div>
		</div>
		</div>
		<!-- END CONTENT -->

</body>
</html>

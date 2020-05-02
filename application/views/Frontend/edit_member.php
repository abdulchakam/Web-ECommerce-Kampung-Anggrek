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
		<h3 class="text-center mt-2">Update Data</h3>
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
				<form action="#" method="post" enctype="multipart/form-data" >
				
					<div class="form-group">
						<label class="col-sm-10 control-label">Nama </label>
						<div class="col-sm-12">
							<input type="text" class="form-style col-12" name="fnm_kons" placeholder="Nama" value="<?php echo $detail->nm_kons?>" required	>
							<input type="hidden" class="form-style col-12" name="fkd_kons" placeholder="Nama" value="<?php echo $detail->kd_kons?>"	>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
								<label for="Alamat">Alamat </label>
								<textarea id="falm_kons" class="form-style col-12" name="falm_kons" rows="3"><?php echo $detail->alm_kons ?></textarea>
							</div>
						</div>	
					
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Kota </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="fkota_kons" placeholder="Kota " value="<?php echo $detail->kota_kons?>" required	>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Kode Pos </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="fkd_pos" placeholder="Kode Pos " value="<?php echo $detail->kd_pos?>" required	>
							</div>
						</div>
					</div>
					</div>

					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Phone </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="fphone" placeholder="No Hp" value="<?php echo $detail->phone?>"  required	>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Email</label>
							<div class="col-sm-12">
								<input type="email" class="form-style col-12" name="femail" placeholder="Email" value="<?php echo $detail->email?>" required >
							</div>
						</div>
					</div>
					</div>

					<div class="form-group">
						<label class="col-sm-10 control-label">Password lama/baru</label>
						<div class="col-sm-12">
							<input type="password" class="form-style col-12" name="fpassword" placeholder="Password" required>
						</div>
					</div>

					<div class="form-group">
									<label for="foto">Photo</label>
									<input class="form-control-file"
									type="file" name="foto" />
									<input type="hidden" name="old_image" value="<?php echo $detail->foto_kons ?>" />
					</div>

					<div class="col-12">
					<div class="form-group mt-5 ">
						<div class="col-sm-offset-2 col-sm-8 float-right">
							<a class="btn btn-outline-info" href="<?php echo site_url('user/detail_member/').$detail->kd_kons?>">Kembali</a>
							<button type="submit" class="btn btn-register px-4">Update</button>
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

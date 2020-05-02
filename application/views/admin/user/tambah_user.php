<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php'); ?>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
		<?php $this->load->view('admin/_partials/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
					<?php $this->load->view('admin/_partials/navbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
						<?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success" role="alert">
										<?php echo $this->session->flashdata('success'); ?>
								</div>
						<?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
            
					</div>
					
						<!-- CONTENT FORM ADD -->
				<div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-primary">
								<a href="<?php echo site_url('admin/user/') ?>" class="text-gray-100"><i class="fas fa-arrow-left"></i> Kembali</a>
						</div>
            <div class="card-body">
							<form action="<?php echo site_url('admin/user/add') ?>" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label for="fusername">Username*</label>
									<input class="form-control <?php echo form_error('fusername') ? 'is-invalid':'' ?>"
									type="text" name="fusername" placeholder="Username" required  />
									<div class="invalid-feedback">
										<?php echo form_error('fusername') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="femail">Email*</label>
									<input class="form-control <?php echo form_error('femail') ? 'is-invalid':'' ?>"
									type="email" name="femail" placeholder="Email " required  />
									<div class="invalid-feedback">
										<?php echo form_error('femail') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="fpassword">Password*</label>
									<input class="form-control <?php echo form_error('fpassword') ? 'is-invalid':'' ?>"
									type="password" name="fpassword" placeholder="Password " required />
									<div class="invalid-feedback">
										<?php echo form_error('fpassword') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="foto">Gambar </label>
									<input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
									type="file" name="foto" />
									<div class="invalid-feedback">
										<?php echo form_error('foto') ?>
									</div>
								</div>

								<input class="btn btn-outline-primary" type="submit" name="btn" value="Save" />
							</form>
						</div>
				<!-- END CONTENT FORM ADD -->
					<div class="card-footer small text-muted">
						* required fields
					</div>

					</div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
				<?php $this->load->view('admin/_partials/footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
		<?php $this->load->view('admin/_partials/scrolltop.php'); ?>

	<!-- Load Modal -->
		<?php $this->load->view('admin/_partials/modal.php'); ?>
	<!-- End Load Modal -->
  <!-- Load Javasript -->
		<?php $this->load->view('admin/_partials/js.php'); ?>
	<!-- End Load Javascript -->

</body>

</html>

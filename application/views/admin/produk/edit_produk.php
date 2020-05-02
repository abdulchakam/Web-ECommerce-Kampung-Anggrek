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
            <h1 class="h3 mb-0 text-gray-800">Edit Data Produk</h1>
            
					</div>
					
						<!-- CONTENT FORM ADD -->
				<div class="card shadow mb-4">     
            <div class="card-header py-3 bg-gradient-primary">
								<a href="<?php echo site_url('admin/produk/') ?>" class="text-gray-100"><i class="fas fa-arrow-left"></i> Kembali</a>
						</div>
            <div class="card-body">
						<form action="#" method="post" enctype="multipart/form-data" >
							<div class="form-group">
									<label for="kd_brg">Kode Produk*</label>
									<input class="form-control <?php echo form_error('kd_brg') ? 'is-invalid':'' ?>"
									type="text" name="kd_brg" placeholder="Kode Produk" value="<?php echo $produk->kd_brg?>" readonly/>
									<div class="invalid-feedback">
										<?php echo form_error('kd_brg') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="nm_brg">Nama Produk*</label>
									<input class="form-control <?php echo form_error('nm_brg') ? 'is-invalid':'' ?>"
									type="text" name="nm_brg" placeholder="Produk Nama" value="<?php echo $produk->nm_brg?>" />
									<div class="invalid-feedback">
										<?php echo form_error('nm_brg') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="satuan">Satuan*</label>
									<input class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
									type="text" name="satuan" min="0" placeholder="Satuan " value="<?php echo $produk->satuan?>" />
									<div class="invalid-feedback">
										<?php echo form_error('satuan') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="harga">Harga*</label>
									<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
									type="number" name="harga" min="0" placeholder="Harga " value="<?php echo $produk->harga?>" />
									<div class="invalid-feedback">
										<?php echo form_error('satuan') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="harga_beli">Harga Beli*</label>
									<input class="form-control <?php echo form_error('harga_beli') ? 'is-invalid':'' ?>"
									type="number" name="harga_beli" min="0" placeholder="Harga Beli" value="<?php echo $produk->harga_beli?>" />
									<div class="invalid-feedback">
										<?php echo form_error('satuan') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="stok">Stok*</label>
									<input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
									type="number" name="stok" min="0" placeholder="Stok " value="<?php echo $produk->stok?>" />
									<div class="invalid-feedback">
										<?php echo form_error('satuan') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="stok_min">Stok Minimal*</label>
									<input class="form-control <?php echo form_error('stok_min') ? 'is-invalid':'' ?>"
									type="number" name="stok_min" min="0" placeholder="Stok Minimal " value="<?php echo $produk->stok_min?>"/>
									<div class="invalid-feedback">
										<?php echo form_error('satuan') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="gambar">Photo</label>
									<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
									type="file" name="gambar" />
									<input type="hidden" name="old_gambar" value="<?php echo $produk->gambar ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('gambar') ?>
									</div>
								</div>

								<div class="form-group text-left">
									<label for="deskripsi">Description*</label>
									<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
										name="deskripsi" placeholder="Produk Deskripsi..."><?php echo $produk->deskripsi ?></textarea>
									<div class="invalid-feedback">
										<?php echo form_error('deskripsi') ?>
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

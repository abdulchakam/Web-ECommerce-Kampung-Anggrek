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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Konsumen</h1>
            
          </div>


					<!-- TABLE CONTENT -->
					<div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-primary">
								
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
											<th>Profile</th>
											<th>Kode</th>
											<th>Nama Konsumen</th>
											<th>Alamat Konsumen</th>
											<th>Kota dan Kode Pos</th>
											<th>Ho Hp</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
											<th>Profile</th>
											<th>Kode</th>
											<th>Nama Konsumen</th>
											<th>Alamat Konsumen</th>
											<th>Kota dan Kode Pos</th>
											<th>Ho Hp</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($konsumens as $konsumen): ?>
											<tr>
												<td width="100">
													<div class="text-center">
														<img src="<?php echo base_url('upload/user/'.$konsumen->foto_kons) ?>" width="50" />
													</div>
												</td>
												<td width="100">
													<?php echo $konsumen->kd_kons ?>
												</td>
												<td width="200">
													<?php echo $konsumen->nm_kons ?>
												</td>
												<td width="300">
													<?php echo $konsumen->alm_kons ?>
												</td>
												<td width="200">
													<?php echo $konsumen->kota_kons ?>,
													<?php echo $konsumen->kd_pos ?>
												</td>
												<td width="150">
													<?php echo $konsumen->phone ?>
												</td>
											</tr>
										<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
					<!--END TABLE CONTENT  -->


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
	<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>	
</body>

</html>

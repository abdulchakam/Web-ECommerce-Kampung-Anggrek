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
            <h1 class="h3 mb-0 text-gray-800">Data User Admin</h1>
            
          </div>


					<!-- TABLE CONTENT -->
					<div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-primary">
								<a href="<?php echo site_url('admin/user/add') ?>" class="text-gray-100"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
											<th>Profile</th>
											<th>Id User</th>
											<th>Username</th>
											<th>Email</th>
											<th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
										<th>Profile</th>
											<th>Id User</th>
											<th>Username</th>
											<th>Email</th>
											<th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($users as $user): ?>
											<tr>
												<td width="100">
													<div class="text-center">
														<img src="<?php echo base_url('upload/user/'.$user->foto) ?>" width="50" />
													</div>
												</td>
												<td width="200">
													<?php echo $user->id ?>
												</td>
												<td width="200">
													<?php echo $user->username ?>
												</td>
												<td width="200">
													<?php echo $user->email ?>
												</td>
												<td width="120" class="text-center">
													<a href="<?php echo site_url('admin/user/edit/'.$user->id) ?>"
														class="btn btn-outline-primary btn-sm fas fa-edit"></a> &nbsp;
													<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$user->id) ?>')"
														href="#!" class="btn btn-outline-danger btn-sm fas fa-trash-alt"></a>
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

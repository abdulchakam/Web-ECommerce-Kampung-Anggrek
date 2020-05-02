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
						<h1 class="h3 mb-0 text-gray-800">Data Invoices</h1>
						
            <a href="<?php echo site_url('admin/invoices/cetak_invoices') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Invoices</a>
          </div>


					<!-- TABLE CONTENT -->
					<div class="card">
						<h5 class="card-header">Invoices</h5>
						<div class="card-body">
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-12">
								
									<table id="myTable" 
													class="table table-striped table-bordered table-hover table-sm text-center">
										<thead>
											<tr class="bg-primary text-gray-100">
												<th>Invoice ID</th>
												<th>Nama Konsumen</th>
												<th>Date</th>
												<th>Due Date</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($data_invoices as $invoice) : ?>
											<tr>
												<td><?=$invoice->id?></td>
												<td><?=$invoice->nm_kons?></td>
												<td><?=$invoice->date?></td>
												<td><?=$invoice->due_date?></td>
												<td><span class="badge badge-danger"> <?=$invoice->status?></td> </span>
												<td>
													<?=anchor(	'admin/invoices/detail/' . $invoice->id,'Details',
																			['class'=>'btn btn-default btn-sm btn-outline-primary'])
													?> 
																			</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="col-md-1"></div>
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

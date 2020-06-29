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
            
          </div>


					<!-- TABLE CONTENT -->
					<div class="card">
					<div class="card-header">
						<div class="row justify-content-between">
							<div class="col-md-4">
								<h5>Detail Invoices</h5>
							</div>
							<div class="col-md-4">
								<?=anchor('admin/invoices/cetak_nota/'.$invoice->id,'Cetak PDF',
									['class'=>'btn btn-default btn-sm btn-danger float-right']);
								?>
							</div>
						</div>
						
						
					</div>
						<div class="card-body">
							<h5 class="card-title">Items Ordered in Invoice #<?=$invoice->id?></h5>
							
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-12">
									<table id="myTable" 
												class="table table-striped table-bordered table-hover table-sm text-table">
										<thead>
											<tr class="bg-primary text-gray-100">
												<th>ID Produk</th>
												<th>Nama Produk</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$total = 0;
												foreach($orders as $order) : 
												$subtotal = $order->quantity * $order->harga;
												$total += $subtotal;
											?>
											<tr>
												<td><?=$order->kd_brg?></td>
												<td><?=$order->nm_brg?></td>
												<td><?=$order->quantity?></td>
												<td><?php echo 'Rp. ' .number_format($order->harga);?></td>
												<td><?php echo 'Rp. ' .number_format($subtotal); ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot class="table-warning">
											<tr>
												<td colspan="4" align="center">Total</td>
												<td><?php echo 'Rp. ' .number_format($total); ?></td>
											</tr>
										</tfoot>
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

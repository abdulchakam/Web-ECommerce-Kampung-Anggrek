<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/_partials/head.php'); ?>
<body>		
<div class="text-center my-3">
	<h3>Laporan Invoices Kampung Anggrek</h3> 
</div>
									<table id="myTable" 
													class="table table-striped table-bordered table-hover table-sm text-center">
										<thead>
											<tr class="bg-primary text-gray-100">
												<th>Invoice ID</th>
												<th>Nama Konsumen</th>
												<th>Date</th>
												<th>Due Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($invoices as $invoice) : ?>
											<tr>
												<td><?=$invoice->id?></td>
												<td><?=$invoice->nm_kons?></td>
												<td><?=$invoice->date?></td>
												<td><?=$invoice->due_date?></td>
												<td><span class="badge badge-danger"> <?=$invoice->status?></td> </span>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
</body>
</html>

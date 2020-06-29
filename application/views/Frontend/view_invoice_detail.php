<!DOCTYPE html>
<html lang="en">
<head>
		<?php $this->load->view('Frontend/_Partials/head.php'); ?>
</head>
<body>

<!-- Content Wrapper -->
<div id="content-wrapper landingpage" class="d-flex flex-column">
  <!-- Main Content -->
    <div id="content">
		<?php $this->load->view('Frontend/_Partials/navbar2.php'); ?>
	
	<br>
	<br>
	<br>
	<br>

	<div class="container">
	<h5  class="font-weight-bold my-3">Detail History Order</h5>
	<?=anchor('order/cetak_nota/'.$invoice->id,'Cetak Nota',['class'=>'btn btn-default btn-sm btn-info my-3 float-right']);
								?>
		<table id="myTable" class="table table-striped table-sm table-hover">      
			<thead>       
				<tr>          
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
					$total += $subtotal; ?>     
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
					<td colspan="4" align="center"><b>Total</b> </td>
					<td><?php echo 'Rp. ' .number_format($total); ?></td>
				</tr>
			</tfoot>   
	</table>
	</div>
</div>
<?php $this->load->view('Frontend/_Partials/modal.php'); ?>
</body>
</html>

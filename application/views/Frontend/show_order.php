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
	<h5  class="font-weight-bold my-3">History Order</h5>
		<table id="myTable" class="table table-striped table-sm table-hover">      
			<thead>       
				<tr>          
					<th>Invoice ID</th>                             
					<th>Due Date</th>                             
					<th>Pembelian</th>
					<th>Alamat</th>                                                                                     
					<th>Ongkir</th>                             
					<th>Total Biaya</th>  
					<th>Bukti Bayar</th>  
					<th>Status</th>
					<th>Aksi</th>       
				</tr>      
			</thead>      
			<tbody>    
			
				<?php 
					if( !empty($invoices) ) {
					foreach($invoices as $invoice) : ?>     
				<tr>      
					<td><?=$invoice->id?></td>      
					<td><?=$invoice->due_date?></td>      
					<td><?=$invoice->pembelian?></td>      
					<td><?=$invoice->alm_tujuan?></td>           
					<td><?=$invoice->ongkir?></td>      
					<td><?=$invoice->total_biaya?></td>      
					<td><img src="<?php echo base_url('upload/bukti/'.$invoice->image) ?>"height="50" alt=""></td>      
					<td>
						<?php if($invoice->status=='unpaid'){ ?>
							<span class="badge badge-warning badge-counter p-2"><?=$invoice->status?></span>
						<?php } else { ?>
							<span class="badge badge-success badge-counter p-2"><?=$invoice->status?></span>
						<?php } ?>
					</td>        
					<td><?=anchor('order/detail_orders/'.$invoice->id,'Details',['class'=>'btn btn-info btn-sm']) ?>      
							<?php if($invoice->status=='unpaid'){ ?>
									<?=anchor( 'order/update_bayar/' . $invoice->id,    'Pay Now',['class'=>'btn btn-success btn-sm'])   ?>
									<?php } else { ?>
										<?=anchor('order/my_orders', 'Pay Now',   ['class'=>'btn btn-danger btn-sm disabled'])   ?> 
									<?php } ?>
					</td>        
				</tr>       
				<?php endforeach; }else{ ?>      
				<h3>Belum Ada History</h3> <br>
				<?php } ?>
			</tbody>     
	</table>
	</div>
</div>
</body>
</html>


	<?php  $id    = $invoice->id;   
		if($this->input->post('is_submitted')){  
			$date   = set_value('date');  
			$due_date  = set_value('due_date');  
			$status   = set_value('status'); 
		} else {  
			$date   = $invoice->date;  
			$due_date  = $invoice->due_date;  
			$status   = $invoice->status; 
		}
	?>

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

	<div class="container-fluid">
	<div class="row my-3 justify-content-md-center">
  <div class="col-sm-6">
	<div class="card-form" >
  <div class="card-body">
		<h3 class="text-center mt-2">Bayar Belanja</h3>

      <div class="modal-body">
				<div class="row justify-content-md-center">
				<div class="col-12">
				<div>
					<?= validation_errors() ?>
				</div>    
				<?= form_open_multipart('order/update_bayar/' . $id, ['class'=>'form-horizontal']) ?>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">ID </label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="id" placeholder="Nama"value="<?php echo $id; ?>" disabled	>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-10 control-label">Status</label>
							<div class="col-sm-12">
								<input type="text" class="form-style col-12" name="status" placeholder="Status" value="<?php echo $status; ?>" readonly>
							</div>
						</div>
					</div>
				</div>

					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-10 control-label">Date </label>
								<div class="col-sm-12">
									<input type="text" class="form-style col-12" name="date" placeholder="Date " value="<?php echo $date; ?>" readonly	>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-10 control-label">Due Date</label>
								<div class="col-sm-12">
									<input type="text" class="form-style col-12" name="due_date" placeholder="Due Date" value="<?php echo $due_date; ?>" readonly	>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
							<label class="col-sm-10 control-label">Bukti Bayar</label>
									<div class="col-sm-12"> 
										<input type="file" class="form-control" name="userfile" >   
									</div> 
					</div>

					<div class="col-12">
					<div class="form-group mt-5 float-right">
						<div class="col-sm-10">
						<button type="submit" class="btn btn-info px-5"> Save </button>   
					</div>
					</div>
					<?= form_close() ?> 
		</div>
		</div>
		</div>
		</div>
		
	</div>
</div>
</body>
</html>

	<!-- Logout Modal-->
  <div class="modal fade" id="logoutCusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" Jika Anda Yakin Ingin Keluar </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="<?php echo site_url('user/logout') ?>">Keluar</a>
        </div>
      </div>
    </div>
	</div>
	
	<?php 
		foreach ($this->cart->contents() as $items){
	?>
	<!-- Modal Hapus Barang -->
	<div id="modalHapusBarang" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="text-center text-grey-700">Hapus Barang?</h4>
					<p class="text-muted text-center my-3">
						Barang ini akan dihapus dari keranjang anda!
					</p>
					<div class="text-center mt-4">
						<button type="button" class="btn btn-outline-info btn-sm" data-dismiss="modal">Kembali</button>
						<a href="<?php echo site_url(); ?>/produk/hapus_cart/<?php echo $items['rowid']; ?>" class="btn btn-info btn-sm">Hapus Barang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if($this->session->userdata('nm_kons')) { ?>
	<!-- Modal Order Barang -->
	<div id="modalCheckout" class="modal fade modal-checkout" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="text-center text-info">Data Penerima</h4>
					<div class="container-fluid">
					<div class="row">
							<div class="col-md-10 mb-2 mt-3">
								<h6 class="text-data text-gray-500">Nama Konsumen :</h6>
								<h5 class="text-data2 text-gray-600"><?php echo $this->session->userdata('nm_kons')?></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 mb-2">
								<h6 class="text-data  text-gray-500">Alamat Konsumen : </h6>
								<h5 class="text-data2 text-gray-600"><?php echo $this->session->userdata('alm_kons')?></h6>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 mb-2">
								<div class="row">
									<div class="col-md-6">
										<h6 class="text-data text-gray-500">Kota : </h6>
										<h5 class="text-data2 text-gray-600"><?php echo $this->session->userdata('kota_kons')?></h6>
									</div>
									<div class="col-md-4">
										<h6 class="text-data text-gray-500">Kode Pos : </h6>
										<h5 class="text-data2 text-gray-600"><?php echo $this->session->userdata('kd_pos')?></h6>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 mb-2">
								<h6 class="text-data text-gray-500">No Hp : </h6>
								<h5 class="text-data2 text-gray-600"><?php echo $this->session->userdata('phone')?></h6>
							</div>
						</div>

					</div>
					<div class="text-right mt-4 my-3 mx-2">
						<button type="button" class="btn btn-outline-info btn-sm mr-3" data-dismiss="modal">Kembali</button> 
						<a href="<?php echo site_url('order') ?>" class="btn btn-info btn-sm btn-beli">Beli Barang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } else { ?>

<div id="modalCheckout" class="modal fade modal-checkout" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="text-center text-danger">PERINGATAN</h4>
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 my-3">
								<div class="text-center">
									Kamu Belum Login, Login Dulu Yuk!
								</div>
							</div>
				</div>
				<div class="row">
								<div class="col-12 mt-5 mb-3">
									<div class="text-center">
										<button type="button" class="btn btn-outline-info btn-sm mr-3" data-dismiss="modal">Gah</button> 
										<a href="<?php echo site_url('user') ?>" class="btn btn-info btn-sm btn-info">Hayuk</a>
									</div>
								</div>
							</div>
			</div>
		</div>
	</div>
	<?php } ?>

<!-- Modal konfirmasi hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title text-gray-100" id="exampleModalLabel">Anda Akan Menghapusnya?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang sudah dihapus tidak akan bisa dikembalikan!</div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger btn-sm" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>


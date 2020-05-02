<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	$this->load->model('produk_model');
	}

	public function index()
	{
		$data["produks"] = $this->produk_model->getAll();
		$this->load->view('Frontend/index', $data);
	}

	
	public function detail($id = NULL)
	{
		$detail = $this->produk_model->getById($id);
		$data['detail'] = $detail;
		$this->load->view('Frontend/detail_produk', $data);
	}

	public function add_to_cart($kd_brg)
	{
		$qty = $this->input->post('qty');
		$produk = $this->produk_model->find($kd_brg);
		$data = array(
							'id'      => $produk->kd_brg,
							'qty'     => $qty,
							'price'   => $produk->harga,
							'name'    => $produk->nm_brg,
							'images'  => $produk->gambar
					);

		$this->cart->insert($data);
		redirect(base_url());
	}
	
	public function cart(){
		$this->load->view('Frontend/cart');
	}
	
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}

	function hapus_cart(){
		$data =  array(
			'rowid' => $this->uri->segment(3),
			'qty' => 0,
		);
		$this->cart->update($data);
		$this->load->view('Frontend/cart');
	}



	public function hasil()
	{
		$data2['cari'] = $this->produk_model->cariProduk();
		$this->load->view('Frontend/search', $data2);
		if ($data2 == true) {
			$this->session->set_flashdata('success', 'Hasil Pencarian');
		}
	}

}


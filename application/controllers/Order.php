<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nm_kons'))
		{
			redirect('user');
		}
		$this->load->model('order_model');
	}
	
	public function index()
	{
		$is_processed = $this->order_model->process();
		if($is_processed){
			$this->session->set_flashdata('success','Barang Sudah Berhasil dipesan');
			$this->cart->destroy();
			redirect('produk/cart');
		} else {
			$this->session->set_flashdata('error','Failed to processed your order, please try again!');
			redirect('produk/cart');
		}
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoices extends CI_Controller {
	public function __construct(){
		parent::__construct();
	
		
		//load model -> model_products
		$this->load->model('order_model');
	}
	
	public function index()
	{
		$data['data_invoices'] = $this->order_model->all();
		$this->load->view('admin/invoices/lihat_invoices', $data);
	}

    public function detail($invoice_id)
    {
        $data['invoice'] = $this->order_model->get_invoice_by_id($invoice_id);
        $data['orders']  = $this->order_model->get_orders_by_invoice($invoice_id);
		$this->load->view('admin/invoices/detail_invoices', $data);
		}
		
		function cetak_invoices()
		{
			$data['invoices'] = $this->order_model->all();
			$this->load->library('pdf');
			$this->pdf->setPaper('A4','potrait');
			$this->pdf->filename = "Laporan_Invoices".date('m');
			$this->pdf->load_view('cetak/Laporan',$data);
		}
}

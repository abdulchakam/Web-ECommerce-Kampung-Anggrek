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
		$this->load->library(array('form_validation'));
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

	public function my_orders(){
	{    
			$data['invoices'] = $this->order_model->get_invoice_by_user($this->session->userdata('kd_kons'));   
			$this->load->view('Frontend/show_order', $data);     }
	}

	public function detail_orders($invoice_id){
		$data['invoice'] = $this->order_model->get_invoice_by_id($invoice_id);
		$data['orders'] = $this->order_model->get_orders_by_invoice($invoice_id);

		$this->load->view('Frontend/view_invoice_detail', $data);
	}


	public function update_bayar($invoice_id){
		//$this->form_validation->set_rules('id', 'Invoice Id', 'required'); 
		$this->form_validation->set_rules('date', 'Date', 'required'); 
		$this->form_validation->set_rules('due_date', 'Due Date', 'required');   
		$this->form_validation->set_rules('status', 'Status', 'required');
	
		if ($this->form_validation->run() == FALSE)   {  
			$data['invoice'] = $this->order_model->get_invoice_by_id($invoice_id);  
			$this->load->view('Frontend/bayar', $data);  
		} else { 
	
			if($_FILES['userfile']['name'] != ''){ 
				//form submit dengan gambar diisi 
				//load uploading file library   
				$config['upload_path'] = './upload/bukti/';  
				$config['allowed_types'] = 'jpg|png';   
				$config['max_size'] = '300'; //KB   
				$config['max_width']  = '2000'; //pixels   
				$config['max_height']  = '2000'; //pixels   
				$this->load->library('upload', $config); 

				if ( ! $this->upload->do_upload())   {   
					$data['invoice'] = $this->order_model->get_invoice_by_id($invoice_id);   
					$this->load->view('Frontend/bayar', $data);   
				} else {    
					$gambar = $this->upload->data();    
					$status="paid";    
					$data_invoice = array(    
						'status' => $status,    
						'image' => $gambar['file_name']    
					);  
					$this->order_model->update($invoice_id, $data_invoice); 

					redirect('order/my_orders');  
				}
			} else {  //form submit dengan gambar dikosongkan  
				$data_invoice = array(  
					'image' => $gambar['default.jpg']     
				);  $this->order_model->update($invoice_id, $data_invoice);  
				redirect('order/my_orders');   
			} 
		}
	}

	function cetak_nota($invoice_id){
		$this->load->library('pdf');

		$this->load->model('member_model');
		$this->load->model('shipping_model');
		$data_beli = $this->order_model->get_invoice_by_id($invoice_id);
		$data2 = $this->order_model->get_orders_by_invoice($invoice_id);
		$konsumen = $this->member_model->getAll();

		$pdf = new FPDF('P', 'mm','Letter');
		$pdf->AddPage();
		$image="assets/images/logo.png";
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), 
								$pdf->GetY(), 33.78), 0, 0, 'L', false );
		$pdf->Cell(0,4,'',0,1,'C');
		$pdf->Cell(0,8,'Nota Pembelian Kampung Anggrek',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,5,'Jalan Hos Cokroaminoto Gg.22 No.11 Kuripan Kertoharjo',0,1,'C');
		$pdf->Cell(0,5,'Kota Pekalongan',0,1,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(10,7,'',0,1);


		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(30,6,'No Nota',0,0,'L');
		$pdf->Cell(69,6,$invoice_id,0,0,'L');
		$pdf->Cell(89,6,date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),0,1,'R');		
		$pdf->Cell(10,3,'',0,1);
					

		$pdf->Cell(8,6,'No',1,0,'C');
		$pdf->Cell(100,6,'Nama Barang',1,0,'C');
		$pdf->Cell(35,6,'Harga',1,0,'R');
		$pdf->Cell(20,6,'Qty',1,0,'R');
		$pdf->Cell(35,6,'SubTotal',1,1,'R');
		$pdf->SetFont('Arial','',10);

		$no=0;$subtot=0;$tot=0;
		foreach ($data2 as $data) :
			$no++;
			$pdf->Cell(8,6,$no,1,0);
			$pdf->Cell(100,6,$data->nm_brg,1,0);
			$pdf->Cell(35,6,"Rp ".number_format($data->harga, 0, ".", "."),1,0,'R');
			$pdf->Cell(20,6,$data->quantity,1,0,'R');
			$pdf->Cell(35,6,"Rp ".number_format($data->harga*$data->quantity, 0, ".","."),1,1,'R');
		endforeach;


		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(163,6,"Total Pembelian",1,0,'R');
		$pdf->Cell(35,6,"Rp " .number_format($data_beli->pembelian, 0, ".", "."),1,1,'R');
		$pdf->Cell(163,6,"Biaya Pengiriman",0,0,'R');
		$pdf->Cell(35,6,"Rp ".number_format($data_beli->ongkir, 0, ".", "."),0,1,'R');
		$pdf->Cell(163,6,"Total Biaya",0,0,'R');
		$pdf->Cell(35,6,"Rp ".number_format($data_beli->total_biaya, 0, ".", "."),0,1,'R');
		$pdf->Cell(35,20,"",0,1,'R');

		$pdf->Output();
	}


}


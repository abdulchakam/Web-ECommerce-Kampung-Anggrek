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
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), 
									$pdf->GetY(), 33.78), 0, 0, 'L', false );
			$pdf->Cell(0,4,'',0,1,'C');
			$pdf->Cell(0,15,'Nota Pembelian',0,1,'C');
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
				$pdf->Cell(35,6,"Rp".number_format($data->harga, 0, ".", "."),1,0,'R');
				$pdf->Cell(20,6,$data->quantity,1,0,'R');
				$pdf->Cell(35,6,"Rp".number_format($data->harga*$data->quantity, 0, ".","."),1,1,'R');
			endforeach;


			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(163,6,"Total Pembelian",1,0,'R');
			$pdf->Cell(35,6,"Rp ".number_format($data_beli->pembelian, 0, ".", "."),1,1,'R');
			$pdf->Cell(163,6,"Biaya Pengiriman",0,0,'R');
			$pdf->Cell(35,6,"Rp ".number_format($data_beli->ongkir, 0, ".", "."),0,1,'R');
			$pdf->Cell(163,6,"Total Biaya",0,0,'R');
			$pdf->Cell(35,6,"Rp ".number_format($data_beli->total_biaya, 0, ".", "."),0,1,'R');
			$pdf->Cell(35,20,"",0,1,'R');

			$pdf->Output();
		}
}

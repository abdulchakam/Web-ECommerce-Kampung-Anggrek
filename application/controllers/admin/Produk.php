<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	if(!$this->session->userdata('username'))
	{
		redirect('admin/login');
	}
	$this->load->model('user_model');
	$this->load->model("produk_model");
	$this->load->library(array('table'));
	$this->load->library(array('form_validation'));

	}

	public function index()
	{
		$data["produks"] = $this->produk_model->getAll();
		$this->load->view("admin/produk/lihat_produk", $data);
	}

	public function add()
    	{
			$produk = $this->produk_model;
			$validation = $this->form_validation;
			$validation->set_rules($produk->rules());	
			if ($validation->run()) {
				$produk->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}
			$this->load->view("admin/produk/tambah_produk");
		}

		public function edit($id = null)
    	{
			if (!isset($id)) redirect('admin/produk/lihat_produk');
			$produk = $this->produk_model;
			$validation = $this->form_validation;
			$validation->set_rules($produk->rules());
			if ($validation->run()) {
				$produk->update();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('admin/produk');
			}
			$data["produk"] = $produk->getById($id);
			if (!$data["produk"]) show_404();
			
			$this->load->view("admin/produk/edit_produk", $data);
		}

		public function delete($id=null)
			{
			if (!isset($id)) show_404();
			
			if ($this->produk_model->delete($id)) {
				redirect(site_url('admin/produk'));
        }
		}
		

	public function export_excel(){
			// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			
			// Panggil class PHPExcel nya
			$excel = new PHPExcel();
			// Settingan awal fil excel
			$excel->getProperties()->setCreator('My Notes Code')
										->setLastModifiedBy('My Notes Code')
										->setTitle("Laporan Daftar Produk")
										->setSubject("Produk")
										->setDescription("Laporan Semua Produk")
										->setKeywords("Data Produk");
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
				'font' => array('bold' => true), // Set font nya jadi bold
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Data Produk"); // Set kolom A1 dengan tulisan "DATA SISWA"
			$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Produk"); // Set kolom B3 dengan tulisan "Kode Produk"
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Produk"); // Set kolom C3 dengan tulisan "Nama Produk"
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "Harga"); // Set kolom D3 dengan tulisan "JENIS Harga"
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "Stok"); // Set kolom E3 dengan tulisan "Stok"
			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			// Panggil function view yang ada di SiswaModel untuk menampilkan semua data produknya
			$produks = $this->produk_model->getAll();
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach($produks as $data){ // Lakukan looping pada variabel produk
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kd_brg);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nm_brg);
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->harga);
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->stok);
				
				// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				
				$no++; // Tambah 1 setiap kali looping
				$numrow++; // Tambah 1 setiap kali looping
			}
			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(8); // Set width kolom E
			
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("Laporan Data Produk");
			$excel->setActiveSheetIndex(0);
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Data Produk.xlsx"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
		}
}

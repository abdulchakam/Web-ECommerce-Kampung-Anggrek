<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Produk_model extends CI_Model{
	
	//Variabel $_tabel (Nama Tabel di database)
	private $_tabel = "barang";

	//Variabel untuk masing-masing field atau kolom
	public $kd_brg;
	public $nm_brg;
	public $satuan;
	public $harga;
	public $harga_beli;
	public $stok;
	public $stok_min;
	public $deskripsi;
	public $gambar="default.jpg";


	//Function untuk memvalidasi Form
	public function rules(){
		return[
			['field' => 'nm_brg',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'satuan',
			'label' => 'Satuan',
			'rules' => 'required'],

			['field' => 'harga',
			'label' => 'Harga',
			'rules' => 'numeric'],

			['field' => 'harga_beli',
			'label' => 'Harga_Beli',
			'rules' => 'numeric'],

			['field' => 'stok',
			'label' => 'Stok',
			'rules' => 'numeric'],
			
			['field' => 'stok_min',
			'label' => 'Stok_Min',
			'rules' => 'numeric'],

			['field' => 'deskripsi',
			'label' => 'deskripsi',
			'rules' => 'required']
		];
	}

	//Function untuk menampilkan semua data yang ada di tabel
	public function getAll(){
		return $this->db->get($this->_tabel)->result();
	}

		//Function untuk menampilkan produk terlaris
		public function getBestSell(){
			$this->db->select('barang.kd_brg, barang.nm_brg, barang.harga, barang.deskripsi, barang.gambar, SUM(orders.quantity) AS qty');
			$this->db->from('barang');
			$this->db->join('orders', 'barang.kd_brg=orders.kd_brg');
			$this->db->group_by('kd_brg');
			$this->db->order_by('qty','desc');
			$query = $this->db->get();
			return $query->result();
		}


	//Function untuk mengambil data berdasarkan id (kd_brg)
	public function getById($id)
    {
      return $this->db->get_where($this->_tabel, ["kd_brg" => $id])->row();
    }

	//Function untuk menyimpan data yang diinput dari form
	public function save(){
		$post= $this->input->post();
		$this->kd_brg = $this->kode();
		$this->nm_brg = $post['nm_brg'];
		$this->satuan = $post['satuan'];
		$this->harga = $post['harga'];
		$this->harga_beli = $post['harga_beli'];
		$this->stok = $post['stok'];
		$this->stok_min = $post['stok_min'];
		$this->deskripsi = $post['deskripsi'];
		$this->gambar = $this->_uploadImage();
		return $this->db->insert($this->_tabel, $this);
	}

	//Function untuk mengupdate atau mengedit data
	public function update(){
		$post= $this->input->post();
		$this->kd_brg = $post['kd_brg'];
		$this->nm_brg = $post['nm_brg'];
		$this->satuan = $post['satuan'];
		$this->harga = $post['harga'];
		$this->harga_beli = $post['harga_beli'];
		$this->stok = $post['stok'];
		$this->stok_min = $post['stok_min'];
		$this->deskripsi = $post['deskripsi'];
		if (!empty($_FILES["gambar"]["name"])) {
			$this->gambar = $this->_uploadImage();
		} else {
			$this->gambar = $post["old_gambar"];
		}
		return $this->db->update($this->_tabel, $this, array('kd_brg' => $post['kd_brg']));
	}

	//Function untuk menghapus data 
	public function delete($id){
		$this->_deleteImage($id);
		return $this->db->delete($this->_tabel, array("kd_brg" => $id));
	}

	//function untuk proses upload gambar
	private function _uploadImage()
	{
			$config['upload_path']          = './upload/produk/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['file_name']            = "IMG_".$this->kd_brg;
			$config['overwrite']						= true;
			$config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar')) {
					return $this->upload->data("file_name");
			}
			return "default.jpg";
	}

	private function _deleteImage($id)
	{
			$product = $this->getById($id);
			if ($product->gambar != "default.jpg") {
				$filename = explode(".", $product->gambar)[0];
			return array_map('unlink', glob(FCPATH."upload/produk/$filename.*"));
			}
	}


	function get_all_produk(){
		$hasil = $this->db->get('barang');
		return $hasil->result();
	}
		

	public function cariProduk()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * FROM barang WHERE nm_brg like '%$cari%' ");
		return $data->result();
	}
	
	private function kode(){
		$this->db->select('RIGHT(barang.kd_brg,1) as kode_barang', FALSE);
		$this->db->order_by('kode_barang','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('barang');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
				$data = $query->row();      
				$kode = intval($data->kode_barang) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
		}
			$bln=date('m'); 
			$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			$kodetampil = "BRG"."7".$bln.$batas;  //format kode
			return $kodetampil;  
		}

		public function find($kd_brg){
			//Query mencari record berdasarkan ID-nya
			$hasil = $this->db->where('kd_brg', $kd_brg)
								->limit(1)
								->get('barang');
			if($hasil->num_rows() > 0){
				return $hasil->row();
			} else {
				return array();
			}
		}

		
}

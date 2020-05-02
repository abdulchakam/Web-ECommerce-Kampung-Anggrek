<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Member_model extends CI_Model{
	
	//Variabel $_tabel (Nama Tabel di database)
	private $_tabel = "konsumen";

	//Variabel untuk masing-masing field atau kolom
	public $kd_kons;
	public $nm_kons;
	public $alm_kons;
	public $kota_kons;
	public $kd_pos;
	public $phone;
	public $email;
	public $foto_kons="default.png";
	public $password;

	//Function untuk memvalidasi Form
	public function rules(){
		return[
			['field' => 'fnm_kons',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'falm_kons',
			'label' => 'Alamat',
			'rules' => 'required'],

			['field' => 'fkota_kons',
			'label' => 'Kota',
			'rules' => 'required'],

			['field' => 'fkd_pos',
			'label' => 'Kode Pos',
			'rules' => 'required'],

			['field' => 'fphone',
			'label' => 'No Hp',
			'rules' => 'required'],

			['field' => 'femail',
			'label' => 'Email',
			'rules' => 'required'],

			['field' => 'fpassword',
			'label' => 'Password',
			'rules' => 'required']
		];
	}


		//Function untuk menampilkan semua data yang ada di tabel
		public function getAll(){
			return $this->db->get($this->_tabel)->result();
		}

		//Function untuk mengambil data berdasarkan id (Kode Konsumen)
		public function get_member_by_id($id)
			{
				return $this->db->get_where($this->_tabel, ["kd_kons" => $id])->row();
			}

		//Function untuk menyimpan data yang diinput dari form
	public function save(){
		$post= $this->input->post();
		$this->kd_kons = $this->kode();
		$this->nm_kons = $post['fnm_kons'];
		$this->alm_kons = $post['falm_kons'];
		$this->kota_kons = $post['fkota_kons'];
		$this->kd_pos= $post['fkd_pos'];
		$this->phone = $post['fphone'];
		$this->email = $post['femail'];
		$this->password = md5($post['fpassword']);
		$this->foto_kons = $this->_uploadImage();
		return $this->db->insert($this->_tabel, $this);
	}


	//Function untuk mengupdate atau mengedit data
	public function update(){
		$post= $this->input->post();
		$this->kd_kons = $post['fkd_kons'];
		$this->nm_kons = $post['fnm_kons'];
		$this->alm_kons = $post['falm_kons'];
		$this->kota_kons = $post['fkota_kons'];
		$this->kd_pos= $post['fkd_pos'];
		$this->phone = $post['fphone'];
		$this->email = $post['femail'];

		if (!empty($post["fpassword"])) {
			$this->password = md5($post['fpassword']);
		} else {
			$this->password = $post["old_password"];
		}

		if (!empty($_FILES["foto"]["name"])) {
			$this->foto_kons = $this->_uploadImage();
		} else {
			$this->foto_kons = $post["old_image"];
		}
		return $this->db->update($this->_tabel, $this, array('kd_kons' => $post['fkd_kons']));
	}

		//Function untuk menghapus data 
		public function delete($id){
			$this->_deleteImage($id);
			return $this->db->delete($this->_tabel, array("kd_kons" => $id));
		}


			//function untuk proses upload gambar
			private function _uploadImage()
			{
					$config['upload_path']          = './upload/user/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['file_name']            = "IMG_".$this->kd_kons;
					$config['overwrite']						= true;
					$config['max_size']             = 1024; // 1MB
					// $config['max_width']            = 1024;
					// $config['max_height']           = 768;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('foto')) {
							return $this->upload->data("file_name");
					}
					return "default.png";
			}
		
			private function _deleteImage($id)
			{
					$user = $this->get_member_by_id($id);
					if ($user->foto_kons != "default.png") {
						$filename = explode(".", $user->foto_kons)[0];
					return array_map('unlink', glob(FCPATH."upload/user/$filename.*"));
					}
			}

		private function kode(){
			$this->db->select('RIGHT(konsumen.kd_kons,1) as id_customer', FALSE);
			$this->db->order_by('id_customer','DESC');    
			$this->db->limit(1);    
			$query = $this->db->get('konsumen');  //cek dulu apakah ada sudah ada kode di tabel.    
			if($query->num_rows() <> 0){      
				 //cek kode jika telah tersedia    
					$data = $query->row();      
					$kode = intval($data->id_customer) + 1; 
			}
			else{      
				 $kode = 1;  //cek jika kode belum terdapat pada table
			}
				$tgl=date('d'); 
				$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
				$kodetampil = "KONS".$tgl.$batas;  //format kode
				return $kodetampil;  
			}

			public function check_credential()
			{
				$email = $_POST["femail"];
				$password = md5($_POST["fpassword"]);
				
				$hasil = $this->db->where('email', $email)
									->where('password', $password)
									->limit(1)
									->get('konsumen');
				
				if($hasil->num_rows() > 0){
					return $hasil->row();
				} else {
					return array();
				}
			}
	}

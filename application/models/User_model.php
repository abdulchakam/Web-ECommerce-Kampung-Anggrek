<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model{
	
	//Variabel $_tabel (Nama Tabel di database)
	private $_tabel = "user_admin";

	//Variabel untuk masing-masing field atau kolom
	public $id;
	public $username;
	public $email;
	public $password;
	public $foto="default.png";

	//Function untuk memvalidasi Form
	public function rules(){
		return[
			['field' => 'fusername',
			'label' => 'Username',
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
	
		//Function untuk mengambil data berdasarkan id (id user)
		public function getById($id)
			{
				return $this->db->get_where($this->_tabel, ["id" => $id])->row();
			}

		//Function untuk menyimpan data yang diinput dari form
	public function save(){
		$post= $this->input->post();
		$this->id = $this->kode();
		$this->username = $post['fusername'];
		$this->email = $post['femail'];
		$this->password = md5($post['fpassword']);
		$this->foto = $this->_uploadImage();
		return $this->db->insert($this->_tabel, $this);
	}

	//Function untuk mengupdate atau mengedit data
	public function update(){
		$post= $this->input->post();
		$this->id = $post['fid'];
		$this->username = $post['fusername'];
		$this->email = $post['femail'];
		$this->password = md5($post['fpassword']);
		if (!empty($_FILES["foto"]["name"])) {
			$this->foto = $this->_uploadImage();
		} else {
			$this->foto = $post["old_image"];
		}
		return $this->db->update($this->_tabel, $this, array('id' => $post['fid']));
	}

	//Function untuk menghapus data 
	public function delete($id){
		$this->_deleteImage($id);
		return $this->db->delete($this->_tabel, array("id" => $id));
	}

		//function untuk proses upload gambar
		private function _uploadImage()
		{
				$config['upload_path']          = './upload/user/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['file_name']            = "IMG_".$this->id;
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
				$user = $this->getById($id);
				if ($user->foto != "default.png") {
					$filename = explode(".", $user->foto)[0];
				return array_map('unlink', glob(FCPATH."upload/user/$filename.*"));
				}
		}

		private function kode(){
			$this->db->select('RIGHT(user_admin.id,1) as id_user', FALSE);
			$this->db->order_by('id_user','DESC');    
			$this->db->limit(1);    
			$query = $this->db->get('user_admin');  //cek dulu apakah ada sudah ada kode di tabel.    
			if($query->num_rows() <> 0){      
				 //cek kode jika telah tersedia    
					$data = $query->row();      
					$kode = intval($data->id_user) + 1; 
			}
			else{      
				 $kode = 1;  //cek jika kode belum terdapat pada table
			}
				$tgl=date('d'); 
				$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
				$kodetampil = "ADM".$tgl.$batas;  //format kode
				return $kodetampil;  
			}

			public function check_credential()
			{
				$username = $_POST["fusername"];
				$password = md5($_POST["fpassword"]);
				
				$hasil = $this->db->where('username', $username)
									->where('password', $password)
									->limit(1)
									->get('user_admin');
				
				if($hasil->num_rows() > 0){
					return $hasil->row();
				} else {
					return array();
				}
			}
	}

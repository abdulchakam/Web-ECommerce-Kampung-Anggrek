<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model('member_model');
	}
	public function index(){

		$this->load->view("Frontend/form_register_member");
	}

	public function add()
    	{
			$register = $this->member_model;
		
				$register->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				$this->load->view('Frontend/form_register_member');
		}

		
	public function member(){
		$this->load->view('Frontend/form_register_member');
	}
	public function tambah(){
		$this->load->view('Frontend/form_login_customer');
	}

}


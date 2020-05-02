<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
			if(!$this->session->userdata('username'))
		{
			redirect('admin/login');
		}
		$this->load->model('user_model');
	}

public function index()
	{
		$this->load->view("admin/index");
	}
}

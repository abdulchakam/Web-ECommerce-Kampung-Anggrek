<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model('member_model');

	  // Load facebook oauth library 
		$this->load->library('facebook'); 

	}
 
	public function index()
	{
		$this->form_validation->set_rules('femail','Email','required');
		$this->form_validation->set_rules('fpassword','Password','required|alpha_numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			// $this->load->view('Frontend/form_login_member');
		} else {
			$this->load->model('member_model');
			$valid_user = $this->member_model->check_credential();
			
			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Email Atau Password Salah');
				redirect('user');
			} else {
				// if the username and password is a match
				$this->session->set_userdata('kd_kons', $valid_user->kd_kons);
				$this->session->set_userdata('nm_kons', $valid_user->nm_kons);
				$this->session->set_userdata('foto_kons', $valid_user->foto_kons);
				$this->session->set_userdata('alm_kons', $valid_user->alm_kons);
				$this->session->set_userdata('kota_kons', $valid_user->kota_kons);
				$this->session->set_userdata('kd_pos', $valid_user->kd_pos);
				$this->session->set_userdata('phone', $valid_user->phone);
				redirect(base_url());
			}
		}


		$userData = array(); 
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,name,email,picture'); 
 
						// Preparing data for database insertion 
						$userData['kd_kons'] = $this->member_model->kode();
            $userData['oauth_provider'] = 'facebook'; 
						$userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';
            $userData['nm_kons']    = ($fbUser['name'])?$fbUser['name']:'';
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['foto_kons']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            
            // Insert or update user data to the database 
            $userID = $this->member_model->checkUser($userData); 

            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 
                
                // Store the user profile info into session 
								$this->session->set_userdata('userData', $userData); 
								$this->session->set_userdata('nm_kons', $userData['nm_kons']);
								$this->session->set_userdata('kd_kons', $userData['kd_kons']);
								$this->session->set_userdata('foto_kons', $userData['foto_kons']);
								$this->session->set_userdata('oauth_provider', $userData['oauth_provider']);
								redirect(base_url());
            }else{ 
              $data['userData'] = array(); 
            } 
						
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        } 
         
        // // Load login/profile view 
				$this->load->view('Frontend/form_login_member',$data); 
				
	}

	public function logout() { 
		// Remove local Facebook session 
		$this->facebook->destroy_session(); 
		// Remove user data from session 
		$this->session->unset_userdata('userData'); 

		//Hapus Session untuk user yg login non facebook
		$this->session->unset_userdata(array(
			'kd_kons',
			'nm_kons',
			'foto_kons',
			'alm_kons',
			'kota_kons',
			'kd_pos',
			'phone'
		));
		$this->cart->destroy();

		redirect(base_url());
		} 

	public function logout_member()
	{
			$this->session->unset_userdata(array(
				'kd_kons',
				'nm_kons',
				'foto_kons',
				'alm_kons',
				'kota_kons',
				'kd_pos',
				'phone'
			));
			$this->cart->destroy();
		redirect(base_url());
	}

	public function detail_member($id)
	{
		$detail = $this->member_model->get_member_by_id($id);
		$data['detail'] = $detail;
		$this->load->view('Frontend/detail_member', $data);
	}

	public function edit_member($id = null)
	{
	if (!isset($id)) redirect('user/detail_member');
	$member = $this->member_model;
	$validation = $this->form_validation;
	$validation->set_rules($member->rules());
	if ($validation->run()) {
		$member->update();
		$this->session->set_flashdata('success', 'Berhasil diUpdate');
		// redirect('user/detail_member');
	}
	$data["detail"] = $member->get_member_by_id($id);
	if (!$data["detail"]) show_404();
	
	$this->load->view("Frontend/edit_member", $data);
}

	public function hapus_member($id=null)
	{
	if (!isset($id)) show_404();
	
	if ($this->member_model->delete($id)) {
		$this->logout_member();
		}
	}
}

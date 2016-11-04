<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_login extends CI_Controller {

	function __construct()
	{
	     parent::__construct();
	}

	public function index()
	{
		$this->load->helper(array('form'));
    $data['title'] = programname.version." - Login";
		$this->load->view('POS/authen/login', $data);
	}

	function verify()	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|callback_required_username');
		$this->form_validation->set_rules('password', 'Password', 'trim|callback_required_password|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
		 	//Field validation failed.&nbsp; User redirected to login page
		   $data['title'] = programname.version." - Login";
		   $this->load->view('POS/authen/login', $data);
		}
		else
		{
		  //Go to private area
			if ($this->session->userdata('sessstatus') == 1) {
				// status 1 = Admin Role
		  	redirect('pos_admin', 'refresh');
			}else if ($this->session->userdata('sessstatus') == 2 || $this->session->userdata('sessstatus') == 3) {
				// status 2 = Shop Manager or 3 = PC Role
				redirect('pos_main', 'refresh');
			}

		}
	}

	function signout()
	{
		$sess_array = array(
			'sessid' => '',
			'sessfirstname' => '',
			'sesslastname' => '',
			'sessshopid' => '',
			'sessstatus' => '',
			'sesscompany' => '',
			'sessposition' => '',
			'sessshopname' => '',
		);
		$this->session->unset_userdata($sess_array);
		session_destroy();

		$this->load->helper('cookie');
		redirect('pos_login', 'refresh');
	}

	function check_database($password) {
	//Field validation succeeded.&nbsp; Validate against database
			$username = $this->input->post('username');

			//query the database
			$this->load->model('users_model','',TRUE);
			$result = $this->users_model->check_username_password($username, $password);

			if($result AND  $username) {
				 $sess_array = array();
				 foreach($result as $row)
				 {
						$userid = $row->nggu_id;
						$sess_array = array(
							'sessid' => $row->nggu_id,
							'sessfirstname' => $row->nggu_firstname,
							'sesslastname' => $row->nggu_lastname,
							'sessshopid' => $row->nggu_shop_id,
							'sessstatus' => $row->nggu_status,
							'sesscompany' => $row->nggu_company,
							'sessposition' => $row->nggu_position,
							'sessshopname' => $row->posh_name,
						);

						$this->session->set_userdata($sess_array);

						// insert log into log_user_login table
						$log_array = array(
							'logl_nggu_id' => $row->nggu_id,
							'logl_ipaddress' => $this->input->ip_address(),
						);
						$this->users_model->insert_log_login($log_array);
						}
						/*
						$this->load->helper('cookie');
						if($remember=="1") {
						$cookie_array = array(
						    'name'   => 'itnerd_userid',
						    'value'  => $userid,
						    'expire' => '2147483647'

						);

						set_cookie($cookie_array);

				 		} */

				 return TRUE;
			}else if (!$username)	{
				$this->form_validation->set_message('check_database', '');
			        return FALSE;
			}else{
			 $this->form_validation->set_message('check_database', '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i><b>ไม่สามารถเข้าสู่ระบบได้ !</b></div>');
			 return false;
			}
	}

	function required_username() {
	    if( ! $this->input->post('username'))
	    {
	        $this->form_validation->set_message('required_username', '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b><i class="icon fa fa-ban"></i> กรุณาป้อน Username!</b></div>');
	        return FALSE;
	    }

	    return TRUE;
	}
	function required_password() {
	    if ($this->input->post('username') AND ! $this->input->post('password'))
	    {
	        $this->form_validation->set_message('required_password', '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b><i class="icon fa fa-ban"></i> กรุณาป้อน Password!</b></div>');
	        return FALSE;
	    }

	    return TRUE;
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
    }
	
	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['admin']=$this->AdminModel->get_admin();
		$this->load->view('admin/index',$data);
	}

	public function add()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->view('admin/add',$data);
	}

	public function edit($id)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['admin'] = $this->AdminModel->get_admin_detail($id);
		$this->load->view('admin/edit',$data);
	}


	public function store(){

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[4]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
			
			$validation_errors = $this->form_validation->error_array();
			$error_message = "";
			if ($validation_errors) {
			$error_message = "";
			foreach ($validation_errors as $field => $error) {
				$error_message .= "$field: $error";
			}
			$error_message .= "";
			}

			$this->session->set_flashdata('message', $error_message);
   			$this->session->set_flashdata('type', 'error');
			return $this->load->view('admin/add');
		}

		$password = $this->input->post('password');
		
		$data = array(
            'nama' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('username'),
            'role' => $this->input->post('role'),
			'password' => password_hash($password,PASSWORD_DEFAULT)
		);
		 $this->AdminModel->insert($data);
		 $affected_rows = $this->db->affected_rows();

		 // Save the data using the user model
		 if ($affected_rows) {
			// Registration successful, redirect to login page
			$this->session->set_flashdata('message', 'Data successfully inserted!');
   			$this->session->set_flashdata('type', 'success');
			redirect('admin');
		} else {
			// Registration failed, load the registration form again with an error message
			$this->session->set_flashdata('message_register_error', 'Registration failed, please try again.');
			redirect('admin/add');
		}
        

	}

	public function update($id){
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[4]');
		$this->form_validation->set_rules('password', 'password', 'trim|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|edit_unique[user.username.'.$id.']');
		$this->form_validation->set_message('is_unique_except', 'The username "%s" is already taken.');


		if ($this->form_validation->run() == FALSE) {
			
			$validation_errors = $this->form_validation->error_array();
			$error_message = "";
			if ($validation_errors) {
			$error_message = "";
			foreach ($validation_errors as $field => $error) {
				$error_message .= "$field: $error";
			}
			$error_message .= "";
			}

			$this->session->set_flashdata('message', $error_message);
   			$this->session->set_flashdata('type', 'error');
			redirect('admin/edit/'.$id);
		}

		if($password = $this->input->post('password')){
			$data = array(
				'nama' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role'),
				'password' => password_hash($password,PASSWORD_DEFAULT)
			);
		} else {
			$data = array(
				'nama' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role'),
			);
		}
		
		
		 $this->AdminModel->update($data,$id);
		 $affected_rows = $this->db->affected_rows();

		 // Save the data using the user model
		 if ($affected_rows) {
			// Registration successful, redirect to login page
			$this->session->set_flashdata('message', 'Data successfully Updated!');
   			$this->session->set_flashdata('type', 'success');
			redirect('admin/edit/'.$id);
		} else {
			// Registration failed, load the registration form again with an error message
			$this->session->set_flashdata('message_register_error', 'Registration failed, please try again.');
			redirect('admin/edit/'.$id);
		}

	}


}

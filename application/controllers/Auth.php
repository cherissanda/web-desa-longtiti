<?php

class Auth extends CI_Controller
{
	public function index()
	{
		show_404();
	}

	public function login(){
    $this->load->model('auth_model');
    $this->load->library('form_validation');
// bagian validasi 
    $rules = $this->auth_model->rules();
    $this->form_validation->set_rules($rules);

    if($this->form_validation->run() == FALSE){
        // Validation failed, show the login form with errors
        return $this->load->view('auth/login');
    }
// akhir kodingan validasi
    $username = $this->input->post('username');
    $password = $this->input->post('password');
// proses login pindah cek db
    if($this->auth_model->login($username, $password)){
        // Login successful, redirect to the home page
        redirect('/');
    } else {
        // Login failed, set flash data and show the login form again
        $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
        $this->load->view('auth/login');
    }
	}


	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}
}
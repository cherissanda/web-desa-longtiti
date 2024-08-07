<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('DataPendudukModel');
        $this->load->model('MasterDataModel');
        $this->load->helper(array('form', 'url'));
        $this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
    }

	public function index()
	{
        $data['current_user'] = $this->auth_model->current_user();
		$data['data_penduduk'] = $this->DataPendudukModel->get_kelahiran();
		$this->load->view('kelahiran/index',$data);
	}

	public function get_options() {
        // Fetch options from the model
        $options = $this->DataPendudukModel->get_penduduk();
        echo json_encode($options);
    }
}

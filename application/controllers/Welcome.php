<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct() {
        parent::__construct();
		$this->load->model('MasterDataModel');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');}
    }

	public function index(){
		$data['current_user'] = $this->auth_model->current_user();
		$penduduk = $this->MasterDataModel->get_penduduk();
		$pindah = $this->MasterDataModel->get_total_count('data_mutasi_penduduk');
		$lahir = $this->MasterDataModel->get_kelahiran_count();
		
		$data['penduduk'] = $penduduk;
		$data['pindah'] = $pindah;
		$data['lahir'] = $lahir;
		$this->load->view('welcome_message',$data);
	}
}

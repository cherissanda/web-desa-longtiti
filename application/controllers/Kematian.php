<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian extends CI_Controller {

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

	public function index(){
        $data['current_user'] = $this->auth_model->current_user();
		$data['data_penduduk'] = $this->DataPendudukModel->get_penduduk_meninggal();
		$data['nik'] = $this->DataPendudukModel->get_penduduk();
		$this->load->view('kematian/index',$data);
	}

	public function add(){
        $data['current_user'] = $this->auth_model->current_user();
		$nik = $this->input->post('nik');
        $data['penduduk'] = $this->DataPendudukModel->searchNIK($nik);
        $this->load->view('kematian/add',$data);
    }

    public function edit($id){
        $data['current_user'] = $this->auth_model->current_user();
        $data['penduduk'] = $this->DataPendudukModel->get($id);
        $this->load->view('kematian/add',$data);
    }


	public function detail($id){
        $data['current_user'] = $this->auth_model->current_user();
		$data['penduduk'] = $this->DataPendudukModel->get($id);
        $this->load->view('kematian/detail',$data);
    }

	public function update($id){
		// Initialize $file_name with the existing file name
            $file_name = $penduduk->surat_meninggal;

            // Check if a new file is uploaded
            if (!empty($_FILES['surat_meninggal']['name'])) {
                // Load upload library with configuration
                $config['upload_path'] = './images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
                $config['max_size'] = 2048; // 2MB
                $config['encrypt_name'] = TRUE; // To avoid file name conflicts

                $this->load->library('upload', $config);

                // Initialize upload library
                $this->upload->initialize($config);

                // File is uploaded, proceed with upload process
                if ($this->upload->do_upload('surat_meninggal')) {
                    // File upload success
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                } else {
                    // File upload failed
                    echo $this->upload->display_errors();
                    return; // Stop further execution
                }
            }

            // Prepare data to update
            $data = array(
                'tanggal_kematian' => $this->input->post('tanggal_kematian')
            );

            // If a new file is uploaded, update the 'surat_meninggal' field
            if (!empty($_FILES['surat_meninggal']['name'])) {
                $data['surat_meninggal'] = $file_name;
            }

            // Update the data
            $this->DataPendudukModel->update($id, $data);
            redirect('kematian/detail/'.$id);
                }


                public function get_options() {
                    // Fetch options from the model
                    $options = $this->DataPendudukModel->get_penduduk_meninggal();
                    echo json_encode($options);
                }
}

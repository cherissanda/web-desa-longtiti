<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {


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
		$data['data_penduduk'] = $this->DataPendudukModel->get_penduduk();
		$this->load->view('penduduk/index',$data);
	}

    public function add(){
        $data['current_user'] = $this->auth_model->current_user();
		$data['master_data'] = $this->MasterDataModel->get_all();
        $data['no_kk'] = $this->MasterDataModel->no_kk();
        $this->load->view('penduduk/add',$data);
    }

	public function store() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // To avoid file name conflicts

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

            if ($this->upload->do_upload('data_file')) {
                // File upload success
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
            } else {
                // File upload failed
                $file_name = NULL;
            }

           
        $data = array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'status_dalam_keluarga' => $this->input->post('status_dalam_keluarga'),
            'status_perkawinan' => $this->input->post('status_perkawinan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tanggal_kematian' => $this->input->post('tanggal_kematian'),
            'agama' => $this->input->post('agama'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kelurahan' => $this->input->post('kelurahan'),
            'file' => $file_name
        );
        $this->DataPendudukModel->insert($data);
		$this->session->set_flashdata('message', 'Data successfully inserted!');
   		$this->session->set_flashdata('type', 'success'); 
        redirect('penduduk');
    }

    public function detail($id){
        $data['current_user'] = $this->auth_model->current_user();
        $data['penduduk'] = $this->DataPendudukModel->get($id);
        $this->load->view('penduduk/detail',$data);

    }

    public function edit($id){
        $data['current_user'] = $this->auth_model->current_user();
        $data['penduduk'] = $this->DataPendudukModel->get($id);
        $data['master_data'] = $this->MasterDataModel->get_all();
        $this->load->view('penduduk/edit',$data);

    }

    public function update($id) {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // To avoid file name conflicts
    
        // Load upload library with configuration
        $this->load->library('upload', $config);
    
        // Initialize upload library
        $this->upload->initialize($config);
    
        // Check if file is uploaded successfully
        if ($this->upload->do_upload('file')) {
            // File upload success
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
        }
    
        // Prepare data to update
        $data = array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'status_dalam_keluarga' => $this->input->post('status_dalam_keluarga'),
            'status_perkawinan' => $this->input->post('status_perkawinan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tanggal_kematian' => $this->input->post('tanggal_kematian'),
            'agama' => $this->input->post('agama'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kelurahan' => $this->input->post('kelurahan'),
            'file' => $file_name
        );
    
        
        $this->DataPendudukModel->update($id,$data);
        $this->session->set_flashdata('message', 'Data successfully updated!');
   		$this->session->set_flashdata('type', 'success');
        redirect('penduduk/detail/'.$id);
    }


    public function delete($id) {
        $this->session->set_flashdata('message', 'Data successfully deleted!');
        $this->session->set_flashdata('type', 'success');  
        $this->DataPendudukModel->delete($id);
        redirect('penduduk');
    }


// select option
    public function get_options() {
        // Fetch options from the model
        $options = $this->DataPendudukModel->get_penduduk();
        echo json_encode($options);
    }
}

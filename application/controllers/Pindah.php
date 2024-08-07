<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('DataMutasiPendudukModel');
		$this->load->model('DataPendudukModel');
        $this->load->helper(array('form', 'url'));
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
    }

	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['data_penduduk'] = $this->DataMutasiPendudukModel->get_penduduk();
		$data['nik'] = $this->DataPendudukModel->get_penduduk();
		$this->load->view('pindah/index',$data);
	}

	public function add(){
		$data['current_user'] = $this->auth_model->current_user();
		$nik = $this->input->post('nik');
		$checkData = $this->DataMutasiPendudukModel->searchNIK($nik);
		if($checkData){
			$data['penduduk'] = $checkData;	
		} else {
			$data['penduduk'] = $this->DataPendudukModel->searchNIK($nik);
		}
        $this->load->view('pindah/add',$data);
    }

	public function edit($id){
		$data['current_user'] = $this->auth_model->current_user();
		$data['penduduk'] = $this->DataMutasiPendudukModel->get($id);
        $this->load->view('pindah/edit',$data);
    }

	public function store($id){
		$this->db->trans_start();
		$dataPenduduk = $this->DataPendudukModel->get($id);
			$data = array(
				'no_kk' => $dataPenduduk->no_kk,
				'nik' => $dataPenduduk->nik,
				'nama_lengkap' =>$dataPenduduk->nama_lengkap,
				'status_dalam_keluarga' => $dataPenduduk->status_dalam_keluarga,
				'status_perkawinan' => $dataPenduduk->status_perkawinan,
				'jenis_kelamin' => $dataPenduduk->jenis_kelamin,
				'tempat_lahir' => $dataPenduduk->tempat_lahir,
				'tanggal_lahir' => $dataPenduduk->tanggal_lahir,
				'agama' => $dataPenduduk->agama,
				'pendidikan' => $dataPenduduk->pendidikan,
				'pekerjaan' => $dataPenduduk->pekerjaan,
				'rt' => $dataPenduduk->rt,
				'rw' => $dataPenduduk->rw,
				'kelurahan_lama' => $dataPenduduk->kelurahan,
				'kelurahan_baru' => $this->input->post('kelurahan_baru'),
				'kota_baru' => $this->input->post('kota_baru'),
			);

			// Insert data
			$insert_result = $this->DataMutasiPendudukModel->insert($data);
			$affected_rows = $this->db->affected_rows();

			if ($affected_rows > 0) {
				// Print the last insert query for debugging
				echo "Insert query: " . $this->db->last_query();
		
				// Attempt to delete data
				$delete_result = $this->DataPendudukModel->delete($id); 
				$tes = $this->db->affected_rows();
				// Check if delete was successful
				if ($tes > 0 ) {
					// Print the last delete query for debugging
					echo "Delete query: " . $this->db->last_query();
		
					// Commit the transaction
					$this->db->trans_commit();
					// Set flashdata
					$this->session->set_flashdata('message', 'Data successfully added!');
					$this->session->set_flashdata('type', 'success'); 
					// Redirect
					redirect('pindah');
				} else {
					// Rollback the transaction if delete fails
					$this->db->trans_rollback();
					// Get the error message
					$error = $this->db->error();
					// Print error message if delete fails
					echo "Delete operation failed: " . $error['message'];
		
					// Debugging: Print the last query
					echo $this->db->last_query();
				}
			} else {
				// Rollback the transaction if insert fails
				$this->db->trans_rollback();
				// Get the error message
				$error = $this->db->error();
				// Print error message if insert fails
				echo "Insert operation failed: " . $error['message'];
		
				// Debugging: Print the last query
				echo $this->db->last_query();
			}	
			

	}

	public function update($id){
		$data = array(
			'kelurahan_baru' => $this->input->post('kelurahan_baru'),
			'kota_baru' => $this->input->post('kota_baru'),
		);
		$this->DataMutasiPendudukModel->update($id,$data);
		redirect('pindah');

	}

		public function detail($id){
		$data['current_user'] = $this->auth_model->current_user();
		$data['penduduk'] = $this->DataMutasiPendudukModel->get($id);
        $this->load->view('pindah/detail',$data);
			
		}

		public function get_options() {
			// Fetch options from the model
			$options = $this->DataMutasiPendudukModel->get_penduduk();
			echo json_encode($options);
		}

}

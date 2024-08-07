<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DataPendudukModel');
        $this->load->model('DataMutasiPendudukModel');
        $this->load->model('MasterDataModel');
		$this->load->model('DataSuratPendudukModel');
        $this->load->helper(array('form', 'url'));
		$this->load->helper('date');
        $this->load->helper('security');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
    }

	public function todayDate(){
		$today = date('Y-m-d'); // Get today's date
        $formatted_date = indonesian_date($today); // Format the dates
		return $formatted_date;
	}

	public function umur($birth_date){
		$birthDate = new DateTime($birth_date);
		$currentDate = new DateTime();
		$age = $currentDate->diff($birthDate)->y;
		return $age;
	}

	public function kepalaDesa(){
		$kepala_desa = $this->MasterDataModel->kepala_desa()->value;
		$kepala_desa_data = json_decode($kepala_desa);
		return $kepala_desa_data;
	}

	// untuk menu list surat semua status
	public function index(){
		$data['current_user'] = $this->auth_model->current_user();
		$data['data_surat'] = $this->DataSuratPendudukModel->get_surat();
		$this->load->view('surat/listSurat/index',$data);
	}

	// untuk create surat
    public function create(){
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->view('surat/create/index',$data);
	}

	// untuk approval surat

    public function approval(){
		$data['current_user'] = $this->auth_model->current_user();
		$data['data_surat'] = $this->DataSuratPendudukModel->get_surat_approval();
		$this->load->view('surat/approval/index',$data);
	}

	// halaman preview surat
	public function previewSurat(){
		$data['current_user'] = $this->auth_model->current_user();
		$jenis_surat = $this->input->post('jenis_surat');
		$nik = $this->input->post('nik');
		
		$data['kepala_desa'] = $this->kepalaDesa();
		
        $data['today_date'] = $this->todayDate();
		
		if($jenis_surat == 'domisili') {
			$data['penduduk'] = $this->DataPendudukModel->searchNIK($nik);
			$this->load->view('surat/surat_domisili/preview',$data);

		} elseif($jenis_surat == 'pindah') {
			$data['penduduk'] = $this->DataMutasiPendudukModel->searchNIK($nik);
			$this->load->view('surat/surat_pindah/preview',$data);

		} elseif($jenis_surat == 'meninggal') {
			$data['penduduk'] = $this->DataPendudukModel->searchNIK($nik);
			$this->load->view('surat/surat_meninggal/preview',$data);

		}elseif($jenis_surat == 'kelahiran'){
			$data['penduduk'] = $this->DataPendudukModel->searchNIK($nik);
			$data['keluarga'] = $this->DataPendudukModel->get_keluarga($data['penduduk']->no_kk);
			$this->load->view('surat/surat_kelahiran/preview_awal',$data);

		} else{
			echo "data tidak ditemukan";
		}

	}
    // halaman preview surat

	// halaman detail surat dan detail untuk approval
	public function detailSurat($id){
		$data['current_user'] = $this->auth_model->current_user();
		$formMode = $this->input->get('formMode', TRUE); 
		$data['kepala_desa'] = $this->kepalaDesa();
       
		$dataSurat = $this->DataSuratPendudukModel->get_detail_surat($id);
		$data_decode = json_decode($dataSurat->request);
		$data['penduduk'] = $data_decode;
		$data['dataSurat'] = $dataSurat;

		if($dataSurat->tanggal_approval) {
			$data['today_date'] = indonesian_date($dataSurat->tanggal_approval);
		} else {
			$data['today_date'] = $this->todayDate();
		}
		$data['formMode'] = $formMode;
		
		if($dataSurat->jenis_surat == '1') {
			$this->load->view('surat/surat_domisili/detail',$data);

		} elseif($dataSurat->jenis_surat == '2') {
			$this->load->view('surat/surat_pindah/detail',$data);

		} elseif($dataSurat->jenis_surat == '3') {
			$this->load->view('surat/surat_meninggal/detail',$data);

		}elseif($dataSurat->jenis_surat == '4'){
			$this->load->view('surat/surat_kelahiran/detail',$data);

		} else{
			echo "data tidak ditemukan";
		}

	}
    // halaman preview surat

	// store surat proses masukin ke db
	// surat kelahiran
	public function sukelPreview(){
		$data['current_user'] = $this->auth_model->current_user();
		$kepala_desa = $this->MasterDataModel->kepala_desa()->value;
		$kepala_desa_data = json_decode($kepala_desa);
		$data['kepala_desa'] = $kepala_desa_data;
		$data['today_date'] = $this->todayDate();

		$nik_ayah = $this->input->post('nik_ayah');
		$nik_ibu = $this->input->post('nik_ibu');
		$nik_anak = $this->input->post('nik_anak');

		$data_ayah = $this->DataPendudukModel->searchNIK($nik_ayah);
		$data_ibu = $this->DataPendudukModel->searchNIK($nik_ibu);
		$data_anak = $this->DataPendudukModel->searchNIK($nik_anak);


		$data_form = new stdClass();
		$data_form->nik_anak = $data_anak->nik;
		$data_form->nama_anak = $data_anak->nama_lengkap;
		$data_form->tanggal_lahir =$data_anak->tanggal_lahir;
		$data_form->tempat_lahir = $data_anak->tempat_lahir;
		$data_form->jenis_kelamin = $data_anak->jenis_kelamin;
		$data_form->nama_ibu = $data_ibu->nama_lengkap;
		$data_form->umur_ibu = $this->umur($data_ibu->tanggal_lahir);
		$data_form->pekerjaan_ibu = $data_ibu->pekerjaan;
		$data_form->alamat_ibu = $data_ibu->alamat;
		$data_form->nama_ayah = $data_ayah->nama_lengkap;
		$data_form->umur_ayah = $this->umur($data_ayah->tanggal_lahir);
		$data_form->pekerjaan_ayah = $data_ayah->pekerjaan;
		$data_form->alamat_ayah = $data_ayah->alamat;
		

		$data['penduduk'] = $data_form;
		// var_dump($data_form);
		$this->load->view('surat/surat_kelahiran/preview_kedua',$data);

	}

	public function storeSuratKematian(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            
            $data = array(
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'kebangsaan' => $this->input->post('kebangsaan'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
				'tanggal_kematian' => $this->input->post('tanggal_kematian'),
				"nik" =>$this->input->post('nik'),

            );

			$json_data = json_encode($data);
			$insertDb = array(
				"nik" =>$this->input->post('nik'),
				"jenis_surat" => "3",
				"request" => $json_data,
				"status" => "0"
			);


            // Insert the data into the database
            $insert_id = $this->DataSuratPendudukModel->insert($insertDb);
			$affected_rows = $this->db->affected_rows();

            if ($affected_rows > 0) {
                // Send a JSON response indicating success
                $response = array('status' => '00', 'message' => 'Data successfully inserted');
                echo json_encode($response);
            } else {
                // Send a JSON response indicating failure
                $response = array('status' => '01', 'message' => 'An error occurred while creating the record');
                echo json_encode($response);
            }
        } 
		else {
            // Send a JSON response indicating invalid request method
            $response = array('status' => '01', 'message' => 'Invalid request method');
            echo json_encode($response);
        }
		

	}

	public function storeSuratKelahiran(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Get the data from POST request
            $data = array(
                'nama_anak' => $this->input->post('nama_anak'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'umur_ibu' => $this->input->post('umur_ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'alamat_ibu' => $this->input->post('alamat_ibu'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'umur_ayah' => $this->input->post('umur_ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'alamat_ayah' => $this->input->post('alamat_ayah')
            );

			$json_data = json_encode($data);
			$insertDb = array(
				"nik" =>$this->input->post('nik_anak'),
				"jenis_surat" => "4",
				"request" => $json_data,
				"status" => "0"
			);
	
			$insert_id = $this->DataSuratPendudukModel->insert($insertDb);
			$affected_rows = $this->db->affected_rows();
			if ($affected_rows > 0) {
				// Send a JSON response indicating success
				$response = array('status' => '00', 'message' => 'success');
				echo json_encode($response);
			} else {
				// Send a JSON response indicating failure
				$response = array('status' => '99', 'message' => 'An error occurred while creating the record');
				echo json_encode($response);
			}
				} else {
					// Send a JSON response indicating invalid request method
					$response = array('status' => 'error', 'message' => 'Invalid request method');
					echo json_encode($response);
			}

	}

	public function storeSuratPindah(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            
            $data = array(
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'kebangsaan' => $this->input->post('kebangsaan'),
                'agama' => $this->input->post('agama'),
                'alamat_asal' => $this->input->post('alamat_asal'),
				'kelurahan_baru' => $this->input->post('kelurahan_baru'),
				'kota_baru' => $this->input->post('kota_baru')

            );

			$json_data = json_encode($data);
			$insertDb = array(
				"nik" =>$this->input->post('nik'),
				"jenis_surat" => "2",
				"request" => $json_data,
				"status" => "0"
			);


            // Insert the data into the database
            $insert_id = $this->DataSuratPendudukModel->insert($insertDb);
			$affected_rows = $this->db->affected_rows();

            if ($affected_rows > 0) {
                // Send a JSON response indicating success
                $response = array('status' => '00', 'message' => 'Data successfully inserted');
                echo json_encode($response);
            } else {
                // Send a JSON response indicating failure
                $response = array('status' => '01', 'message' => 'An error occurred while creating the record');
                echo json_encode($response);
            }
        } 
		else {
            // Send a JSON response indicating invalid request method
            $response = array('status' => '01', 'message' => 'Invalid request method');
            echo json_encode($response);
        }
		
	}

	public function storeSuratDomisili(){
		  // Ensure it's a POST request

		  if ($this->input->server('REQUEST_METHOD') === 'POST') {
            
            $data = array(
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'kebangsaan' => $this->input->post('kebangsaan'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat')
            );

			$json_data = json_encode($data);
			$insertDb = array(
				"nik" =>$this->input->post('nik'),
				"jenis_surat" => "1",
				"request" => $json_data,
				"status" => "0"
			);


            // Insert the data into the database
            $insert_id = $this->DataSuratPendudukModel->insert($insertDb);
			$affected_rows = $this->db->affected_rows();

            if ($affected_rows > 0) {
                // Send a JSON response indicating success
                $response = array('status' => '00', 'message' => 'Data successfully inserted');
                echo json_encode($response);
            } else {
                // Send a JSON response indicating failure
                $response = array('status' => '01', 'message' => 'An error occurred while creating the record');
                echo json_encode($response);
            }
        } 
		else {
            // Send a JSON response indicating invalid request method
            $response = array('status' => '01', 'message' => 'Invalid request method');
            echo json_encode($response);
        }
    }
		
// end of store surat


// approval proses 
		public function approvalSurat($id){
			$keterangan = $this->input->post('keterangan');
			$reason = $this->input->post('reason');
			$no_surat = $this->DataSuratPendudukModel->get_max_no_surat()+1;
			$today = date('Y-m-d');

			if($reason == 'reject'){
				$data = array(
					'status' => '99',
					'tanggal_approval' => $today,
					'keterangan' => $keterangan
				);

			}else if($reason == 'accept') {
				$data = array(
					'no_surat' => $no_surat,
					'status' => '1',
					'tanggal_approval' => $today,
					'keterangan' => $keterangan
				);

			};

			$this->DataSuratPendudukModel->update($id,$data);
			$this->session->set_flashdata('message', 'Data successfully updated!');
			$this->session->set_flashdata('type', 'success');
			redirect('surat');


		}


	

   
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMutasiPendudukModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_penduduk() {
        return $this->db->get('data_mutasi_penduduk')->result();
    }

    public function searchNIK($nik){
        return $this->db->get_where('data_mutasi_penduduk', ['nik' => $nik])->row();
    }

    public function insert($data) {
        $this->db->insert('data_mutasi_penduduk', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('data_penduduk');
    }

    public function get($id) {
        return $this->db->get_where('data_mutasi_penduduk', ['id' => $id])->row();
    }

    public function update($id, $data) {
        // Update data in the database
        $this->db->where('id', $id);
        $this->db->update('data_mutasi_penduduk', $data);
    }

}

?>
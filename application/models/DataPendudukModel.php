<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPendudukModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_penduduk() {
        $this->db->where('tanggal_kematian IS NULL', null, true);
        return $this->db->get('data_penduduk')->result();
    }

    public function get_penduduk_meninggal() {
        $this->db->where('tanggal_kematian !=', ''); // For empty strings
        $this->db->where('tanggal_kematian IS NOT NULL'); // For NULL values (optional if not applicable)
        return $this->db->get('data_penduduk')->result();
    }

    public function get_penduduk_pindah() {
        return $this->db->get('data_penduduk')->result();
    }

    public function searchNIK($nik){
        return $this->db->get_where('data_penduduk', ['nik' => $nik])->row();
    }

    public function get_keluarga($no_kk) {
        $this->db->where('no_kk',$no_kk);
        return $this->db->get('data_penduduk')->result();
    }

    public function get_kelahiran() {
        $current_year = date('Y'); // Get the current year
        $this->db->where('YEAR(tanggal_lahir)', $current_year);
        $this->db->where('tanggal_kematian IS NULL');
        return $this->db->get('data_penduduk')->result();
    }

    public function get($id) {
        return $this->db->get_where('data_penduduk', ['id' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('data_penduduk', $data);
    }

    public function update($id, $data) {
        // Update data in the database
        $this->db->where('id', $id);
        $this->db->update('data_penduduk', $data);
    }


    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('data_penduduk');
    }

   

    
}
?>

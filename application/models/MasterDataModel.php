<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataModel extends CI_Model {

    public function get_all() {
        return $this->db->get('master_data')->result();
    }

    public function no_kk() {
        $this->db->select('no_kk');
        $this->db->group_by('no_kk');
        return $this->db->get('data_penduduk')->result();
    }

    public function kepala_desa() {
        $this->db->where('deskripsi','kepala_desa');
        return $this->db->get('master_data')->row();
    }

    public function get_conditional_count($table_name, $where_clause) {
        $this->db->from($table_name);
        $this->db->where($where_clause);
        $query = $this->db->get();
        return $query->num_rows();
      }

      public function get_total_count($table_name) {
        $this->db->select('COUNT(*) AS total_count');
        $this->db->from($table_name);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
          $row = $query->row();
          return $row->total_count;
        } else {
          return 0; // Return 0 if no rows found
        }
      }

      public function get_penduduk() {
        $this->db->select('COUNT(*) AS total_count');
        $this->db->where('tanggal_kematian IS NULL', null, true);
        $this->db->from('data_penduduk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->total_count;
          } else {
            return 0; // Return 0 if no rows found
          }
    }

    public function get_kelahiran_count() {
        $current_year = date('Y'); 
        $this->db->select('COUNT(*) AS total_count');
        $this->db->where('YEAR(tanggal_lahir)', $current_year);
        $this->db->where('tanggal_kematian IS NULL');
        $this->db->from('data_penduduk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->total_count;
          } else {
            return 0; // Return 0 if no rows found
          }
    }
}
?>

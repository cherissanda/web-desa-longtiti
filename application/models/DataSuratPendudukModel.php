<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSuratPendudukModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_surat() {
        return $this->db->get('surat')->result();
    }

    public function get_surat_approval() {
        $this->db->where('status','0');
        return $this->db->get('surat')->result();
    }

    public function insert($data) {
        $this->db->insert('surat', $data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('surat', $data);
    }

    public function get_detail_surat($id) {
        return $this->db->get_where('surat', ['id' => $id])->row();
    }

    public function get_max_no_surat() {
        $this->db->select_max('no_surat'); // Select the maximum value of 'no_surat' column
        $query = $this->db->get('surat'); // Replace 'your_table_name' with your actual table name
        
        if ($query->num_rows() > 0) {
          $row = $query->row();
          return $row->no_surat; // Return the maximum value
        } else {
          return null; // Return null if no rows found (no records in the table)
        }
      }

}

?>
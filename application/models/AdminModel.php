<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_admin() {
        return $this->db->get('user')->result();
    }

    public function get_admin_detail($id) {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function insert($data){
        $this->db->insert('user', $data);
    }

    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_model extends CI_Model {

    function ambildata($table){
        return $this->db->get($table);
    }

    function tambahdata($data,$table){
        $this->db->insert($table,$data);
    }

    function ambilId($table,$where){
    	return $this->db->get_where($table,$where); 
    }

    function updatedata($where,$data,$table){
    	$this->db->where($where);
    	$this->db->update($table,$data);
    }

    function hapusdata($where,$table){
    	$this->db->where($where);
    	$this->db->delete($table);
    }

}

/* End of file Santri_model.php */
/* Location: ./application/models/Santri_model.php */
?>
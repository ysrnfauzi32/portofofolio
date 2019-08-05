<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {

	function simpan_upload($nama_file,$deskripsi,$file){
        $data = array(
                'nama_file' => $nama_file,
                'file' => $file
            );  
        $result= $this->db->insert('file',$data);
        return $result;
    }

    function updatedata($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function ambildata($table){
        return $this->db->get($table);
    }

    function ambilId($table,$where){
        return $this->db->get_where($table,$where); 
    }

    function hapusdata($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    
}

/* End of file Santri_model.php */
/* Location: ./application/models/Santri_model.php */
?>
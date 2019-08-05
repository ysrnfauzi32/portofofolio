<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {
	function getall(){
		$query=$this->db->order_by('hari')
						->get('jadwal');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function gethari($hari){
		$query=$this->db->select('*')
						->from('jadwal')
						->join('materi', 'materi.materi = jadwal.materi')
						->join('pengajar', 'pengajar.nama_pengajar = jadwal.pengajar')
						->join('ruangan', 'ruangan.ruangan = jadwal.ruangan')
						->join('jam', 'jam.jam = jadwal.jam')
						->where('jadwal.hari',$hari)
						->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid(){
		
	}
	
	function getsimpan($data){
		$query=$this->db->insert('jadwal',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('id_jadwal',$id)
						->delete('jadwal');
		return $query;
	}
	
	function getedit(){
		
	}
}
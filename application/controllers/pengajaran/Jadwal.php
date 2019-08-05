<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('pengajaran/Jadwal_model','jadwal');
		$this->load->model('pengajaran/Materi_model','materi');
		$this->load->model('pengajaran/Jam_model','jam');
		$this->load->model('pengajaran/Pengajar_model','hari');
		$this->load->model('pengajaran/Ruangan_model','ruangan');
		$this->load->helper('form');
        $this->load->helper('url');
	}
	
	function index(){
		$data['title']="Jadwal Pengajaran";
        $data['tombol']="Tambah Jadwal";
        $data['datajadwal']=$this->jadwal->getall();
        $this->load->view('admin/pengajaran/v_jadwal', $data);
	}
	
	function tjadwal(){
		$this->form_validation->set_rules('hari','Hari','required');
		$this->form_validation->set_rules('jam','Jam Pengajaran','required');
		$this->form_validation->set_rules('materi','Materi Pengajaran','required');
		$this->form_validation->set_rules('ruangan','Ruangan','required');
		$this->form_validation->set_rules('pengajar','pengajar','required');
		
		if($this->form_validation->run()==FALSE ){
			$data['konten']='admin/pengajaran/t_jadwal';
			$data['datamateri']=$this->materi->getall();
			$data['datajam']=$this->jam->getall();
			$data['dataruangan']=$this->ruangan->getall();
			$data['datapengajar']=$this->pengajar->getall();
		}else{
			$data=array(
				'hari'=>$this->input->post('hari'),
				'jam'=>$this->input->post('jam'),
				'materi'=>$this->input->post('materi'),
				'ruangan'=>$this->input->post('ruangan'),
				'pengajar'=>$this->input->post('pengajar')
			);
			$this->load->model('Jadwal_model')->getsimpan($data);
		}
	}
	
	function hapusjadwal($id){
		redirect('jadwal');
		$this->load->model('Jadwal_model')->gethapus($id);
	}
	
	function lihat_jadwal(){
		$hari=$this->uri->segment(3);
		$data['konten']='admin/pengajaran/v_jadwal';
		$data['datajadwal']=$this->load->model('Jadwal_model')->getall();
		$data['datahari']=$this->load->model('Jadwal_model')->gethari($hari);
	}
}
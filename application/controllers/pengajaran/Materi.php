<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $this->load->model('pengajaran/Materi_model','m');
        $this->load->helper('form');
        $this->load->helper('url');

    }
    function index()
    {
        $data['title']="materi";
        $data['tombol']="Tambah materi";
        $data['file']="File Materi";
        $this->load->view('admin/pengajaran/v_materi', $data);
    }

    function ambildata()
    {
        $dataMateri = $this->m->ambildata('materi')->result();
        echo json_encode($dataMateri);
    }

    function tambahdata(){
        $materi=$this->input->post('materi');

        if($materi==''){
            $result['pesan']="materi harus diisi";
        }else{
            $result['pesan']="";

            $data=array(
                'materi'=>$materi,
            );

            $this->m->tambahdata($data, 'materi');
        }
        echo json_encode($result);
    }

    function ambilId(){
        $id_materi=$this->input->post('id_materi');
        $where=array('id_materi'=>$id_materi);
        $datamateri = $this->m->ambilId('materi', $where)->result();

        echo json_encode($datamateri);
    }

    function ubahdata(){
        $id_materi=$this->input->post('id_materi');
        $materi=$this->input->post('materi');

        if($materi==''){
            $result['pesan']="Materi Pengajara harus diisi";
        }else{
            $result['pesan']="";

            $where=array('id_materi'=>$id_materi);

            $data=array(
                'materi'=>$materi,
            );

            $this->m->updatedata($where,$data, 'materi');
        }
        echo json_encode($result);
    }

    function hapusdata(){
        $id_materi=$this->input->post('id_materi');
        $where=array('id_materi'=>$id_materi);
        $this->m->hapusdata($where, 'materi');
    }
}/* End of file Page.php */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $this->load->model('pengajaran/Ruangan_model','m');
        $this->load->helper('form');
        $this->load->helper('url');

    }
    function index()
    {
        $data['title']="Ruangan";
        $data['tombol']="Tambah Ruangan";
        $this->load->view('admin/pengajaran/v_ruangan', $data);
    }

    function ambildata()
    {
        $dataRuangan = $this->m->ambildata('ruangan')->result();
        echo json_encode($dataRuangan);
    }

    function tambahdata(){
        $ruangan=$this->input->post('ruangan');

        if($ruangan==''){
            $result['pesan']="Ruangan harus diisi";
        }else{
            $result['pesan']="";

            $data=array(
                'ruangan'=>$ruangan,
            );

            $this->m->tambahdata($data, 'ruangan');
        }
        echo json_encode($result);
    }

    function ambilId(){
        $id_ruangan=$this->input->post('id_ruangan');
        $where=array('id_ruangan'=>$id_ruangan);
        $dataRuangan = $this->m->ambilId('ruangan', $where)->result();

        echo json_encode($dataRuangan);
    }

    function ubahdata(){
        $id_ruangan=$this->input->post('id_ruangan');
        $ruangan=$this->input->post('ruangan');

        if($ruangan==''){
            $result['pesan']="Ruangan harus diisi";
        }else{
            $result['pesan']="";

            $where=array('id_ruangan'=>$id_ruangan);

            $data=array(
                'ruangan'=>$ruangan,
            );

            $this->m->updatedata($where,$data, 'ruangan');
        }
        echo json_encode($result);
    }

    function hapusdata(){
        $id_ruangan=$this->input->post('id_ruangan');
        $where=array('id_ruangan'=>$id_ruangan);
        $this->m->hapusdata($where, 'ruangan');
    }
}/* End of file Page.php */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $this->load->model('pengajaran/Jam_model','m');
        $this->load->helper('form');
        $this->load->helper('url');

    }
    function index()
    {
        $data['title']="Jam Pengajaran";
        $data['tombol']="Tambah Jam";
        $this->load->view('admin/pengajaran/v_jam', $data);
    }

    function ambildata()
    {
        $dataJam = $this->m->ambildata('jam')->result();
        echo json_encode($dataJam);
    }

    function tambahdata(){
        $jam=$this->input->post('jam');

        if($jam==''){
            $result['pesan']="Jam mulai harus diisi";
        }else{
            $result['pesan']="";

            $data=array(
                'jam'=>$jam,
            );

            $this->m->tambahdata($data, 'jam');
        }
        echo json_encode($result);
    }

    function ambilId(){
        $id_jam=$this->input->post('id_jam');
        $where=array('id_jam'=>$id_jam);
        $dataJam = $this->m->ambilId('jam', $where)->result();

        echo json_encode($dataJam);
    }

    function ubahdata(){
        $id_jam=$this->input->post('id_jam');
        $jam=$this->input->post('jam');

        if($jam==''){
            $result['pesan']="Jam mulai harus diisi";
        }else{
            $result['pesan']="";

            $where=array('id_jam'=>$id_jam);

            $data=array(
                'jam'=>$jam,
            );

            $this->m->updatedata($where,$data, 'jam');
        }
        echo json_encode($result);
    }

    function hapusdata(){
        $id_jam=$this->input->post('id_jam');
        $where=array('id_jam'=>$id_jam);
        $this->m->hapusdata($where, 'jam');
    }
}/* End of file Page.php */
?>
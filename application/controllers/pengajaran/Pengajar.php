<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $this->load->model('pengajaran/Pengajar_model','m');
        $this->load->helper('form');
        $this->load->helper('url');

    }
    function index()
    {
        $data['title']="Pengajar";
        $data['tombol']="Tambah Pengajar";
        $this->load->view('admin/pengajaran/v_pengajar', $data);
    }

    function ambildata()
    {
        $dataSantri = $this->m->ambildata('pengajar')->result();
        echo json_encode($dataSantri);
    }

    function tambahdata(){
        $nama_pengajar=$this->input->post('nama_pengajar');
        $nip=$this->input->post('nip');
        $no_hp=$this->input->post('no_hp');

        if($nama_pengajar==''){
            $result['pesan']="Nama harus diisi";
        }elseif($nip==''){
            $result['pesan']="nip harus diisi";
        }elseif($no_hp==''){
            $result['pesan']="No Telp harus diisi";
        }else{
            $result['pesan']="";

            $data=array(
                'nama_pengajar'=>$nama_pengajar,
                'nip'=>$nip,
                'no_hp'=>$no_hp,
            );

            $this->m->tambahdata($data, 'pengajar');
        }
        echo json_encode($result);
    }

    function ambilId(){
        $id_pengajar=$this->input->post('id_pengajar');
        $where=array('id_pengajar'=>$id_pengajar);
        $dataPengajar = $this->m->ambilId('pengajar', $where)->result();

        echo json_encode($dataPengajar);
    }

    function ubahdata(){
        $id_pengajar=$this->input->post('id_pengajar');
        $nama_pengajar=$this->input->post('nama_pengajar');
        $nip=$this->input->post('nip');
        $no_hp=$this->input->post('no_hp');

        if($nama_pengajar==''){
            $result['pesan']="Nama harus diisi";
        }elseif($nip==''){
            $result['pesan']="NIP harus diisi";
        }elseif($no_hp==''){
            $result['pesan']="No Telp harus diisi";
        }else{
            $result['pesan']="";

            $where=array('id_pengajar'=>$id_pengajar);

            $data=array(
                'nama_pengajar'=>$nama_pengajar,
                'nip'=>$nip,
                'no_hp'=>$no_hp,
            );

            $this->m->updatedata($where,$data, 'pengajar');
        }
        echo json_encode($result);
    }

    function hapusdata(){
        $id_pengajar=$this->input->post('id_pengajar');
        $where=array('id_pengajar'=>$id_pengajar);
        $this->m->hapusdata($where, 'pengajar');
    }
}/* End of file Page.php */
?>


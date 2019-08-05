<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $this->load->model('pengajaran/File_model','m');
        $this->load->helper('form');
        $this->load->helper('url');

    }
    function index()
    {
        $data['title']="File";
        $data['tombol']="Tambah File";
        $this->load->view('admin/pengajaran/v_file', $data);
    }

    function ambildata()
    {
        $dataFile = $this->m->ambildata('file')->result();
        echo json_encode($datafile);
    }

    function ambilId(){
        $id_file=$this->input->post('id_file');
        $where=array('id_pengajar'=>$id_file);
        $dataFile = $this->m->ambilId('file', $where)->result();

        echo json_encode($dataFile);
    }

    function do_upload(){
        $config['upload_path']="./assets/file";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());

            $nama_file= $this->input->post('nama_file');
            $deskripsi= $this->input->post('deskripsi');
            $file= $data['upload_data']['file_name']; 
            
            $result= $this->m->simpan_upload($nama_file, $deskripsi, $file);
            echo json_decode($result);
        }

     }

     function ubahdata(){
        $config['upload_path']="./assets/file";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());

            $id_file= $this->input->post('id_file');
            $nama_file= $this->input->post('nama_file');
            $deskripsi= $this->input->post('deskripsi');
            $file= $data['upload_data']['file_name'];

            $where=array('id_file'=>$id_file);

            $data=array(
                'nama_file'=>$nama_file,
                'deskripsi'=>$deskripsi,
                'file'=>$file,
            );
            
            $result= $this->m->update_data($where,$data, 'file');
            echo json_encode($result);
        }
     }

     function hapusdata(){
        $id_file=$this->input->post('id_file');
        $where=array('id_file'=>$id_file);
        $this->m->hapusdata($where, 'file');
    }
    
}
?>


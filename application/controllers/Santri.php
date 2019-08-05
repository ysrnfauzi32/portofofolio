<?php
defined('BASEPATH') OR exit();

class Santri extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $this->load->model('Santri_model','m');
        $this->load->helper('form');
        $this->load->helper('url');

    }
    function index()
    {
        $data['title']="CRUD CI AJAX";
        $data['tombol']="Tambah Santri";
        $data['export']="Export Data Santri";
        $this->load->view('admin/santri/v_santri', $data);
    }

    function ambildata()
    {
        $dataSantri = $this->m->ambildata('santri')->result();
        echo json_encode($dataSantri);
    }

    function tambahdata(){
        $nama_santri=$this->input->post('nama_santri');
        $kelas=$this->input->post('kelas');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $alamat=$this->input->post('alamat');

        if($nama_santri==''){
            $result['pesan']="Nama harus diisi";
        }elseif($kelas==''){
            $result['pesan']="Kelas harus diisi";
        }elseif($jenis_kelamin==''){
            $result['pesan']="Jenis Kelamin harus diisi";
        }elseif($alamat==''){
            $result['pesan']="Alamat harus diisi";
        }else{
            $result['pesan']="";

            $data=array(
                'nama_santri'=>$nama_santri,
                'kelas'=>$kelas,
                'jenis_kelamin'=>$jenis_kelamin,
                'alamat'=>$alamat,
            );

            $this->m->tambahdata($data, 'santri');
        }
        echo json_encode($result);
    }

    function ambilId(){
        $id_santri=$this->input->post('id_santri');
        $where=array('id_santri'=>$id_santri);
        $dataSantri = $this->m->ambilId('santri', $where)->result();

        echo json_encode($dataSantri);
    }

    function ubahdata(){
        $id_santri=$this->input->post('id_santri');
        $nama_santri=$this->input->post('nama_santri');
        $kelas=$this->input->post('kelas');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $alamat=$this->input->post('alamat');

        if($nama_santri==''){
            $result['pesan']="Nama harus diisi";
        }elseif($kelas==''){
            $result['pesan']="Kelas harus diisi";
        }elseif($jenis_kelamin==''){
            $result['pesan']="Jenis Kelamin harus diisi";
        }elseif($alamat==''){
            $result['pesan']="Alamat harus diisi";
        }else{
            $result['pesan']="";

            $where=array('id_santri'=>$id_santri);

            $data=array(
                'nama_santri'=>$nama_santri,
                'kelas'=>$kelas,
                'jenis_kelamin'=>$jenis_kelamin,
                'alamat'=>$alamat,
            );

            $this->m->updatedata($where,$data, 'santri');
        }
        echo json_encode($result);
    }

    function hapusdata(){
        $id_santri=$this->input->post('id_santri');
        $where=array('id_santri'=>$id_santri);
        $this->m->hapusdata($where, 'santri');
    }

    function export_excel(){

        $dataSantri = $this->m->ambildata('santri')->result();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("ysrn fauzi");
        $objPHPExcel->getProperties()->setLastModifiedBy("ysrn fauzi");
        $objPHPExcel->getProperties()->setTitle("Data Santri");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nomor');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Kelas');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Jenis Kelamin');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Alamat');

        $baris=2;
        $x=1;

        foreach($dataSantri as $dataSantri){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $dataSantri->nama_santri);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $dataSantri->kelas);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $dataSantri->jenis_kelamin);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $dataSantri->alamat);

            $x++;
            $baris++;
        }

        $filename="Data-Santri".date("d-m-Y-H-i-s").'.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Santri");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        ob_end_clean();
        $writer->save('php://output');

        exit;

    }
}/* End of file Page.php */
?>


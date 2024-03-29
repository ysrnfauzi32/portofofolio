<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->load->view('admin/part_template/template_admin');
	}

	public function template()
	{
		$this->load->view('admin/part_template/template_admin');
	}

	public function load_konten()
	{
		$page = $this->input->get('page'); 
		$this->load->view($page);
	}

	public function form_tambah_santri()
	{
		$this->load->view('admin/santri/form_tambah_santri');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */

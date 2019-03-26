<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index($a='')
	{
		if (empty($this->session->userdata('login'))) {
			redirect(base_url());
		} else {
			$data['lvl']=$this->session->userdata('lvl');
			if ($data['lvl']!=1) {
				redirect(base_url('siswa/home'));
			}
		}

		$data['alert']=$a;
		$data['title']='Admin Page';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function rekap()
	{
		$data['title']='Print Rekap Siswa';
		$this->load->view('header',$data);

		$this->load->view('admin/rekap');
		$this->load->view('footer');
	}	public function golput()
	{
		$data['title']='Print Rekap Siswa';
		$this->load->view('header',$data);

		$this->load->view('admin/golput');
		$this->load->view('footer');
	}
	function reset(){
		if ($this->db->empty_table('x_coblos')) {
			redirect('admin/home/index/sukses');
		}
	}

}

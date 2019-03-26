<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pwd extends CI_Controller {
	public function index()
	{
		if (empty($this->session->userdata('login'))) {
			redirect(base_url());
		} else {
			$data['lvl']=$this->session->userdata('lvl');
			if ($data['lvl']!=1) {
				redirect(base_url('siswa/home'));
			}
		}
		$data['title']='Ubah Password | Admin Page';
		$this->db->where('id',1);
		$data['a']=$this->db->get('x_login')->row();


		if (!empty($this->input->post('submit'))) {
			$this->db->where('id',1);
			if ($this->db->update('x_login',array('pwd'=>$this->input->post('pwd_baru')))) {
				$data['alert']='success';
				$data['pesan']='Sukses Menyimpan';
			}
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/pwd',$data);
		$this->load->view('admin/footer');
	}
}

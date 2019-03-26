<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if (empty($this->session->userdata('login'))) {
			redirect(base_url());
		} else {
			$data['lvl']=$this->session->userdata('lvl');
			if ($data['lvl']!=2) {
				redirect(base_url('admin/home'));
			}
		}
		if (!empty($this->input->post('submit'))) {
			$nis=$this->session->nis;
			$this->db->where('nis',$nis);
			if ($this->db->get('x_coblos')->num_rows() == 0) {
				$this->db->insert('x_coblos',array('nis'=>$nis,'c_id'=>$this->input->post('calon')));
			} 
			redirect(base_url('welcome/logout'));

		}
		$this->db->where('nis',$this->session->nis);
		$data['a']=$this->db->get('x_login')->row();

		$data['title']='Pilihan Ketua Osis';
		$this->load->view('header',$data);
		$this->load->view('siswa/home',$data);
		$this->load->view('footer');
	}
}

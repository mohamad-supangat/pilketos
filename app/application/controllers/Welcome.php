<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		if (!empty($this->session->userdata('login'))) {
			$data['lvl']=$this->session->userdata('lvl');
			if ($data['lvl']==1) {
				redirect(base_url('admin/home'));
			} else {
				redirect(base_url('siswa/home'));
			}
		}
		$data['title']='Selamat Datang Peserta Pilihan Ketua Osis SMK Ma\'arif NU 1 Ajibarang';
		$this->load->view('header',$data);
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}
	public function login()
	{
		$data['alert']='danger';
		$nis=$this->input->post('nis');
		$pwd=$this->input->post('pwd');
		$this->db->where(array('nis'=>$nis,'pwd' => $pwd));
		$query=$this->db->get('x_login');
		if ($query->num_rows()  != 1) {
			$data['pesan']='NIS atau Password yang anda masukan salah';
		} else {
			$this->db->where('nis',$nis);
			if ($this->db->get('x_coblos')->num_rows() == 0) {
				$data['user']=$query->row_array();
				$this->session->set_userdata('login',1);
				$this->session->set_userdata('nis',$nis);
				$this->session->set_userdata('lvl',$data['user']['lvl']);
				if ($data['user']['lvl']==1) {
					redirect(base_url('admin/home'));
				} else {
					redirect(base_url('siswa/home'));
				}
				$data['pesan']=$data['user']['lvl'];

			} else {
				$data['pesan']='Anda Sudah Pernah Memilih. Ingat Pilihlah satu kali karna curang itu <b>dosa</b>';
			}
		}
		$this->session->set_flashdata(array('alert' => $data['alert'],'pesan'=>$data['pesan'] ));
		redirect(base_url('welcome'));
	}
	public function logout()
	{
		$data['alert']='danger';
		$array_items = array('login', 'nis','lvl');
		if (!$this->session->unset_userdata($array_items)) {
			$data['pesan']='Sukses Logout';
			$data['alert']='success';
		} else {
			$data['pesan']='Gagal Logout';
		}
		$this->session->set_flashdata(array('alert' => $data['alert'],'pesan'=>$data['pesan'] ));
		redirect(base_url('welcome'));

	}
}

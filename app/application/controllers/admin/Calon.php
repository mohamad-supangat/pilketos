<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {
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
		$data['title']='Kelola Calon | Admin Page';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/calon');
		$this->load->view('admin/footer');
	}
	public function hapus($id,$foto)
	{
		$this->db->where('id',$id);
		if ($this->db->delete('x_calon') && unlink('uploads/'.$foto)) {
			$this->session->set_flashdata(array('pesan' => 'Sukses Menghapus','alert' => 'success'));
		} else {
			$this->session->set_flashdata(array('pesan' => 'Gagal Menghapus','alert' => 'danger'));

		}
        redirect(base_url('admin/calon'));
	}
	public function tambah()
	{
		if (empty($this->session->userdata('login'))) {
			redirect(base_url());
		} else {
			$data['lvl']=$this->session->userdata('lvl');
			if ($data['lvl']!=1) {
				redirect(base_url('siswa/home'));
			}
		}
		if (!empty($this->input->post('submit'))) {
			$nis=$this->input->post('nis');
			$this->db->where('nis',$nis);
			$cek=$this->db->get('x_login');
			$data['alert']='danger';
			// echo $cek->num_rows();
			if ($cek->num_rows()!=1) {
				$data['pesan']='NIS tidak ditemukan di database siswa';
			} else {
				$this->db->where('nis',$nis);
				if ($this->db->get('x_calon')->num_rows()>0) {
					$data['pesan']='Calon Sudah Ada';
				} else {
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'gif|jpg|png';
	                $config['max_width']            = 700;
	                $config['max_height']           = 700;
	                $config['min_width']            = 700;
	                $config['min_height']           = 700;
	                $this->load->library('upload', $config);
					$this->upload->initialize($config);
	                
	                if ( ! $this->upload->do_upload('file'))
	                {
	                	$data['pesan']=$this->upload->display_errors();
	                }
	                else
	                {
	                	$a=$cek->row();
	                	$s=array(
	                		'nis'=>$nis,
	                		'nama'=>$a->nama,
	                		'foto'=>$this->upload->data('file_name'),
	                		'keterangan'=>$this->input->post('keterangan'),
	                	);
	                	if (!$this->db->insert('x_calon',$s)) {
	                		$data['pesan']='Gagal Menyimpan';
	                	} else {
	                		$data['alert']='success';
	                		$data['pesan']='Sukses Menyimpan';
	                	}
	                }

				}
			}
		}
		$data['title']='Tambah Calon | Admin Page';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/calon_tambah');
		$this->load->view('admin/footer');
	}

}

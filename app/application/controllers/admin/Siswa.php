<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
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
		
		$data['title']='Kelola Siswa | Admin Page';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/siswa');
		$this->load->view('admin/footer');
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
		$data['title']='Tambah Siswa | Admin Page';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/siswa_tambah');
		$this->load->view('admin/footer');
	}
	function reset(){
		$this->db->where('nis != 0000');
		$this->db->delete('x_login');
		$this->session->set_flashdata(array('pesan' => 'Sukses Reset','alert' => 'success'));
        redirect(base_url('admin/siswa'));
    }
	public function proses_tambah()
	{
        $this->load->library('PHPExcel');

		$inputFileName=$_FILES['file']['tmp_name'];
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 6; $row <= $highestRow; $row++) {                           // Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            
            $data = array(                                                      // Sesuaikan sama nama kolom tabel di database
            	"nis" => $rowData[0][1],
                "pwd" => str_replace(' ', '', strtoupper($rowData[0][2])),
                "nama" => strtoupper($rowData[0][2]),
                "kelas" => $rowData[0][3],
                "jurusan" => $rowData[0][4],
            );
            
            $insert = $this->db->insert("x_login", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
            if ($insert) {
            	echo "Sukses Import Nama : ".$rowData[0][2].'<hr/>';
            }
        }
        sleep(5);
        $this->session->set_flashdata(array('pesan' => 'Sukses Import','alert' => 'success'));
        redirect(base_url('admin/siswa/tambah'));
    }
}

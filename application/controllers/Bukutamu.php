<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bukutamu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
	    
		$this->load->view('bukutamu');
		
	}

	public function simpan()
	{
		$nama = $this->input->post('nama', true);
		$tanggal = date("Y-m-d H:i:s");
		$nik = $this->input->post('nik', true);
		$jekel = $this->input->post('jekel', true);
		$instansi = $this->input->post('instansi', true);
		$nomor_telp = $this->input->post('nomor_telp', true);
		$alamat = $this->input->post('alamat', true);
		$keperluan = $this->input->post('keperluan', true);	
		$image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'tamu_'.date('dmY_His').'.png';
		
		file_put_contents(FCPATH.'/admin/uploads/'.$filename,$image);
		$data = array(
			'nama' => $nama,
			'tanggal' =>$tanggal,
			'jekel' =>$jekel,
			'nik' => $nik,
			'instansi' => $instansi,
			'nomor_telp' => $nomor_telp,
			'alamat' => $alamat,
			'keperluan' => $keperluan,
			'image' => $filename
			
		);

		$this->load->model('Bukutamu_model');
		$res = $this->Bukutamu_model->insert($data);
		echo json_encode($res);
	}
	
	

}

/* End of file Capture.php */
/* Location: ./application/controllers/Capture.php */
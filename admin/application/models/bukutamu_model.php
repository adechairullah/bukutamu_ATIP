<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bukutamu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($data)
	{
		$this->db->insert('daftar_tamu', $data);
		return $this->db->insert_id();
	}

	 //Mengambil data mahasiswa nanti akan digunakan ketika membuat halaman untukmenampilkan data
	 function getTamu($limit, $start, $q){
		$this->db->or_like('id', $q);
		$this->db->or_like('nik', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('jekel', $q);
        $this->db->or_like('instansi', $q);
        $this->db->or_like('nomor_telp', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('keperluan', $q);
		$this->db->or_like('image', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('daftar_tamu')->result();
       
    }
    //Mengambil data mahasiswa nanti akan digunakan menghitung total seluruh data yang ada di database mahasiswa
    function countTamu( $q)
    {
		$this->db->or_like('id', $q);
		$this->db->or_like('nik', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('jekel', $q);
        $this->db->or_like('instansi', $q);
        $this->db->or_like('nomor_telp', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('keperluan', $q);
		$this->db->or_like('image', $q);
        return $this->db->get('daftar_tamu')->num_rows();
    }
    //Mengambil data berdasarkan berdasarkan nobp
    function getTamuByID($id){
        return $this->db->get_where('daftar_tamu', array('id'=>$id)); 
    }
    //mengambil data prodi
    //melakukan insert kedalam database
    function simpanTamu($data){
        $this->db->insert('daftar_tamu',$data);
    }
    //melakukan update data mahasiswa berdasarkan nobp 
    function updateTamu($data,$nobp)
    {
        $this->db->where('nik',$nobp);
        $this->db->update('daftar_tamu', $data);
    }
    //menghapus data berdasarkan nobp
    function hapusTamu($id){
        $this->db->where('id', $id);
        return $this->db->delete('daftar_tamu');
    }

	
}

/* End of file User.php */
/* Location: ./application/models/User.php */



   
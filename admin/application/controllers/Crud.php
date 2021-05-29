<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('bukutamu_model');
    }
	
	public function index()
	{
        if($this->session->userdata('username')){
            $q = urlencode($this->input->get('q'));
            $start = intval($this->input->get('start'));
            if ($q <> '') {
                $config['base_url']   = base_url() . "daftar_tamu/index?q=" . $q;
                $config['first_url']  = base_url() . "daftar_tamu/index?q=" . $q;
            } else {
                $config['base_url']   = base_url() . "daftar_tamu/index?q=" . $q;
                $config['first_url']  = base_url() . "daftar_tamu/index?q=" . $q;
            }
            $config['query_string_segment'] = 'start';
            $config['per_page']            = 10;
            $config['page_query_string'] = true;
            $config['total_rows']        = $this->bukutamu_model->countTamu($q);
            $this->pagination->initialize($config);
            $data = array(
                'daftar_tamu'    => $this->bukutamu_model->getTamu($config['per_page'], $start, $q),
                'q'            => $q,
                'pagination' => $this->pagination->create_links(),
                'start'        => $start,
                'total' => $config['total_rows']
            );
            $daftar_tamu=$this->bukutamu_model->getTamu($config['per_page'], $start, $q);
//print_r($mahasiswa); exit;
            $view = array(
                'header'=>$this->load->view('admin/header','',true),
				'nav_sidebar'=>$this->load->view('admin/nav_sidebar','',true),
				//'content'=>$this->load->view('admin/content','',true),
				'footer'=>$this->load->view('admin/footer','',true),
				'profile'=>$this->load->view('admin/profile','',true),
                'content' => $this->load->view('daftar_tamu/view', $data, true),
            );
            $this->load->view('admin/view_dashboard', $view);
        }
        
	}
    function form($id=""){
        if ($this->session->userdata('username')) {
            $data=array(
                'daftar_tamu'=> $this->bukutamu_model->getTamuByID($id),
               
            );
            $view = array(
                'header'=>$this->load->view('admin/header','',true),
				'nav_sidebar'=>$this->load->view('admin/nav_sidebar','',true),
				'content'=>$this->load->view('admin/content','',true),
				'footer'=>$this->load->view('admin/footer','',true),
				'profile'=>$this->load->view('admin/profile','',true),
                'content' => $this->load->view('standar/view_form', $data, true),
            );
            $this->load->view('admin/view_dashboard', $view);
        }
    }
    
   
    function hapus($id)
    {   
       $data=$this->bukutamu_model->getTamuByID($id)->row();
       $nama='./uploads/'.$data->image;

       if (is_readable($nama) && unlink($nama)){
           $delete=$this->bukutamu_model->hapusTamu($id); 
           header('location:' . base_url() . "crud");
       }else{
           echo "Gagal";
        }
        
    }
        
          
    
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{	
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if($this->session->userdata('username')){
			//Jika User Sudah Login
			$view=array(
				'header'=>$this->load->view('admin/header','',true),
				'nav_sidebar'=>$this->load->view('admin/nav_sidebar','',true),
				'content'=>$this->load->view('admin/content','',true),
				'footer'=>$this->load->view('admin/footer','',true),
				'profile'=>$this->load->view('admin/profile','',true)
			);
			//print_r($view);exit;
			$this->load->view('admin/view_dashboard',$view);
		}
		else{
			$this->load->view('view_login');
		}
	
	}
	function cekuser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek=$this->login_model->cek_users($username, $password);
		if($cek){

			$data=array(
				'username'=>$cek->username,
				'nama'=>$cek->nama
				);
			$this->session->set_userdata($data);

		} else{
			$this->session->set_flashdata('error','Username atau Password Salah');
		}
		header('location:'.base_url());
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url());
	}

}
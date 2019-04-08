<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends Admin_Controller {
	
	public function index(){
		$this->load->view('admin/common_layout');
	}
	
	public function login(){
		$this->load->view('admin/login');
	}
	public function logout(){
		$this->user->logout();
		redirect('/admin');
	}
}

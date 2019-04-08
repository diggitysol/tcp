<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	public function index(){
		$this->load->view('admin/template');
	}
	public function show(){
		$this->load->view('admin/dashboard');
	}
	
}

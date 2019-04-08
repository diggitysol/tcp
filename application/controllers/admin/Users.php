<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {
	
	public function index(){
		$this->load->view('admin/users');
	}
	
	public function edit(){
		$data['title']="Users Edit";
		$this->load->view('admin/users_form',$data);
	}
	public function template(){
		$data['title']="Users Template";
		$this->load->view('admin/users_template',$data);
	}
	public function info(){
		$data['title']="Users Info";
		$this->load->view('admin/users_info',$data);
	}
	public function spoorpin(){
		$data['title']="Users Spoor";
		$this->load->view('admin/users_spoorpin',$data);
	}
	public function spoorform(){
		$data['title']="Users Token";
		$data['no_image'] = resize('no_image.png', 120, 110);
		$this->load->view('admin/users_spoorform',$data);
	}
	
	public function sharedpeople(){
		$data['title']="Shared People";
		$this->load->view('admin/users_sharedpeople',$data);
	}
	
	public function trakinghistory(){
		$data['title']="Tracking History";
		$this->load->view('admin/users_tracking',$data);
	}
	
}

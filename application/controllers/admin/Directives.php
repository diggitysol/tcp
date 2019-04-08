<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Directives extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
    }

    /**
     *
     */
    

    public function header()
    {
        $this->load->view('admin/directives/header');
    }
	 
	 public function footer()
    {
        $this->load->view('admin/directives/footer');
    }
	 
	 public function pagination()
    {
        $this->load->view('admin/directives/pagination');
    }
   
}

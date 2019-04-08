<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */
class Admin_Controller extends CI_Controller
{
	private $CI;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
		$this->form_validation->CI =& $this;

	}
	public function _remap($method, $params = array())
   {
		if($this->user->checkLogin())
		{
			
			redirect('admin/common',true);
			//return $this->load->view('admin/login');
		}
		else if($this->user->checkPermission())
		{
			//redirect('admin/error');
			//return $this->load->view('admin/error');	
		}
		else if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		else
		{
			redirect('admin/error');
			//return $this->load->view('admin/error');
		}
		//show_404();
    }
	
}
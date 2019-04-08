<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

/**
 * Spoor API controller
 *
 * Validation is missign
 */
class Spoor extends REST_Controller {
	
	private $error = array();
	
	public function __construct(){
	   parent::__construct();
	   $this->load->model('spoor_model');
		$this->load->library('cloudinarylib');
	}

	public function login_post(){
		$json=array();
		if (!$this->validateLoginForm()) {
			if(isset($this->error['warning'])){
				$json['warning'] 	= $this->error['warning'];
			}
			if(isset($this->error['errors'])){
				$json['errors'] 	= $this->error['errors'];
			}
		}
		if (!$json) {
			$result=$this->user->login($this->post('username'), $this->post('password'));
			
			if($result['status']){
				$json=array(
					'status'=>1,
					'message'=>$result['message'],
				);
			}else{
				$json=array(
					'status'=>0,
					'message'=>$result['message'],
				);
			}
			
		}
		$this->set_response($json, REST_Controller::HTTP_OK);
		
	}
	
	public function signup_post(){
		$json=array();
		if(!$this->validateSignupForm()){
			if(isset($this->error['warning'])){
				$json['warning'] 	= $this->error['warning'];
			}
			if(isset($this->error['errors'])){
				$json['errors'] 	= $this->error['errors'];
			}
		}
		if (!$json) {
			$usersdata=array(
				'user_group_id'	=>(int)$this->post('user_group_id'),
				'firstname'	=>$this->post('firstname'),
				'lastname'=>$this->post('lastname'),
				'username'=>$this->post('username'),
				'email'=>$this->post('email'),
				'password'	=>md5($this->post('password')),
				'activated'	=>1,
				'status'	=>1,
				'date_added' => new MongoDate()
			);
			$user=$this->spoor_model->insert($usersdata);
			
			$json=array(
				'status'=>true,
				'user_id'=>$user->{'$id'},
				'message'=>'User Successfully Registered'
			);
			
		}
		$this->set_response($json, REST_Controller::HTTP_CREATED);
	}
	
	public function user_group_post(){
		$json=array();
		if(!$this->validateGroupForm()){
			if(isset($this->error['warning'])){
				$json['warning'] 	= $this->error['warning'];
			}
			if(isset($this->error['errors'])){
				$json['errors'] 	= $this->error['errors'];
			}
		}
		if (!$json) {
			$groupdata=array(
				'user_group_id'=>(int)$this->post('user_group_id'),
				'name'	=>$this->post('name'),
				'permissions'=>$this->post('permissions'),
				
			);
			$group=$this->spoor_model->group_insert($groupdata);
			
			$json=array(
				'status'=>true,
				'user_group_id'=>$group->{'$id'},
				'message'=>'User Group Successfully Registered'
			);
			
		}
		
		$this->set_response($json, REST_Controller::HTTP_CREATED);
		
	}
	
	public function users_get(){
		$json=array();
		$users = $this->spoor_model->getUsers();
		$time="?".time();
		if($users){
			foreach($users as $key=>$user){
				/*if (isset($user['image']) && is_file(DIR_IMAGE . $user['image'])) {
					$users[$key]['image'] = resize($user['image'], 40, 40).$time;
				} else {
					$users[$key]['image'] = resize('no_image.png', 40, 40);
				}*/
				if (isset($user['image'])) {
					$users[$key]['image'] = $user['image'];
				} else {
					$users[$key]['image'] = resize('no_image.png', 40, 40);
				}
				$users[$key]['date'] = date('d/m/Y', $user['date']->sec);
				
			}
			
			$json=array(
				'status'=>true,
				'users'=>$users,
				'message'=>'All Users information'
			);
		}else{
			$json=array(
				'status'=>false,
				'users'=>'',
				'message'=>'No Users Found'
			);
		}
		$this->set_response($json, REST_Controller::HTTP_OK);
	}
	
	public function user_post(){
		$json=array();
		if (!$this->post('user_id')){
			$json=array(
				'status'=>false,
				'message'=>'No ID was provided.'
			);
		}else{
			$user = $this->spoor_model->getUser($this->post('user_id'));
			if($user){
				/*$time="?".time();
				if (isset($user['image']) && is_file(DIR_IMAGE . $user['image'])) {
					$user['image'] = resize($user['image'], 120, 120).$time;
				} else {
					$user['image'] = '';
				}*/
				if (isset($user['image'])) {
					$user['image'] = $user['image'];
				} else {
					$user['image'] = '';
				}
				$user['no_image'] = resize('no_image.png', 120, 110);
				$user['date'] = date('d/m/Y', $user['date']->sec);
				$json=array(
					'status'=>true,
					'user'=>$user,
					'message'=>'User Found'
				);
				
			}else{
				$json=array(
					'status'=>false,
					'message'=>'No User found'
				);
			}
		}

		$this->set_response($json,REST_Controller::HTTP_OK);
	}
	
	public function userupdate_post(){
		$json=array();
		if(!$this->validateUserForm()){
			if(isset($this->error['warning'])){
				$json['warning'] 	= $this->error['warning'];
			}
			if(isset($this->error['errors'])){
				$json['errors'] 	= $this->error['errors'];
			}
		}
		if (!$json) {
			$user_id=$this->post('user_id');
			if($this->post('image')){
				//$result=$this->base64_to_image($this->post('image'),$user_id);
				$result = \Cloudinary\Uploader::upload($this->post('image'),array("public_id" => $user_id));
				if($result){
					$image=$result['url'];
					
				}else{
					$json['errors']['image'] 	= 'Invalid image';
				}
			}
			$spooruser=array(
				'name'	=>$this->post('name'),
				'dial_code'=>$this->post('dial_code'),
				'mobile_number'=>$this->post('mobile_number'),
				'reference'	=>$this->post('reference'),
				'verified'	=>$this->post('verified'),
			);
			if(isset($image)){
				$spooruser['image']=$image;
			}
			$user=$this->spoor_model->updateUser($user_id,$spooruser);
			
			$json=array(
				'status'=>true,
				'message'=>'Profile Updated successfully'
			);
			
		}
		$this->set_response($json, REST_Controller::HTTP_CREATED);
	}
	
	public function user_delete($user_id){
		
		$json=array();
		
		if($user_id){
			$flag=$this->spoor_model->deleteUser($user_id);
			if($flag){
				$json=array(
					'status'=>true,
					'message'=>'User Deleted successfully'
				);
			}else{
				$json['warning'] 	= "Delete can not be possible";
			}
		}else{
			$json=array(
				'status'=>false,
				'message'=>'No ID was provided.'
			);
		}
		$this->set_response($json, REST_Controller::HTTP_CREATED);
	}
	public function spoors_get(){
		$json=array();
		if (!$this->get('user_id')){
			$json=array(
				'status'=>false,
				'message'=>'No ID was provided.'
			);
		}else{
			$spoors = $this->spoor_model->getSpoors($this->get('user_id'));
			if($spoors){
				foreach($spoors as $key=>$spoor){	
					$spoors[$key]['date'] = date('d/m/Y', $spoor['date']->sec);
				}
				$json=array(
					'status'=>true,
					'spoors'=>$spoors,
					'message'=>'Spoors Found'
				);
				
			}else{
				$json=array(
					'status'=>false,
					'message'=>'No spoors found'
				);
			}
		}
		$this->set_response($json, REST_Controller::HTTP_OK);
	}
	
	public function spoor_get(){
		$json=array();
		if (!$this->get('spoor_id')){
			$json=array(
				'status'=>false,
				'message'=>'No ID was provided.'
			);
		}else{
			$spoor = $this->spoor_model->getSpoor($this->get('spoor_id'));
			if($spoor){
				$json=array(
					'status'=>true,
					'spoor'=>$spoor,
					'message'=>'Spoor Found'
				);
				
			}else{
				
				$json=array(
					'status'=>false,
					'message'=>'No spoor found'
				);
			}
		}
		$this->set_response($json, REST_Controller::HTTP_OK);
	}
	
	public function submitspoor_post(){
		$json=array();
		if(!$this->validateSpoorForm()){
			if(isset($this->error['warning'])){
				$json['warning'] 	= $this->error['warning'];
			}
			if(isset($this->error['errors'])){
				$json['errors'] 	= $this->error['errors'];
			}
		}
		if (!$json) {
			$user_id=$this->post('user_id');
			

			$spoorpin=array(
				'user_id'=>new MongoId($this->post('user_id')),
			   'latitude'=>$this->post('latitude'),
				'longitude'=>$this->post('longitude'),
				'address_name'=>$this->post('address_name'),
			   'address_type'=>2,
				'address_line'=>$this->post('address_line'),
				'plot_number'=>$this->post('plot_number'),
				'street_name'=>$this->post('street_name'),
				'city'=>$this->post('city'),
				'state'=>$this->post('state'),
				'pincode'=>$this->post('pincode'),
				'date' => new MongoDate()
			);
			if($this->post('spoor_id')){
				$spoor_id=$this->post('spoor_id');
				if($this->post('image')){
					$result = \Cloudinary\Uploader::upload($this->post('image'),array("public_id" => $spoor_id));
					if($result){
						$image=$result['url'];
					}
				}
				if(isset($image)){
					$spoorpin['image']=$image;
				}
				$this->spoor_model->updateSpoor($spoor_id,$spoorpin);
			}else{
				$spoorpin['zipper_code']=$this->post('zipper_code');
				$spoor_id=$this->spoor_model->addSpoor($spoorpin);
				if($this->post('image')){
					$result = \Cloudinary\Uploader::upload($this->post('image'),array("public_id" => $spoor_id));
					if($result){
						$image=$result['url'];
					}
				}
				if(isset($image)){
					$this->spoor_model->updateSpoor($spoor_id,array('image'=>$image));
				}
				
			}
	
			$json=array(
				'status'=>true,
				'message'=>'Profile Updated successfully'
			);
			
		}
		$this->set_response($json, REST_Controller::HTTP_CREATED);
	}
	
	public function shares_get(){
		$json=array();
		if (!$this->get('user_id')){
			$json=array(
				'status'=>false,
				'message'=>'No ID was provided.'
			);
		}else{
			$sharings = $this->spoor_model->getShares($this->get('user_id'));
			if($sharings){
				$shareresult=array();
				foreach($sharings['result'] as $key=>$share){	
					
					$shareresult[$key]=$share;
					$shareresult[$key]['date'] = date('d/m/Y h:i:s A', $share['date']->sec);
				}
				$json=array(
					'status'=>true,
					'sharings'=>$shareresult,
					'message'=>'sharings Found'
				);
				
			}else{
				$json=array(
					'status'=>false,
					'message'=>'No sharings found'
				);
			}
		}
		$this->set_response($json, REST_Controller::HTTP_OK);
	}
	
	public function tracking_history_get(){
		$json=array();
		if (!$this->get('share_id')){
			$json=array(
				'status'=>false,
				'message'=>'No Sharing ID was provided.'
			);
		}else{
			$tracking = $this->spoor_model->getTrackingHistory($this->get('share_id'));
			if($tracking){
				$meeting = $this->spoor_model->getMeeting($this->get('share_id'));
			
				$json=array(
					'status'=>true,
					'tracking'=>$tracking,
					'meeting'=>$meeting,
					'message'=>'tracking Found'
				);
				
			}else{
				$json=array(
					'status'=>false,
					'message'=>'No tracking found'
				);
			}
		}
		$this->set_response($json, REST_Controller::HTTP_OK);
	}
	
	protected function base64_to_image($encode,$filename) {
		$splited = explode(',', substr( $encode , 5 ) , 2);
		$mime=$splited[0];
		$data=$splited[1];
		$tempname='';
		$decode=base64_decode($data);
		if($decode){
			$mime_split_without_base64=explode(';', $mime,2);
			
			$mime_split=explode('/', $mime_split_without_base64[0],2);
			
			if(count($mime_split)==2)
			{
				$extension=$mime_split[1];
				if($extension=='jpeg')$extension='jpg';
				if($extension=='png')$extension='png';
				if($extension=='gif')$extension='gif';
				if($extension=='bmp')$extension='bmp';
				$tempname=$filename.'.'.$extension;
				$filename=DIR_IMAGE .'uploads/spoor-user/'.$filename.'.'.$extension;
			}
			clear_image('spoor-user',$filename);
			$success = file_put_contents($filename, $decode);
			return $tempname;
		}else{
			return false;
		}
			
			
	}
	
	protected function validateLoginForm(){
		
		$rules=array(
			'username' => array(
				'field' => 'username', 
				'label' => 'Username', 
				'rules' => 'trim|required'
			),
			'password' => array(
				'field' => 'password', 
				'label' => 'Password', 
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_data($this->post());
		
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($this) == TRUE){
			return true;
    	}
		else
		{
			$this->error['warning']="Warning: Please check the form carefully for errors! ";
			$this->error['errors'] = $this->form_validation->error_array();
			return false;
    	}
		return !$this->error;
   }
	
	protected function validateSignupForm() {
		$regex = "(\/?([a-zA-Z0-9+\$_-]\.?)+)*\/?"; // Path
      $regex .= "(\?[a-zA-Z+&\$_.-][a-zA-Z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
      $regex .= "(#[a-zA-Z_.-][a-zA-Z0-9+\$_.-]*)?"; // Anchor 
		
		$rules=array(
			'username' => array(
				'field' => 'username', 
				'label' => 'User Name', 
				'rules' => "trim|required|max_length[255]|regex_match[/^$regex$/]|callback_username_check"
			),
			'password' => array(
				'field' => 'password', 
				'label' => 'Password', 
				'rules' => 'trim|required'
			),
			'firstname' => array(
				'field' => 'firstname', 
				'label' => 'Firstname', 
				'rules' => 'trim|required'
			),
			'lastname' => array(
				'field' => 'lastname', 
				'label' => 'Lastname', 
				'rules' => 'trim|required'
			),
			'email' => array(
				'field' => 'email', 
				'label' => 'Email', 
				'rules' => 'trim|required|valid_email|callback_email_check'
			),
		);
		$this->form_validation->set_data($this->post());
		
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($this) == TRUE){
			return true;
    	}
		else
		{
			$this->error['warning']="Warning: Please check the form carefully for errors! ";
			$this->error['errors'] = $this->form_validation->error_array();
			return false;
    	}
		return !$this->error;
	}
	
	protected function validateGroupForm(){
		
		$rules=array(
			'name' => array(
				'field' => 'name', 
				'label' => 'Group Name', 
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_data($this->post());
		
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($this) == TRUE){
			return true;
    	}
		else
		{
			$this->error['warning']="Warning: Please check the form carefully for errors! ";
			$this->error['errors'] = $this->form_validation->error_array();
			return false;
    	}
		return !$this->error;
   }
	
	protected function validateUserForm() {
		
		$rules=array(
			'name' => array(
				'field' => 'name', 
				'label' => 'Name', 
				'rules' => "trim|required|max_length[255]"
			),
			'dial_code' => array(
				'field' => 'dial_code', 
				'label' => 'Dial Code', 
				'rules' => 'trim|required'
			),
			'mobile_number' => array(
				'field' => 'mobile_number', 
				'label' => 'Mobile Number', 
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_data($this->post());
		
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($this) == TRUE){
			return true;
    	}
		else
		{
			$this->error['warning']="Warning: Please check the form carefully for errors! ";
			$this->error['errors'] = $this->form_validation->error_array();
			return false;
    	}
		return !$this->error;
	}
	
	protected function validateSpoorForm() {
		
		$rules=array(
			'address_name' => array(
				'field' => 'address_name', 
				'label' => 'Place Name', 
				'rules' => "trim|required|max_length[255]"
			),
			'address_line' => array(
				'field' => 'address_line', 
				'label' => 'Address', 
				'rules' => 'trim|required'
			),
			
		);
		$this->form_validation->set_data($this->post());
		
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($this) == TRUE){
			return true;
    	}
		else
		{
			$this->error['warning']="Warning: Please check the form carefully for errors! ";
			$this->error['errors'] = $this->form_validation->error_array();
			return false;
    	}
		return !$this->error;
	}
	
	public function username_check(){
		$username=$this->post('username');
      $User = $this->spoor_model->getUserByUsername($username);
      if (!empty($User)){
            $this->form_validation->set_message('username_check', "This {field} provided is already in use.");
            return FALSE;
		}else{
         return TRUE;
      }
   }
	
	public function email_check(){
      $email=$this->post('email');
		$User = $this->spoor_model->getUserByEmail($email);
		
      if (!empty($User)){
			$this->form_validation->set_message('email_check', "This email address is already in use.");
         return FALSE;
		}else{
         return TRUE;
      }
   }
}

/* End of file Projects.php */
/* Location: ./application/controllers/api/Projects.php */
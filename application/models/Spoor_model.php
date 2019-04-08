<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spoor_model extends CI_Model
{
   public function getUserByUsername($username){
      return $this->mongo_db
						->where('username', $username)
						->get('user');
   }
	
	public function getUserByEmail($email){
      return $this->mongo_db
						->where('email', $email)
						->get('user');
   }
	
	public function insert($data){
		return $this->mongo_db->insert('user', $data);
   }
	
	public function group_insert($data){
		return $this->mongo_db->insert('user_group', $data);
   }
	
	public function getUsers(){
      return $this->mongo_db->order_by(array('name'=>'ASC'))
                            ->get('users');
   }
	
	public function getUser($user_id){
      return $this->mongo_db->where(array('_id'=>new MongoId($user_id)))
									 ->find_one('users');
   }
	
	public function updateUser($user_id, $data){
		return $this->mongo_db->where('_id', new MongoId($user_id))
                            ->set($data)
                            ->update('users');
	}
	
	public function deleteUser($id){
      return $this->mongo_db->where('_id', new MongoId($id))
                            ->delete('users');
   }

	public function getSpoors($user_id){
      return $this->mongo_db->where(array('user_id'=>new MongoId($user_id)))
									 ->order_by(array('address_name'=>'ASC'))
                            ->get('zippers');
   }
	
	public function getSpoor($spoor_id){
      return $this->mongo_db->where(array('_id'=>new MongoId($spoor_id)))
									 ->find_one('zippers');
   }
	
	public function updateSpoor($spoor_id, $data){
		return $this->mongo_db->where('_id', new MongoId($spoor_id))
                              ->set($data)
                              ->update('zippers');
	}
	
	public function addSpoor($data){
		return $this->mongo_db->insert('zippers', $data);
	}
	
	public function getShares($user_id){
      /*return $this->mongo_db->where(array('member.user_id'=>new MongoId($user_id)))
									 ->order_by(array('date'=>'ASC'))
                            ->get('sharings');*/
		$ops = array(
			array(
			'$match'=>array(
				'member.user_id'=>new MongoId($user_id),
			)), 
			array('$unwind'=>'$member'),
			array(
			'$lookup'=> array(
				'from'=>'users',
				'localField'=> 'member.user_id',
				'foreignField'=>'_id',
				'as'=> 'memberinfo'
			)),
			array('$unwind'=>'$memberinfo'),
			array('$project'=>array(
			  '_id'=>1,
			  'group_created_id'=>1,
			  'duration'=>1,
			  'status'=>1,
			  'date'=>1,
			  'group_type'=>1,
			  'member'=>array(
					'_id'=>'$member._id',
					'user_id'=>'$member.user_id',
					'status'=>'$member.status',
					'memberinfo'=>'$memberinfo'
				)
			)),
			array(
			'$match'=>array(
				'member.user_id'=>array('$ne'=>new MongoId($user_id)),
				'member.status'=>array('$ne'=>0),
			)),
		);
		
		return $this->mongo_db->aggregate('sharings',$ops);

   }
	public function getTrackingHistory($share_id){
		/*return $this->mongo_db->where(array('location_sharing_id'=>new MongoId($share_id)))
									 ->get('trackings');*/
		$ops = array(
			array(
			'$match'=>array(
				'location_sharing_id'=>new MongoId($share_id),
			)), 
			//array('$unwind'=>'$member'),
			array(
			'$lookup'=> array(
				'from'=>'users',
				'localField'=> 'user_id',
				'foreignField'=>'_id',
				'as'=> 'memberinfo'
			)),
			array('$unwind'=>'$memberinfo'),
			array('$project'=>array(
			  '_id'=>1,
			  'location_sharing_id'=>1,
			  'date'=>1,
			  'memberinfo'=>'$memberinfo',
			  'track'=>1
			)),
			
		);
		
		return $this->mongo_db->aggregate('trackings',$ops);
	}
	
	public function getMeeting($share_id){
		return $this->mongo_db->where(array('location_sharing_id'=>new MongoId($share_id)))
									 ->get('meetings');
	}
}

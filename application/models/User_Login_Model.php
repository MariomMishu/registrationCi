<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User_Login_Model extends CI_Model {


public function validatelogin($email,$password,$sts){

	$query=$this->db->where(array('email'=>$email,'password'=>$password));
		$account=$this->db->get('tbluser')->row();
		if($account!=NULL){
	 		$dbstatus=$account->sts;
	//verifying status
			if( $dbstatus==$sts){
					return $account->id;
			} else {
					return NULL;
			$this->session->set_flashdata('error', 'Your accounis is not active contact admin');
			redirect('user/login');
			}
		}
	return NULL;
	}
}


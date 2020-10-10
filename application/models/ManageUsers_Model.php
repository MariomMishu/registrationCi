<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class ManageUsers_Model extends CI_Model{
	public function getusersdetails($search=[]){

		//$query=$this->db->select('*');
		$query= $this->db->select ( 'user.*,div.name as div_name,dis.name as dis_name,upa.name as upa_name',FALSE)
				         ->from ('tbluser as user')
						 ->join('tbl_division div', 'div.id=user.division', 'left')
				    	 ->join('tbl_district dis', 'dis.id=user.district', 'left')
				    	 ->join('tbl_upazila upa', 'upa.id=user.upazila', 'left');
		
		if (isset($search['division']) && $search['division'] != '') {
			$query->where('user.division',$search['division']);
		}
		if (isset($search['district']) && $search['district'] != '') {
			$query->where('user.district',$search['district']);
		} 
		if (isset($search['upazila']) && $search['upazila'] != '') {
			$query->where('user.upazila',$search['upazila']);
		} 
		
		if (isset($search['name']) && $search['name'] != '') {
			$query->like('user.name',$search['name']);
		} 
		if (isset($search['email']) && $search['email'] != '') {
			$query->where('user.email',$search['email']);
		} 

         $data= $query->get();
         $data->result();
         //echo $search['division'];
         //echo $this->db->last_query();      
        return $data->result();      
	}
//Getting particular user deatials on the basis of id	
 public function getuserdetail($uid){
 	$ret=$this->db->select('*')
 	              ->where('id',$uid)
 	              ->get('tbluser');
 	                return $ret->row();
 }
public function getEducationDetail($uid){
 	$ret=$this->db->select('edu.*,exam.name as exam_name,uni.name as uni_name,brd.name as board_name')
					->from ('tbl_education as edu')
			 ->join('tbl_exam exam', 'exam.id=edu.exam_id', 'left')
	    	 ->join('tbl_university uni', 'uni.id=edu.uni_id', 'left')
	    	 ->join('tbl_board brd', 'brd.id=edu.board_id', 'left')
 	              ->where('edu.user_id',$uid)
 	              ->get();
 	                return $ret->result();
 }
 public function getTrainingDetail($uid){
 	$ret=$this->db->select('*')
 	              ->where('user_id',$uid)
 	              ->get('tbl_training');
 	                return $ret->result();
 }
 // Function for use deletion
 public function deleteuser($uid){
	$sql_query=$this->db->where('id', $uid)
                ->delete('tbluser');
 }
 public function getAllUni(){
 	$ret=$this->db->select('id,name')
 	              ->get('tbl_university');
 	                return $ret->result();
 }
 public function getAllBoard(){
 	$ret=$this->db->select('id,name')
 					->where('sts',1)
 	              ->get('tbl_board');
 	                return $ret->result();
 }
 public function getAllExam(){
 	$ret=$this->db->select('id,name')
 					->where('sts',1)
 	              ->get('tbl_exam');
 	                return $ret->result();
 }
 public function getAllDivision(){
 	$ret=$this->db->select('id,name')
 					->where('sts',1)
 	              ->get('tbl_division');
 	                return $ret->result();
 }
 public function getAllDistrict($division=NULL){

 	$ret=$this->db->select('id,name')
		->where('sts',1);
	if($division != NULL){
		$ret->where('division',$division);
	}			

	$ret= $ret->get('tbl_district');
	return $ret->result();
 }
 public function getAllUpazila($district=NULL){
 	$ret=$this->db->select('id,name')->where('sts',1);
	
	if($district != NULL){
		$ret->where('district',$district);
	}	
 	$ret= $ret->get('tbl_upazila');
    return $ret->result();
 }
}
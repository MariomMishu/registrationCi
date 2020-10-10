<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Profile_Model extends CI_Model{

public function getprofile($userid){
	$query=$this->db->select('name,email,mobile,address,reg_date')
                ->where('id',$userid)
                ->from('tbluser')
                ->get();
  return $query->row();  
}

public function update_profile($name,$address,$mobile,$userid){
$data = array(
               'name' =>$name,
               'address' => $address,
               'mobile' => $mobile
            );

$sql_query=$this->db->where('id', $userid)
                ->update('tbluser', $data); 


}
public function update_user($name,$email,$address,$division,$district,$upazila,$userid){
$data = array(
               'name' =>$name,
               'address' => $address,
               'division' => $division,
               'district' => $district,
               'upazila' => $upazila,
               'email' => $email
            );
//var_dump($data);
return $this->db->where('id', $userid)
                ->update('tbluser', $data); 
         
}

}
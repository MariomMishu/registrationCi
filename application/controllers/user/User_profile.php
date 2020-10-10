<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User_profile extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('uid'))
redirect('user/login');
$this->load->model('User_Profile_Model');
}

public function index(){
$userid = $this->session->userdata('uid');
$profiledetails=$this->User_Profile_Model->getprofile($userid);
$this->load->view('user/user_profile',array('profile'=>$profiledetails));
}


public function updateprofile(){
$this->form_validation->set_rules('name',' Name','required|alpha');
$this->form_validation->set_rules('address','Address','required|alpha');
$this->form_validation->set_rules('mobile','Mobile Number','required|numeric|exact_length[10]');
if($this->form_validation->run()){
$name=$this->input->post('name');
$address=$this->input->post('address');
$mobile=$this->input->post('mobile');
$userid = $this->session->userdata('uid');
$this->User_Profile_Model->update_profile($name,$address,$mobile,$userid);
$this->session->set_flashdata('success','Profile updated successfull.');
return redirect('user/user_profile');

} else {
	$this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');
redirect('user/user_profile');
}

}
}

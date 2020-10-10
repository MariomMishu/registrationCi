<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Users extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adid'))
redirect('admin/login');
}

public function index(){

$search=[];
$search['division']=$this->input->get('division');
$search['district']=$this->input->get('district');
$search['upazila']=$this->input->get('upazila');
$search['name']=$this->input->get('name');
$search['email']=$this->input->get('email');
//var_dump($district);
//die();

$this->load->model('ManageUsers_Model');
$allDiv=$this->ManageUsers_Model->getAllDivision();
$user=$this->ManageUsers_Model->getusersdetails($search);
$this->load->view('admin/manage_users',array('userdetails'=>$user,'division'=>$allDiv));
}

// For particular Record
public function getuserdetail($uid)
{
$this->load->model('ManageUsers_Model');
		//$allUni=$this->ManageUsers_Model->getAllUni();
		//$allBoard=$this->ManageUsers_Model->getAllBoard();
		//$allExam=$this->ManageUsers_Model->getAllExam();
		$allDiv=$this->ManageUsers_Model->getAllDivision();
		$allDis=$this->ManageUsers_Model->getAllDistrict();
		$allUpa=$this->ManageUsers_Model->getAllUpazila();
$udetail=$this->ManageUsers_Model->getuserdetail($uid);
$edu_detail=$this->ManageUsers_Model->getEducationDetail($uid);
//var_dump($edu_detail);
//die();
$training_detail='';
if($udetail->training==1){
	$training_detail=$this->ManageUsers_Model->getTrainingDetail($uid);
}
$this->load->view('admin/getuserdetails_edit',array('ud'=>$udetail,'division'=>$allDiv,'upazila'=>$allUpa,'district'=>$allDis,'edu_detail'=>$edu_detail,'training_detail'=>$training_detail));
}

public function deleteuser($uid)
{
$this->load->model('ManageUsers_Model');
$this->ManageUsers_Model->deleteuser($uid);
$this->session->set_flashdata('success', 'User data deleted');
redirect('admin/manage_users');
}
public function updateUser(){
$this->form_validation->set_rules('name',' Name','required|alpha');
$this->form_validation->set_rules('address','Email','required');

if($this->form_validation->run()){
	
$name=$this->input->post('name');
$email=$this->input->post('email');
$address=$this->input->post('address');
$division=$this->input->post('division');
		$district=$this->input->post('district');
		$upazila=$this->input->post('upazila');
		$language_bangla=$this->input->post('language_bangla');
		$language_english=$this->input->post('language_english');
		$language_french=$this->input->post('language_french');
$userid = $this->input->post('id');
$this->load->model('User_Profile_Model');
$this->User_Profile_Model->update_user($name,$email,$address,$division,$district,$upazila,$userid);

redirect('admin/manage_users');

} else {
	$this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');

}

}

}
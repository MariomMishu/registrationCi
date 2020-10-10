<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends CI_Controller {

public function index()
{
$this->load->view('home');
}
 public function getDistrictList(){
 	$this->load->model('ManageUsers_Model');
 	$division=$this->input->get('division');
 	$allDis=$this->ManageUsers_Model->getAllDistrict($division);
 	//var_dump($allDis);
	return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($allDis));

 }
 public function getUpazilaList(){
 	$this->load->model('ManageUsers_Model');
 	$district=$this->input->get('district');
 	$allUpazila=$this->ManageUsers_Model->getAllUpazila($district);
 	//var_dump($allDis);
	return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($allUpazila));

 }
}	
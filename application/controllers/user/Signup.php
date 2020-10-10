<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Signup extends CI_Controller {

/*public function index(){

		$this->load->model('ManageUsers_Model');
		$allUni=$this->ManageUsers_Model->getAllUni();
		$allBoard=$this->ManageUsers_Model->getAllBoard();
		$allExam=$this->ManageUsers_Model->getAllExam();
		$allDiv=$this->ManageUsers_Model->getAllDivision();
		$this->load->view('user/signup',array('uni'=>$allUni,'division'=>$allDiv,'exam'=>$allExam,'board'=>$allBoard));

}*/
public function index(){

$this->form_validation->set_rules('name','Name','required|alpha');
$this->form_validation->set_rules('address','Address','required');
$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tblusers.emailId]');
/*$this->form_validation->set_rules('division','Division','required');
$this->form_validation->set_rules('district','District','required');
$this->form_validation->set_rules('upazila','Upazila','required');
$this->form_validation->set_rules('language','Languagr','required');
$this->form_validation->set_rules('training','Training','required');*/
$this->form_validation->set_rules('mobile','Mobile Number','required|numeric|exact_length[10]');
$this->form_validation->set_rules('password','Password','required|min_length[6]');
$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
//$file=array();	
	if($this->form_validation->run()){
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$email=$this->input->post('email');
		$division=$this->input->post('division');
		$district=$this->input->post('district');
		$upazila=$this->input->post('upazila');
		$language_bangla=$this->input->post('language_bangla');
		$language_english=$this->input->post('language_english');
		$language_french=$this->input->post('language_french');
		$training=$this->input->post('training');
		$mobile=$this->input->post('mobile');
		$password=$this->input->post('password');
		
		$photo_name = $_FILES['file1']['name'];
		$file_name = $_FILES['cv_attach']['name'];

		if ($photo_name)
		{
			$j = strrpos($photo_name,".");
			$l = strlen($photo_name) - $j;
			$extension = substr($photo_name,$j+1,$l);
			$acPhotoname	= substr($photo_name,0,$j);
			$extension = strtolower($extension);
			$imgname=$this->fileexitcheck('uploads/photo/',$acPhotoname.date('Y-m-d'),'.'.$extension,'');						
			move_uploaded_file($_FILES['file1']['tmp_name'],"uploads/photo/".$imgname);
			
			$photo =  $imgname;						
			$photo_actual =  $acPhotoname;
		}
		if ($file_name)
		{
			$j = strrpos($file_name,".");
			$l = strlen($file_name) - $j;
			$extension = substr($file_name,$j+1,$l);
			$acFilename	= substr($file_name,0,$j);
			$extension = strtolower($extension);
			$filename=$this->fileexitcheck('uploads/cv/',$acFilename.date('Y-m-d'),'.'.$extension,'');						
			move_uploaded_file($_FILES['cv_attach']['tmp_name'],"uploads/cv/".$filename);
			
			$cv_attach =  $filename;						
			$cv_actual =  $acFilename;
		}
		$this->load->model('Signup_Model');
		 $this->Signup_Model->insert($name,$address,$email,$division,$district,$upazila,$language_bangla,$language_english,$language_french,$training,$mobile,$password,$photo,$photo_actual,$cv_attach,$cv_actual);
		
	} else {
		$this->load->model('ManageUsers_Model');
		$allUni=$this->ManageUsers_Model->getAllUni();
		$allBoard=$this->ManageUsers_Model->getAllBoard();
		$allExam=$this->ManageUsers_Model->getAllExam();
		$allDiv=$this->ManageUsers_Model->getAllDivision();
		//$allDis=$this->ManageUsers_Model->getAllDistrict();
		//$allUpazila=$this->ManageUsers_Model->getAllUpazila();
		//print_r($allDiv);
		$this->load->view('user/signup',array('uni'=>$allUni,'division'=>$allDiv,'exam'=>$allExam,'board'=>$allBoard));
	}
	

}
public function ajax_submit(){
$data=[];
$Message='OK';
$this->form_validation->set_rules('name','Name','required|alpha');	
	if($this->form_validation->run()){
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$email=$this->input->post('email');
		$division=$this->input->post('division');
		$district=$this->input->post('district');
		$upazila=$this->input->post('upazila');
		$language_bangla=$this->input->post('language_bangla');
		$language_english=$this->input->post('language_english');
		$language_french=$this->input->post('language_french');
		$training=$this->input->post('training');
		$mobile=$this->input->post('mobile');
		$password=$this->input->post('password');
		
		$photo_name = $_FILES['file1']['name'];
		$file_name = $_FILES['cv_attach']['name'];

		if ($photo_name)
		{
			$j = strrpos($photo_name,".");
			$l = strlen($photo_name) - $j;
			$extension = substr($photo_name,$j+1,$l);
			$acPhotoname	= substr($photo_name,0,$j);
			$extension = strtolower($extension);
			$imgname=$this->fileexitcheck('uploads/photo/',$acPhotoname.date('Y-m-d'),'.'.$extension,'');						
			move_uploaded_file($_FILES['file1']['tmp_name'],"uploads/photo/".$imgname);
			
			$photo =  $imgname;						
			$photo_actual =  $acPhotoname;
		}
		if ($file_name)
		{
			$j = strrpos($file_name,".");
			$l = strlen($file_name) - $j;
			$extension = substr($file_name,$j+1,$l);
			$acFilename	= substr($file_name,0,$j);
			$extension = strtolower($extension);
			$filename=$this->fileexitcheck('uploads/cv/',$acFilename.date('Y-m-d'),'.'.$extension,'');						
			move_uploaded_file($_FILES['cv_attach']['tmp_name'],"uploads/cv/".$filename);
			
			$cv_attach =  $filename;						
			$cv_actual =  $acFilename;
		}
		$this->load->model('Signup_Model');
		 $this->Signup_Model->insert($name,$address,$email,$division,$district,$upazila,$language_bangla,$language_english,$language_french,$training,$mobile,$password,$photo,$photo_actual,$cv_attach,$cv_actual);
		 $Message='OK';
	} else {
		$this->load->model('ManageUsers_Model');
		$allUni=$this->ManageUsers_Model->getAllUni();
		$allBoard=$this->ManageUsers_Model->getAllBoard();
		$allExam=$this->ManageUsers_Model->getAllExam();
		$allDiv=$this->ManageUsers_Model->getAllDivision();

		$Message="Sorry, Could not Saved!!!";
	}	
	$data = [
			'Message' => $Message
		];
		//echo json_encode($data);
	return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));

}

function fileexitcheck($file_path=NULL,$file_name=NULL,$file_type='.csv',$num=NULL,$multi=NULL)
	{
		if($file_name!='')
		{
			if(file_exists($file_path.$file_name.$multi.$num.$file_type))
			{
				if($num==''){$num=1;}else{$num++;}
				return $this->fileexitcheck($file_path,$file_name,$file_type,$num,'_');
			}
			else
			{
				return $file_name.$multi.$num.$file_type;
			}
		}
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Signup_Model extends CI_Model{

	public function insert($name,$address,$email,$division,$district,$upazila,$language_bangla,$language_english,$language_french,$training,$mobile,$password,$photo,$photo_actual,$cv_attach,$cv_actual){
		$data=array(
					'name'=>$name,
					'address'=>$address,
					'email'=>$email,
					'division'=>$division,
					'district'=>$district,
					'upazila'=>$upazila,
					'language_bangla'=>$language_bangla,
					'language_english'=>$language_english,
					'language_french'=>$language_french,
					'training'=>$training,
					'mobile'=>$mobile,
					'password'=>$password,
					'photo'=>$photo,
					'photo_actual'=>$photo_actual,
					'cv_attach'=>$cv_attach,
					'cv_actual'=>$cv_actual
				);
		//print_r($data);
		$sql_query=$this->db->insert('tbluser',$data);
		$user_id =$this->db->insert_id();
		//echo $this->db->last_query();
		if($sql_query){
		//	return $this->db->insert_id();
			for ($i = 1; $i <= $this->input->post('counter'); $i++) {
               if ($this->input->post('deletedrow' . $i) != '1') {
                   $sdata=array(
					'user_id'=>$user_id,
					'exam_id'=>$this->input->post('exam_id' . $i),
					'uni_id'=>$this->input->post('uni_id' . $i),
					'board_id'=>$this->input->post('board_id' . $i),
					'result'=>$this->input->post('result' . $i)
				);
                //   print_r($sdata);
				$p=$this->db->insert('tbl_education',$sdata);
                }       
            }
            if($this->input->post('training')==1){
            	for ($j = 1; $j <= $this->input->post('training_counter'); $j++) {
              	 if ($this->input->post('training_deletedrow' . $j) != '1') {
                   $tdata=array(
					'user_id'=>$user_id,
					'training_name'=>$this->input->post('training_name' . $j),
					'training_details'=>$this->input->post('training_details' . $j)
					);
                //   print_r($sdata);
					$t=$this->db->insert('tbl_training',$tdata);
               	 }       
            	}
            }
			$this->session->set_flashdata('success', 'Registration successfull');
			redirect('user/signup');
		}
		else{
			//print_r($data);
			//print_r($sdata);
				$this->session->set_flashdata('error', 'Somthing went worng. Error!!');
				redirect('user/signup');
		}

	}
	public function education_insert($user_id,$exam_id,$uni_id,$board_id,$result){
		$data=array(
					'user_id'=>$user_id,
					'exam_id'=>$exam_id,
					'uni_id'=>$uni_id,
					'board_id'=>$board_id,
					'result'=>$result
				);
		$sql_query=$this->db->insert('tbl_education',$data);
		//echo $this->db->last_query();exit;
		if($sql_query){
			//return $this->db->insert_id();
			$this->session->set_flashdata('success', 'Registration successfull');
				redirect('user/signup');
		}
		else{
				$this->session->set_flashdata('error', 'Somthing went worng. Error!!');
				redirect('user/signup');
		}

	}


}
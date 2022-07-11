<?php

class Registration extends MY_Controller
{

	/*======= STUDENT REGISTRATION =========*/
	public function index()
	{
		$data['company_info'] = $this->Settings_model->get_company_info();
		$data['title'] = $data['company_info']['name'] . " | Registration";
		$this->load->view('Registration/index', $data);
	}

	/*======= REGISTER =======*/
	public function register()
	{
		if ($_POST) {
			$config = array(
				array(
					'field' => 'first_name',
					'label' => 'First Name',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'last_name',
					'label' => 'Last Name',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'dob',
					'label' => 'Date of Birth',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'phone',
					'label' => 'Phone Number',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'trim|required|matches[password]'
				),
				array(
					'field' => 'customRadio',
					'label' => 'Gender',
					'rules' => 'trim|required'
				)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == false) {
				echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
			} else {

				// echo '<pre>'; print_r($_POST); exit;
				$user_id = $this->Registration_model->register($_POST);
				if (!empty($user_id)) {
					$redirect_link = base_url('login');
					echo json_encode(array("msg_type" => "success", "message" => "Registration completed successfully", "redirect_link" => $redirect_link));
				} else {
					echo json_encode(array("msg_type" => "error", "message" => "Something went wrong.."));
				}
			}
		}
	}

//	GET PROGRAMS BY ID
	public function get_degree_programs_by_id()
	{
		if ($this->isLoggedIn())
		{
			$degree_id = $this->input->post('degree_id');
			$data['program_details'] = $this->Registration_model->get_programs_by_id($degree_id);
//			echo "<pre>"; print_r($data['program_details']); exit;
			$this->load->view('backend/degrees_programs/program_ajax', $data);
		} else{
			redirect(base_url());
		}

	}


	/*======== MANAGE REGISTRATIONS ========*/
	public function manage_registrations()
	{
		if ($this->isLoggedIn()) {

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['registrations'] = $this->Registration_model->get_all_registrations();
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | Manage Registration";
			$this->load->view('backend/manage_registrations', $data);
		} else {
			redirect(base_url());
		}
	}


	public function get_registration_status()
	{

		if ($this->isLoggedIn()) {
			$data['registration_id'] = $this->input->post('registration_id');
			$data['detail'] = $this->Registration_model->get_registrations_status($data['registration_id']);
			$this->load->view('backend/update_reg_status_ajax', $data);
		} else {
			redirect(base_url());
		}
	}

	public function  update_status()
	{
		if ($this->isLoggedIn()) {
			$registration_id = $this->input->post('registration_id');
			$this->Registration_model->update_registration($_POST, $registration_id);
			echo json_encode(array("msg_type" => "success", "message" => "Status Updated successfully"));
		} else {
			redirect(base_url());
		}
	}

	/*======== UPDATE MY DETAIL ==========*/
	public function update_my_detail()
	{
		if ($this->isLoggedIn()) {
			$uploadData = array();
			$errorUploadType = $statusMsg = '';
			// If files are selected to upload
			if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
				$filesCount = count($_FILES['files']['name']);
				for ($i = 0; $i < $filesCount; $i++) {
					$_FILES['file']['name']     = $_FILES['files']['name'][$i];
					$_FILES['file']['type']     = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['files']['error'][$i];
					$_FILES['file']['size']     = $_FILES['files']['size'][$i];

					// File upload configuration
					$uploadPath = 'uploads/student_documents/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|pdf|docx';
					$config['max_size']    = '10240';

					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					// Upload file to server
					if ($this->upload->do_upload('file')) {
						// Uploaded file data
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
					} else {
						$errorUploadType .= $_FILES['file']['name'] . ' | ';
					}
				}

				$errorUploadType = !empty($errorUploadType) ? '<br/>File Type Error: ' . trim($errorUploadType, ' | ') : '';
				if (!empty($uploadData)) {
					$data[] = $uploadData;
				} else {
					$statusMsg = "Sorry, there was an error uploading your file." . $errorUploadType;
				}
			} else {
				$statusMsg = 'Please select valid files to upload.';
			}
			if (!empty($errorUploadType)) {
				echo json_encode(array("msg_type" => "error", "message" => "Invalid File Format"));
				die;
			}
			if ($_POST) {
				$config = array(
					array(
						'field' => 'first_name',
						'label' => 'First Name',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'middle_name',
						'label' => 'Middle Name',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'last_name',
						'label' => 'Last Name',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'contact',
						'label' => 'Phone Number',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'whatsapp',
						'label' => 'Whatsapp Number',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'school_attended',
						'label' => 'School Attended',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'degree_of_interest',
						'label' => 'Degree of Interest',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'dob',
						'label' => 'Date of Birth',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'customRadio',
						'label' => 'Gender',
						'rules' => 'trim|required'
					)

				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {

					// echo "<pre>"; print_r($_FILES);exit;
					$user_id = $this->input->post('user_id');
					$this->Registration_model->update_my_details($_POST, $user_id, $uploadData);
					echo json_encode(array("msg_type" => "success", "message" => "Registration updated successfully"));
				}
			}
		} else {
			redirect(base_url());
		}
	}

	public function detail()
	{
		if ($this->isLoggedIn()) {

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$u_id = $this->uri->segment('3');
			$group = $this->session->userdata['role'];
			$data['registration'] = $this->Registration_model->get_reg_by_id($u_id);
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | Registration Detail";
			$this->load->view('backend/registration_detail', $data);
		} else {
			redirect(base_url());
		}
	}


	// /======= DELETE REGISTRATION DOCUMENT =========/
	public function delete_reg_doc()
	{
		if($this->isLoggedIn())
		{
			$file_name = $this->input->post('filename');
		    // echo '<pre>'; print_r($file_name); exit;

			$user_id = $this->input->post('user_id');
			$data['docs'] = $this->Registration_model->get_reg_doc($user_id);
			$json_decode = json_decode($data['docs'][0]->documents);
			foreach ($json_decode as $key => $value){
				if ($value->file_name == $file_name) {

					unset($json_decode[$key]);
				}
			}

		    //echo '<pre>'; print_r($json_decode); exit;
			$json_encode = json_encode($json_decode);
			$response = $this->Registration_model->update_reg_doc($json_encode, $user_id);
			if($response == true)
			{
				echo json_encode(array('msg_type'=>'success','message'=>'Document Deleted Successfully..!'));
			}
			else {
				echo json_encode(array('msg_type'=>'error','message'=>'Something Went Wrong'));
			}
		}
		else {
			redirect(base_url());
		}
	}
}

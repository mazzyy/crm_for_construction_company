<?php

Class Degree_program extends MY_Controller
{

	/*======== ADD DEGREE =========*/
	public function add_degree()
	{
		if($this->isLoggedIn())
		{
			if ($_POST) {
				$config = array(
					array(
						'field' => 'degree',
						'label' => 'Degree',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {
					$this->Degree_program_model->add_degree($_POST);
					echo json_encode(array("msg_type" => "success", "message" => "Degree Added Successfully"));
				}
			}
		}
		else {
			redirect(base_url());
		}
	}



	/*======== ADD Program =========*/
	public function add_program()
	{
		if($this->isLoggedIn())
		{
			if ($_POST) {
				$config = array(
					array(
						'field' => 'degree_id',
						'label' => 'Degree',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'program',
						'label' => 'Program',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {
					$this->Degree_program_model->add_program($_POST);
					echo json_encode(array("msg_type" => "success", "message" => "Program Added Successfully"));
				}
			}
		}
		else {
			redirect(base_url());
		}
	}



//	EDIT
	public function edit_degree_modal()
	{

		if($this->isLoggedIn())
		{
			$html = '';
			$degree_id = $this->input->post('degree_id');
			$detail = $this->Degree_program_model->get_degree_byId($degree_id);
			$html .= '<input type="text" class="form-control" name="name" id="name" value="'.$detail['degree'].'" required>
			<input type="hidden" class="form-control" name="degree_id" id="degree_id" value="'.$detail['degree_id'].'">';
			echo $html;
		}
		else {
			redirect(base_url());
		}
	}




	public function get_degrees_by_ajax()
	{

		if($this->isLoggedIn())

		{
			$data['details'] = $this->Degree_program_model->get_all_degrees();
			$this->load->view('backend/degrees_programs/degrees_ajax',$data);
		}
		else {
			redirect(base_url());
		}
	}


	public function get_degrees_by_id_ajax()
	{

		if($this->isLoggedIn())
		{
			$program_id = $this->input->post('program_id');
			$data['degrees'] = $this->Degree_program_model->get_all_degrees();
			$data['program'] =$this->Degree_program_model->get_program_by_id($program_id);
			$this->load->view('backend/degrees_programs/degrees_ajax',$data);
		}
		else {
			redirect(base_url());
		}
	}





	/*===== UPDATE DEGREE NAME ======*/
	public function save_edit_degree()
	{
		if($this->isloggedIn())
		{
			if($_POST)
			{
				$config = array(
					array(
						'field' => 'name',
						'label' => 'Degree Name',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if($this->form_validation->run() == false)
				{
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				}
				else
				{
					$id = $this->input->post('degree_id');
					$this->Degree_program_model->edit_degree($_POST, $id);
//					$redirect_link = base_url('Users/manage_user_groups');
					echo json_encode(array("msg_type" => "success", "message" => "Degree Updated Successfully"));
				}
			}
		}
		else {
			redirect(base_url());
		}
	}




	/*===== UPDATE PROGRAM NAME ======*/
	public function save_edit_program()
	{
		if($this->isloggedIn())
		{
			if($_POST)
			{
				$config = array(
					array(
						'field' => 'degree_id',
						'label' => 'Degree Name',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'program',
						'label' => 'Degree Name',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if($this->form_validation->run() == false)
				{
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				}
				else
				{

					$id = $this->input->post('program_id');
//					print_r($_POST); exit;
					$this->Degree_program_model->edit_program($_POST, $id);
					echo json_encode(array("msg_type" => "success", "message" => "Program Updated Successfully"));
				}
			}
		}
		else {
			redirect(base_url());
		}
	}



	/*========= MANAGE DEGREES ========*/
	public function manage_degrees()
	{
		if($this->isLoggedIn())
		{
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['degrees'] = $this->Degree_program_model->get_all_degrees();
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | Manage Degrees";
			$this->load->view('backend/degrees_programs/manage_degrees', $data);
		}
		else {
			redirect(base_url());
		}
	}

	/*======== MANAGE PROGRAMS ========*/
	public function manage_programs()
	{
		if($this->isLoggedIn())
		{
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			//$data['registrations'] = $this->Registration_model->get_all_registrations();
			$data['degrees'] = $this->Degree_program_model->get_all_degrees();
			$data['program'] = $this->Degree_program_model->get_all_programs();
//			echo "<pre>"; print_r($data['program']); exit;
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | Manage Programs";
			$this->load->view('backend/degrees_programs/manage_programs', $data);
		}
		else {
			redirect(base_url());
		}
	}
}

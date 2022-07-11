<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller {

	public function index(){

		if ($this->isLoggedIn()) {
			$this->load->model('Employees_model');
            $allEmployees=$this->Employees_model->allemployees(); 

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
		    $data['menu'] = $this->Menu_model->getMenuItems($group);
		    $data['parents'] = $this->Menu_model->getMenuParents('menus');
			$data['fonts'] = $this->Settings_model->getAll('fonts');
			$data['routes'] = $this->Menu_model->get_all_routes();
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name']." | Add Menu";
			$data['all']=$allEmployees;
			
		


			$this->load->view('emails/Email_verification',$data);
		} else {
			redirect(base_url());
		}

	}
		public function add(){

			if ($this->isLoggedIn()) {
			
				$user_id = $this->session->userdata['id'];
				$data['user'] = $this->Users_model->get_user_by_id($user_id);
				$group = $this->session->userdata['role'];
				$data['menu'] = $this->Menu_model->getMenuItems($group);
				$data['parents'] = $this->Menu_model->getMenuParents('menus');
				$data['fonts'] = $this->Settings_model->getAll('fonts');
				$data['routes'] = $this->Menu_model->get_all_routes();
				$data['company_info'] = $this->Settings_model->get_company_info();
				$data['title'] = $data['company_info']['name']." | Add Menu";
				

				$this->load->view('emails/admin_note_email',$data);
			} else {
				redirect(base_url());
			}

		}
		
		public function store(){

			if ($this->isLoggedIn()) {
				$this->load->model('Employees_model');
				$allEmployees=$this->Employees_model->allemployees(); 
				
			
				$user_id = $this->session->userdata['id'];
				$data['user'] = $this->Users_model->get_user_by_id($user_id);
				$group = $this->session->userdata['role'];
				$data['menu'] = $this->Menu_model->getMenuItems($group);
				$data['parents'] = $this->Menu_model->getMenuParents('menus');
				$data['fonts'] = $this->Settings_model->getAll('fonts');
				$data['routes'] = $this->Menu_model->get_all_routes();
				$data['company_info'] = $this->Settings_model->get_company_info();
				$data['title'] = $data['company_info']['name']." | Add Menu";
				$data['all']=$allEmployees;

				if ($_POST)
				{
					$config = array(
						array(
							'field' => 'fname',
							'label' => 'First Name',
							'rules' => 'required'
						),
						array(
							'field' => 'lname',
							'label' => 'last Name',
							'rules' => 'required'
						)
					);
					
					$this->form_validation->set_rules($config);

					if ($this->form_validation->run() == false) {
						echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
					}else{
							$formData['fname']=$this->input->post('fname');
							$formData['lname']=$this->input->post('lname');
							$allEmployees=$this->Employees_model->store($formData); 
							redirect(base_url('employees'));
					}
				}
						
				
			} 

		}


		public function delete($id){

			$this->load->model("Employees_model");
			 $this->Employees_model->delete($id);
			// $this->model_admin->did_delete_row($id);
			redirect(base_url('employees'));

		}
		public function edit($id){

			if ($this->isLoggedIn()) {
				$this->load->model('Employees_model');
				$allEmployees=$this->Employees_model->allemployees(); 
	
				$user_id = $this->session->userdata['id'];
				$data['user'] = $this->Users_model->get_user_by_id($user_id);
				$group = $this->session->userdata['role'];
				$data['menu'] = $this->Menu_model->getMenuItems($group);
				$data['parents'] = $this->Menu_model->getMenuParents('menus');
				$data['fonts'] = $this->Settings_model->getAll('fonts');
				$data['routes'] = $this->Menu_model->get_all_routes();
				$data['company_info'] = $this->Settings_model->get_company_info();
				$data['title'] = $data['company_info']['name']." | Add Menu";
				$data['all']=$allEmployees;
			
				$emp=$this->Employees_model->edit($id); 
				$data['emp']=$emp;			
	
	
				$this->load->view('backend/employees/edit_employee',$data,$allEmployees);
			} else {
				redirect(base_url());
			}
	
		}


		public function update(){

			if ($this->isLoggedIn()) {
				$this->load->model('Employees_model');
				$allEmployees=$this->Employees_model->allemployees(); 
				
			
				$user_id = $this->session->userdata['id'];
				$data['user'] = $this->Users_model->get_user_by_id($user_id);
				$group = $this->session->userdata['role'];
				$data['menu'] = $this->Menu_model->getMenuItems($group);
				$data['parents'] = $this->Menu_model->getMenuParents('menus');
				$data['fonts'] = $this->Settings_model->getAll('fonts');
				$data['routes'] = $this->Menu_model->get_all_routes();
				$data['company_info'] = $this->Settings_model->get_company_info();
				$data['title'] = $data['company_info']['name']." | Add Menu";
				$data['all']=$allEmployees;

				if ($_POST)
				{
					$config = array(
						array(
							'field' => 'fname',
							'label' => 'First Name',
							'rules' => 'required'
						),
						array(
							'field' => 'lname',
							'label' => 'last Name',
							'rules' => 'required'
						)
					);
					
					$this->form_validation->set_rules($config);

					if ($this->form_validation->run() == false) {
						echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
					}else{
							$formData['fname']=$this->input->post('fname');
							$formData['lname']=$this->input->post('lname');
							$formData['id']=$this->input->post('id');

							$updateemployee=$this->Employees_model->update($formData); 
							
							redirect(base_url('employees'));
					}
				}
						
				
			}



		}



}

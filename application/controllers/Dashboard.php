<?php


class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/*======= DASHBOARD ========*/
	public function index()
	{
		if ($this->isLoggedIn()) {
			$group = $this->session->userdata['role'];
			//$status = array('Pending');
			if ($group === "1") {
				$user_id = $this->session->userdata['id'];
				$data['user'] = $this->Users_model->get_user_by_id($user_id);
				$data['menu'] = $this->Menu_model->getMenuItems($group);
				//echo '<pre>'; print_r($data['menu']); exit;


				//$data['daily'] = $this->Counters_model->get_today_donut_report();
				//$data['weekly'] = $this->Counters_model->get_week_donut_report();
				$data['company_info'] = $this->Settings_model->get_company_info();
				$data['title'] = $data['company_info']['name'] . " | Dashboard";
				$this->load->view('backend/dashboard/index', $data);
			} else {
				$user_id = $this->session->userdata['id'];
				$data['user'] = $this->Users_model->get_user_by_id($user_id);
				$data['registration'] = $this->Registration_model->get_reg_by_id($user_id);
				$data['degrees'] = $this->Degree_program_model->get_all_degrees();
				$docs = json_decode($data['registration']->documents, true);
				$data['docs'] = $docs;
				// echo '<pre>'; print_r($data['docs']); exit;
				$data['menu'] = $this->Menu_model->getMenuItems($group);
				//$data['counters'] = $this->Counters_model->getCounters();
				//$data['daily'] = $this->Counters_model->get_my_today_donut_report($user_id);
				//$data['weekly'] = $this->Counters_model->get_my_week_donut_report($user_id);
				$data['company_info'] = $this->Settings_model->get_company_info();
				$data['title'] = $data['company_info']['name'] . " | Dashboard";
				$this->load->view('backend/my_dashboard', $data);
			}
		} else {
			redirect(base_url('login'));
		}
	}

	/*===== ACCESS DENIED  =====*/
	public function access_denied()
	{
		if ($this->isLoggedIn()) {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | No Access";
			$this->load->view("backend/noaccess", $data);
		} else {
			redirect(base_url());
		}
	}

	/*===== UPDATE Profile ======*/
	public function save_update_profile()
	{
		if ($this->isloggedIn()) {
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
						'field' => 'contact',
						'label' => 'Contact No',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'dob',
						'label' => 'Date of Birth',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {
					//   echo "<pre>"; print_r($_POST); exit;
					$user_id = $this->input->post('user_id');
					$this->Users_model->update_profile($_POST, $user_id);
					echo json_encode(array("msg_type" => "success", "message" => "Profile Updated Successfully"));
				}
			}
		} else {
			redirect(base_url());
		}
	}
}

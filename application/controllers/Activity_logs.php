<?php

class Activity_logs extends MY_Controller
{

    /*===== GET ALL ACTIVITY LOGS ======*/
    public function index()
    {
        if($this->isLoggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['title'] = $data['company_info']['name'] . " | Activity Logs";
            $this->load->view("backend/activity_logs/activity_logs", $data);
        }
        else {
            redirect(base_url());
        }
    }


    /*===== GET ALL ACTIVITY LOGS THROUGH AJAX ======*/
    public function get_logs()
    {
        $list = $this->Activity_logs_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
		$row = array();
        foreach ($list as $logs) {
            $no++;
            $row[] = $no;
            $row[] = $logs->user;
            $row[] = $logs->action_controller;
            $row[] = $logs->action_method;
            $row[] = date('l, j-F-Y h:i:sa',strtotime($logs->date_time));
            $row[] = '<a href="'.base_url('activity_logs/log_detail').'/'.$logs->log_id.'" type="button" class="btn bg-gradient-primary btn-sm" title="View"><li class="fa fa-eye"></li></a>';
            //$data[] = $row;
			array_merge($data, $row);
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Activity_logs_model->count_all('activity_logs'),
            "recordsFiltered" => $this->Activity_logs_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    /*======= CUSTOM SEARCH =========*/
    public function custom_search()
	{
		if($this->isLoggedIn())
		{
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['users'] = $this->Activity_logs_model->get_all_users();
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | Activity Logs";
			$this->load->view("backend/activity_logs/custom_search", $data);
		}
		else {
			redirect(base_url());
		}
	}

	/*====== CUSTOM SEARCH AJAX CALL ========*/
	public function ajax_custom_search()
	{
		if ($this->isLoggedIn()) {
			if ($_POST) {
				$config = array(
					array(
						'field' => 'user_id',
						'label' => 'User',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'date_1',
						'label' => 'Date 1',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {

					$log_data = NULL;
					$user_id = $this->input->post('user_id');
					$date_1 = $this->input->post('date_1');
					$data['check'] = $this->Activity_logs_model->custom_search($user_id, $date_1);
					$this->load->view('backend/activity_logs/log_data', $data);
					//echo json_encode(array("msg_type" => "success", "message" => "Data retrieved successfully"));
				}
			}
		}
	}

    public function log_detail()
    {
    	if($this->isLoggedIn())
		{

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$log_id = $this->uri->segment(3);
			$data['log_detail'] = $this->Activity_logs_model->get_log_by_id($log_id);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | Log Detail";
			$this->load->view('backend/activity_logs/log_detail', $data);
		}
    	else {
    		redirect(base_url());
		}

    }
}

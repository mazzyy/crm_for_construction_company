<?php

class Settings extends MY_Controller
{
    /*==== EDIT SMTP CONFIG ====*/
    public function smtp_configuration()
    {
        if ($this->isLoggedIn()) {

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['smtp_config'] = $this->Settings_model->getEmailSettings();
            //echo '<pre>'; print_r($data['smtp_config']); exit;
            $data['title'] = $data['company_info']['name']." | SMTP Configuration";
            $this->load->view('backend/system_settings/smtp_configuration', $data);
        } else {
            redirect(base_url());
        }
    }

    /*===== SAVE EDIT CONFIG AJAX CALL =====*/
    public function save_smtp_setting()
    {
        if ($this->isLoggedIn()) {
            if ($_POST) {
                $config = array(
                    array(
                        'field' => 'host',
                        'label' => 'Host',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'port',
                        'label' => 'Port',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'sent_email',
                        'label' => 'Sender Email',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'sent_title',
                        'label' => 'Sender',
                        'rules' => 'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == false) {
                    echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
                } else {
                    $id = $this->input->post('id');
                    $this->Settings_model->update_smtp_config($_POST, $id);
                    $redirect_link = base_url('Settings/smtp_configuration');
                    echo json_encode(array("msg_type" => "success", "message" => "Configuration Updated Successfully", 'redirect_link' => $redirect_link));
                }

            }
        } else {
            redirect(base_url());
        }
    }

    /*===== LOGIN SETTINGS ======*/
	public function login_settings()
	{
		if ($this->isLoggedIn()) {

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['login_settings'] = $this->Login_model->get_login_settings();
			//echo '<pre>'; print_r($data['login_settings']); exit;
			$data['title'] = $data['company_info']['name']." | Login Settings";
			$this->load->view('backend/system_settings/login_settings', $data);
		} else {
			redirect(base_url());
		}
	}

	/*======== UPDATE LOGIN SETTINGS =======*/
	public function update_login_settings()
	{
		if ($this->isLoggedIn()) {
			if ($_POST) {
				//echo '<pre>'; print_r($_POST); exit;
				$config = array(
					array(
						'field' => 'failed_login_limit',
						'label' => 'Failed Login Limit',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'failed_otp_limit',
						'label' => 'Failed OTP Limit',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'otp_expire_time',
						'label' => 'OTP Expire Time',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {
					$login_setting_id = $this->input->post('login_setting_id');
					$this->Settings_model->update_login_settings($_POST, $login_setting_id);
					$redirect_link = base_url('Settings/login_settings');
					echo json_encode(array("msg_type" => "success", "message" => "Settings Updated Successfully", 'redirect_link' => $redirect_link));
				}
			}
		} else {
			redirect(base_url());
		}
	}

	/*=======  COMPANY INFO ========*/
	public function company_info()
	{
		if ($this->isLoggedIn()) {

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name']." | Company Info";
			$this->load->view('backend/system_settings/company_info', $data);
		} else {
			redirect(base_url());
		}
	}

    /*======= UPDATE COMPANY INFO =======*/
	public function update_company_info()
	{
		if ($this->isLoggedIn()) {
			if ($_POST) {
				$config = array(
					array(
						'field' => 'name',
						'label' => 'Company Name',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'email',
						'label' => 'Official Email',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'contact',
						'label' => 'Contact no',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'website',
						'label' => 'Website',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
				} else {
					$id = $this->input->post('id');
					$this->Settings_model->update_company($_POST, $id);
					$redirect_link = base_url('Settings/company_info');
					echo json_encode(array("msg_type" => "success", "message" => "Information Updated Successfully", 'redirect_link' => $redirect_link));
				}
			}
		} else {
			redirect(base_url());
		}
	}



}

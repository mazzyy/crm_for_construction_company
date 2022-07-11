<?php

class 	Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    /*===== PROFILE SETTINGS ======*/
	public function profile_settings()
	{
		if($this->isLoggedIn())
		{
			$user_id = $this->session->userdata['id'];
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name']." | Profile Settings";
			$this->load->view("backend/users/profile", $data);
		}
		else {
			redirect(base_url());
		}
	}

	/*====== UPDATE PROFILE ======*/
	public function profile_update()
	{
		if ($_POST) {

			$config = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required'
				)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == false) {
				echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
			} else {
				$user_id = $this->session->userdata['id'];
				$response = $this->Users_model->update_profile($_POST, $user_id);
				if($response == 1)
				{
					 $redirect_link = base_url('user/settings');
					 echo json_encode(array("msg_type" => "success", "message" => "Profile Updated Successfully", "redirect_link" => $redirect_link));
				}

			}
		}
	}

	/*======= VALIDATE PASSWORD =======*/
	public function valid_password($password = '')
	{
		$password = trim($password);
		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';


		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			//$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            echo json_encode(array("msg_type" => "error", "message" => "The Password field must be at least one lowercase letter."));
			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			echo json_encode(array("msg_type" => "error", "message" => "The Password field must be at least one uppercase letter."));
			//$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			echo json_encode(array("msg_type" => "error", "message" => "The Password field must have at least one number."));
			//$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{

			echo json_encode(array("msg_type" => "error", "message" => "The Password field must have at least one special character"));
			//$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			echo json_encode(array("msg_type" => "error", "message" => "The Password field must be at least 5 characters in length."));
			//$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			echo json_encode(array("msg_type" => "error", "message" => "The Password field cannot exceed 32 characters in length."));
			//$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}

	/*====== TEST CHANGE PASS =======*/
	public function change_pass()
	{
		if($this->isLoggedIn())
		{
			if ($_POST) {
				$config = array(
					array(
						'field' => 'current_password',
						'label' => 'Current Password',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'new_password',
						'label' => 'New Password',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'confirm_password',
						'label' => 'Confirm Password',
						'rules' => 'trim|required|matches[new_password]'
					)
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == false) {
					echo json_encode(array("type" => "error", "message" => validation_errors()));
				} else {

					$user_id = $this->session->userdata['id'];
					$new_password = $this->input->post('new_password');
					$check_pass = $this->valid_password($new_password);
					if($check_pass == 1)
					{
						$response =  $this->Users_model->change_pass($_POST, $user_id);
						if($response == 1)
						{
							$redirect_link = base_url('user/settings');
							echo json_encode(array("msg_type" => "success", "message" => "Password Updated Successfully", "redirect_link" => $redirect_link));
						}
						elseif($response == 'same_password') {
							echo json_encode(array("type" => "error", "message" => "New password should be different from current password"));
						}
						else {
							echo json_encode(array("type" => "error", "message" => "Your current password is invalid"));
						}
					}
				}
			}
		}
		else {
			redirect(base_url());
		}
	}

	/*======== CHANGE PASSWORD =========*/
	public function change_password()
	{
		$id = $this->uri->segment(3);
		$hash = $this->uri->segment(4);
		$data['company_info'] = $this->Settings_model->get_company_info();
		$data['title'] = $data['company_info']['name'] . " | Forgot Password";
		if ($_POST) {
			$config = array(
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'c_password',
					'label' => 'Confirm Password',
					'rules' => 'trim|required|matches[password]'
				),
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == false) {
				$json = array("type" => "error", "response" => validation_errors());
				header("application/json");
				echo json_encode($json);
			} else {
				$check = $this->Login_model->updatePassword($id, $hash, $_POST['password']);
				if ($check) {
					//$this->Admin_model->getById('users',$id);
					$redirect = base_url() . 'Login';
					$json = array(
						"type" => "success",
						"response" => "Password Updated Successfully",
						"redirect_link" => $redirect
					);
					echo json_encode($json);
				} else {
					$json = array("type" => "warning", "response" => "Your Link Is Expire Try Again");
					header("application/json");
					echo json_encode($json);
				}
			}
		} else {
			$this->load->view('backend/login/reset_password', $data);
		}
	}

    /*===== USER MANAGEMENT =====*/
    public function manage_users()
    {
        if($this->isLoggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['users'] = $this->Users_model->get_all_users();
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['title'] = $data['company_info']['name']." | Manage Users";
            $this->load->view("backend/users/manage_users", $data);
        }
        else {
            redirect(base_url());
        }
    }

    /*===== RESET USER PASSWORD ======*/
    public function reset_password()
    {
        if($this->isLoggedIn())
        {
            $user_id = $this->input->post('user_id');
            $this->Users_model->reset_password($user_id);
            $this->reset_password_email($user_id);
        }
        else {
            redirect(base_url());
        }
    }

    /*===== RESET PASSWORD EMAIL ======*/
    public function reset_password_email($user_id)
    {
        $data['detail'] = $this->Users_model->get_user_by_id($user_id);
        $data['company_info'] = $this->Admin_model->get_company_info();
        $settings = $this->Admin_model->getEmailSettings();
        $mail = new PHPMailer();
        /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug = 2;*/
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = $settings->host;
        $mail->Port = $settings->port;
        $mail->Username = $settings->email;
        $mail->Password = $settings->password;
        $mail->SetFrom($settings->sent_email, $settings->sent_title);
        $mail->AddReplyTo($settings->reply_email, $settings->reply_email);
        //////////////Email to User////////////////
        $mail->Subject = "TheIdeahosting | Password Reset";
        $mail->IsHTML(true);
        $body = $this->load->view('emails/reset_password', $data, true);
        $mail->MsgHTML($body);
        $destination = $data['detail']->email; // Who is addressed the email to
        $mail->AddAddress($destination);

        if (!$mail->Send()) {
            $data['code'] = 300;
            $data["message"] = "Error: " . $mail->ErrorInfo;
        }
    }



    /*===== VIEW USER LOGS ======*/
    public function view_user_logs()
    {
        if($this->isLoggedIn())
        {


            $user_id = $this->uri->segment(3);
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['logs'] = $this->Users_model->get_user_login_logs($user_id);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['title'] = $data['company_info']['name']." | Manage Users";
            $this->load->view("admin/user_logs", $data);
        }
        else {
            redirect(base_url());
        }
    }

    /*===== VIEW USER LOG DETAIL =====*/
    public function view_user_log_detail()
    {
        if($this->isLoggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $log_id = $this->uri->segment(3);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['users'] = $this->Users_model->get_all_users();
            $data['logs'] = $this->Users_model->get_user_log_detail($log_id);
            // $data['ips'] = $this->Settings_model->get_all_ips();
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['title'] = $data['company_info']['name']." | Manage Users";
            $this->load->view("admin/view_user_log_detail", $data);
        }
        else {
            redirect(base_url());
        }
    }

    /*===== ADD USER GROUP =======*/
	public function add_group()
	{
		if($this->isloggedIn())
		{
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
			$group = $this->session->userdata['role'];
			$data['menu'] = $this->Menu_model->getMenuItems($group);
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['groups'] = $this->Users_model->get_all_user_groups();
			//echo '<pre>'; print_r($data['groups']); exit;
			$data['active_groups'] = $this->Login_model->get_active_groups();
			$data['title'] = $data['company_info']['name']." | Add Group";
			$this->load->view("backend/users/add_group", $data);
		}
		else {
			redirect(base_url());
		}
	}

    /*===== SAVE USER  GROUP =====*/
    public function save_group()
    {
        if($this->isloggedIn())
        {
            if($_POST)
            {
                $config = array(
                    array(
                        'field' => 'name',
                        'label' => 'Name',
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
                    $this->Users_model->add_group($_POST);
                    $redirect_link = base_url('Users/manage_user_groups');
                    echo json_encode(array("msg_type" => "success", "message" => "Group Added Successfully", "redirect_link" => $redirect_link));
                }
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    /*===== MANAGE USER GROUP ======*/
    public function manage_user_groups()
    {
        if($this->isloggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['groups'] = $this->Users_model->get_all_user_groups();
            $data['title'] = $data['company_info']['name']." | Manage Groups";
            $this->load->view("backend/users/manage_groups", $data);
        }
        else {
            redirect(base_url());
        }
    }


    /*===== UPDATE USER GROUP ======*/
    public function save_edit_group()
    {
        if($this->isloggedIn())
        {
            if($_POST)
            {
                $config = array(
                    array(
                        'field' => 'name',
                        'label' => 'Group Name',
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
                    $id = $this->input->post('group_id');
                    $this->Users_model->update_group($_POST, $id);
                    $redirect_link = base_url('Users/manage_user_groups');
                    echo json_encode(array("msg_type" => "success", "message" => "Group Updated Successfully", "redirect_link" => $redirect_link));
                }
            }
        }
        else {
            redirect(base_url());
        }
    }

    /*===== DELETE GROUP =====*/
    public function delete_group()
    {
        if($this->isLoggedIn())
        {
            $id = $this->input->post('id');
            $response = $this->Users_model->delete_group($id);
            if($response == true)
            {
                echo json_encode(array("msg_type" => "success", "message" => "Group Deleted Successfully" ));
            }
            else {
                echo json_encode(array("msg_type" => "error", "message" => "Group Already In Use Cant Delete at moment"));
            }
        }
        else {
            redirect(base_url());
        }
    }


    /*======= DENIED ALL CHILD INCLUDE PARENT =======*/
    public function denied()
    {
        if($this->isLoggedIn())
        {
            $group_id = $this->input->post('group_id');
            $main_menu_id = $this->input->post('id');
            $this->Users_model->denied($group_id,$main_menu_id);
        }
        else {
            redirect(base_url());
        }
    }


    /*===== ADD USER =====*/
    public function add_user()
    {
        if($this->isloggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['groups'] = $this->Login_model->get_active_groups();
            $data['title'] = $data['company_info']['name']." | Add User";
            $this->load->view("backend/users/add_user", $data);
        }
        else {
            redirect(base_url());
        }
    }


    /*===== SAVE USER =====*/
    public function save_user()
    {
        if($this->isLoggedIn())
        {
            $config  = array(
                array(
                    'field'  => 'name',
                    'label'  => 'Username',
                    'rules'  => 'trim|required'
                ),
                array(
                    'field'  => 'email',
                    'label'  => 'Email',
                    'rules'  => 'trim|required'
                ),
                array(
                    'field'  => 'group_id',
                    'label'  => 'User Group',
                    'rules'  => 'trim|required'
                ),
				array(
					'field'  => 'password',
					'label'  => 'Password',
					'rules'  => 'trim|required'
				)

            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == false)
            {
                echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
            }
            else {
                if(isset($_POST['my-checkbox']))
                {
                    $pass = $this->input->post('password');
                	$id = $this->Users_model->create_account($_POST);
                    $this->send_credentials($id, $pass);
                    echo json_encode(array("msg_type" => "success", "message" => "User Added Successfully"));
                }
                else {

                    $this->Users_model->create_account($_POST);
					$redirect_link = base_url('users');
                    echo json_encode(array("msg_type" => "success", "message" => "User Added Successfully", "redirect_link" => $redirect_link));
                }

            }

        }
        else {
            redirect(base_url());
        }
    }

    /*==== SEND CREDENTIALS =====*/
    public function send_credentials()
    {
        
		$this->load->view('emails/test_temp');
    }

    /*====== EDIT USER ======*/
    public function edit_user()
    {
        if($this->isloggedIn())
        {
			$user_id = $this->session->userdata['id'];
            // print_r($user_id); exit;
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            // echo "<pre>"; print_r($data['user'] ); exit;
            $id = $this->uri->segment(3);
            // print_r($id);exit;
            $data['user_detail'] = $this->Users_model->get_user_detail_id($id);
            // echo "<pre>"; print_r($data['user_detail'] ); exit;
            $group = $this->session->userdata['role'];
			$data['groups'] = $this->Users_model->get_all_user_groups();
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['title'] = $data['company_info']['name']." | Edit User";
            $this->load->view("backend/users/edit_user", $data);
        }
        else {
            redirect(base_url());
        }
    }

    /*====== EDIT USER AJAX ========*/
	public function edit_user_ajax()
	{
		if($this->isLoggedIn())
		{
			$config  = array(
				array(
					'field'  => 'name',
					'label'  => 'Username',
					'rules'  => 'trim|required'
				),
				array(
					'field'  => 'email',
					'label'  => 'Email',
					'rules'  => 'trim|required'
				),
				array(
					'field'  => 'group_id',
					'label'  => 'User Group',
					'rules'  => 'trim|required'
				)

			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == false)
			{
				echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
			}
			else {

				$user_id = $this->input->post('user_id');
				$this->Users_model->edit_user($_POST, $user_id);
			    $redirect_link = base_url('users');
			    echo json_encode(array("msg_type" => "success", "message" => "User Updated Successfully", "redirect_link" => $redirect_link));
			}
		}
		else {
			redirect(base_url());
		}
	}

    /*===== EDIT USER GROUP AJAX =======*/
    public function edit_user_group()
    {
        if($this->isLoggedIn())
        {
            if($_POST)
            {
                $config = array(
                    array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'Email',
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
                    $id = $this->input->post('id');
                    $this->Users_model->update_user_group($_POST, $id);
                    echo json_encode(array("msg_type" => "success", "message" => "User  Updated Successfully"));
                }
            }
        }
        else {
            redirect(base_url());
        }
    }

    /*===== GET PARENT CHILD'S ====*/
    public function get_parent_menu_childs()
    {
        if($this->isloggedIn())
        {
            $id = $this->uri->segment(3);
            $data['childs'] = $this->Menu_model->get_child('admin_menu', $id);
            echo '<pre>'; print_r($data['childs']); exit;
        }
        else {
            redirect(base_url());
        }
    }

    /*===== GROUP PERMISSIONS ======*/
    public function group_permission()
    {
        if($this->isloggedIn())
        {

			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $data['group_id'] = $this->uri->segment(3);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();;
            $data['parents'] = $this->Menu_model->getMenuParents('menus');
            //echo '<pre>'; print_r($data['parent']); exit;
            $data['title'] = $data['company_info']['name']." | Group Permission";
            $this->load->view("backend/users/group_permissions", $data);
        }
        else {
            redirect(base_url());
        }
    }

    /*====== EDIT GROUP MODAL =======*/
	public function edit_group_modal()
	{

		if($this->isLoggedIn())
		{
			$html = '';
			$group_id = $this->input->post('group_id');
			$detail = $this->Users_model->get_group_byId($group_id);
			$html .= '<input type="text" class="form-control" name="name" id="name" value="'.$detail['type'].'" required>
			<input type="hidden" class="form-control" name="group_id" id="group_id" value="'.$detail['group_id'].'">';
			echo $html;
		}
		else {
			redirect(base_url());
		}
	}


    /*====== GET CHILD MENUS ======*/
    public function get_child_menus()
    {
        if($this->isLoggedIn())
        {
            $id = $this->input->post('id');
            $group_id = $this->input->post('group_id');
            //print_r($group_id); exit;
            $childs = $this->Menu_model->get_child('menus', $id);
            // echo '<pre>'; print_r($childs); exit;
            $i = 0;
            $fucku = null;
            $checkit = null;
            $per_val = null;
            $per_sel = null;
            foreach ($childs as $child) {
            $group_permission = $this->Users_model->get_group_permissions($child->id, $group_id);
            //echo '<pre>'; print_r($group_permission);
        $fucku .=  '<tr>  <td align="center">'.$id.'
                                 <input type="hidden" name="permission['.$i.'][group_id]" value="'.$group_id.'">
                                 <input type="hidden" name="permission['.$i.'][main_menu_id]" value="'.$id.'">
                                </td>
                                <td>
                                    '.$child->name.'
                                </td>
                                <input type="hidden" name="permission['.$i.'][sub_menu_id]" value="'.$child->id.'">
                                <td>
                                    <select class="form-control"  style="width: 100%;" name="permission['.$i.'][permission]">';
                                     // $fucku .= '<option value="YES" selected">'.var_dump($group_permission).'</"option>';
                                     if(!empty($group_permission)):
                                        foreach ($group_permission as $row) {
                                            $checkit = $row->permission; 
                                              
                                                switch ($checkit) {
                                                    case "YES":
                                                         $fucku .= '<option value="YES" selected>YES</option>
                                                                <option value="NO"  >NO</option>';
                                                                '<input type="hidden" value="update_permision">
                                                                <input type="hidden" name="update_permision" value="true">';
                                                        break;
                                                    case "NO":
                                                         $fucku .= '<option value="YES">YES</option>
                                                                    <option value="NO" selected >NO</option>
                                                                    <input type="hidden" name="update_permision" value="true">';
                                                        break;
                                                }
                                           
                                        }
                                     else:
                                             $fucku .= '<option value="YES">YES</option>
                                                       <option value="NO">NO</option>';
                                     endif;

        $fucku      .=    '</select>
                                </td>
                            </tr>'; $i++;
            }
            $fucku .= '<tr>
                                            <td colspan="6" align="center"><!--<div id="update_1"></div>-->
                                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                                <button type="button" onclick="validate(this)" value="'.$id.'" class="btn btn-danger">DENIED</button>
                                                <input type="hidden" name="group_id" value="'.$group_id.'">
                                            </td>
                                           
                                        </tr>';
                                        echo $fucku;
        }
        else {
            redirect(base_url());
        }
    }

    /*====== SAVE PERMISSION =====*/
    public function save_permission()
    {
        if($this->isLoggedIn())
        {
            if($_POST)
            {
                
               $this->Users_model->add_group_permission($_POST);
               $redirect_link = base_url('Users/manage_user_groups');
               echo json_encode(array("msg_type" => "success", "message" => "Permission Updated Successfully","redirect_link" => $redirect_link));
            }
        }
        else {
            redirect(base_url());
        }
    }


}

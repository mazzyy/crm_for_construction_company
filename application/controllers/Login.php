<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{

    /*==== FUNCTION LOGIN =====*/
    public function index()
    {

        // $password = 'Asad123';
        // $encrpyt = md5(sha1($password));
        // print_r($encrpyt);exit;
		$data['company_info'] = $this->Settings_model->get_company_info();
		$data['title'] = $data['company_info']['name']." | Login";
		if ($_POST) {
			$config = array(
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email',
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required',
				),
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == false) {
				$json = array("type" => "error", "response" => validation_errors());
				header("application/json");
				echo json_encode($json);
			} else {
				$two_factor_auth = $this->Login_model->get_login_settings();
				if($two_factor_auth['two_factor_auth'] == 1)
				{
					$user = $this->Login_model->do_login($_POST);
					if (!empty($user)) {
						$this->send_otp($user['id']);
						$redirect_link = base_url('Login/verify_otp/'.$user['id']);
						echo json_encode(array("type" => "success", "response" => "Login successful Redirecting...", "redirect_link" => $redirect_link));
					}
				}
				else {
					$response = $this->Login_model->do_login($_POST);
					if(!empty($response))
					{
						$redirect_link = base_url('dashboard');
						echo json_encode(array("type" => "success", "response" => "Login successful Redirecting...", "redirect_link" => $redirect_link));
					}
				}
			}
		} else {
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name']." | Login";
			$this->load->view('backend/login/login', $data);
		}
    }

    /*==== FUNCTION CHECK USER SESSION ====*/
    public function isLoggedIn()
    {
        if (!empty($this->session->userdata['id']) && !empty($this->session->userdata['type'])) {
            return true;
        } else {
            return false;
        }
    }

    /*==== FORGOT PASSWORD SECTION ====*/
    public function mail_change_password_Link($user)
    {
        $data['company_info'] = $this->Settings_model->get_company_info();
        $settings = $this->Settings_model->getEmailSettings();
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = $settings->host;
        $mail->Port = $settings->port;
        $mail->Username = $settings->email;
        $mail->Password = $settings->password;
        $mail->SetFrom($settings->sent_email, $settings->sent_title);
        //$mail->AddReplyTo($settings->reply_email,$settings->reply_email);
        $mail->Subject = "Please reset your password";
        $mail->IsHTML(true);
        $body = $this->load->view('emails/mailChangePasswordLink', $user, true);
        $mail->MsgHTML($body);
        $destination = $user['email']; // Who is addressed the email to
        $mail->AddAddress($destination);
        if (!$mail->Send()) {
            $data['code'] = 300;
            $data["message"] = "Error: " . $mail->ErrorInfo;
        }
    }

    /*==== FORGOT PASSWORD =====*/
    public function forgot_password()
    {
        $data['company_info'] = $this->Settings_model->get_company_info();
        $data['title'] = $data['company_info']['name'] . " | Forgot Password";
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email',
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $json = array("type" => "error", "response" => validation_errors());
                header("application/json");
                echo json_encode($json);
            } else {
                $check = $this->Login_model->checkEmail($_POST);
                //echo '<pre>'; print_r($check); exit;
                if (empty($check)) {
                    $json = array("type" => "error", "response" => "Email Not Found in Database");
                    header("application/json");
                    echo json_encode($json);
                } else {
                    $user = $this->Login_model->getUserByEmail($_POST['email']);
                    $this->mail_change_password_Link($user);
                    $json = array(
                        "type" => "success",
                        "response" => "Reset Password Link Sent Kindly Check your email"
                    );
                    echo json_encode($json);
                }
            }
        } else {
            $this->load->view('backend/login/forgot_password', $data);
        }
    }

    /*==== CHANGE PASSWORD =====*/
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


    /*===== SOME TESTING FUNCTION FOR GMAIL SIGNIN =====*/

    public function google_login()
    {
        $settings = $this->Settings_model->get_google_settings();
        $clientId = $settings->client_id; //Google client ID
        $clientSecret = $settings->client_secret_key; //Google client secret
        $redirectURL = base_url() . 'Login/google_login/';
        //Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        //   echo "setting token is".$gClient."<br>";
        // echo "getting token is".$gClient->getAccessToken();
        // exit;
        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();

            $user = $this->Login_model->getUserByEmail($userProfile['email']);
            //echo '<pre>'; print_r($user_data); die;
            //$user = $this->getRole($userProfile['email']);
            //$this->session->set_userdata('id',$user['id']);
            //$this->session->set_userdata('type',$user['type']);
            //echo "hi";
            //exit;
            //print_r($user);exit;
            if ($user) {
                $this->session->set_userdata($user);
                redirect(base_url('Dashboard'));
            } else {
                $this->session->set_flashdata('warning', 'Access Denied');
                redirect(base_url());
            }
            //$redirect_link = base_url().$user['type'];
            /*echo json_encode(array(
                "type" => "success",
                "response" => "Login successful Redirecting...",
                "redirect_link" => $redirect_link
            ));*/

            /*$json = array(
                "type" => "success",
                "response" => "Login successful Redirecting...",
                "redirect_link" => $redirect_link
            );*/
        } else {
            //echo "<script>alert('Email not Found')</script>";
            //redirect(base_url());
            /*$url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;*/
        }
    }

    public function getRole($email)
    {
        $role = $this->Login_model->getRole($email);
        //redirect(base_url().$role);
        return $role;
    }


    /*====== SUSPICIOUS LOGIN ======*/
    public function suspicious_login_email($row_id)
    {
        $data['detail'] = $this->Users_model->get_user_log_detail($row_id);
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
        $mail->Subject = "Dear Admin Mobile Login has been detected :(";
        $mail->IsHTML(true);
        $body = $this->load->view('emails/suspecious_login', $data, true);
        $mail->MsgHTML($body);
        $destination = $data['detail']['email'];
        $mail->AddAddress($destination);

        if (!$mail->Send()) {
            $data['code'] = 300;
            $data["message"] = "Error: " . $mail->ErrorInfo;
        }
    }

    /*======= SEND OTP ========*/
	public function send_otp($user_id)
	{
		$data['user'] = $this->Login_model->get_user_by_id($user_id);
		$data['otp'] = $this->Login_model->get_otp($user_id);
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
		$mail->Subject = "Your Login OTP";
		$mail->IsHTML(true);
		$body = $this->load->view('emails/login_otp', $data, true);
		$mail->MsgHTML($body);
		$destination = $data['user']['email'];
		$mail->AddAddress($destination);

		if (!$mail->Send()) {
			$data['code'] = 300;
			$data["message"] = "Error: " . $mail->ErrorInfo;
		}
	}

	/*======= VERIFY OTP =======*/
	public function verify_otp()
	{
		//$data['user_id'] = $this->uri->segment(3);
		//$check_otp = $this->Login_model->check_otp($data['user_id']);
		if (empty($check_otp)) {
			$data['company_info'] = $this->Settings_model->get_company_info();
			$data['title'] = $data['company_info']['name'] . " | OTP";
			$this->load->view('backend/login/otp_login', $data);

		} else {

			redirect(base_url('Login'));
		}

	}

	/*======= AUTHENTICATE OTP ======*/
	public function authenticate_otp()
	{
		if ($_POST) {
			$config = array(
				array(
					'field' => 'otp',
					'label' => 'OTP',
					'rules' => 'trim|required'
				)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == false) {
				echo json_encode(array("msg_type" => "error", "message" => validation_errors()));
			} else {

				$user_id = $this->input->post('user_id');
				$otp_pin = $this->input->post('otp');
				$check = $this->Login_model->verify_otp($user_id, $otp_pin);
				if($check == true)
				{
					$this->Login_model->expire_otp($user_id, $otp_pin);
					$redirect_link = base_url('Dashboard');
					echo json_encode(array("msg_type" => "success", "message" => "OTP Authenticated Redirecting...", "redirect_link" => $redirect_link));
				}
				else {
					$this->Login_model->expire_otp($user_id, $otp_pin);
				}
			}
		}
	}

}

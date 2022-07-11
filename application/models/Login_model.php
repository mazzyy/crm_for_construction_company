<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

		date_default_timezone_set('Asia/Karachi');
    }

    public function do_login($data)
    {
		$check_email = $this->db->select('*')->from('users')->WHERE('email',$data['email'])->get()->result_array();
    	if(empty($check_email))
		{
			echo json_encode(array("type" => "error", "response" => "Invalid email address"));
			exit;
		}
		$st=$this->db->select('*')->from('users')->WHERE('email',$data['email'])->WHERE('password',md5(sha1($data['password'])))->get()->result_array();
        if(count($st)>0)
        {
            if($st[0]['status']=='Active')
            {
                $two_factor_auth = $this->get_login_settings();
                if($two_factor_auth['two_factor_auth'] == 1)
				{
					$this->generate_otp($st[0]['id']); // User id
					$this->db->where('user_id', $st[0]['id'])->delete('failed_login_attempts');
					return $st[0];
				}
                else {

                	$this->login_log($st[0]['id']);
                	return $st[0];
				}
            }
            else
            {
				echo json_encode(array("type" => "error", "response" => "Your account is blocked"));
            }
        }
        else
        {
			$this->failed_login_attempts($data['email']);
        }
    }

    /*---Forgot Password----*/

    public function checkEmail($data)
    {
        $st = $this->db->select('*')->from('users')->WHERE('email', $data['email'])->get()->result_array();
        return $st;
    }

    public function getUserByEmail($email)
    {
        $st=$this->db->select('*')->from('users')->WHERE('email',$email)->get()->result_array();

        if(count($st)>0)
        {
            return $st[0];
        }
        else
        {
            return false;
        }
    }

    /*public function updatePassword($id,$hash,$password)
    {
        $st=$this->db->query("SELECT * from users WHERE id=? and hash='?'", [$id, $hash])->result_array();
        if(count($st)>0)
        {
            $newHash = md5(sha1($hash));
            $params = [md5(sha1($password)), $newHash, $id];
            $this->db->query("UPDATE users set password='?', hash='?' WHERE id=?", $params);
            return true;
        }
        else
        {
            return false;
        }

    }*/
    public function updatePassword($id, $hash, $password)
    {
        //$st = $this->db->query('SELECT * from users WHERE id=' . $id . ' and hash=\'' . $hash . '\'')->result_array();
        $st = $this->db->select('*')->from('users')->where('id', $id)->where('hash', $hash)->get()->result_array();
        if (count($st) > 0) {
            $newHash = md5(sha1($hash));
            $update = array(
            	'password' => md5(sha1($password)),
				'hash'     => $newHash
			);
            $this->db->where('id', $id)->update('users', $update);
            return true;
        } else {
            return false;
        }

    }

    /*===== SOME TESTING FUNCTION FOR GMAIL SIGNIN =====*/

    /*===== GET USER ROLE =====*/
    public function getRole($email)
    {
        //$row=$this->db->query("SELECT * from users WHERE email=$email")->result_array();
        $row = $this->db->select('*')
            ->FROM('users')
            ->WHERE('email', $email)
            ->get()
            ->result_array();
        $role=$row[0]['role'];
        return $role;
    }

    /*===== GET ACTIVE GROUPS =====*/
    public function get_active_groups()
    {
        $query = $this->db->select('*')->from('groups')->get()->result_array();
        return $query;
    }

    /*===== SOME TESTING FUNCTION FOR GMAIL SIGNIN =====*/

    /*public function fuck_u($email)
    {
        $this->db->select('*')
            ->FROM('users')
            ->WHERE('email', $email)
            ->result_array();
    }*/

    /*====== FAILED LOGIN ATTEMPTS =======*/
    public function failed_login_attempts($email)
    {
	  $query = $this->db->select('*')->from('users')->where('email', $email)->get()->result_array();
	  $check = $this->db->select('*')->from('failed_login_attempts')
		  ->where('user_email', $email)
		  ->get()->result_array();
	  $failed_login_limit = $this->get_login_settings();
	  if(count($check) > $failed_login_limit['failed_login_limit'])
	  {
		$block = array(
			'status' => 'Blocked'
		);
		$this->db->where('email', $email)->update('users',$block);
		echo json_encode(array("type" => "error", "response" => "You reached maximum failed login attempt, your account has been blocked"));
	  }
	  else {
		  $failed_attempt = array(
			  'user_email'      => $query[0]['email'],
			  'user_id'         => $query[0]['id'],
		  );
		  $this->db->insert('failed_login_attempts', $failed_attempt);
		  echo json_encode(array("type" => "error", "response" => "Invalid login credentials"));
	  }
    }

    /*====== GENERATE OTP =======*/
	public function generate_otp($user_id)
	{
		$otp_pin = $this->get_random_number();
        $otp = array(
        	'user_id'     => $user_id,
			'session_id'  => session_id(),
			'otp_pin'     => $otp_pin,
		);
        $this->db->insert('login_otp', $otp);
	}


	/*======= GET 6 DIGITS RANDOM UNIQUE NUMBERS FOR OTP ======*/
	function get_random_number(){

		$number = 6;
		$permitted_chars = '123456789';
		$string = substr(str_shuffle($permitted_chars), 1, $number);
		$string = strtolower($string);
		return $string;
	}

	/*====== GET USER CURRENT ACTIVE OTP =======*/
	public function get_otp($user_id)
	{
		$query = $this->db->select('*')
			->from('login_otp')
			->where('user_id', $user_id)
			->where('status', '1')
			->get()
			->result_array();
		return $query[0];
	}

	/*====== VERIFY OTP ======*/
	public function verify_otp($user_id, $otp)
	{
		$query = $this->db->select('*')
		   ->from('login_otp')
		   ->where('user_id', $user_id)
		   ->where('otp_pin', $otp)
		   ->where('status', '1')
		   ->get()
		   ->result_array();
       if(count($query) > 0)
	   {
	   	  $otp_created_at = date('Y-m-d h:i:s', strtotime($query[0]['created_at']));
	   	  $current_time   = date('Y-m-d h:i:s');
	   	  $diff = $this->timeDiff($otp_created_at, $current_time);
	   	  $otp_expire_time = $this->get_login_settings();
	   	  if($diff > $otp_expire_time['otp_expire_time'])
		  {
			  echo json_encode(array("msg_type" => "error", "message" => "Your OTP is expired"));
		  }
	   	  else {

			  $this->login_log($user_id);
			  return true;
		  }
	   }
       else {

		   $failed_otp_limit = $this->get_login_settings();
		   $failed_otps = $this->db->select('*')->from('failed_otp_attempts')->where('user_id', $user_id)->get()->result_array();
		   if (count($failed_otps) > $failed_otp_limit['failed_otp_limit']) {
			   $status = array(
				   'status' => 'Blocked'
			   );
			   $this->db->where('id', $user_id)->update('users', $status);
			   $expire_otp = array(
			   	'status'  => '0'
			   );
			   $this->db->where('user_id', $user_id)->where('status', '1')->update('login_otp', $expire_otp);
			   echo json_encode(array("msg_type" => "error", "message" => "You reached maximum failed otp attempts, Your account has been blocked."));
		   }
		   else
		   	{
		   	   $this->failed_otp_attempts($user_id);
				echo json_encode(array("msg_type" => "error", "message" => "Invalid OTP"));
		    }
	   }
	}

	/*====== TIME DIFFERENCE =====*/
	function timeDiff($time_start = null, $time_end = null, $hour_mode = false)
	{
		$to_time = strtotime($time_start);
		$from_time = strtotime($time_end);
		$hour = 0;

		if ($hour_mode) { // Outputs in hours i.e. 8.50, 10.32
			$hour = round(abs($to_time - $from_time) / 60 / 60, 1);
		}
		else {
			$hour = round(abs($to_time - $from_time) / 60, 1); // Outputs in minutes i.e. 3360, 500
		}

		if ($time_end < $time_start) {
			if ($hour_mode) {
				$hour -= 12; // outputs in hours
			}
			else {
				$hour -= 720; // outputs in minutes
			}
		}

		return abs($hour);
	}

	/*====== GET LOGIN SETTINGS ========*/
	public function get_login_settings()
	{
		$query = $this->db->select('*')->from('login_settings')->get()->result_array();
		return $query[0];
	}

	/*====== GET USER BY ID =======*/
	public  function get_user_by_id($id)
	{
		$st = $this->db->select('*')
			->from('users')
			->where('id',$id)
			->get()
			->result_array();
		return $st[0];
	}

	/*====== EXPIRE OTP ======*/
	public function expire_otp($user_id, $otp)
	{
		$expire_otp = array(
			'status'  => '0'
		);
		$this->db->where('user_id', $user_id)->where('otp_pin', $otp)->update('login_otp', $expire_otp);
	}

	/*====== CHECK VALID OTP =======*/
	public function check_otp($user_id)
	{
		$query = $this->db->select('*')
			->from('login_otp')
			->where('user_id', $user_id)
			->where('status', '1')
			->get()
			->result_array();
		if(count($query) > 0)
		{
			return true;
		}
		else {
			return false;
		}
	}


	/*====== FAILED OTP ATTEMPTS =======*/
	public function failed_otp_attempts($user_id)
	{
		$attempt = array(
			'user_id' => $user_id
		);
		$this->db->insert('failed_otp_attempts', $attempt);
	}

	/*====== LOGIN LOG ======*/
	public function login_log($user_id)
	{
		$user = $this->get_user_by_id($user_id);
		$this->session->set_userdata($user);
		require(APPPATH . 'user_info.php');
		$c_info = new Users_info;
		$ip = $c_info->c_ip();
		$os = $c_info->c_OS();
		$b = $c_info->c_Browser();
		$d = $c_info->c_Device();
		$user_id = $this->session->userdata['id'];
		$session_id = session_id();
		$date_time = date("Y-m-d h:i:sa");
		$data = array('user_ip' => $ip, 'user_browser' => $b, 'user_os' => $os, 'user_device' => $d, 'user_id' => $user_id, 'session_id' => $session_id, 'login_at' => $date_time);
		$this->db->insert('user_logs', $data);
		$this->db->where('user_id', $user_id)->delete('failed_otp_attempts');
	}
}

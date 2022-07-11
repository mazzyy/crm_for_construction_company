<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * @property Login_model Login_model
 * @property Menu_model Menu_model
 * @property Settings_model Settings_model
 * @property Users_model Users_model
 * @property Counters_model Counters_model
 * @property Activity_logs_model Activity_logs_model
 * @property  Registration_model Registration_model
 * @property  Degree_program_model Degree_program_model
 */
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		/*===== DEFAULT TIME ZONE ======*/
		date_default_timezone_set('Asia/Karachi');

		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Menu_model');
		$this->load->model('Registration_model');
		$this->load->model('Settings_model');
		$this->load->model('Users_model');
		$this->load->model('Counters_model');
		$this->load->model('Activity_logs_model');
		$this->load->model('Degree_program_model');
		$this->load->library('My_PHPMailer');


		/*==== cache control ====*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

	}

	/*==== FUNCTION CHECK USER SESSION =====*/
	public function isLoggedIn()
	{
		if (!empty($this->session->userdata['id']) ) {
			return true;
		} else {
			return false;
		}
	}


	/*==== FUNCTION LOGOUT CURRENT USER =====*/
	public function logout()
	{
		$user_id = $this->session->userdata['id'];
		$session_id = session_id();
		$this->Settings_model->fuck_u($user_id, $session_id);
		$this->session->sess_destroy();
		redirect(base_url());
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
}

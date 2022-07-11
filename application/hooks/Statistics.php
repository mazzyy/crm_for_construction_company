<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics {
    public function log_activity() {
        // We need an instance of CI as we will be using some CI classes
        $CI =& get_instance();

        // Start off with the session stuff we know
        //$data = array();
        //$data['account_id'] = $CI->session->userdata('account_id');
        //$data['project_id'] = $CI->session->userdata('project_id');
        //$data['user_id'] = $CI->session->userdata('user_id');

        // Next up, we want to know what page we're on, use the router class
        //$data['section'] = $CI->router->class;
        //$data['action'] = $CI->router->method;

        // Lastly, we need to know when this is happening
        //$data['when'] = time();

        // We don't need it, but we'll log the URI just in case
        //$data['uri'] = uri_string();

        // And write it to the database
        //$CI->db->insert('statistics', $data);


		//require(APPPATH . 'user_info.php');
		//$c_info = new Users_info;
        $controller = 'Activity_logs';
        $data = array();
        $data['user_id'] = $CI->session->userdata('id');
        $data['action_controller'] = $CI->router->class;
        $data['action_method'] = $CI->router->method;
        $data['action_url'] = base_url().uri_string();
        $data['ip'] = client_ip();
        $data['browser'] = client_browser();
        $data['os'] = client_os();
        $data['device'] = client_device();
        //if($controller != $data['action_controller'])
		$action = $data['action_controller'];
		if($action == "Activity_logs" || $data['action_method'] == "get_logs" || $data['action_method'] == "custom_search")
        {

        }
		else {

			if(!empty($data['user_id']))
			{
				$CI->db->insert('activity_logs', $data);
			}
		}
    }
}

<?php

class Settings_model extends CI_Model
{
    /*==== GET EMAIL SETTINGS ====*/
    public function getEmailSettings()
    {
        return $this->db->select('*')->from('email_settings')->WHERE('id', 1)->get()->row();
    }

    /*===== UPDATE SMTP CONFIG ====*/
    public function update_smtp_config($data, $menuId)
    {
        $item = array(
            'host' => $data['host'],
            'port' => $data['port'],
            'email' => $data['email'],
            'password' => $data['password'],
            'sent_email' => $data['sent_email'],
            'sent_title' => $data['sent_title'],
        );
        //echo '<pre>'; print_r($item); exit;
        $this->db->WHERE('id', $menuId)->update('email_settings', $item);
    }

    /*===== UPDATE LOGIN SETTINGS ======*/
	public function update_login_settings($data, $login_setting_id)
	{

		if(isset($data['my-checkbox']))
		{
			$data['my-checkbox']=1;
		}
		else{
			$data['my-checkbox']=0;
		}
		$settings = array(
			'two_factor_auth'    => $data['my-checkbox'],
			'failed_login_limit' => $data['failed_login_limit'],
			'failed_otp_limit'   => $data['failed_otp_limit'],
			'otp_expire_time'    => $data['otp_expire_time']
		);
		$this->db->WHERE('login_setting_id', $login_setting_id)->update('login_settings', $settings);

	}

	/*===== UPDATE COMPANY INFO =====*/
    public function update_company($data, $id)
    {
        $item = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'address' => $data['address'],
            'website' => $data['website'],
        );
        $this->db->WHERE('id', $id)->update('company_information', $item);
    }

    public function get_company_info()
    {
        $st = $this->db->query('SELECT * from company_information where id= 1')->result_array();
        return $st[0];
    }

    /*==== FUNCTION GET ALL DATA ====*/
    public function getAll($table)
    {
        return $this->db->select('*')->from($table)->get()->result_array();
    }

    /*===== GET RECORD BY ID =====*/
    public function getById($table, $id)
    {
        $st = $this->db->select('*')->from($table)->WHERE('id', $id)->get()->result_array();
        return $st[0];
    }

    /*===== GET CHILD =====*/
    public function get_child($table, $id)
    {
        return $st = $this->db->select('*')->from($table)->where('parent', $id)->get()->result();
    }

    public function get_parent($table)
    {
        return $this->db->select('*')->from($table)->where('parent', 0)->get()->result_array();
    }

    function generateRandomString()  {
        $digits = '1234567890';
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $digits[rand(0, strlen($digits) - 1)];
        }
        return $randomString;
    }

    public function get_user_by_id($id)
    {
        $st = $this->db->select('*')->from('detection')
            ->WHERE('user_id', $id)
            ->where_in('status', array('Banned', 'Blocked'))
            ->get()
            ->resul_array();
        //print_r($st);
        //echo $this->db->last_query();
        return $st;
    }

    /*===== test function =====*/
    public function test($user_id)
    {
      return $this->db->select('*')
           ->FROM('user_logs')
           ->WHERE('user_id', $user_id)
           ->WHERE('session_id', session_id())
           ->get()->result();
    }

    /*===== fuck you =====*/
    public function fuck_u($user_id, $session_id)
    {
        $item = array(
            'logout_at'  => date("Y-m-d h:i:sa")
        );
        $this->db->WHERE('user_id', $user_id)
            ->WHERE('session_id', $session_id)
            ->UPDATE('user_logs', $item);
    }










    public function getAdminUsers()
    {
        return $this->db->select()->from('users')
            ->where('role',1)
            ->get()
            ->result_array();
    }

    /*====== GET ACTIVE USER EMAIL BY USER ID =======*/
    public function get_user_email($user_id)
    {
        $query = $this->db->select('*')
            ->from('users')
            ->where('user_id',$user_id)
            ->where('status', 'approved')
            ->get()
            ->row_array();
        return $query['email'];
    }

    /*======= ADD PAYMENT TERM ======*/
	public function add_payment_term($data)
	{
		$input = array(
			'payment_term'  => $data['payment_term'],
			'added_by'      => $this->session->userdata['id']
		);
		$this->db->insert('payment_terms', $input);
	}

	/*====== EDIT PAYMENT TERM =======*/
	public function edit_payment_term($data, $id)
	{
		$input = array(
			'payment_term'  => $data['payment_term'],
			'update_by'     => $this->session->userdata['id'],
			'update_at'     => date('Y-m-d h:i:s')
		);
		$this->db->where('payment_term_id', $id)->update('payment_terms', $input);
	}

	/*====== GET ALL PAYMENT TERMS ========*/
	public function get_all_payment_terms()
	{
		return $this->db->select('pt.*, u.name as added_by')
			->from('payment_terms as pt')
			->where('pt.is_delete', '1')
			->join('users as u', 'pt.added_by = u.id', 'left')
			->get()
			->result_array();
	}

	/*====== GET PAYMENT TERM BY ID =======*/
	public function get_payment_term_by_id($id)
	{
		$st = $this->db->select('*')->from('payment_terms')->where('payment_term_id', $id)->get()->result_array();
		return $st[0];
	}

	/*===== DELETE PAYMENT TERM =======*/
	public function delete_payment_term($id)
	{
		$delete = array(
			'is_delete' => '0'
		);
		$this->db->where('payment_term_id', $id)->update('payment_terms', $delete);
		return true;
	}
}

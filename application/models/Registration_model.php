<?php

class Registration_model extends CI_Model
{
	/*======= REGISTRATION ==========*/
	public function register($data)
	{
		$st = $this->db->select('*')->from('users')->WHERE('email', $data['email'])->get()->result_array();
		if (count($st) > 0) {
			echo json_encode(array("msg_type" => "error", "message" => "Email already exist in Database"));
			exit;
		} else {


			$full_name = $data['first_name'] . ' ' . $data['last_name'];

			// Create User
			$user = array(
				'name'   => $full_name,
				'email'  => $data['email'],
				'password'  => md5(sha1($data['password'])),
				'role'      => $data['role'],
				'hash'      => md5(sha1($data['email'])),
				'status'    => 'Active'
			);
			$this->db->insert('users', $user);
			$user_id = $this->db->insert_id();


			// Create Profile
			$profile = array(
				'user_id' => $user_id,
				'first_name' => $data['first_name'],
				'last_name'    => $data['last_name'],
				'contact' => $data['phone'],
				'email' => $data['email'],
				'dob' =>  $data['dob'],
				'gender' => $data['customRadio']
			);
			$this->db->insert('user_profile', $profile);


			// Student Registration
			$input = array(
				'user_id' => $user_id
			);
			$this->db->insert('registrations', $input);

			return $user_id;
		}
	}

	/*======== GET ALL REGISTRATIONS ==========*/
	public function get_all_registrations()
	{
		// return $this->db->select('*')->from('registrations')->get()->result_array();
		$query = $this->db->select('uf.*,r.*')
			->from('user_profile as uf')
			->join('registrations as r', 'r.user_id = uf.user_id')
			->get()
			->result_array();
		// echo $this->db->last_query();exit;
		return $query;
	}

	/*======== GET REGISTRATION STATUS ==========*/
	public function get_registrations_status($resgistration_id)
	{
		$query = $this->db->select('status')->from('registrations')->where('registration_id', $resgistration_id)->get()->result();
		return $query[0];
	}

	/*======== UPDATE STATUS ==========*/
	public function update_registration($data, $registration_id)
	{
		$status = array(
			'status' => $data['status']
		);
		$this->db->where('registration_id', $registration_id)->update('registrations', $status);
	}

	/*======= GET REGISTRATION BY EMAIL ========*/
	public function get_reg_by_id($user_id)
	{

		$query = $this->db->select('uf.*, r.*')
			->from('user_profile as uf')
			->join('registrations as r', 'r.user_id = ' . $user_id)
			->where('uf.user_id', $user_id)
			->get()
			->result();
		return $query[0];
	}

	/*======= GET REGISTRATION BY id ========*/
	public function get_reg_by($registration_id)
	{

		// $query = $this->db->select('uf.*, r.*')
		// ->from('user_profile as uf')
		// ->join('registrations as r','r.user_id = '.$registration_id)
		// ->where('uf.user_id', $registration_id)
		// ->get()
		// ->result();
		// echo $this->db->last_query();exit;

		// return $query[0];
		$query = $this->db->select('*')->from('registrations')->where('registration_id', $registration_id)->get()->result();
		return $query[0];
	}

	/*======= UPDATE MY DETAILS ========*/
	public function update_my_details($data, $user_id, $documents)
	{
		// UPDATE USER PROFILES
		$details = array(
			'first_name'        =>  $data['first_name'],
			'middle_name'       =>  $data['middle_name'],
			'last_name'         =>  $data['last_name'],
			'contact'      =>  $data['contact'],
			'whatsapp'   =>  $data['whatsapp'],
			'dob' => $data['dob'],
			'address'            => $data['address'],
			'gender' => $data['customRadio']
		);

		$this->db->where('user_id', $user_id)->update('user_profile', $details);

		// UPDATE REGISTRATION

		if(sizeof($documents) > 0)
		{

			$check = $this->db->select('documents')->from('registrations')->where('user_id',$user_id)->get()->result();
			$json_decode = json_decode($check[0]->documents);

			if(!empty($json_decode))
			{
				$merged_array = array_merge($json_decode, $documents);
				$encode_merged_array = json_encode($merged_array);
				$registration = array(
					'degree_id' => $data['degree_of_interest'],
					'program_id' => $data['program_of_interest'],
					'school_attended' => $data['school_attended'],
					'documents'        => $encode_merged_array
				);
				$this->db->where('user_id', $user_id)->update('registrations', $registration);

			}
			else {

				$registration = array(
					'degree_id' => $data['degree_of_interest'],
					'program_id' => $data['program_of_interest'],
					'school_attended' => $data['school_attended'],
					'documents'       => sizeof($documents) > 0 ? json_encode($documents): ''
				);
				$this->db->where('user_id', $user_id)->update('registrations', $registration);
			}
		}
		else {

			$registration = array(
				'degree_id' => $data['degree_of_interest'],
				'program_id' => $data['program_of_interest'],
				'school_attended' => $data['school_attended'],
			);
			$this->db->where('user_id', $user_id)->update('registrations', $registration);
		}

	}



	// /======= REGISTRATION DOCUMENT =========/
	public function get_reg_doc($user_id)
	{
		return $this->db->select('documents')->from('registrations')->where('user_id', $user_id)->get()->result();
	}

	// /======= UPDATE REGISTRATION DOC ========/
	public function update_reg_doc($json_array, $user_id)
	{
		$update = array(
			'documents' => $json_array
		);
		$this->db->where('user_id', $user_id)->update('registrations', $update);
		return true;
	}

	public function get_programs_by_id($degree_id)
	{
		return $this->db->select('*')->from('programs')->where('degree_id', $degree_id)->get()->result_array();
	}
}

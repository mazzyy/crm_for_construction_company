<?php

class Degree_program_model extends CI_Model
{
	/*====== ADD DEGREE ========*/
	public function add_degree($data)
	{
		$degree = array(
			'degree'   => $data['degree'],
			'added_by' => $this->session->userdata['id']
		);
		$this->db->insert('degrees', $degree);
	}

	/*====== EDIT DEGREE ========*/
	public function edit_degree($data, $degree_id)
	{
		$degree = array(
			'degree'    => $data['name'],
			'update_by' => $this->session->userdata['id'],
			'update_at' => date('Y-m-d h:i:s')
		);
		$this->db->where('degree_id', $degree_id)->update('degrees', $degree);
	}

	/*======= GET ALL DEGREES ========*/
	public function get_all_degrees()
	{
		return $this->db->select('*')->from('degrees')->get()->result_array();
	}


	/*======= GET ALL DEGREES ========*/
	public function get_program_by_id($program_id)
	{
		$st = $this->db->select('*')->from('programs')->where('program_id', $program_id)->get()->result_array();
		return $st[0];

	}

	/*======= ADD PROGRAM =======*/
	public function add_program($data)
	{
		$program = array(
			'degree_id' => $data['degree_id'],
			'program'   => $data['program'],
			'added_by'  => $this->session->userdata['id']
		);
		$this->db->insert('programs', $program);
	}

	/*======= EDIT PROGRAM =======*/
	public function edit_program($data, $program_id)
	{
		$program = array(
			'degree_id' => $data['degree_id'],
			'program'   => $data['program'],
			'update_by' => $this->session->userdata['id'],
			'update_at' => date('Y-m-d h:i:s')
		);
		$this->db->where('program_id', $program_id)->update('programs', $program);
	}

	/*======== GET ALL PROGRAMS =========*/
	public function get_all_programs()
	{
		return $this->db->select('p.*, d.degree')
			->from('programs as p')
			->join('degrees as d','p.degree_id = d.degree_id')
			->get()
			->result_array();
	}

	/*===== GET DEGREE BY ID ======*/
	public function get_degree_byId($degree_id)
	{
		$st = $this->db->select('*')->from('degrees')->where('degree_id', $degree_id)->get()->result_array();
		return $st[0];
	}

	/*======== DELETE PROGRAM =========*/
	public function delete_program($program_id)
	{

	}

}

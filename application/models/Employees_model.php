<?php

class Employees_model extends CI_Model
{
    public function allemployees()
    {
    	/*====== GET TOTAL EMPLOYEES =======*/
		$data = $this->db->get('employees')->result_array();

        return $data;
    }

	public function store($formData)
    {
    	/*====== STORE EMPLOYEE=======*/
		$data = array(
			'fname'          => $formData['fname'],
			'lname'            => $formData['lname'],
		);

        return $data = $this->db->insert('employees', $data);
    }

	public function delete($id)
    {
    	/*====== DELETE EMPLOYEE=======*/
		$this -> db -> where('id', $id);
 		$this -> db -> delete('employees');

    }

	public function edit($id)
    {
    	/*====== DELETE EMPLOYEE=======*/
		$data = $this -> db ->get_where('employees', array('id' => $id))->result_array();
 		

		return  $data;
    }


	public function update($formData)
    {
    	/*====== STORE EMPLOYEE=======*/
		$data = array(
			'fname'          => $formData['fname'],
			'lname'            => $formData['lname'],
		);

		$this -> db ->where('id', $formData['id']);
		$this -> db ->update('employees',$data);

    }



}

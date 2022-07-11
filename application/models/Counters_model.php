<?php

class Counters_model extends CI_Model
{
    public function getCounters()
    {

    	/*====== GET TOTAL CUSTOMERS =======*/
		$st = $this->db->query('SELECT COUNT(*) as count from customers')->result_array();
		$data['customers'] = $st[0]['count'];

        /*===== GET TOTAL VENDORS ======*/
		$st = $this->db->query('SELECT COUNT(*) as count from vendors')->result_array();
		$data['vendors'] = $st[0]['count'];

		/*====== GET TOTAL ROB FORKLIFTS ========*/
		$st = $this->db->query('SELECT COUNT(*) as count from forklifts')->result_array();
		$data['forklifts'] = $st[0]['count'];

		/*====== GET TOTAL INQUIRIES =======*/
		$st = $this->db->query('SELECT COUNT(*) as count from customer_inquiry')->result_array();
		$data['inquiries'] = $st[0]['count'];

        return $data;
    }



}

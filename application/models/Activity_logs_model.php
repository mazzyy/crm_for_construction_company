<?php
/**
 * Created by PhpStorm.
 * User: Saadi
 * Date: 3/22/2019
 * Time: 3:09 AM
 */

class Activity_logs_model extends CI_Model
{

    /*===== GLOBAL VARIABLES =====*/
    var $table = 'activity_logs';
    var $column = array('id', 'user','date_time'); //set column field database for order and search
    var $order = array('log_id' => 'desc'); // default order


    public function get_all_activities()
    {

        $this->db->select('activity_logs.*, users.name as user, users.id')
            ->from('activity_logs')
            ->join('users','activity_logs.user_id = users.id','left')
            ->order_by('activity_logs.log_id','desc');
        $i = 0;

        foreach ($this->column as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->get_all_activities();

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        //  echo $this->db->last_query();
        return $query->result();
    }

    function count_filtered()
    {
        $this->get_all_activities();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }



    /*====== GET ALL ACTIVE USERS =======*/
    public function get_all_users()
    {
       $query =  $this->db->select('*')->from('users')->get()->result();
       return $query;
    }

    /*====== SEARCH ACTIVITY BY EMPLOYEE & DATE ========*/
    public function custom_search($user_id, $date1)
    {
        $input_date1 = date('Y-m-d',strtotime($date1));
        $query = $this->db->select('activity_logs.*, users.name, users.id')
            ->from('activity_logs')
            ->join('users', 'activity_logs.user_id = users.id','left')
            ->where('activity_logs.user_id', $user_id)
            ->where('date(activity_logs.date_time)',$input_date1)
            ->order_by('activity_logs.log_id','desc')
            ->get()
            ->result();
        //echo $this->db->last_query(); exit;
        return $query;
    }

    /*====== GET LOG DETAIL BY ID ======*/
	public function get_log_by_id($log_id)
	{
		$query = $this->db->select('a.*, u.name')
			->from('activity_logs as a')
			->where('log_id', $log_id)
			->join('users as u','a.user_id = u.id', 'left')
			->get()
			->result_array();
		return $query[0];
	}

}

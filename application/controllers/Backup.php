<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saadi
 * Date: 2/19/2019
 * Time: 3:13 AM
 */
class Backup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*====== MANAGE DATABASE BACKUP ======*/
    public function backup()
    {
        if($this->isLoggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['company_info'] = $this->Settings_model->get_company_info();
            $data['bkups'] = directory_map('./backups/', 1);
            $sort = arsort($data['bkups']);
            $data['title'] = $data['company_info']['name']." | Backup Databases";
            $this->load->view("backend/system_settings/backup_databases", $data);
        }
        else {
            redirect(base_url());
        }
    }

    /*===== CREATE BACKUP =====*/
    public function create_backup()
    {
        if($this->isloggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['users'] = $this->Settings_model->getAdminUsers();
            $data['company_info'] = $this->Settings_model->get_company_info();

            $result = $this->db->query("SHOW TABLE STATUS")->result();
            $tableinfo = array();
            $totalsize = 0;
            $totalrows = 0;
            foreach($result as $res){
                $size = round($res->Data_length/1000,2);
                $totalsize += $size;
                $totalrows += $res->Rows;
                $tableinfo['all'][] = (object)array("name" => $res->Name, "size" => $size." KB", "rows" => $res->Rows);
            }
            $tableinfo['totalSize'] = round(($totalsize/1000),2)." MB";
            $tableinfo['totalRows'] = $totalrows;
            $data['dbtables'] = $tableinfo;
            $data['title'] = $data['company_info']['name']." | Database Backup";
            $this->load->view("backend/system_settings/create_backup", $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    /*===== CREATE BACKUP BUTTON ACTION =====*/
    public function create_backup_action()
    {
        if($this->isLoggedIn())
        {
            $getbackup = $this->input->post('getbackup');
            if(!empty($getbackup)){
                $tables = $this->input->post('dbtables');

                if(empty($tables)){
                    echo json_encode(array("msg_type" => "error", "message" => "Please Select Table for Backup"));
                }else{
                    $this->getBackup($tables);
                }
            }
        }
        else {
            redirect(base_url());
        }
    }


    /*===== GET BACKUP =====*/
    public function getBackup($tables){
        $this->load->dbutil();
        $prefs = array(
            'tables'      => $tables,
            'format'      => 'txt',
            'filename'    => 'my_db_backup.sql'
        );
        $backup = $this->dbutil->backup($prefs);
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.sql';
        $save = 'backups/'.$db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $redirect_link = base_url('Backup/backup');
        echo json_encode(array("msg_type" => "success", "message" => "Backup Created Successfully", 'redirect_link' => $redirect_link));
    }

    /*===== DOWNLOAD BACKUP DATABASE =====*/
    function download(){
        $file = $this->input->get('backup');
        $sql = file_get_contents('backups/'.$file);
        $this->load->helper('download');
        force_download($file, $sql);
    }

    /*===== DELETE BACKUP ======*/
	public function delete_backup()
	{
		if($this->isLoggedIn())
		{
			$bkid = $this->input->post('id');
			unlink("backups/$bkid");
			echo json_encode(array('msg_type'=>'success','message'=>'Backup Deleted Successfully..!'));
		}
		else {
			redirect(base_url());
		}
	}

	/*===== TRUNCATE TABLE DATA  =====*/
    public function truncate_table_data()
    {
        if($this->isloggedIn())
        {
			$user_id = $this->session->userdata['id'];
			$data['user'] = $this->Users_model->get_user_by_id($user_id);
            $group = $this->session->userdata['role'];
            $data['menu'] = $this->Menu_model->getMenuItems($group);
            $data['users'] = $this->Settings_model->getAdminUsers();
            $data['company_info'] = $this->Settings_model->get_company_info();

            $result = $this->db->query("SHOW TABLE STATUS")->result();
            $tableinfo = array();
            $totalsize = 0;
            $totalrows = 0;
            foreach($result as $res){
                $size = round($res->Data_length/1000,2);
                $totalsize += $size;
                $totalrows += $res->Rows;
                $tableinfo['all'][] = (object)array("name" => $res->Name, "size" => $size." KB", "rows" => $res->Rows);
            }
            $tableinfo['totalSize'] = round(($totalsize/1000),2)." MB";
            $tableinfo['totalRows'] = $totalrows;
            $data['dbtables'] = $tableinfo;
            $data['title'] = $data['company_info']['name']." | Database Backup";
            $this->load->view("admin/truncate_table_data", $data);
        }
        else
        {
            redirect(base_url());
        }
    }


    /*===== TRUNCATE BUTTON ACTION =====*/
    public function truncate_action()
    {
        if($this->isLoggedIn())
        {
            $getbackup = $this->input->post('getbackup');
            if(!empty($getbackup)){
                $tables = $this->input->post('dbtables');
                //echo '<pre>'; print_r($tables); exit;
                if(empty($tables)){
                    echo json_encode(array("msg_type" => "error", "message" => "Please Select Table for Backup"));
                }else{
                    for($i=0; $i<count($tables); $i++)
                    {
                        $this->db->truncate($tables[$i]);
                    }
                    echo json_encode(array("msg_type" => "success", "message" => "Selected Tables Truncated"));
                }
            }
        }
        else {
            redirect(base_url());
        }
    }
}

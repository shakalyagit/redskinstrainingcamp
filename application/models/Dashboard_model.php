<?php
Class dashboard_model extends CI_Model {

function get_guest_list($params = array(), $action = '',$action2=0)
    {
        $employee_status = '1';
        $this->db->select('*');
        $this->db->from('primaryguest');
        if($action2 != '0')
        {
            $this->db->where('primaryGuestId', $action2);
        }
        else if ($action == '19') {
        	$this->db->order_by('firstName', 'ASC');
        }
        else if ($action == '91') {
        	$this->db->order_by('firstName', 'DESC');
        }
        else {
        	$this->db->order_by('primaryGuestId', 'DESC');
        }
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

}
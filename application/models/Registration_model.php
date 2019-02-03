<?php
Class registration_model extends CI_Model {

  function getGuestDetails($primaryguestId) 
    {
        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where('primaryguestId',$primaryguestId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
        return $query->result_array();
        }
        return false;
    }

 function getGuestDetailsById($guestId) 
    {
        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where('guestId',$guestId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
        return $query->row_array();
        }
        return false;
    }

  function getPrimaryGuestDetails($primaryguestId) 
    {
        $this->db->select('*');
        $this->db->from('primaryguest');
        $this->db->where('primaryguestId',$primaryguestId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
        return $query->row_array();
        }
        return false;
    }


}
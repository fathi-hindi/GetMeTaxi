<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Driver_model extends CI_Model {
	
	
	/**
     * @Summary: Find drivers by taxi office id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function findDriversByTaxiOfficeId($taxioffice_id) {
        $condition = "td.taxioffice_id ='" . $taxioffice_id . "' and markfordelete != 1";
        $this->db->select('u.users_id, u.user_type, u.date_of_birth, u.first_name, u.last_name, u.middle_name, u.phone, u.fax, u.mobile, u.photo, u.email');
        $this->db->from('taxi_drivers as td');
		$this->db->join('users as u' , "td.drivers_id = u.users_id");
        $this->db->where($condition);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}

?>
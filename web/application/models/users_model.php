<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Users_model extends CI_Model {
	
	/**
     * @Summary: Find All Users.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
    public function findAllUsers() {
        
        $this->db->select('u.users_id, u.user_type, u.date_of_birth, u.first_name, u.last_name, u.middle_name, u.phone, u.fax, u.mobile, u.photo, u.email');
		$this->db->from('users as u');
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}

?>
<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Users_model extends CI_Model {
	
	/**
     * @Summary: Find All Users.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
    public function findAllUsers() {
        
        $this->db->select('u.users_id, u.user_type, u.date_of_birth, u.first_name, u.last_name, u.middle_name, u.phone, u.fax, u.mobile, u.photo, u.email, ur.status, ur.logon_id');
		$this->db->from('users as u');
        $this->db->join('userreg as ur', 'u.users_id = ur.users_id', 'left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
	
	/**
     * @Summary: Find All Users with filters.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function findAllUsersByFilters($filters) {
        
        $this->db->select('u.users_id, u.user_type, u.date_of_birth, u.first_name, u.last_name, u.middle_name, u.phone, u.fax, u.mobile, u.photo, u.email, ur.status, ur.logon_id');
		$this->db->from('users as u');
        $this->db->join('userreg as ur', 'u.users_id = ur.users_id', 'left');
        $condition = "";
		
		foreach ($filters as $filter) {
			if ($filter['name'] == 'type') {
				$condition == "" ? $condition = "u.user_type = '" . $filter['value'] . "'" : $condition .= " and u.user_type = '" . $filter['value'] . "'";
			} else if ($filter['name'] == 'first_name') {
				$condition == "" ? $condition = "u.first_name like '%" . $filter['value'] . "%'" : $condition .= " and u.first_name like '%" . $filter['value'] . "%'";
			} else if ($filter['name'] == 'last_name') {
				$condition == "" ? $condition = "u.last_name like '%" . $filter['value'] . "%'" : $condition .= " and u.last_name like '%" . $filter['value'] . "%'";
			} else if ($filter['name'] == 'email') {
				empty ($condition) ? $condition = "u.email like '%" . $filter['value'] . "%'" : $condition .= " and u.email like '%" . $filter['value'] . "%'";
			}
		}
		
		if ($condition != "") {
			$this->db->where($condition);
		}
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}

?>
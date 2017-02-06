<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Logon_model extends CI_Model {
	
	
	/**
     * @Summary: Create new user.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function createNewUser($userType, $firstName, $lastName, $phone, $status, $logonId, $password) {
		// Insert new record in 'userrs' , 'userreg', and 'userpwdhst' tables.
		$result = $this->insertMember(array("type" => MEMBER_TYPE_USER));
		if ($result[0] == 1) {
			$member_id = $result[1];
			
			$users_data = array (
				'users_id' => $member_id,
				'user_type' => $userType,
				'first_name' => trim($firstName),
				'last_name' => trim($lastName),
				'phone' => trim($phone)
			);
			
			$result = $this->insertUsers($users_data);
			
			if ($result) {
				$userreg_data = array (
					'users_id' => $member_id,
					'status' => $status,
					'logon_id' => trim($logonId),
					'password' => $password
				);
				$this->insertUserreg($userreg_data);
				
				$userpwdhst_data = array (
					'users_id' => $member_id,
					'logon_password' => $password
				);
				$this->insertUserpwdhst($userpwdhst_data);
				
				return $member_id;
			} else {
				// TODO: Handle error occurred in database.
				return 0;
			}
		} else {
			// TODO: Handle error occurred in database.
			return 0;
		}	
	}
	
	/**
     * @Summary: Insert new entry in 'users' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function insertUsers($data) {
		return $this->db->insert('users', $data);
	}
	
	/**
     * @Summary: Insert new entry in 'member' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function insertMember($data) {
		$this->db->insert('member', $data);
		$member_id = $this->db->insert_id();
		$affectedRow = $this->db->affected_rows();
		return [$affectedRow,$member_id];
	}
	
	/**
     * @Summary: Insert new entry in 'userreg' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function insertUserreg($data) {
		return $this->db->insert('userreg', $data);
	}
	
	/**
     * @Summary: Insert new entry in 'userpwdhst' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function insertUserpwdhst($data) {
		return $this->db->insert('userpwdhst', $data);
	}
	
	/**
     * @Summary: Check if logonId is already exsist.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function isExsistingLogonId($logon_id) {
        $condition = "logon_id =" . "'" . $logon_id . "'";
        $this->db->from('userreg');
        $this->db->where($condition);
        if ($this->db->count_all_results() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	/**
     * @Summary: Check if logon Id and password is valid.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function isValidCredentials($logon_id, $password) {
        $condition = "logon_id ='" . $logon_id . "' and password ='" . $password . "'";
        $this->db->from('userreg');
        $this->db->where($condition);
        if ($this->db->count_all_results() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>
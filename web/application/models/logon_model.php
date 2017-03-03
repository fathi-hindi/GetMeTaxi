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
     * @Summary: Create new guest user.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/28/2017.
     */
	public function createNewGuestUser($firstName, $lastName, $phone, $email) {
		$result = $this->insertMember(array("type" => MEMBER_TYPE_USER));
		if ($result[0] == 1) {
			$member_id = $result[1];
			
			$users_data = array (
				'users_id' => $member_id,
				'user_type' => USER_TYPE_GUEST,
				'first_name' => trim($firstName),
				'last_name' => trim($lastName),
				'phone' => trim($phone)
			);
			
			$result = $this->insertUsers($users_data);
			
			if ($result) {
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
	
	/**
     * @Summary: Find user by logon id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
    public function findUserByLogonId($logon_id) {
        $condition = "ur.logon_id ='" . $logon_id . "'";
        $this->db->select('u.users_id, u.user_type, u.date_of_birth, u.first_name, u.last_name, u.middle_name, u.phone, u.fax, u.mobile, u.photo, ur.status, ur.logon_id, ur.password, ur.password_retries, ur.password_expired, ur.salt');
        $this->db->from('userreg as ur');
		$this->db->join('users as u' , "u.users_id = ur.users_id");
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result()[0];
        } else {
            return false;
        }
    }
	
	/**
     * @Summary: Find user by users id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
    public function findUserByUsersId($users_id) {
        $condition = "u.users_id ='" . $users_id . "'";
        $this->db->select('u.users_id, u.user_type, u.date_of_birth, u.first_name, u.last_name, u.middle_name, u.phone, u.fax, u.mobile, u.photo, ur.status, ur.logon_id, ur.password, ur.password_retries, ur.password_expired, ur.salt');
        $this->db->from('users as u');
		$this->db->join('userreg as ur' , "u.users_id = ur.users_id", 'left');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result()[0];
        } else {
            return false;
        }
    }
	
	/**
     * @Summary: Change user password.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function changePassword($users_id, $password) {
		$userpwdhst_data = array (
			'users_id' => $users_id,
			'logon_password' => $password
		);
		$this->insertUserpwdhst($userpwdhst_data);
		$this->db->reset_query();
		$this->db->where('users_id', $users_id);
        return $this->db->update('userreg',array("password" => $password));
	}
	
	/**
     * @Summary: Check if password is valid or not.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function isValidPassword($users_id, $password) {
        $isValid = false;
		$this->db->select('userreg.password, userreg.salt');
        $this->db->from('userreg');
        $this->db->where('users_id', $users_id);
        $query = $this->db->get();

        if ($query && $query->result()[0]) {
            if ($query->result()[0]->password == $password) {
				$isValid = true;
			}
        }
		return $isValid;
	}
	
	/**
     * @Summary: Update account information.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/07/2017.
     */
	public function accountUpdate($users_id, $data) {
		$this->db->where('users_id', $users_id);
        return $this->db->update('users', $data);
	}
}

?>
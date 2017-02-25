<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Address_model extends CI_Model {
	
	/**
     * @Summary: Add new address.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function addNewAddress($data) {
		$data['status'] = 'P';
		$data['is_primary'] = '0';
		$data['nick_name'] = $this->generateNickName($data);
		$address_id = $this->insertAddress($data);
		return $address_id;
	}
	
	/**
     * @Summary: Insert new entry in 'address' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/27/2017.
     */
	public function insertAddress($data) {
		$this->db->insert('address', $data);
		return $address_id = $this->db->insert_id();
	}
	
	/**
     * @Summary: Generate nick name.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/27/2017.
     */
	public function generateNickName($data) {
		$nick_name = "";
		$nick_name = microtime()*1000000000000;
		return $nick_name;
	}
	
	/**
     * @Summary: Find address by id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/09/2017.
     */
    public function findAddressById($address_id) {
        $condition = "a.address_id='" . $address_id . "'";
        $this->db->select('a.address_id, a.member_id, a.status, a.is_primary, a.address1, a.address2, a.nick_name, a.orgname, a.phone, a.fax, a.mobile, a.last_create, cd.name as city_name');
        $this->db->from('address as a');
		$this->db->join('citydesc as cd' , "a.city_id = cd.city_id");
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result()[0];
        } else {
            return null;
        }
    }
	
	/**
     * @Summary: Find address by user id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/17/2017.
     */
    public function findAddressByMemberId($member_id) {
        $condition = "a.member_id='" . $member_id . "'";
        $this->db->select('a.address_id, a.member_id, a.status, a.is_primary, a.address1, a.address2, a.nick_name, a.orgname, a.phone, a.fax, a.mobile, a.last_create, cd.name as city_name');
        $this->db->from('address as a');
		$this->db->join('citydesc as cd' , "a.city_id = cd.city_id");
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
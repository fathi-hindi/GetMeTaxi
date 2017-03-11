<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Statictics_model extends CI_Model {
	
	/**
     * @Summary: Get All Users Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getAllUsersCount() {
        
        $this->db->select('count(*) as total');
        $this->db->from('users');
        
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result()[0]->total;
        } else {
            return 0;
        }
    }
	
	/**
     * @Summary: Get Guest Users Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getUsersCountByType($type) {
        $condition = "user_type='" . $type . "'";
		
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result()[0]->total;
        } else {
            return 0;
        }
    }
	
	/**
     * @Summary: Get All Taxi Office Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getAllTaxiOfficeCount() {
        
        $this->db->select('count(*) as total');
        $this->db->from('taxioffice');
        
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result()[0]->total;
        } else {
            return 0;
        }
    }
	
	/**
     * @Summary: Get All Orders Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getAllOrdersCount() {
        
        $this->db->select('count(*) as total');
        $this->db->from('orders');
        
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result()[0]->total;
        } else {
            return 0;
        }
    }
	
	/**
     * @Summary: Get Office Received Orders Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getOfficeReceivedOrdersCount() {
        return 0;
    }
	
	/**
     * @Summary: Get Passenger Submitted Orders Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getPassengerSubmittedOrdersCount() {
        return 0;
    }
	
	/**
     * @Summary: Get Driver Processed Orders Count.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 03/10/2017.
     */
    public function getDriverProcessedOrdersCount() {
        return 0;
    }
}

?>
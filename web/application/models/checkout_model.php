<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Checkout_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
        $this->load->model('address_model');
    }
	
	/**
     * @Summary: Get all avialable offices in a specified city.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function getAvialableOfficesByCity($city_id, $language_id) {
		$rows = array();
		$this->db->select('taxioffice.taxioffice_id, taxiofficedesc.name');
		$this->db->from('taxioffice');
		$this->db->join('taxiofficedesc' , 'taxioffice.taxioffice_id = taxiofficedesc.taxioffice_id and taxiofficedesc.language_id  =' . $language_id);
		$this->db->where('taxioffice.status', '1');
		$this->db->where('taxioffice.city_id', $city_id);
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	
	/**
     * @Summary: Get all active city.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function getAllAvialabelCity($language_id) {
		$rows = array();
		$this->db->select('city.city_id, city.identifer, citydesc.name');
		$this->db->from('city');
		$this->db->join('citydesc', 'city.city_id = citydesc.city_id');
		$this->db->where('citydesc.language_id', $language_id);
		$this->db->where('city.status', '1');
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	
	/**
     * @Summary: Get all active taxi type.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function getAllTaxiType($language_id) {
		$rows = array();
		$this->db->select('taxitype.taxitype_id, taxitype.identifer, taxitype.max_passenger,
			taxitypedesc.name, taxitypedesc.description, taxitypedesc.thumbnail');
		$this->db->from('taxitype');
		$this->db->join('taxitypedesc', 'taxitype.taxitype_id = taxitypedesc.taxitype_id');
		$this->db->where('taxitypedesc.language_id', $language_id);
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	
	/**
     * @Summary: Create new order.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function createNewOrder($users_id, $comment, $type, $source, $attributes) {
		// inser new entry in orders and orderattr.
		$rows = array();
		
		$orders_data = array (
			'users_id' => $users_id,
			'comment' => $comment,
			'type' => trim($type),
			'source' => trim($source)			
		);
		
		$orders_id = $this->insertOrder($orders_data);
		$attributes_data = array();
		foreach ($attributes as $key => $value) {
			$attributes_data[] = array(
				'orders_id' => $orders_id,
				'attr_name' => $key,
				'attr_value' => $value
			);
		}
		
		if ($orders_id > 0) {
			$result = $this->insertOrderAttr($attributes_data);
			if ($result == 0 ) {
				// handle error.
			}
		} else {
			// handle error.
		}
		return $orders_id;
	}
	
	/**
     * @Summary: Insert new entry in 'orders' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function insertOrder($data) {
		$this->db->insert('orders', $data);
		$orders_id = $this->db->insert_id();
		return $orders_id;
	}
	
	/**
     * @Summary: Insert new entrys in 'orderattr' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function insertOrderAttr($data) {
        $this->db->insert_batch('orderattr', $data);
        $affectedRow = $this->db->affected_rows();
        return $affectedRow;
	}
	
	/**
     * @Summary: Find orders by user id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/07/2017.
     */
    public function findOrdersByUsersId($users_id) {
        $result = array();
		$condition = "o.users_id ='" . $users_id . "'";
        $this->db->select('o.orders_id, o.time_placed, o.last_update, o.status, o.users_id, o.comment, o.type, o.source');
        $this->db->from('orders as o');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
			foreach($query->result() as $order) {
				$this->populateOrderAttribute($order);
				$result[] = $order;
			}
        }
		return $result;
    }
	
	/**
     * @Summary: Find order by id.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/07/2017.
     */
    public function findOrdersById($orders_id) {
        $result = false;
		$condition = "o.orders_id ='" . $orders_id . "'";
        $this->db->select('o.orders_id, o.time_placed, o.last_update, o.status, o.users_id, o.comment, o.type, o.source');
        $this->db->from('orders as o');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
			$order = $query->result()[0];
			
			$this->populateOrderAttribute($order);
			$result = $order;
        }
		return $result;
    }
	
	/**
     * @Summary: Populate order attribute.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 02/07/2017.
     */
    public function populateOrderAttribute($order) {
		$this->db->select('oa.attr_name, oa.attr_value');
		$this->db->from('orderattr as oa');
		$this->db->where('oa.orders_id = ' . $order->orders_id);
		$query = $this->db->get();
		
		foreach ($query->result() as $row) {
			if ($row->attr_name == 'FROM_ADDRESS_ID') {
				$from_address_id = $row->attr_value;
				$order->from_address = $this->address_model->findAddressById($from_address_id);
			} else if ($row->attr_name == 'TO_ADDRESS_ID') {
				$to_address_id = $row->attr_value;
				$order->to_address = $this->address_model->findAddressById($to_address_id);
			} else if ($row->attr_name == 'DATE') {
				$order->date = $row->attr_value;
			} else if ($row->attr_name == 'TIME') {
				$order->time = $row->attr_value;
			}
		}
	}
}
?>
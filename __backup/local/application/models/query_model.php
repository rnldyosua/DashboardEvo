<?php
class query_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function getData($field='*', $table='', $where='', $limit='', $offset='', $sort='', $group='', $resultType='result', $debug='true') {
		$this->db->db_debug = false;
		$this->db->select($field,FALSE);
		$this->db->from($table);
		if($offset == '') $offset = 0;
		if($where != '') $this->db->where($where, NULL, FALSE);
		if($limit != '') $this->db->limit($limit, $offset);
		if($sort != '') $this->db->order_by($sort);
		if($group != '') $this->db->group_by($group);
		$query = $this->db->get();
		if($query != '') {
			$result = $query->$resultType();
			return $result;	
		} else {
			return $this->db->_error_message();
		}
    }
	
	function getDataJoin($field='*', $table=array(), $where='', $limit='', $offset='', $sort='', $group='', $resultType='result', $having='') {
		$this->db->select($field, FALSE);
		foreach($table as $key => $value) {
			if($key == 0) {
				$this->db->from($value->table);
			} else {
				$this->db->join($value->table, $value->joinOn, $value->joinType);
			}
		}
		if($offset == '') $offset = 0;
		if($where != '') $this->db->where($where, NULL, FALSE);
		if($limit != '') $this->db->limit($limit, $offset);
		if($sort != '') $this->db->order_by($sort);
		if($group != '') $this->db->group_by($group);
		if($having != '') $this->db->having($having);
		$query = $this->db->get();
		$result = $query->$resultType();
		return $result;
    }
	
	function insertData($table='', $data=array()) {
		$this->db->insert($table, $data);
		$query = $this->db->insert_id();
		return $query;
    }
	
	function updateData($table='', $data='', $where='') {
		$this->db->where($where, NULL, FALSE);
		$query = $this->db->update($table,$data);
		return $query;
    }
	
	function deleteData($table='', $where='') {
		$this->db->where($where, NULL, FALSE);
		$query = $this->db->delete($table);
		return $query;
    }
}
?>

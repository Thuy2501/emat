<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Account_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}

	function get_role_class(){
		$sql = " SELECT * FROM tbl_role_class WHERE active=1 "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_role_class2(){
		$sql = " SELECT id,name FROM tbl_role_class WHERE active=1 "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		$r = $this->get_lists($sql,$bind_param);
		$res = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$res[$value['id']] = $value['name'];
			}
		}
		return $res;
	}
	function get_role_action(){
		$sql = " SELECT * FROM tbl_role_action WHERE active=1 "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_role_action2(){
		$sql = " SELECT id,name FROM tbl_role_action WHERE active=1 "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		$r = $this->get_lists($sql,$bind_param);
		$res = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$res[$value['id']] = $value['name'];
			}
		}
		return $res;
	}
	function get_role_list(){
		$sql = " SELECT a.id,a.role_class_id,a.role_action_id,b.parent,b.code,b.name,b.active,c.name as action_name FROM tbl_role_list a INNER JOIN tbl_role_class b ON a.role_class_id=b.id INNER JOIN tbl_role_action c ON a.role_action_id=c.id ORDER BY b.code ASC ";
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}

	function get_role_list2(){
		$sql = "SELECT DISTINCT a.id,a.name , GROUP_CONCAT(DISTINCT b.id,'-',b.role_action_id SEPARATOR '=') AS action FROM tbl_role_class a,tbl_role_list b WHERE a.id = b.role_class_id GROUP BY a.id ASC";

		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_role_list3(){
		$sql = "SELECT DISTINCT a.id,a.name , GROUP_CONCAT(DISTINCT b.id,'_',b.code SEPARATOR '=') AS action FROM tbl_role_class a,tbl_role_list b WHERE a.id = b.role_class_id GROUP BY a.id ASC";

		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_role_account(){
		//$sql = " SELECT a.id,a.name, (SELECT b.code FROM tbl_role_list b ) AS roles FROM tbl_role_account a WHERE a.active=1 ";
		$sql = "SELECT DISTINCT a.id,a.name,a.role,a.active , GROUP_CONCAT(DISTINCT b.code SEPARATOR '=') AS action FROM tbl_role_account a,tbl_role_list b WHERE  FIND_IN_SET(b.id,a.role) GROUP BY a.id ASC"; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_account_list(){
		$sql = " SELECT a.*,b.role_id,c.name as role_name FROM tbl_admin a LEFT JOIN tbl_admin_role b ON a.id=b.admin_id LEFT JOIN tbl_role_account c ON c.id=b.role_id WHERE c.role_type=2 "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_role_account_list(){
		$sql = " SELECT * FROM tbl_role_account WHERE active=1 "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>array()
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_account_info($id){
		$sql = " SELECT a.*,b.role_id FROM tbl_admin a LEFT JOIN tbl_admin_role b ON a.id=b.admin_id WHERE a.id=? "; //echo $sql;
		$bind_param = array(
			'bind'=>'i',
			'value'=>[$id]
		);
		return $this->get_rows($sql,$bind_param);
	}
	function get_roleaccount_info($id){
		//$sql = " SELECT * FROM tbl_role_account a INNER JOIN tbl_role_list b ON a. WHERE id=? "; //echo $sql;
		$sql = "SELECT DISTINCT a.id,a.name,a.role,a.active , GROUP_CONCAT(DISTINCT b.code SEPARATOR '=') AS action FROM tbl_role_account a,tbl_role_list b WHERE  FIND_IN_SET(b.id,a.role) AND a.id=? "; //echo $sql;
		$bind_param = array(
			'bind'=>'i',
			'value'=>[$id]
		);
		return $this->get_rows($sql,$bind_param);
	}

	function insert_role_class($data){
		$this->inserts('tbl_role_class',$data);
	}
	function insert_role_action($data){
		$this->inserts('tbl_role_action',$data);
	}
	function insert_role_list($data){
		$this->inserts('tbl_role_list',$data);
	}
	function insert_role_account($data){
		$this->inserts('tbl_role_account',$data);
	}
	function insert_account_admin($data){
		return $this->inserts('tbl_admin',$data);
	}
	function insert_account_admin_role($data){
		$this->inserts('tbl_admin_role',$data);
	}

	function update_account_admin($data,$where){
		$this->updates('tbl_admin',$data,$where);
	}
	function update_account_admin_role($data,$where){
		$this->updates('tbl_admin_role',$data,$where);
	}
	function update_role_account($data,$where){
		$this->updates('tbl_role_account',$data,$where);
	}
}
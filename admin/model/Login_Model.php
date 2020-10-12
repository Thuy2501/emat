<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Login_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}

	function get_userInfoLogin($u,$p){
		$sql = " SELECT a.id,a.active,b.role_id FROM tbl_admin a INNER JOIN tbl_admin_role b ON a.id=b.admin_id WHERE a.username=? AND a.password=? "; //echo $sql;
		return $this->pdo_select($sql,[$u,$p]);
	}
	function get_userRole($id){
		$sql = "SELECT DISTINCT a.id,a.name,a.role,a.active,a.role_type , GROUP_CONCAT(DISTINCT c.code,'-',d.code SEPARATOR '=') AS action FROM tbl_role_account a,tbl_role_list b INNER JOIN tbl_role_class c ON c.id=b.role_class_id INNER JOIN tbl_role_action d ON d.id=b.role_action_id WHERE  FIND_IN_SET(b.id,a.role) AND a.id=? "; //echo $sql;
		return $this->pdo_select($sql,[$id]);
	}
	function get_userInfoToken($token){
		$sql = ' SELECT * FROM tbl_admin WHERE token=? ';

		return $this->pdo_select($sql,[$token]);
	}

	function update_login($data,$where){
		$this->pdo_update('tbl_admin',$data,$where);
	}
}
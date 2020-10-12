<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Home_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}

	function test(){
		$sql = array('INSERT INTO tbl_test(name,active) VALUES(?,?)','INSERT INTO tbl_service(name,actives) VALUES(?,?)');
		$values = [['test22',1],['mo ta 1',1]];
		$this->pdo_querys_commit($sql,$values);
		 //print_r($data);
	}

}
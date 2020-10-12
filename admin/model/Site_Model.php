<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Site_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}

	function get_language(){
		$sql = " SELECT id,name,code FROM tbl_language WHERE active=? "; //echo $sql;
		$bind_param = array(
			'bind'=>'i',
			'value'=>[1]
		);
		return $this->get_lists($sql,$bind_param);
	}
	function get_listSite(){
		$sql = " SELECT id,title,title_url,language,site_type,date_create,active FROM tbl_site ORDER BY title_url ASC "; //echo $sql;
		return $this->get_lists($sql);
	}
	function get_site($code){
		$sql = " SELECT id,title,title_url,description,tags,keywords,language,site_type,date_create,active FROM tbl_site WHERE title_url=? "; //echo $sql;
		$bind_param = array(
			'bind'=>'s',
			'value'=>[$code]
		);
		return $this->get_rows($sql,$bind_param);
	}
	function get_site_content($id){
		$sql = " SELECT * FROM tbl_site_content WHERE site_id=? ORDER BY position ASC "; //echo $sql;
		$bind_param = array(
			'bind'=>'s',
			'value'=>[$id]
		);
		return $this->get_lists($sql,$bind_param);
	}

	function check_site_exist($title,$lang){
		$sql = " SELECT count(id) as count FROM tbl_site WHERE title_url=? AND language=? "; //echo $sql;
		$bind_param = array(
			'bind'=>'ss',
			'value'=>[$title,$lang]
		);

		$result = $this->get_rows($sql,$bind_param);

		if(!empty($result['count'])&&$result['count']>0){
			return true;
		}else{
			return false;
		}
	}

	function insert_site_list($data){
		return $this->inserts('tbl_site',$data);
	}
	function insert_site_content($data){
		return $this->inserts('tbl_site_content',$data);
	}

	function update_site($data,$where){
		$this->updates('tbl_site',$data,$where);
	}
	function update_site_content($data,$where){
		$this->updates('tbl_site_content',$data,$where);
	}

	function remove_site_content($code){
		$this->removes('tbl_site_content',' id=? ',['bind'=>'i','param'=>[$code]]);
	}
}
<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Share_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}

	function get_list_website(){
		$sql = " SELECT * FROM tbl_share_website ORDER BY date_create DESC "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>[]
		);
		return $this->get_lists($sql,$bind_param);
	}

	function get_list_blog_share(){
		$sql = " SELECT a.*,b.title,b.title_url,b.is_views,c.domain 
			FROM tbl_share_blog a 
			INNER JOIN tbl_blog_list b ON a.blog_code=b.code 
			INNER JOIN tbl_share_website c ON a.website_code=c.code
			ORDER BY a.date_create DESC "; //echo $sql;
		$bind_param = array(
			'bind'=>'',
			'value'=>[]
		);
		return $this->get_lists($sql,$bind_param);
	}


	function insert_share_website($data){
		$this->inserts('tbl_share_website',$data);
	}
	function insert_share_blog($data){
		$this->inserts('tbl_share_blog',$data);
	}

	function remove_share_website($code){
		$this->removes('tbl_share_website',' code=? ',['bind'=>'i','param'=>[$code]]);
	}
	function remove_share_blog($code){
		$this->removes('tbl_share_blog',' code=? ',['bind'=>'i','param'=>[$code]]);
	}
}
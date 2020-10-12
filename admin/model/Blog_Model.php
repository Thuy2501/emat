<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Blog_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}


	function get_blog_type(){
		$sql = " SELECT id,name FROM tbl_blog_type WHERE active=1 "; //echo $sql;
		return $this->pdo_selects($sql);
	}
	function get_blog_category(){
		$sql = " SELECT id,name,code FROM tbl_blog_category WHERE active=1 "; //echo $sql;
		return $this->pdo_selects($sql);
	}
	function get_blog_categoryinfo($id){
		$sql = " SELECT * FROM tbl_blog_category WHERE id=? "; //echo $sql;
		return $this->pdo_select($sql,[$id]);
	}
	function get_language(){
		$sql = " SELECT id,name FROM tbl_language WHERE active=1 "; //echo $sql;
		return $this->pdo_selects($sql);
	}
	function get_listBlog($a=0){
		
		if($a==0){
			$sql = " SELECT a.id,a.cat_id,a.code,a.blog_type_id,a.is_views as views ,a.title,a.title_url,a.date_create,a.active,b.name as cat_name,c.name as blog_type_name 
				FROM tbl_blog_list a
				INNER JOIN tbl_blog_category b ON a.cat_id=b.id
				INNER JOIN tbl_blog_type c ON c.id=a.blog_type_id
				ORDER BY a.date_create DESC "; //echo $sql;
			return $this->pdo_selects($sql);
		}else{
			$sql = " SELECT a.id,a.cat_id,a.code,a.blog_type_id,a.views,a.title,a.date_create,a.active,b.name as cat_name,c.name as blog_type_name 
				FROM tbl_blog_list a
				INNER JOIN tbl_blog_category b ON a.cat_id=b.id
				INNER JOIN tbl_blog_type c ON c.id=a.blog_type_id
				WHERE a.active=? ORDER BY a.date_create DESC "; //echo $sql;

			return $this->pdo_selects($sql,[$a]);
		}
		
	}
	function get_blogInfo($code){
		$sql = " SELECT a.content,b.* 
			FROM tbl_blog_contents a 
			INNER JOIN tbl_blog_list b ON a.blog_id=b.id WHERE a.blog_code=? "; //echo $sql;
		return $this->pdo_select($sql,[$code]);
	}
	function get_blog_by_code($code){
		$sql = " SELECT b.id,b.code,b.cat_id,b.avatar,b.video,b.title,b.title_url,b.keywords,b.description,b.date_create,b.tags,b.is_menu,c.name as cat_name,c.code as cat_code 
				 FROM tbl_blog_list b 
				INNER JOIN tbl_blog_category c ON c.id = b.cat_id 
				WHERE b.active=1 AND b.code=? ";
		$result = $this->pdo_select($sql,[$code]); //print_r($result);
		$result['content'] = array();
		if(!empty($result)){
			$sql1 = " SELECT title_content,content,position,id,title_color FROM tbl_blog_contents WHERE blog_id=".$result['id'];
			$result['content'] = $this->pdo_selects($sql1);
		}
		return $result;
		
	}
	function get_idBlogByCode($code){
		$sql = " SELECT id FROM tbl_blog_list WHERE code=? "; //echo $sql;
		return $this->pdo_select($sql,[$code]);
	}
	function get_blog_contents_by_code($code){
		$sql = " SELECT a.title_content,a.content,a.position,a.id FROM tbl_blog_contents a INNER JOIN tbl_blog_list b ON a.blog_id=b.id WHERE b.code='".$code."' ";
		return $this->pdo_selects($sql);
		
	}
	function get_blogInfoList($code){
		$sql = " SELECT title_url,code FROM tbl_blog_list b WHERE code=? "; //echo $sql;
		return $this->pdo_select($sql,[$code]);
	}
	function get_list_website_active(){
		$sql = " SELECT code,domain FROM tbl_share_website WHERE active=1 "; //echo $sql;
		return $this->pdo_selects($sql);
	}
	function get_list_category(){
		$sql = " SELECT * FROM tbl_blog_category ORDER BY date_create DESC "; //echo $sql;
		return $this->pdo_selects($sql);
	}

	function insert_blog_list($data){
		return $this->pdo_insert_return('tbl_blog_list',$data);
	}

	function insert_blog_content($data){
		$this->pdo_insert('tbl_blog_contents',$data);
	}

	function insert_blog_settime($data){
		$this->pdo_insert('tbl_blog_settime',$data);
	}
	function insert_share_blog($data){
		$this->pdo_insert('tbl_share_blog',$data);
	}
	function insert_category($data){
		$this->pdo_insert('tbl_blog_category',$data);
	}

	function update_blog_list($data,$where){
		$this->pdo_update('tbl_blog_list',$data,$where);
	}
	function update_blog_content($data,$where){
		$this->pdo_update('tbl_blog_contents',$data,$where);
	}
	function update_blog_category($data,$where){
		$this->pdo_update('tbl_blog_category',$data,$where);
	}

	function remove_blog($code){
		$this->pdo_delete('tbl_blog_list',['val'=>[$code],'sql'=>'id=?']);
		$this->pdo_delete('tbl_blog_contents',['val'=>[$code],'sql'=>'blog_id=?']);
	}
	function remove_site_content($code){
		$this->pdo_delete('tbl_blog_contents',['val'=>[$code],'sql'=>'id=?']);
	}
}
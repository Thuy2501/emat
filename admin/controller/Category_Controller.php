<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Category_Controller extends VV_Controller{
	protected $_ss_name = '';
	protected $_url = array();
	protected $_user = array();
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','upload']);
		$this->_config->load('config');
		$this->_model->load('blog');
		$this->_model->load('login');
		ss_sessionStartNow();
		$this->_ss_name = $this->_config->item('csrf_token_name');
		$this->_url = $this->_config->item('base_url');
		if(isset($_SESSION[$this->_ss_name]['token'])){
			$this->_user = $this->_model->login->get_userInfoToken($_SESSION[$this->_ss_name]['token']);
			if(empty($this->_user)){
				header('Location:'.$this->_url['web'].'/adw-login');
			}
		}else{
			header('Location:'.$this->_url['web'].'/adw-login');
		}
	}

	public function listAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['item'] = $this->_model->blog->get_list_category();
		$this->_view->load('category-list',$data);
	}

	public function modalEditcategoryAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['item_category'] = $this->_model->blog->get_blog_categoryinfo($_GET['code']); //print_r($data['item']);
		$this->_modal->load('category-edit',$data);
	}

	public function addValidateAction(){
		url_returnError($this->_user['id']);
		$input = array(
			'bind_param'=>'ssss',
			'name'=>$_POST['category-name'],
			'code'=>$_POST['category-url'],
			'tags'=>$_POST['category-tags'],
			'date_create'=>date('Y-m-d H:i:s',time())
		); //print_r($input);

		if(!empty($input['code'])){
			$this->_model->blog->insert_category($input);

			echo json_encode(array(
				'code'=>200
			)); die;
		}
	}

	public function editValidateAction(){
		url_returnError($this->_user['id']);
		$id = $_POST['m-category-id'];
		$input = array(
			'bind_param'=>'ssii',
			'name'=>$_POST['m-category-name'],
			'tags'=>$_POST['m-category-tags'],
			'active'=>$_POST['m-category-active'],
		); //print_r($input); die;

		if(!empty($input['name'])){
			$this->_model->blog->update_blog_category($input,['where'=>'id=?','param'=>[$id]]);

			echo json_encode(array(
				'code'=>200
			)); die;
		}else{
			echo json_encode(array(
				'code'=>404
			)); die;
		}
	}

}
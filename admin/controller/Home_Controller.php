<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Home_Controller extends VV_Controller{
	protected $_ss_name = '';
	protected $_url = array();
	protected $_user = array();

	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password']);
		$this->_config->load('config');
		$this->_model->load('home');
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

	public function indexAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		//$blog = $this->_model->home->get_blog_total();
		$data['_role'] = $_SESSION[$this->_ss_name]['role']; //print_r($data['_role']); die;
		
		//print_r($data); die;
		$this->_view->load('home',$data);

	}
}
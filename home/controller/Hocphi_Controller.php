<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Hocphi_Controller extends VV_Controller{
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password','lang']);
		$this->_config->load('config');
		$this->_model->load('home');
		ss_sessionStartNow();
		//print_r($_COOKIE); die;
	}

	public function indexAction(){ //print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$data['_title'] = 'trang-chu';
		$this->_view->load('home',$data);

	}

	public function giangvienAction(){ print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$this->_view->load('home',$data);

	}

	public function hocvienAction(){ //print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$this->_view->load('home',$data);

	}

	
}
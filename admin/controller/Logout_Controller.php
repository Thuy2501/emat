<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Logout_Controller extends VV_Controller{
	protected $_ss_name = '';
	protected $_url = array();
	protected $_user = array();
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','url']);
		$this->_config->load('config');
		ss_sessionStartNow();

		$this->_ss_name = $this->_config->item('csrf_token_name');
		$this->_url = $this->_config->item('base_url'); //print_r($_SESSION[$this->_ss_name]); die;

		if(!isset($_SESSION[$this->_ss_name]['token'])){
			url_header($this->_url['web'].'/admin');
		}else{
			ss_unSession($this->_ss_name);
			url_header($this->_url['web'].'/adw-login');
		}

	}
}
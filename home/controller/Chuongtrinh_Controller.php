<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Chuongtrinh_Controller extends VV_Controller{
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password','lang']);
		$this->_config->load('config');
		$this->_model->load('home');
		ss_sessionStartNow();
		//print_r($_COOKIE); die;
	}


	public function toanhocAction(){ //print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); //print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$data['_title'] = 'trang-chu';
		$this->_view->load('chuong-trinh-toan-hoc',$data);

	}

	public function khoahocAction(){ //print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); //print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$data['_title'] = 'trang-chu';
		$this->_view->load('chuong-trinh-khoa-hoc',$data);

	}

	public function lotrinhhocAction(){ //print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); //print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$data['_title'] = 'trang-chu';
		$this->_view->load('chuong-trinh-lo-trinh-hoc',$data);

	}

	
}
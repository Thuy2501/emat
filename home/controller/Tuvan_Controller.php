<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Tuvan_Controller extends VV_Controller{
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password','lang']);
		$this->_config->load('config');
		$this->_model->load('home');
		ss_sessionStartNow();
		//print_r($_COOKIE); die;
	}

	public function indexAction(){ //print_r($_GET); die;
		$data['base_url'] = $this->_config->item('base_url'); //print_r($data['base_url']); die;
		$data['_lang'] = isset($_GET['lang'])&&$_GET['lang']=='en' ? 'en' : 'vi';
		$data['years'] = date('Y');
		$data['_title'] = 'trang-chu';
		$this->_view->load('tu-van',$data);

	}

	public function addcontactAction(){

		$input = array(
			'name'=>isset($_POST['cft-hoten']) ?str_checkString($_POST['cft-hoten']) : '',
			'phone'=>isset($_POST['cft-phone']) ?str_checkString($_POST['cft-phone']) : '',
			'mail'=>isset($_POST['cft-email']) ?str_checkString($_POST['cft-email']) : '',
			'namsinh'=>isset($_POST['cft-namsinh']) ?str_checkString($_POST['cft-namsinh']) : '',
			'truong'=>isset($_POST['cft-truonghoc']) ?str_checkString($_POST['cft-truonghoc']) : '',
			'monhocdk'=>isset($_POST['cft-monhoc']) ?str_checkString($_POST['cft-monhoc']) : '',
			'dkthithu'=>isset($_POST['cft-dktt']) ?str_checkString($_POST['cft-dktt']) : '',
			'mondkthi'=>isset($_POST['cft-mdkt']) ?str_checkString($_POST['cft-mdkt']) : '',
			'ckdkthi'=>isset($_POST['cft-ctdkt']) ?str_checkString($_POST['cft-ctdkt']) : '',
			'note'=>isset($_POST['cft-note']) ?str_checkString($_POST['cft-note']) : ''
		);

		$this->_library->load('mail');
		$this->_library->mail->send1($this->_config->item('base_url')['web'],$input);

		echo json_encode(array(
			'code'=>200,
			'error'=>'Thêm mới thành công (Success)'
		),JSON_UNESCAPED_UNICODE); die;
	}

	public function mailAction(){
		$data['base_url'] = $this->_config->item('base_url'); //print_r($data['base_url']); die;

		$this->_view->load('mail',$data);
	}

	
}
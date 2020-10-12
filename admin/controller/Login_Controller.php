<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Login_Controller extends VV_Controller{
	protected $_ss_name = '';
	protected $_url = array();
	protected $_user = array();
	protected $_role =  array() ;


	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password']);
		$this->_config->load('config');
		$this->_model->load('login');
		ss_sessionStartNow();

		$this->_ss_name = $this->_config->item('csrf_token_name');
		$this->_url = $this->_config->item('base_url');
		if(isset($_SESSION[$this->_ss_name]['token'])){
			$this->_user = $this->_model->login->get_userInfoToken($_SESSION[$this->_ss_name]['token']);
			if(!empty($this->_user)){
				header('Location:'.$this->_url['web']);
			}else{
				ss_unSession($this->_ss_name);
			}
		}
	}

	public function indexAction(){
		$data['base_url'] = $this->_url;  //print_r($data['base_url']) ;
		$this->_view->load('zz-login',$data);
	}

	public function validateAction(){
		$data['base_url'] = $this->_config->item('base_url');

		//usleep(rand(200000,2000000));

		$user_name = isset($_POST['login-username']) ? str_checkString($_POST['login-username']) : '';
		$password = isset($_POST['login-password']) ? md5($_POST['login-password']) : '';

		if(!empty($user_name) &&!empty($password) ){
			$info = $this->_model->login->get_userInfoLogin($user_name,$password); //print_r($info);die;

			if(!empty($info)){
				if($info['active']===1){
					$role = $this->_model->login->get_userRole($info['role_id']); //print_r($role);
					$ss = array(
						'token'=>md5($info['id'].time().rand(100000,999999)),
						'role'=>array(
							'list'=>!empty($role['action']) ? explode('=',$role['action']) : array() ,
							'type'=>$role['role_type']
						)
					); //print_r($ss); die;
					
					ss_setSession($this->_ss_name,$ss);
					$input = array(
						'token'=>$ss['token'],
						'date_login'=>date('Y-m-d H:i:s',time())
					); //die;
					$this->_model->login->update_login($input,['sql'=>'id=?','val'=>[$info['id']]]);
					url_header($data['base_url']['web'].'/admin');
				}else{
					url_header($data['base_url']['web'].'/adw-login#3-'.time());
				}
			}else{
				url_header($data['base_url']['web'].'/adw-login#2-'.time());
			}

			//url_header($data['base_url']['web'].'/login#2-'.time());
		}else{
			url_header($data['base_url']['web'].'/adw-login#1-'.time());
		}
	}

	public function jwtencodeAction(){

		$key = "example_key";
		$token = array(
		    "iss" => "http://example.org",
		    "aud" => "http://example.com",
		    "iat" => time(),
		    "nbf" => time(),
		    'exp' => time()+120,
		    'role'=> '1,2,3,4'
		);

		$this->_library->load('jwt');
		$tk = $this->_library->jwt->my_encode($token,$key); echo $tk;
	}

	public function jwtdecodeAction(){
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxNTgxNDE3OTkzLCJuYmYiOjE1ODE0MTc5OTMsImV4cCI6MTU4MTQxODExMywicm9sZSI6IjEsMiwzLDQifQ.kuZpR851we8k_gFsbxEDk2QdCgn1m1Q9enELZXjdYK4';
		$key = "example_key";
		$this->_library->load('jwt');
		$tk = $this->_library->jwt->my_decode($token,$key); print_r($tk);
	}

	public function testAction(){
		$this->_library->load('jwt');
		$this->_library->jwt->example();
	}

}
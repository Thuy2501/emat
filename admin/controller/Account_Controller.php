<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Account_Controller extends VV_Controller{
	protected $_ss_name = '';
	protected $_url = array();
	protected $_user = array();
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password','func']);
		$this->_config->load('config');
		$this->_model->load('login');
		$this->_model->load('account');
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

		//print_r($this->_user); die;

	}

	public function listAction(){
		//url_returnError($this->_user['id']);
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['account'] = $this->_model->account->get_account_list(); //print_r($data['account']); die;
		$data['role_account'] = $this->_model->account->get_role_account(); //print_r($data['role_list']); die;
		//$data['action'] = $this->_model->account->get_role_action(); //print_r($data); die;
		$this->_view->load('account-list',$data);

	}

	public function roleAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['roles'] = $this->_model->account->get_role_class(); //print_r($data); die;
		$data['role_list'] = $this->_model->account->get_role_list(); //print_r($data['role_list']); die;
		$data['action'] = $this->_model->account->get_role_action(); //print_r($data); die;
		$this->_view->load('account-role',$data);

	}

	public function detailAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['roles'] = $this->_model->account->get_role_class(); //print_r($data); die;
		$data['role_list'] = $this->_model->account->get_role_list(); //print_r($data['role_list']); die;
		$data['action'] = $this->_model->account->get_role_action(); //print_r($data); die;
		$this->_view->load('account-detail',$data);

	}

	public function addAccountAction(){
		url_returnError($this->_user['id']);
		$input1 = array(
			'bind_param'=>'sss',
			'username'=>str_checkString($_POST['account-username']) ,
			'password'=>md5($_POST['account-password']),
			'fullname'=>str_checkString($_POST['account-fullname'])
		);
		$input2 = array(
			'bind_param'=>'ii',
			'admin_id'=>0,
			'role_id'=>$_POST['account-role']
		); //print_r($input1); die;
		if(!empty($input1['username'])&&!empty($input2['role_id'])){
			$input2['admin_id'] = $this->_model->account->insert_account_admin($input1);
			if(!empty($input2['admin_id'])&&$input2['admin_id']>0){
				$this->_model->account->insert_account_admin_role($input2);
				echo json_encode(array(
					'code'=>200
				)); die;
			}
		}	
		echo json_encode(array(
				'code'=>404
			)); die;
		
	}

	public function editAccountAction(){ //print_r($_POST); die;
		url_returnError($this->_user['id']);
		$id = $_POST['account-code'];
		if(!empty($_POST['account-password'])){
			$input1 = array(
				'bind_param'=>'ssii',
				'fullname'=>str_checkString($_POST['account-fullname']),
				'password'=>md5($_POST['account-password']),
				'active'=>str_checkString($_POST['account-active'])
			);
		}else{
			$input1 = array(
				'bind_param'=>'sii',
				'fullname'=>str_checkString($_POST['account-fullname']),
				'active'=>str_checkString($_POST['account-active'])
			);
		}
		$input2 = array(
			'bind_param'=>'ii',
			'role_id'=>$_POST['account-role']
		); //print_r($input1); die;
		if(!empty($id)&&!empty($input2['role_id'])){

			$this->_model->account->update_account_admin($input1,['where'=>'id=?','param'=>[$id]]);
			$this->_model->account->update_account_admin_role($input2,['where'=>'admin_id=?','param'=>[$id]]);
		}	
		echo json_encode(array(
				'code'=>200
			)); die;
		
	}

	public function addClassAction(){
		url_returnError($this->_user['id']);
		$input = array(
			'bind_param'=>'sss',
			'name'=>$_POST['role-name']
		); //print_r($input);
		if(!empty($_POST['role-parent'])){
			$input['parent'] = explode('-',$_POST['role-parent'])[1];
			$input['code'] = explode('-',$_POST['role-parent'])[0].'-'.$_POST['role-code'];
		}else{
			$input['parent'] = 0;
			$input['code'] = $_POST['role-code'];
		}

		if(!empty($input['code'])){
			$this->_model->account->insert_role_class($input);

			echo json_encode(array(
				'code'=>200
			)); die;
		}
	}

	public function addActionAction(){
		url_returnError($this->_user['id']);
		$input = array(
			'bind_param'=>'ss',
			'name'=>$_POST['action-name'],
			'code'=>$_POST['action-code']
		); //print_r($input);

		if(!empty($input['code'])){
			$this->_model->account->insert_role_action($input);

			echo json_encode(array(
				'code'=>200
			)); die;
		}
	}

	public function addRoleAction(){ //print_r($_POST); die;

		url_returnError($this->_user['id']);

		if(!empty($_POST['roleadd-class'])&&!empty($_POST['roleadd-action'])){
			foreach($_POST['roleadd-action'] as $v){
				$input = array(
					'bind_param'=>'sii',
					'code'=>$_POST['roleadd-class'].'-'.$v,
					'role_class_id'=>$_POST['roleadd-class'],
					'role_action_id'=>$v
				); //print_r($input);
				$this->_model->account->insert_role_list($input);
			}

			echo json_encode(array(
				'code'=>200
			)); die;
		}
	}

	public function addRoleGroupAction(){ //print_r($_POST); die;
		//sleep(2);
		url_returnError($this->_user['id']);
		$role = !empty($_POST['rolegroup-role']) ? $_POST['rolegroup-role'] : '';
		$err = '';
		if(!empty($role)){
			$input = array(
				'bind_param'=>'issii',
				'parent'=>$_POST['rolegroup-parent'],
				'name'=>$_POST['rolegroup-object'],
				'role'=>$role,
				'role_type'=>2,
				'agency_id'=>0
			); //print_r($input);
			$this->_model->account->insert_role_account($input);
			$err = 'Success';
		}else{
			$err = 'Error';
		}

		url_returnPage($this->_url['web'].'/adw-account/rolegroupadd',$err);
	}

	public function editRoleGroupAction(){ //print_r($_POST);
		//sleep(2);
		url_returnError($this->_user['id']);
		$code = $_POST['rolegroup-code'] ;
		$role = !empty($_POST['rolegroup-check']) ? implode(',',$_POST['rolegroup-check']) : ''; //echo $role;
		$err = '';
		if(!empty($role)&&!empty($code)){
			$input = array(
				'bind_param'=>'ssii',
				'name'=>$_POST['rolegroup-name'],
				'role'=>$role,
				'active'=>$_POST['rolegroup-active'],
			); //print_r($input); die;
			$this->_model->account->update_role_account($input,['where'=>'id=?','param'=>[$code]]);
			echo json_encode(array(
				'code'=>200
			)); die;
		}else{
			echo json_encode(array(
				'code'=>404
			)); die;
		}

		//url_returnPage($this->_url['web'].'/adw-account/rolegroupadd',$err);
	}

	public function editPasswordAction(){ //print_r($_POST);
		url_returnError($this->_user['id']);
		$input = array(
			'bind_param'=>'si',
			'password'=>md5($_POST['password-new'])
		);
		$pass_old = md5($_POST['password-old']);
		$pass_renew = md5($_POST['password-renew']);
		$err = 'Error';
		if($pass_old == $this->_user['password']&&$input['password']==$pass_renew){
			$this->_model->account->update_account_admin($input,['where'=>'id=?','param'=>[$this->_user['id']]]);
			$err = 'Success';
		}

		url_returnPage($this->_url['web'].'/adw-account/detail',$err);
	}

	public function roleGroupAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['roles'] = $this->_model->account->get_role_account(); //print_r($data['roles']); die;
		$data['action'] = $this->_model->account->get_role_action2();
		$data['class'] = $this->_model->account->get_role_class2();
		$this->_view->load('account-rolegroup',$data);

	}

	public function roleGroupAddAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['role_list'] = $this->_model->account->get_role_list2(); //print_r($data['role_list']); die;
		$data['action'] = $this->_model->account->get_role_action2(); //print_r($data); die;
		$data['account'] = $this->_model->account->get_role_account_list(); //print_r($data); die;
		$this->_view->load('account-rolegroupadd',$data);

	}

	public function modalRoleAddAction(){ //echo 'OK'; die;
		$data['base_url'] = $this->_config->item('base_url');
		$data['role_list'] = $this->_model->account->get_role_list2(); //print_r($data['role_list']); die;
		$data['action'] = $this->_model->account->get_role_action2(); //print_r($data); die;
		$this->_modal->load('rolegroup-add',$data);
	}

	public function modalEditAccountAction(){
		$data['base_url'] = $this->_config->item('base_url');
		$data['item'] = $this->_model->account->get_account_info($_GET['code']); //print_r($data['item']);
		$data['role_account'] = $this->_model->account->get_role_account();
		$this->_modal->load('account-edit',$data);
	}

	public function modalEditRoleGroupAction(){
		$data['base_url'] = $this->_config->item('base_url');
		$data['item'] = $this->_model->account->get_roleaccount_info($_GET['code']); //print_r($data['item']['action']);
		$data['item_action'] = explode('=',$data['item']['action']);
		$data['role_list'] = $this->_model->account->get_role_list3(); //print_r($data['role_list']);
		$data['action'] = $this->_model->account->get_role_action2();
		//$data['item'] = $this->_model->account->get_account_info($_GET['code']); //print_r($data['item']);
		//$data['role_account'] = $this->_model->account->get_role_account();
		$this->_modal->load('rolegroup-edit',$data);
	}

}
<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Site_Controller extends VV_Controller{
	protected $_ss_name = '';
	protected $_url = array();
	protected $_user = array();
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','upload']);
		$this->_config->load('config');
		$this->_model->load('site');
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
		$data['item'] = $this->_model->site->get_listSite(); //print_r($data['item']); die;
		$this->_view->load('site-list',$data);
	}

	public function addAction(){
		
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['language'] = $this->_model->site->get_language();
		$data['_noti'] = array(
					'code'=>200,
					'error'=>''
				);

		if(isset($_POST['site-btn'])&&!empty($_POST['site-btn'])){ //print_r($_POST); die;
			url_returnError($this->_user['id']);
			usleep(rand(200000,1000000));
			$timeNow = date('Y-m-d H:i:s',time());
			$data['_data'] = array(
				'bind_param'=>'sisssssssi',
				'title_url'=>isset($_POST['site-titleurl']) ? str_checkString($_POST['site-titleurl']) : '',
				'site_type'=>isset($_POST['site-type']) ? str_checkString($_POST['site-type']) : '',
				'title'=>isset($_POST['site-title']) ? str_checkString($_POST['site-title']) : '',
				'description'=>isset($_POST['site-description']) ? str_checkString($_POST['site-description']) : '',
				'tags'=>isset($_POST['site-tags']) ? str_checkString($_POST['site-tags']) : '',
				'keywords'=>isset($_POST['site-keywords']) ? str_checkString($_POST['site-keywords']) : '',
				'language'=>isset($_POST['site-language']) ? str_checkString($_POST['site-language']) : '',
				'date_create'=>$timeNow,
				'date_edit'=>$timeNow,
				'active'=> 1
			);

			$data['_content'] = array(
				'bind_param'=>'isssi',
				'site_id'=>0,
				'list_id'=>str_createSiteContentId(),
				'list_name'=>isset($_POST['site-listname']) ? str_checkString($_POST['site-listname']) : '',
				'content'=>isset($_POST['site-content']) ? $_POST['site-content'] : '',
				'position'=>isset($_POST['site-listposition']) ? $_POST['site-listposition'] : 1
			);  
			//print_r($data['_data']); die;
			if(!empty($data['_data']['title'])&&!empty($data['_data']['tags'])&&!empty($data['_data']['title_url'])&&!empty($data['_data']['description'])&&!empty($data['_data']['keywords'])&&!empty($data['_content']['list_name'])){ 

				if($this->_model->site->check_site_exist($data['_data']['title_url'],$data['_data']['language'])){
					$data['_noti'] = array(
						'code'=>404,
						'error'=>'Dữ liệu site này đã tồn tại'
					);
				}else{
					$site_id = $this->_model->site->insert_site_list($data['_data']); //print_r($site_id); die;
					if(!empty($site_id)){
						$data['_content']['site_id'] = $site_id;
						$this->_model->site->insert_site_content($data['_content']);
						if(isset($_POST['site-sublistname'])&&!empty($_POST['site-sublistname'])){
							foreach($_POST['site-sublistname'] as $k=>$v){
								$subcontent = array(
									'bind_param'=>'isssi',
									'site_id'=>$site_id,
									'list_id'=>str_createSiteContentId(),
									'list_name'=>str_checkString($v),
									'content'=>isset($_POST['site-subcontent'][$k]) ? $_POST['site-subcontent'][$k] : '',
									'position'=>isset($_POST['site-sublistposition'][$k]) ? $_POST['site-sublistposition'][$k] : 1
								); 
								if(!empty($subcontent['list_name'])&&!empty($subcontent['content'])){
									$this->_model->site->insert_site_content($subcontent);
									$subcontent = array();
								}
							}
						}

						$data['_data'] = array();

						$data['_content'] = array();

						$data['_noti'] = array(
							'code'=>200,
							'error'=>'Bạn đã update bài thành công '
						);
					}else{
						$data['_noti'] = array(
							'code'=>404,
							'error'=>'System Error'
						);
					}
				}

			}else{
				$data['_noti'] = array(
					'code'=>404,
					'error'=>'Bạn chưa điền đầy đủ dữ liệu'
				);
			}
			
		}

		$data['_noti'] = json_encode($data['_noti'],JSON_UNESCAPED_UNICODE);

		$this->_view->load('site-add',$data);
	}

	public function editAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['language'] = $this->_model->site->get_language();
		$site_code = isset($_GET['code']) ? str_checkString($_GET['code']) : ''; //echo $site_code; die;
		$data['_data'] = $this->_model->site->get_site($site_code);
		$data['_noti'] = array(
					'code'=>200,
					'error'=>''
				);

		if(!empty($data['_data'])){
			$data['_content'] = $this->_model->site->get_site_content($data['_data']['id']); //print_r($data['_content']); die;

			$data['_noti'] = json_encode($data['_noti'],JSON_UNESCAPED_UNICODE);

			$this->_view->load('site-edit',$data);
		}else{
			header('Location:'.$data['base_url']['web'].'/admin');
		}

		
	}

	public function formEditAction(){
		usleep(rand(200000,1000000));
		$site_id = $_POST['site-id'];
		$data['_data'] = array(
				'bind_param'=>'sissssssi',
				'title_url'=>isset($_POST['site-titleurl']) ? str_checkString($_POST['site-titleurl']) : '',
				'site_type'=>isset($_POST['site-type']) ? str_checkString($_POST['site-type']) : '',
				'title'=>isset($_POST['site-title']) ? str_checkString($_POST['site-title']) : '',
				'description'=>isset($_POST['site-description']) ? str_checkString($_POST['site-description']) : '',
				'tags'=>isset($_POST['site-tags']) ? str_checkString($_POST['site-tags']) : '',
				'keywords'=>isset($_POST['site-keywords']) ? str_checkString($_POST['site-keywords']) : '',
				'language'=>isset($_POST['site-language']) ? str_checkString($_POST['site-language']) : '',
				'date_edit'=>date('Y-m-d H:i:s',time())
			);
		$data['_noti'] = array(
					'code'=>404,
					'error'=>''
				); //print_r($data['_data']);

		if(!empty($data['_data']['title_url'])&&!empty($site_id)){
			$this->_model->site->update_site($data['_data'],['where'=>'id=?','param'=>[$site_id]]);
			$data['_noti']['code'] = 200;
			$data['_noti']['error'] = 'Bạn đã thay đổi thành công';
		}
		echo json_encode($data['_noti'],JSON_UNESCAPED_UNICODE); die;
	}

	public function connectorAction(){
		$base_url = $this->_config->item('base_url'); //echo $data['base_url']; die;
		require_once __DIR__ . '/vendor/autoload.php';

		//use CKSource\CKFinder\CKFinder;

		$ckfinder = new CKFinder(__DIR__ . '/../../../config.php');

		$ckfinder->run();
	}

	public function formEditcontentAction(){
		$data['_noti'] = array(
					'code'=>404,
					'error'=>''
				);

		if(!empty($_POST)){
			$data['_data'] = array(
				'bind_param'=>'sisi',
				'list_name'=>$_POST['name'],
				'position'=>$_POST['position'],
				'content'=>$_POST['text']
			);
			$id = $_POST['id'];
			if(!empty($id)&&!empty($data['_data']['list_name'])){

				$this->_model->site->update_site_content($data['_data'],['where'=>'id=?','param'=>[$id]]);
				$data['_noti']['code'] = 200;
				$data['_noti']['error'] = 'Bạn đã thay đổi thành công';
			}
			
		}
		echo json_encode($data['_noti'],JSON_UNESCAPED_UNICODE); die;
	}

	public function formRemovecontentAction(){
		$data['_noti'] = array(
					'code'=>404,
					'error'=>''
				);

		if(!empty($_POST)){
			$this->_model->site->remove_site_content($_POST['id']);
			$data['_noti']['code'] = 200;
			$data['_noti']['error'] = 'Bạn đã thay đổi thành công';
			
		}
		echo json_encode($data['_noti'],JSON_UNESCAPED_UNICODE); die;
	}

	public function formAddcontentAction(){
		$data['_noti'] = array(
					'code'=>404,
					'error'=>'',
					'data'=>''
				);
		if(!empty($_POST)){ //print_r($_POST);
			$data['_data'] = array(
				'bind_param'=>'issis',
				'site_id'=>$_POST['id'],
				'list_id'=>str_createSiteContentId(),
				'list_name'=>$_POST['name'],
				'position'=>$_POST['position'],
				'content'=>$_POST['text']
			); //print_r($data['_data']); die;
			if(!empty($data['_data']['site_id'])){

				$id = $this->_model->site->insert_site_content($data['_data']);

				if(!empty($id)){
					$data['_noti']['code'] = 200;
					$data['_noti']['error'] = 'Bạn đã thay đổi thành công';
					$data['_noti']['data'] = $id;
				}
			}
			
		}
		echo json_encode($data['_noti'],JSON_UNESCAPED_UNICODE); die;
	}

}
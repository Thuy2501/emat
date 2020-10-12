<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Blog_Controller extends VV_Controller{
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
		$data['item'] = $this->_model->blog->get_listBlog(); //print_r($data['item']); die;
		$this->_view->load('blog-list',$data);
	}

	public function addAction(){
		
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['blog_type'] = $this->_model->blog->get_blog_type();
		$data['blog_category'] = $this->_model->blog->get_blog_category();
		$data['language'] = $this->_model->blog->get_language();

		$data['_noti'] = array(
					'code'=>200,
					'error'=>''
				);

		if(isset($_POST['blog-btn'])&&!empty($_POST['blog-btn'])){
			//url_returnError($this->_user['id']);
			usleep(rand(200000,1000000));
			//$cat = isset($_POST['blog-category']) ? str_explodeCategory($_POST['blog-category']) : array() ;
			//$is_settime = isset($_POST['blog-settime-check'])&&$_POST['blog-settime-check']==1 ? $_POST['blog-settime-check'] : 0; //echo $is_settime; die;
			$data['_data'] = array(
				'code'=>str_createCodeBlog(),
				'cat_id'=>isset($_POST['blog-category']) ? $_POST['blog-category'] : 0 ,
				'website'=>1,
				'avatar'=>isset($_POST['blog-avatar-name']) ? str_checkString($_POST['blog-avatar-name']) : '',
				'avatar_alt'=>isset($_POST['blog-avatar-alt']) ? str_checkString($_POST['blog-avatar-alt']) : '',
				'video'=>isset($_POST['blog-video']) ? str_checkString($_POST['blog-video']) : '',
				'title'=>isset($_POST['blog-title']) ? str_checkString($_POST['blog-title']) : '',
				'title_url'=>isset($_POST['blog-title-url']) ? str_checkString($_POST['blog-title-url']) : '',
				'description'=>isset($_POST['blog-description']) ? str_checkString($_POST['blog-description']) : '',
				'tags'=>isset($_POST['blog-tags']) ? str_checkString($_POST['blog-tags']) : '',
				'keywords'=>isset($_POST['blog-keywords']) ? str_checkString($_POST['blog-keywords']) : '',
				'views'=>isset($_POST['blog-views']) ? str_checkString($_POST['blog-views']) : '',
				'author'=>isset($_POST['blog-author']) ? str_checkString($_POST['blog-author']) : '',
				'stick'=>isset($_POST['blog-stick']) ? str_checkString($_POST['blog-stick']) : '',
				'language'=>isset($_POST['blog-language']) ? str_checkString($_POST['blog-language']) : '',
				'blog_type_id'=>isset($_POST['blog-type']) ? str_checkString($_POST['blog-type']) : '',
				'date_create'=>isset($_POST['blog-date']) ? str_checkString($_POST['blog-date']).' '.date('H:i:s',time()) : '',
				'active'=> 1
			);

			$data['_content'] = array(
				'blog_id'=>0,
				'title_content'=>isset($_POST['site-listname']) ? str_checkString($_POST['site-listname']) : '',
				'content'=>isset($_POST['site-content']) ? $_POST['site-content'] : '',
				'position'=>isset($_POST['site-listposition']) ? $_POST['site-listposition'] : 1
			); 

			if(!empty($data['_data']['title'])&&!empty($data['_content']['content'])&&!empty($data['_data']['tags'])&&!empty($data['_data']['title_url'])&&!empty($data['_data']['description'])&&!empty($data['_data']['keywords'])){

				if(isset($_FILES['blog-avatar']['name'])&&!empty($_FILES['blog-avatar']['name'])){ //print_r($_FILES['blog-avatar']); die;
					$upload = up_upLoadFile($_FILES['blog-avatar'],'upload/blogs/',['jpg','jpeg','png'],$data['_data']['avatar'],''); 
					//print_r($upload); die;
					if($upload['code']==200){
						$data['_data']['avatar'] = $upload['name'];
						$blog_id = $this->_model->blog->insert_blog_list($data['_data']); //print_r($blog_id); die;
						if(!empty($blog_id)){
							$data['_content']['blog_id'] = $blog_id;
							$this->_model->blog->insert_blog_content($data['_content']);

							if(isset($_POST['site-sublistname'])&&!empty($_POST['site-sublistname'])){
								foreach($_POST['site-sublistname'] as $k=>$v){
									$subcontent = array(
										'blog_id'=>$blog_id,
										'title_content'=>str_checkString($v),
										'content'=>isset($_POST['site-subcontent'][$k]) ? $_POST['site-subcontent'][$k] : '',
										'position'=>isset($_POST['site-sublistposition'][$k]) ? $_POST['site-sublistposition'][$k] : 1
									); 
									if(!empty($subcontent['title_content'])&&!empty($subcontent['content'])){
										$this->_model->blog->insert_blog_content($subcontent);
										$subcontent = array();
									}
								}
							}

							$data['_data'] = array();

							$data['_content'] = array();

							$data['_noti'] = array(
								'code'=>200,
								'error'=>'Bạn đã đăng bài thành công '
							);
						}else{
							$data['_noti'] = array(
								'code'=>404,
								'error'=>'Upload dữ liệu lỗi'
							);
						}
					}else{
						$data['_noti'] = array(
							'code'=>404,
							'error'=>'Ảnh upload lỗi. '.$upload['msg']
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

		$this->_view->load('blog-add',$data);
	}

	public function editAction(){
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$data['blog_type'] = $this->_model->blog->get_blog_type();
		$data['blog_category'] = $this->_model->blog->get_blog_category();
		$data['language'] = $this->_model->blog->get_language();
		$blog_code = isset($_GET['code']) ? str_checkString($_GET['code']) : ''; //echo $blog_code;
		$data['_noti'] = array(
					'code'=>200,
					'error'=>''
				);

		if(isset($_POST['blog-btn'])&&!empty($_POST['blog-btn'])&&!empty($blog_code)){ //print_r($_POST); die;
			//url_returnError($this->_user['id']);
			usleep(rand(200000,1000000));
			//$cat = isset($_POST['blog-category']) ? str_explodeCategory($_POST['blog-category']) : array() ;
			$data['_data'] = array(
				'cat_id'=>isset($_POST['blog-category']) ? $_POST['blog-category'] : 0 ,
				'video'=>isset($_POST['blog-video']) ? str_checkString($_POST['blog-video']) : '',
				'title'=>isset($_POST['blog-title']) ? str_checkString($_POST['blog-title']) : '',
				'title_url'=>isset($_POST['blog-title-url']) ? str_checkString($_POST['blog-title-url']) : '',
				'description'=>isset($_POST['blog-description']) ? str_checkString($_POST['blog-description']) : '',
				'tags'=>isset($_POST['blog-tags']) ? str_checkString($_POST['blog-tags']) : '',
				'keywords'=>isset($_POST['blog-keywords']) ? str_checkString($_POST['blog-keywords']) : '',
				'views'=>isset($_POST['blog-views']) ? str_checkString($_POST['blog-views']) : '',
				'author'=>isset($_POST['blog-author']) ? str_checkString($_POST['blog-author']) : '',
				'stick'=>isset($_POST['blog-stick']) ? str_checkString($_POST['blog-stick']) : '',
				'language'=>isset($_POST['blog-language']) ? str_checkString($_POST['blog-language']) : '',
				'blog_type_id'=>isset($_POST['blog-type']) ? str_checkString($_POST['blog-type']) : ''
			); //print_r($data['_data']); die;

			if(!empty($data['_data']['title'])&&!empty($data['_data']['tags'])&&!empty($data['_data']['title_url'])&&!empty($data['_data']['description'])&&!empty($data['_data']['keywords'])){
				$this->_model->blog->update_blog_list($data['_data'],['sql'=>'code=?','val'=>[$blog_code]]);

				$data['_noti'] = array(
					'code'=>200,
					'error'=>'Bạn đã update bài thành công '
				);

			}else{
				$data['_noti'] = array(
					'code'=>404,
					'error'=>'Bạn chưa điền đầy đủ dữ liệu'
				);
			}

			$data['_data']['avatar'] = isset($_POST['blog-avatar']) ? str_checkString($_POST['blog-avatar']) : '';
			$data['_data']['avatar_alt'] = isset($_POST['blog-avatar_alt']) ? str_checkString($_POST['blog-avatar_alt']) : '';

			$data['_data']['content'] = $this->_model->blog->get_blog_contents_by_code($blog_code);

			$data['_noti'] = json_encode($data['_noti'],JSON_UNESCAPED_UNICODE);

			$this->_view->load('blog-edit',$data);
		}else if(!empty($blog_code)){
			$data['_data'] = $this->_model->blog->get_blog_by_code($blog_code); //print_r($data['_data']); die;

			if(!empty($data['_data'])){

				$data['_noti'] = json_encode($data['_noti'],JSON_UNESCAPED_UNICODE);

				$this->_view->load('blog-edit',$data);
			}else{
				header('Location:'.$data['base_url']['web'].'/admin');
			}
		}else{
			header('Location:'.$data['base_url']['web'].'/admin');
		}

		
	}

	public function connectorAction(){
		$base_url = $this->_config->item('base_url'); //echo $data['base_url']; die;
		require_once __DIR__ . '/vendor/autoload.php';

		//use CKSource\CKFinder\CKFinder;

		$ckfinder = new CKFinder(__DIR__ . '/../../../config.php');

		$ckfinder->run();
	}


	public function editAvatarAction(){
		//url_returnError($this->_user['id']);
		$data['base_url'] = $this->_config->item('base_url');
		$input = array(
			'avatar_alt'=>str_checkString($_POST['blog-avatar_alt'])
		);
		$result = array(
			'code'=>404,
			'error'=>'',
			'avatar'=>'',
			'alt'=>$input['avatar_alt']
		);
		$blog_code = isset($_POST['blog-code']) ? str_checkString($_POST['blog-code']) : '';
		if($input['avatar_alt']&&!empty($blog_code)){
			if(isset($_FILES['blog-file']['name'])&&!empty($_FILES['blog-file']['name'])){ //print_r($_FILES['blog-file']); die;
				$img_old = $_POST['blog-avatar'];
				$upload = up_upLoadFile1($_FILES['blog-file'],'upload/blogs/',['jpg','jpeg','png'],explode('-',$img_old)[0],$img_old); 
				//print_r($upload); die;
				if($upload['code']==200){
					$input['avatar'] = $upload['name'];
					$result['avatar'] = $input['avatar'];
				}else{
					$result['error'] = 'Ảnh upload lỗi. '.$upload['msg'];
				}
			}
			$result['code'] = 200;
			$result['error'] = 'Thay đổi thành công';
			$this->_model->blog->update_blog_list($input,['sql'=>'code=?','val'=>[$blog_code]]);
		}else{
			$result['error'] = 'Dữ liệu thiếu';
		}

		echo  json_encode($result,JSON_UNESCAPED_UNICODE); die;

	}

	public function removeAction(){
		//url_returnError($this->_user['id']);
		//$code = isset($_POST['code']) ? str_checkString($_POST['code']) : 0;
		$info = $this->_model->blog->get_idBlogByCode(str_checkString($_POST['code']));
		if(!empty($info)){
			$this->_model->blog->remove_blog($info['id']);
			echo json_encode(array(
				'code'=>200,
				'msg'=>'Bạn đã xóa thành công '
			));
		}else{
			echo json_encode(array(
				'code'=>404,
				'msg'=>'Lỗi, vui lòng kiểm tra lại '
			));
		}
	}

	public function formEditcontentAction(){
		$data['_noti'] = array(
					'code'=>404,
					'error'=>''
				);

		if(!empty($_POST)){
			$data['_data'] = array(
				'title_content'=>$_POST['name'],
				'title_color'=>$_POST['color'],
				'position'=>$_POST['position'],
				'content'=>$_POST['text']
			); //print_r($data['_data']);
			$id = $_POST['id'];
			if(!empty($id)&&!empty($data['_data']['title_content'])){

				$this->_model->blog->update_blog_content($data['_data'],['sql'=>'id=?','val'=>[$id]]);
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
			$this->_model->blog->remove_site_content($_POST['id']);
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
				'blog_id'=>$_POST['id'],
				'title_content'=>$_POST['name'],
				'position'=>$_POST['position'],
				'content'=>$_POST['text']
			); //print_r($data['_data']); die;
			if(!empty($data['_data']['blog_id'])){

				$this->_model->blog->insert_blog_content($data['_data']);

				$data['_noti']['code'] = 200;
				$data['_noti']['error'] = 'Bạn đã thêm mới thành công';
			}
			
		}
		echo json_encode($data['_noti'],JSON_UNESCAPED_UNICODE); die;
	}

}
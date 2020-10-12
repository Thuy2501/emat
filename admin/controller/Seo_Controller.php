<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Seo_Controller extends VV_Controller{
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

	public function sitemapAction(){
		$data['base_url'] = $this->_config->item('base_url');
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$fp = @fopen('sitemap.xml', "r");
		$data['item'] =  array() ;
		$data['item_json'] =  '' ;
  
		// Kiểm tra file mở thành công không
		if (!$fp) {
		    echo 'Mở file không thành công';
		}
		else
		{
		    // Đọc file và trả về nội dung
		    $file = fread($fp, filesize('sitemap.xml'));
		    $file = preg_replace('/[\r\n\t]/','', $file); //echo $file; die;
		    $file2 = str_getTextBetweenTags($file,'url'); //print_r($data2); die;
		    if(!empty($file2[1])){
		    	foreach($file2[1] as $k=>$v){
		    		if(!empty($v)){ //echo $v.'<br>';
		    			$data['item'][] = array(
		    				0=>str_getTextBetweenTag($v,'loc'),
		    				1=>str_getTextBetweenTag($v,'lastmod'),
		    				2=>str_getTextBetweenTag($v,'priority')
		    			);
		    		} //break;
		    	} //print_r($data['item']); die;
		    	$data['item_json'] = json_encode($data['item']);
		    }
		}
		$this->_view->load('seo-sitemap',$data);
	}

	public function addValidateAction(){ //print_r($_POST); die;
		url_returnError($this->_user['id']);
		$data =  json_decode($_POST['sitemap-code']) ; //print_r($data); die;
		//echo date_format(date_create(date('Y-m-d H:i:s',time())),DATE_ATOM); die;
		$data[] = array(
			0=>$_POST['sitemap-link'],
			1=>date_format(date_create(date('Y-m-d H:i:s',time())),DATE_ATOM),
			2=>$_POST['sitemap-priority']
		); //print_r($data);
		$xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
		$content = '';
		foreach($data as $k=>$v){ //echo $k;
			$content .= '<url><loc>'.$v[0].'</loc><lastmod>'.$v[1].'</lastmod><changefreq>daily</changefreq><priority>'.$v[2].'</priority></url>';
		}
		$xml .= $content.'</urlset>';

		$fp = @fopen('sitemap.xml', "w");

		if (!$fp) {
		    echo 'Mở file không thành công';
		}
		else
		{
		    fwrite($fp, $xml);
		}

		
	}

	public function editValidateAction(){ //print_r($_POST); die;
		url_returnError($this->_user['id']);
		$data =  json_decode($_POST['editsitemap-code']) ; //print_r($data); die;
		//echo date_format(date_create(date('Y-m-d H:i:s',time())),DATE_ATOM); die;
		if($_POST['editsitemap-priority']==0){
			unset($data[$_POST['editsitemap-key']]);
		}else{
			$data[$_POST['editsitemap-key']] = array(
				0=>$_POST['editsitemap-link'],
				1=>date_format(date_create(date('Y-m-d H:i:s',time())),DATE_ATOM),
				2=>$_POST['editsitemap-priority']
			); //print_r($data);
		}
		
		$xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
		$content = '';
		foreach($data as $k=>$v){ //echo $k;
			$content .= '<url><loc>'.$v[0].'</loc><lastmod>'.$v[1].'</lastmod><changefreq>daily</changefreq><priority>'.$v[2].'</priority></url>';
		}
		$xml .= $content.'</urlset>';

		$fp = @fopen('sitemap.xml', "w");

		if (!$fp) {
		    echo 'Mở file không thành công';
		}
		else
		{
		    fwrite($fp, $xml);
		}

		
	}

	public function modalEditsitemapAction(){ //print_r($_POST);
		$data['base_url'] = $this->_config->item('base_url');  //print_r($data['base_url']) ;
		$data['item_key'] = $_POST['key'];
		$data['item'] = json_decode($_POST['code'])[$data['item_key']];
		$data['item_json'] = $_POST['code'];
		
		//$data['item_category'] = $this->_model->blog->get_blog_categoryinfo($_GET['code']); //print_r($data['item']);
		$this->_modal->load('sitemap-edit',$data);
	}

	public function languageAction(){
		$lang = isset($_GET['code']) ? $_GET['code'] : 'vi';
		$url = 'public/home/i18n/'.$lang.'.json';
		$data['base_url'] = $this->_config->item('base_url');
		$data['_role'] = $_SESSION[$this->_ss_name]['role'];
		$fp = @fopen($url, "r");
		$data['item'] =  array() ;
		$data['item_json'] =  '' ;
  
		// Kiểm tra file mở thành công không
		if ($fp) {
		    $data['item_json'] = fread($fp, filesize($url));
		    $data['item'] =  !empty($data['item_json']) ? json_decode($data['item_json'],true) : array() ;
		}
		$this->_view->load('seo-language',$data);
	}

	public function languageEditAction(){
		url_returnError($this->_user['id']);
		if(!empty($_POST)){
			$lang = isset($_POST['CFT-LANG']) ? $_POST['CFT-LANG'] : '';
			if(!empty($lang)){
				unset($_POST['CFT-LANG']); //print_r($_POST); die;
				$url = 'public/home/i18n/'.$lang.'.json';
				$file = json_encode($_POST,JSON_UNESCAPED_UNICODE); //echo $file;
				$fp = @fopen($url, "w"); //print_r($fp); die;

				if ($fp) {
				    fwrite($fp, $file);
				}
			}
			header('Location:'.$this->_url['web'].'/adw-seo/language?code='.$lang);
		}else{
			header('Location:'.$this->_url['web'].'/adw-seo/language');
		}
		
	}
}


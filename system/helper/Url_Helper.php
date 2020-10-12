<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

function url_returnPage($link,$error=''){
	if(isset($error)&&!empty($error)){
	    echo '<script> alert("'.$error.'"); </script>';
	}
	echo '<script> window.location.href="'.$link.'"; </script>';
	exit();
}

function url_menuActive($m=array(),$c,$a='',$code=''){ //echo $c.' '; //die;
	if(!empty($code)&&in_array($code,$m)){
		return 'current-menu-item';
	}elseif(empty($code)&&!empty($a)&&in_array($a,$m)){
		return 'current-menu-item';
	}elseif(empty($code)&&in_array($c,$m)){
		return 'current-menu-item';
	}else{
		return '';
	}
}

function url_menuActiveStart($m=array(),$c,$a='',$code=''){ //echo $c.' '; //die;
	if(!empty($code)&&in_array($code,$m)){
		return 'color:#fff;';
	}elseif(empty($code)&&!empty($a)&&in_array($a,$m)){
		return 'color:#fff;';
	}elseif(empty($code)&&in_array($c,$m)){
		return 'color:#fff;';
	}else{
		return 'color:red;';
	}
}

function url_menuActive2($m,$url,$class='active'){ //echo $a.' '; //die;
	if($url==$m){
		return $class;
	}else{
		return '';
	}
}

function url_header($link,$n=301){
	header('Location:'.$link,true,$n); die;
}

function url_get_blogid($url){
	if(!empty($url)){
		$url = explode('-',$url);
		$key = count($url)-1 ;
		$t = isset($url[$key]) ? $url[$key] : 0; 
		$id = isset($url[$key-1]) ? $url[$key-1] : 0; //echo $t;

		return $id-$t-1325;
	}else{
		return 0;
	}
}

function url_link_encode($title,$id){
	$t = time();
	$y = (int)((date('Y',$t)-2000).date('m',$t).date('d',$t));
	$h = (int)date('His',$t);
	$c = strlen($title); //echo $h;
	$c = $c%2==0 ? ($c+687) : ($c+786);
	return $title.'-'.($c+$id+1325).'-'.$c.'.html';
}

function url_link_decode($title,$t,$id){ //echo $id;
	$y = (int)((date('Y',$t)-2000).date('m',$t).date('d',$t));
	$h = (int)date('His',$t);
	$c = strlen($title)+687; 
	$i = 0;
	if($c <100 ){
		$i = $c*$h*99;
	}else if($c<1000){
		$i = $c*$h*9;
	}else{
		$i = $c*$h;
	}
	$id_new = $id + $y + $i - $t ;
	return $id_new;
}

function url_get_id_blog($link){
	$link = explode('-',$link);
	return (int)$link[count($link)-1];
}

function url_get_id_blog2($link){ //echo $link;
	$link = explode('-',$link);
	$link =  explode('.',$link[count($link)-1]) ;
	return (int)$link[0];
}

function url_checkRole($role,$str){
	if($role['type']==1){
		return true;
	}elseif(in_array($str,$role['list'])){
		return true;
	}else{
		return false;
	}
}

function url_lang($lang){
	if(!empty($lang)&&$lang=='en'){
		return '?lang=en';
	}else{
		return '?lang=vi';
	}
}
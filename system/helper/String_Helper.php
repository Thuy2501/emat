<?php if(!defined('PATH_SYSTEM')) die('Bad requested');
function str_checkString($str){
	$str = preg_replace('/[\r\n\t]/','', $str);
	$str =htmlspecialchars(addslashes($str));
	return $str;
}

function str_strRandom($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function str_randomNDigitNumber($digits)
{
  $returnString = mt_rand(1, 9);
  while (strlen($returnString) < $digits) {
    $returnString .= mt_rand(0, 9);
  }
  return $returnString;
}

function str_trimText($input, $length, $ellipses = true, $strip_html = true) {
    if ($strip_html) {
        $input = strip_tags($input);
    }
    if (strlen($input) <= $length) {
        return $input;
    }
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
    if ($ellipses) {
        $trimmed_text .= '...';
    }
    return $trimmed_text;
}

function str_time_format($t){
    return date('d/m/Y',strtotime($t));
}

function str_tags_html($str){
    $html = '';
    if(!empty($str)){
        foreach(explode(',',$str) as $v){
            if(!empty($v)) $html .= '<h3 class="h3-tags"><a title="'.trim($v).'" href="#">'.trim($v).'</a></h3>';
        }
    }
    return $html;
}

function str_url_blog($title){
    return preg_replace('/[\s\+#@%&*!())\[\].]+/','',$title);
}

function str_url_tag($title){
    return str_romanize(preg_replace('/[\s\+#@%&*!())\[\].]+/','-',trim($title)));
}

function str_listTags($data,$url=''){
    $html = '';
    if(!empty($data)){
        $data = explode(',',$data);
        foreach($data as $v){
            $html .='<a class="" href="'.$url.'/'.str_url_tag($v).'"> #'.trim($v).'</a>';
        }
    }
    return $html;
}

function str_timeBlog($t){
    $t = strtotime($t);
    $h = time() - $t; //echo $h;

    if($h<60){
        return 'Vừa xong';
    }else if($h>=60 && $h<3600){
        return (int)($h/60).' phút trước';
    }else if($h>=3600 && $h<86400){
        return (int)($h/3600).' giờ trước';
    }else if($h>=86400 && $h<86400*30){
        return (int)($h/86400).' ngày trước';
    }else{
        return date('d/m/Y',$t);
    }

}

function str_createCodeBlog(){
    return substr(date('Ymd',time()),2).rand(100,999).date('His',time());
}

function str_createCode17($h=10){
    return substr(date('Ymd',time()),2).$h.rand(100,999).date('His',time());
}

function str_explodeCategory($txt){
    return explode('_',$txt);
}

function str_blog_active($a){ //echo $a;
    if($a==1){
        return '<span class="text-success">Active</span>';
    }else if($a==-1){
        return '<span class="text-warning">Waiting</span>';
    }else{
        return '<span class="text-danger">Inactive</span>';
    }
}

function str_romanize($string){
    include 'utf8/lookup.php' ;
    return strtr($string,$utf8_lookup['romanize']) ;
}

function str_settime_date($t,$now){
    if($t<$now){
        return '<span class="text-secondary" >'.$t.'</span>';
    }elseif($t==$now){
        return '<span class="text-primary" >'.$t.'</span>';
    }else{
        return '<span class="text-warning" >'.$t.'</span>';
    }
}

<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

function up_upLoadFile($file,$dir,$type=array(),$sub_name='',$img_old=''){ //print_r($file);
	if(isset($file['tmp_name'])&&!empty($file['tmp_name'])&&$file['error']==0){
		$imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION)); //echo $imageFileType;
		if(in_array($imageFileType,$type)){
			$name = $sub_name.'-'.up_strRandom(2).substr(date('YmdHis',time()),2).'.'.$imageFileType; 
			if(move_uploaded_file($file["tmp_name"], $dir.$name)){
				if(!empty($img_old)){
					unlink($dir.$img_old);
				}
				return array(
					'code'=>200,
					'name'=>$name,
					'msg'=>'Success'
					);
			}else{
				return array(
					'code'=>500,
					'name'=>'',
					'msg'=>'Error Upload'
					);
			}
		}else{
			return array(
				'code'=>500,
				'name'=>'',
				'msg'=>'Error Type'
				);
		}
	}
	return array(
		'code'=>404,
		'name'=>'',
		'msg'=>'Error File'
		);
}

function up_upLoadFile1($file,$dir,$type=array(),$sub_name='',$img_old=''){ //print_r($file);
	if(isset($file['tmp_name'])&&!empty($file['tmp_name'])&&$file['error']==0){
		$imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION)); //echo $imageFileType;
		if(in_array($imageFileType,$type)){
			$name = $sub_name.'-'.up_strRandom(2).substr(date('YmdHis',time()),2).'.'.$imageFileType; 
			if(move_uploaded_file($file["tmp_name"], $dir.$name)){
				if(!empty($img_old)&&$img_old!=$name){
					unlink($dir.$img_old);
				}
				return array(
					'code'=>200,
					'name'=>$name,
					'msg'=>'Success'
					);
			}else{
				return array(
					'code'=>500,
					'name'=>'',
					'msg'=>'Error Upload'
					);
			}
		}else{
			return array(
				'code'=>500,
				'name'=>'',
				'msg'=>'Error Type'
				);
		}
	}
	return array(
		'code'=>404,
		'name'=>'',
		'msg'=>'Error File'
		);
}

function up_upLoadFileX($file,$dir,$type=array(),$i=0,$img_old=''){
	if(isset($file['tmp_name'][$i])&&!empty($file['tmp_name'][$i])&&$file['error'][$i]==0){
		$imageFileType = strtolower(pathinfo($file['name'][$i],PATHINFO_EXTENSION));
		if(in_array($imageFileType,$type)){
			$name = up_strRandom(5).substr(date('YmdHis',time()),2).'.'.$imageFileType;
			if(move_uploaded_file($file["tmp_name"][$i], $dir.$name)){
				if(!empty($img_old)){
					unlink($dir.$img_old);
				}
				return array(
					'code'=>200,
					'name'=>$name
					);
			}else{
				return array(
					'code'=>500,
					'name'=>''
					);
			}
		}else{
			return array(
				'code'=>500,
				'name'=>''
				);
		}
	}
	return array(
		'code'=>404,
		'name'=>''
		);
}

function up_upLoadFileMulti($files,$dir,$type=array(),$img_old=array()){
	if(isset($files['name'])&&!empty($files['name'])){
		$result = array(
			'name'=>array()
			);
		foreach($files['name'] as $k=>$v){
			if(!empty($v)){
				if(isset($files['tmp_name'][$k])&&!empty($files['tmp_name'][$k])&&$files['error'][$k]==0){
					$imageFileType = strtolower(pathinfo($v,PATHINFO_EXTENSION));
					if(in_array($imageFileType,$type)){
						$name = up_strRandom(5).$k.substr(date('YmdHis',time()),2).'.'.$imageFileType;
						if(move_uploaded_file($files["tmp_name"][$k], $dir.$name)){
							if(isset($img_old[$k])&&!empty($img_old[$k])){
								unlink($dir.$img_old[$k]);
							}
							$result['name'][] = $name;
						}
					}
				}
			}
		}
	}
	return $result;
}

function up_strRandom($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
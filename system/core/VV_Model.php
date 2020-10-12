<?php 
class VV_Model{
	private $__host = DB_HOST;
	private $__user = DB_USER;
	private $__pass = DB_PASSWORD;
	private $__db = DB_DATABASE;
	private $__conn = null;
	function connect(){
		try {
		    $dsn = "mysql:host=".$this->__host.";dbname=".$this->__db.";charset=utf8mb4";
		     
		    $options = [
			  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
			  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
			  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
			];
		     
		    $this->__conn = new PDO($dsn, $this->__user, $this->__pass, $options);
		    //echo "Success";
		}
		catch (PDOException $e) {
		    echo "Something weird happened : " . $e->getMessage();
		}
	}
	function dis_connect(){
		if($this->__conn){
			$this->__conn = null ;
		}
	}

	function pdo_query($sql,$values=array()){ // $where = ['val'=>[],'sql'=>'']
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$stmt = null;
		}
	}
	function pdo_querys_commit($sql=array(),$values=array()){ // $where = ['val'=>[],'sql'=>'']
		try {
			$this->__conn->beginTransaction();
			foreach($sql as $k=>$v){
				$stmt = $this->__conn->prepare($v);
				$stmt->execute($values[$k]);
				$stmt = null;
			}
			$this->__conn->commit();
		} catch(Exception $e) {
			$this->__conn->rollback();
		}
	}

	function pdo_insert($table,$data){
		if(!empty($table)&&!empty($data)){
			$this->connect();
			$field_list = '';
			$field_val = '';
			$value = array();
			foreach($data as $key=>$val){
				$field_list .= ','.(string)$key;
				$field_val .= ',?';
				$value[] = $val;
			}
			$sql = 'INSERT INTO '.$table.'('.trim($field_list,',').') VALUES('.trim($field_val,',').')'; //echo $sql;
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($value);
			$stmt = null;
		}
	}
	function pdo_insert_return($table,$data){
		if(!empty($table)&&!empty($data)){
			$this->connect();
			$field_list = '';
			$field_val = '';
			$value = array();
			foreach($data as $key=>$val){
				$field_list .= ','.(string)$key;
				$field_val .= ',?';
				$value[] = $val;
			}
			$sql = 'INSERT INTO '.$table.'('.trim($field_list,',').') VALUES('.trim($field_val,',').')'; //echo $sql;
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($value);
			$stmt = null;
			return $this->__conn->lastInsertId();
		}
	}
	function pdo_inserts($table,$data){ //[['k1'=>'v11','k2'=>'v12'],['k1'=>'v21','k2'=>'v22']]
		if(!empty($table)&&!empty($data)){
			$this->connect();
			//$this->__conn->beginTransaction(); // also helps speed up your inserts.
			$values = array();
			foreach($data as $k=>$d){
			    $question_marks[] = '('  . $this->placeholders('?', sizeof($d)) . ')';
			    $values = array_merge($values, array_values($d));
			}

			$sql = "INSERT INTO ".$table." (" . implode(",", array_keys($data[0]) ) . ") VALUES " .implode(',', $question_marks); //echo $sql;

			$stmt = $this->__conn->prepare ($sql);
			$stmt->execute($values);
			//$this->__conn->commit();
			$stmt = null;
		}
	}

	function pdo_update($table,$data,$where=array()){ // $where = ['val'=>[],'sql'=>'']
		if(!empty($table)&&!empty($data)){
			$this->connect();
			$values = array();
			$para = '';
			foreach($data as $key=>$val){
				$para .= ','.$key.'=?';
				$values[] = $val;
			}
			$sql = 'UPDATE '.$table.' SET '.trim($para,','); //echo $sql;
			if(!empty($where)){
				$sql = $sql.' WHERE '.$where['sql']; //echo $sql;
				$values = array_merge($values,$where['val']);
			} //echo $sql;
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$stmt = null;
		}
	}
	function pdo_update_return($table,$data,$where=array()){ // $where = ['val'=>[],'sql'=>'']
		if(!empty($table)&&!empty($data)){
			$this->connect();
			$values = array();
			$para = '';
			foreach($data as $key=>$val){
				$para .= ','.$key.'=?';
				$values[] = $val;
			}
			$sql = 'UPDATE '.$table.' SET '.trim($para,','); //echo $sql;
			if(!empty($where)){
				$sql = $sql.' WHERE '.$where['sql']; //echo $sql;
				$values = array_merge($values,$where['val']);
			} //echo $sql;
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$responses = $stmt->rowCount();
			$stmt = null;
			return $responses;
		}
	}

	function pdo_delete($table,$where=array()){ // $where = ['val'=>[],'sql'=>'']
		if(!empty($table)){
			$this->connect();
			$values = array();
			if(!empty($where)){
				$sql = 'DELETE FROM '.$table.' WHERE '.$where['sql']; //echo $sql;
				$values = $where['val'];
			}else{
				$sql = " TRUNCATE ".$table;
			}
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$stmt = null;
		}
	}

	function pdo_selects($sql,$values=array()){
		$arr = array();
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt = null;
		}
		return $arr;
	}
	function pdo_selects_object($sql,$values=array()){
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$arr = $stmt->fetchAll(PDO::FETCH_CLASS);
			$stmt = null;
			return $arr;
		}else{
			return '';
		}
		
	}
	function pdo_selects_num($sql,$values=array()){
		$arr = array();
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$arr = $stmt->fetchAll(PDO::FETCH_NUM);
			$stmt = null;
		}
		return $arr;
	}
	function pdo_selects_count($sql,$values=array()){
		$count = 0;
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$count = $stmt->fetch(PDO::FETCH_COLUMN);
			$stmt = null;
		}
		return $count;
	}
	function pdo_selects_column($sql,$values=array()){
		$arr = array();
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$arr = $stmt->fetchAll(PDO::FETCH_COLUMN);
			$stmt = null;
		}
		return $arr;
	}
	function pdo_select($sql,$values=array()){
		$arr = array();
		if(!empty($sql)){
			$this->connect();
			$stmt = $this->__conn->prepare($sql);
			$stmt->execute($values);
			$arr = $stmt->fetch();
			$stmt = null;
		}
		return $arr;
	}


	function placeholders($text, $count=0, $separator=","){
	    $result = array();
	    if($count > 0){
	        for($x=0; $x<$count; $x++){
	            $result[] = $text;
	        }
	    }
	    return implode($separator, $result);
	}
}
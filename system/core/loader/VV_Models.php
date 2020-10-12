<?php 
class VV_Model{
	private $__host = DB_HOST;
	private $__user = DB_USER;
	private $__pass = DB_PASSWORD;
	private $__db = DB_DATABASE;
	private $__conn;
	function connect(){
		if(!$this->__conn){
			$this->__conn = mysqli_connect($this->__host,$this->__user,$this->__pass,$this->__db) or die('Connect Error !');
			//mysqli_query($this->__conn,"SET character_set_results='utf8',character_set_client='utf8',character_set_database='utf8',character_set_server='utf8' ");
			mysqli_set_charset($this->__conn, 'utf8');
		}
	}
	function dis_connect(){
		if($this->__conn){
			mysqli_close($this->__conn);
		}
	}

	function insert($table,$data){
		$this->connect();
		$field_list = '';
		$field_val = '';
		$values = array();
		$bind_param = '';
		foreach($data as $key=>$val){
			if($key==='bind_param'){
				$bind_param = $val;
			}else{
				$field_list .= ','.(string)$key;
				$field_val .= ',?';
				$values[] = $val;
			}
		}

		$sql = 'INSERT INTO '.$table.'('.trim($field_list,',').') VALUES('.trim($field_val,',').')';

		$stmt = $this->__conn->prepare($sql);

		$stmt->bind_param($bind_param, ...$values );

		$stmt->execute();

		$stmt->close();

		return $this->__conn->insert_id;

	}

	function update($table,$data,$where){ //where = array(where=>'',param=>[])
		$this->connect();
		$para = '';
		$bind_param = '';
		$values = array();
		foreach($data as $key=>$val){
			if($key==='bind_param'){
				$bind_param = $val;
			}else{
				$para .= ','.$key.'=?';
				$values[] = $val;
			}
		}
		$sql = 'UPDATE '.$table.' SET '.trim($para,',').' WHERE '.$where['where']; //echo $sql;
		$stmt = $this->__conn->prepare($sql); //print_r($values);
		$stmt->bind_param($bind_param, ...array_merge($values,$where['param']) );

		$stmt->execute();

		$stmt->close();
	}

	function remove($table,$where,$bind_param){ // $bind_param array(bind=>'',param=>[])
		$this->connect();

		$sql = 'DELETE FROM '.$table.' WHERE '.$where; //echo $sql;
		$stmt = $this->__conn->prepare($sql); //print_r($values);

		$stmt->bind_param($bind_param['bind'], ...$bind_param['param'] );

		$stmt->execute();

		$stmt->close();
	}


	function get_row($sql,$bind_param = array()){

		$data = array();

		$stmt = $this->__conn->prepare($sql);

		$stmt->bind_param($bind_param['bind'] , ...$bind_param['value'] );

		$stmt->execute();

		$result = $stmt->get_result(); //print_r($bind_param);

		if($result->num_rows === 1){
			$data = $result->fetch_assoc();	
		}

		$stmt->close();


		return $data;
	}

	function get_list($sql,$bind_param = array()){

		$data = array();

		$stmt = $this->__conn->prepare($sql);

		$stmt->bind_param($bind_param['bind'] , ...$bind_param['value'] );

		$stmt->execute();

		$result = $stmt->get_result(); //print_r($bind_param);

		if($result->num_rows > 0){
			$data = $result->fetch_all(MYSQLI_ASSOC);	
		}

		$stmt->close();


		return $data;
	}
}
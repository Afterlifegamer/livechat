<?php

Class Database{

private $con;
function __construct(){
  $this->con=$this->connect();

}
  private function connect(){
    $string = "mysql:host=localhost;dbname=whatsup_db";
  	try{
  		$connection=new PDO($string,DBUSER,DBPASS);
  		return $connection;

  	}
  	catch(PDOException $e){
  		echo $e->getMessage();
  		die;
  	}
    return false;

  }
  //write to database
  public function write($query,$data_array=[]){

    $con=$this->connect();
    $statement=$con->prepare($query);
    
    $check=$statement->execute($data_array);
    if($check){
      return true;
    }
    return false;
  }
  //read from database
  public function read($query,$data_array=[]){

    $con=$this->connect();
    $statement=$con->prepare($query);
    
    $check=$statement->execute($data_array);
    if($check){
      $result = $statement->fetchALL(PDO::FETCH_OBJ);
      if(is_array($result)&& count($result)>0){
        return $result;
      }
      return false;
    }
    return false;
  }
  public function generate_id($max){
    
    $rand = ""; 
    $rand_int=rand(4,$max);
    for ($i=0; $i<$rand_int ; $i++) { 
        $r=rand(0,9);
        $rand .= $r;
    }
    return $rand;

  }
} 
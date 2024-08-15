<?php
 session_start();

 $info=(object)[];
  
 if(!isset($_Session['user_id'])){
    $info->logged_in=false;
    echo json_encode($info);
    die;
 }
require_once("classes/autoload.php");
$db=new Database();
$DATA_RAW=file_get_contents("php://input");
$DATA_OBJ=json_decode($DATA_RAW);
$Error = "";
//process the data
 if(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=='signup'){
	include("includes/signup.php");
 }
 if(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=='user_info'){
 	echo "user_info";
 }
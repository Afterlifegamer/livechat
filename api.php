<?php

require_once("classes/autoload.php");
$db=new Database();
$data=file_get_contents("php://input");
$data=json_decode($data);

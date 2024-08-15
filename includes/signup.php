<?php 


$info =(object)[];

	$data=false;
	$data['userid']=$db->generate_id(20);
	$data['date']=date('Y-m-d H:i:s');
	//validate
	$data['username']=$DATA_OBJ->username;
	if(empty($DATA_OBJ->username)){
		$Error .= "Username cannot be empty <br>";
	}
	else{
		 if(strlen($DATA_OBJ->username)<3){
			$Error .= "Username cannot be less than 3 characters <br>";
		}
		 if(!preg_match("/^[a-z A-Z]*$/",$DATA_OBJ->username)){
			$Error .= "Enter valid username <br>";
		}
	}
	
	$data['email']=$DATA_OBJ->email;
	if(empty($DATA_OBJ->email)){
		$Error .= "Email cannot be empty <br>";
	}
	else{
		 
		 if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$DATA_OBJ->email)){
			$Error .= "Enter valid email <br>";
		}
	}
	$data['password']=$DATA_OBJ->password;	
	$password=$DATA_OBJ->password2;
	if(empty($DATA_OBJ->password)){
		$Error .= "Password cannot be empty <br>";
	}
	else{
		 if($DATA_OBJ->password!=$password)
		 {
		 	$Error .= "Passwords must match <br>";
		 }
		 if(strlen($DATA_OBJ->password)<8){
			$Error .= "Password cannot be less than 8 characters <br>";
		}
		 if(!preg_match("/^[a-z A-Z]*$/",$DATA_OBJ->password)){
			$Error .= "Enter valid username <br>";
		}
	}

    if($Error == ""){

 		$query = "insert into users (userid,username,email,password,date) values(:userid,:username,:email,:password,:date)";
 		$result = $db->write($query,$data);
     	if($result){
     		
     		$info->message="Your profile was created";
 			$info->data_type="info";
 			echo json_encode($info);
     	}
     	else{
     		
     		$info->message="Your profile was not created due to an error";
 			$info->data_type="error";
 			echo json_encode($info);	
     	}
 	}
 	else{
 		
 		$info->message=$Error;
 		$info->data_type="error";
 		echo json_encode($info);
 	}
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HI hello</title>
</head>
<style type="text/css">
	@font-face{
		font-family: headFont;
		src: url("ui/fonts/Summer-Vibes-OTF.otf");

	}
	@font-face{
		font-family: myFont;
		src: url("ui/fonts/OpenSans-Regular.ttf");
	}

	#wrapper{
		max-width: 1200px;
		min-height: 700px;
				margin: auto;
		color: grey;
		font-family: myFont;
		
		font-size: 20px;

	}
	form{
		margin:auto;
		padding: 10px;
		width: 100%;	
		max-width: 400px;
	}
	input[type=text],input[type=password],input[type=button]{
		padding:10px;
		width:98%;
		margin: 10px;
		border-radius: 5px;
		border: solid 1px grey;

	}
	input[type=button]{
		width:103%;
		cursor: pointer;
		background-color: #2b5488;
		color: white;
	}
	input[type=radio]{
		transform: scale(1.2);
	}
	#header{
		
		background-color: #485b6c;
		font-size: 40px;
		text-align: center;
		font-family: headFont;
		width: 100%;
		color: white;
	}
	#error{
		text-align: center;
		padding: 0.5em; 
		background-color: #ecaf91; 
		color: white; 
		display: none;
		font-size: 12px;

	}

</style>	
<body>
  <div id="wrapper">
  	<div id="header">Whatsup
  		<div style="font-size:30px">Signup</div>
  	</div>
    <div id="error" style=" "> some text</div>
  	<form id="myform">
  		<input type="text" name="username" placeholder="Username:"><br>
  		<input type="text" name="email" placeholder="Email"><br>
  		<div style="padding:10px">
  		<br>Gender:<br>
  		<input type="radio" value='Male' name="gender"> Male<br>
  		<input type="radio" value='Female' name="gender"> Female<br>
  		</div>
  		<input type="password" name="password" placeholder="Password:"><br>
  		<input type="password" name="password2" placeholder="Retype Password:"><br>
  		<input type="button" value="Sign Up" id='signup_button'><br>
  		<br><a href="login.php" style="display: block; text-align: center; font-size: 15px; text-decoration: none;"> Have an account?Login here</a>
  		
  	</form>
  </div>
</body>	
</html>
<script type="text/javascript">
	function _(element){
     return document.getElementById(element);
	}
	var signup_button=_("signup_button");
	signup_button.addEventListener("click",collect_data);
  function collect_data(){
  	signup_button.disabled=true;
  	signup_button.value="Loading...";
  	var myform=_("myform");
  	var input=myform.getElementsByTagName('INPUT');
  	var data={};
  	for (var i = input.length - 1; i >= 0; i--) {
  	  var key=input[i].name;
  	  switch(key)
  	  {
  	   case 'username':
  	   	data.username=input[i].value;
  	   	break;
  	   case 'password':
  	   	data.password=input[i].value;
  	   	break;
  	   case 'email':
  	   	data.email=input[i].value;
  	   	break;
  	   
  	   case 'gender':
  	   	 if(input[i].checked){
  	   	data.gender=input[i].value;
  	   	}
  	   	break;
  	   case 'password2':
  	   	data.password2=input[i].value;
  	   	break;
  	  }
  	}	
  	send_data(data,"signup");
  	
  }
  function send_data(data,type){
  	var xml=new XMLHttpRequest();
  	xml.onload=function(){
  		if(xml.readyState==4||xml.status==200){
  			handle_result(xml.responseText);
  			signup_button.disabled=false;
  			signup_button.value="Signup";
  		}
  	}
  		data.data_type=type;
  		var data_string=JSON.stringify(data);
  		xml.open("POST","api.php",true);
  		xml.send(data_string);
  	 }
  function handle_result(result){
  	var data=JSON.parse(result);
  	if(data.data_type == "signup"){
  		window.location="index.php";
  	}
  	else{
  		var error = _("error");
  		error.innerHTML =data.message;
  		error.style.display = "block";
  	}

  }

</script>
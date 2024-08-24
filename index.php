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
		display: flex;
		margin: auto;
		color: white;
		font-family: myFont;
		text-align: center;
		font-size: 25px;

	}
	#left_pannel{
		min-height: 400px;

		flex: 1;
		background-color: #27344b;	
		text-align: center;
		padding: 10px;
	}
	#profile_image{
		width: 60%;
		border-radius: 50%;
		border: solid thin white;
		margin: 10px;
	}
	#left_pannel label{
		width: 100%;
		height: 25px;
		display: block;
		font-size: 18px;
		background-color: #404b56;
		border: solid thin #ffffff55;
		cursor: pointer;
		transition: all 1s ease;
		padding: 5px;
	}
	#left_pannel label:hover{
		background-color: #778593;
	}
	#left_pannel label img{
		float: right;
		width:30px;
	}
	#right_pannel{
		min-height: 400px;
		
		flex: 3;
	}
	#header{
		height: 100px;
		background-color: #485b6c;
		font-size: 40px;
		text-align: center;
		font-family: headFont;

	}
	#inner_left_pannel{
		
		background-color: #383e48;
		flex: 1;
		min-height: 700px;
	}
	#inner_right_pannel{
		background-color: #f2f7f8;
		min-height: 700px;
		flex: 2;	
		transition: all 1s ease;
	}
	#radio_contacts:checked ~ #inner_right_pannel{
 			flex: 0;
	}
	#radio_settings:checked ~ #inner_right_pannel{
 			flex: 0;
	}
  #contact{
  	width: 200px;
  	height: 200px;
  	margin: 10px;
    display: inline-block;
    overflow: hidden;
    vertical-align: top;
  }
  #contact img{
       width: 130px;
       height:130px;
  }
</style>	
<body>
  <div id="wrapper">
  	<div id="left_pannel">
  		<div id="user_info" style="padding: 10px;">
  		<img id="profile_image"src="ui/images/user3.jpg">
  		<br>
  		<span id="Username">Username</span>
  		<br>
  		<span id="email">email@gamil.com</span>
  		<br>
  		<span style="font-size: 12px;opacity: 0.5;">kelly@yahoo.mail</span>
  		</div>
  		<br>
  		<br>
  		<br>
  		<div>
  			<label id="label_chat" for="radio_chat">Chat<img align="right"src="ui/icons/chat.png"></label>
  			<label for="radio_contacts" id="label_contact">Contact<img align="right"src="ui/icons/contacts.png"></label>
  			<label for="radio_settings" id="label_settings">Settings<img align="right"src="ui/icons/settings.png"></label>
  			<label id="logout" for="radio_logout">Logout<img align="right"src="ui/icons/logout_icon.png"></label>			
  		</div>
  		
  	</div>
  	<div id="right_pannel">
  		<div id="header">Whatsup</div>
  		<div id="container" style="display:flex;">
  			<div id="inner_left_pannel">
  				
  			</div>
  			<input type="radio" id="radio_chat" name="radiobutton"style="display: none;">
        <input type="radio" id="radio_contacts" name="radiobutton"style="display: none;">
        <input type="radio" id="radio_settings" name="radiobutton"style="display: none;">
  			<div id="inner_right_pannel">
  				
  			</div>
  		</div>
  	</div>
  </div>
</body>	
</html>
<script type="text/javascript">
	function _(element){
     return document.getElementById(element);
	}
	var contacts=_("label_contact");
	contacts.addEventListener("click",get_contacts);
	var chats=_("label_chat");
	chats.addEventListener("click",get_chats);
	var settings=_("label_settings");
	settings.addEventListener("click",get_settings);
	var logout=_("logout");
	logout.addEventListener("click",logout_user);

	function get_data(find,type){
		var xml= new XMLHttpRequest();
		xml.onload=function(){
          if(xml.readyState==4||xml.status==200){

          	handle_result(xml.responseText,type);
          }
		}
		var data={}
		data.find=find;
		data.data_type=type;
		data=JSON.stringify(data);
		xml.open("POST","api.php",true);
		xml.send(data);

	}
	function handle_result(result,type){
    
		if(result.trim()!=""){
			var obj=JSON.parse(result);
			if(typeof(obj.logged_in)!='undefined'&& !(obj.logged_in)){
				window.location="login.php";
			}
			else{
				switch(obj.data_type){
				  case "user_info":
					var username=_("Username");
					var email=_("email")
					username.innerHTML= obj.username;
					email.innerHTML=obj.email;
					break;
				case "contacts":
            var inner_left_pannel=_("inner_left_pannel");
            inner_left_pannel.innerHTML=obj.message;
					break;
					case "chats":
            var inner_left_pannel=_("inner_left_pannel");
            inner_left_pannel.innerHTML=obj.message;
					break;
					case "settings":
            var inner_left_pannel=_("inner_left_pannel");
            inner_left_pannel.innerHTML=obj.message;
					break;
				}
			}
		}

	}
	function logout_user(){
		var answer=confirm("Are you sure you want to logout");
		if(answer){
		get_data({},"logout");
		}
	}
get_data({},"user_info");

function get_contacts(e){
	get_data({},'contacts');
}
function get_chats(e){
	get_data({},'chats');
}
function get_settings(e){
	get_data({},'settings');
}


</script>
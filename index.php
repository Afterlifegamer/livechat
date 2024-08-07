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

</style>	
<body>
  <div id="wrapper">
  	<div id="left_pannel">
  		<div style="padding: 10px;">
  		<img id="profile_image"src="ui/images/user3.jpg">
  		<br>
  		Kelly White
  		<br>
  		<span style="font-size: 12px;opacity: 0.5;">kelly@yahoo.mail</span>
  		</div>
  		<br>
  		<br>
  		<br>
  		<div>
  			<label id="label_chat" for="radio_chat">Chat<img align="right"src="ui/icons/chat.png"></label>
  			<label for="radio_contacts">Contact<img align="right"src="ui/icons/contacts.png"></label>
  			<label for="radio_settings">Settings<img align="right"src="ui/icons/settings.png"></label>			
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
	var label=_("label_chat");
	label.addEventListener("click",function(){
    var innerpannel=_("inner_left_pannel");
	  var ajax=new XMLHttpRequest();
    ajax.onload=function(){
    	if(ajax.status==20||ajax.readyState==4)
    	{
    		innerpannel.innerHTML=ajax.responseText;
    	}
    }
    ajax.open("Post","file.txt",true);
    ajax.send();
	});



</script>
<?php

 $mydata='chats go here

 ';

 //$result =$result[0];
 $info->data_type="chats";
 $info->message=$mydata;
 echo json_encode($info);
 die;
 $info->message="No contacts were found";
 $info->data_type="error";
 echo json_encode($info);
  


 ?>

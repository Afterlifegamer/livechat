<?php


$sql="select * from users limit 2";

 $myusers = $db->read($sql,[]);
 $mydata=
 '<div style="text-align: center;">';
 if(is_array($myusers)){
 foreach ($myusers as $row) {
      
      $image= ($row->gender=="Male") ? "ui/images/user1.jpg": "ui/images/user2.jpg";
      if(file_exists($row->image)){
        $image=$row->image;
      }
      $mydata.= "<div id='contact' style='font-size:15px;'>
                <img src='$image'>
                <br>$row->username
               </div>";
 }
}           
    $mydata.= "</div>" ;

 //$result =$result[0];
 $info->data_type="contacts";
 $info->message=$mydata;
 echo json_encode($info);
 die;
 $info->message="No contacts were found";
 $info->data_type="error";
 echo json_encode($info);
  


 ?>

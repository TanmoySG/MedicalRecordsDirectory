<?php

/* 
 * Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
 */

include 'connection.php';
if(isset($_POST['email'],$_POST['password'])){
$sql = "INSERT INTO `user_reg_req`( `name`, `dob`, `gender`, `city`, `state`, `country`, `residence`, `uid_type`, `uid_no`, `phone`, `email`, `password`, `verification_status`) VALUES ('".$_POST['name']."', '".$_POST['dob']."', '".$_POST['gender']."', '".$_POST['city']."', '".$_POST['state']."','".$_POST['country']."', '".$_POST['residence']."', '".$_POST['uidtype']."', '".$_POST['uid_no']."', '".$_POST['phone']."', '".$_POST['email']."' ,'".$_POST['password']."', 'PENDING')" ;
$pdo->exec($sql);

echo 'Successfull';
echo '<a href="register.php">Back</a>';
} else{
    echo 'Incomplete Request';
}
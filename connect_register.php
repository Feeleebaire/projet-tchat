<?php
include 'config.php';
$user = $_POST['user'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$passhash = sha1($passwd);
$add="INSERT INTO users (`id`,`user`,`email`,`passwd`) VALUES (NULL,'$user','$email','$passhash')";
mysql_query($add) or die(mysql_errno());
if(true){
    session_start();
    $_SESSION['user']=$user;
    header('location: session.php');
}
else{
    print(mysql_errno());
}
?>

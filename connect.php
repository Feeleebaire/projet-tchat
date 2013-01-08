<?php
include 'config.php';
//$seconds = 5;

$password = mysql_real_escape_string($_POST['passwd']);

$user = mysql_real_escape_string($_POST['login']);


$conn = "SELECT * FROM users WHERE user='$user'";
$res = mysql_query($conn);
$r=  mysql_fetch_array($res);

if($r['passwd']==  sha1($password) && $r['user']==$user){
    session_start();
    $_SESSION['user']=$user;
    header('location: session.php');
}
 else {
     
     
     echo 'Erreur de login ou de mots de passe<br>';
     //sleep($seconds);
     header('location: index.php');
     
}

?>
<?php
include 'config.php';
//$seconds = 5;

$password = mysql_real_escape_string($_POST['passwd']);

$user = mysql_real_escape_string($_POST['login']);


$conn = "SELECT * FROM users WHERE user='$user' || email='$user'";
$res = mysql_query($conn);
$r=  mysql_fetch_array($res);

if($r['passwd']==  sha1($password) && $r['user']==$user || $r['passwd']== sha1($password) && $r['email']== $user){
    session_start();
    $_SESSION['user']=$r['user'];
    $_SESSION['pictures']=$r['pictures'];
    $_SESSION['id']=$r['id'];
    $_SESSION['limit']=$r['limit'];
    header('location: session.php');
}

 else {
     
     
     echo 'Erreur de login ou de mots de passe<br>';
     //sleep($seconds);
     header('location: index.php');
     
}

?>
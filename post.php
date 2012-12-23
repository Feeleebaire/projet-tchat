<?php
include('config.php');
if(isset($_POST['user']) && !empty($_POST['user'])){
    $user = mysql_real_escape_string(htmlentities($_POST['user']));
    
    $query = mysql_query("select user from users where user like '$user'") or die(mysql_error());
    while ($rows = mysql_fetch_assoc($query)){
        echo $rows['user'];
    }
}
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = mysql_real_escape_string(htmlentities($_POST['email']));
    
    $query = mysql_query("select email from users where email like'$email'") or die(mysql_error());
    while ($rows = mysql_fetch_assoc($query)){
        echo $rows['email'];
    }
}
?>

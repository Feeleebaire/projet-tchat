<?php 
session_start();
    if(isset($_SESSION['user'])){
        include 'config.php';
        
        $Sql = "Select user From connected Where user = '".$_SESSION['user']."'";
        $Res = mysql_query($Sql);
        $Verif = mysql_fetch_array($Res);
        
        
        if($Verif[0] == $_SESSION['user']){
            echo 'Salut';
            $Sqlup = "UPDATE connected SET date='".time()."',room='beta_test_fr',pictures='".$_SESSION['pictures']."' WHERE user='".$_SESSION['user']."'";
            mysql_query($Sqlup) or die(mysql_errno());
            
            header('location: tchat.php');
            
        }
        else {
            $Sqlad = "INSERT INTO connected(user,ip,date,room,pictures) VALUE ('".$_SESSION['user']."',':::128',".time().",'beta_test_fr','".$_SESSION['pictures']."')";
            mysql_query($Sqlad) or die(mysql_errno());
            header('location: tchat.php');
        }
    }
    else{
        header('location: index.php');
    }
?>
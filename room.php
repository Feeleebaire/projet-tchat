<?php 
    if(isset($_SESSION['user'])){
        include 'config.php';
        
        
        
        
    }
    else{
        header('location: index.php');
    }
?>
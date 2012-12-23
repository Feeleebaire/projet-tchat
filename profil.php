    <?php
    session_start();
    if(isset($_SESSION['user'])){
        include 'config.php';
        $user = $_SESSION['user'];
        $sql = "SELECT user, email FROM users WHERE user ='$user'" ;
        
        ?>

<html>
    <head>
        <title>Votres profil <?php print $_SESSION['user'];?></title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        Pseudo actuelle: <?php echo $user?><br />
        entr&eacute;e un nouveau pseudo: <br />
        <input type="text" />

      <?php }
    else{
     header('location: index.php');
    }
    
    ?>
    </body>
</html>
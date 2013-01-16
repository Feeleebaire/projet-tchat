    <?php
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_POST['user'];
        $email = $_POST['email'];
        $picture = $_POST['img'];
        $passwd = $_POST['passwd'];

        
        $_SESSION['user'] = $user;
        $_SESSION[''];
    ?>
<html>
    <head>
        <title>bienvenue <?php print $_SESSION['user'];?></title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
         <link href="css/images/favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>

 
        <div id="menu">
        <div id="menu1">
        <img src="<?php print$_SESSION['pictures'];?>" /> <br />
        <?php print $_SESSION['user'];?>
        </div>
        <div id="menu2">
        <a href="profil.php"> Votres profil </a>
        </div>
        <div id="menu3">
        <a href="exit.php">deconnexion</a>
        </div>
        </div>


    <?php }
    else{
        header('location: index.php');
    }
    ?>
    </body>
</html>
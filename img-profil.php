    <?php
    session_start();
    if(isset($_SESSION['user'])){
        
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
        <a href="profil.php"> Votre profil </a>
        </div>
        <div id="menu3">
        <a href="exit.php">d&eacute;connexion</a>
        </div>
        </div>
<form method="POST" action="upload.php" enctype="multipart/form-data">
            taille maximum de l'image 1MB: <br />
            r&eacute;solution de l'image 60x60 px:<br />
            <input type="file" name="image"/>
            <input type="submit" name="envoyer" value="Envoyer le fichier">
        </form>
        <a href="javascript:window.history.go(-1)">Retour</a>

    <?php }
    else{
        header('location: index.php');
    }
    ?>
    </body>
</html>
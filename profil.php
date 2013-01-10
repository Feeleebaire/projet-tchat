<?php
    session_start();
    if(isset($_SESSION['user'])){
        include 'config.php';
        $user = $_SESSION['user'];
        $sql = "SELECT user, email FROM users WHERE user ='$user'" ;
        //repertoire ou l'image serra enregistrer
        $dossier = "images/";
        $dossier_user = "images/".$user;
        //ici je fais comprandre que c'est un repertoire pour la boucle while
        $d = dir($dossier);
        $du = dir($dossier_user);
        //je regarde dans le dossier images
        while($entry = $d->read()) {
            //si il existe un dossier ayant le meme nom que le pseudo
            if($entry == $user){
                //je retourne la valeur yes pour dire que le dossier existe
                $exist_dossier = "yes";
            }
            else{
                $exist_dossier = "no";
            }
        }
        //je referme le dossier
        $d->close();
?>

<html>
    <head>
        <title>Votres profil <?php print $user;?></title>
        <link rel="stylesheet" media="screen" href="css/style.css" type="text/css" />
        <script src="js/" type="text/javascript"></script>
    </head>
    <body>
        <form method="POST" action="profil-update.php" name="form" id="form" onsubmit="return testForm(form)">
        Pseudo actuelle: <?php echo $user?><br />
        entrer un nouveau pseudo: <br />
        <input type="text" name="user" id="user" /><label id="imgu"></label><label id="info"></label>
        <div id="resultat"></div>
        votre e-mail actuelle: <?php ?><br />
        entrer un nouvelle e-mail:<br />
        <input type="text" value="" name="email" id="email" /><label id="imge"></label><label id="info2"></label>
        <div id="resultatemail"></div>
        Vos images:<br />
        <div id="image">

            <?php
            if($exist_dossier == "yes"){
                while ($entry = $du->read()){ 
                    if( $entry != '.' && $entry != '..' && preg_match('#\.(jpe?g|gif|png|bmp)$#i', $entry)) {
                        
                        echo "<img id=\"img\" src=".$du->path.'/'.$entry." />";
                        echo "<input id=\"radio\" type=\"radio\" name=\"img\" value=".$entry." />";
                        
                    }
                }
                    
            }
            
            else{
                echo "Vous n'avez pas encore d'images <br />\n";
            }
            $du->close();
        
            ?>

        </div>
        mot de passe:<br />
        <input type="password" value="" name="passwd" id="passwd" /><label id="imgp"></label><label id="mdpinfo"></label><br />
        confimer le mots de passe:<br />
        <input type="password" value="" name="confpasswd" id="confpasswd"/><label id="imgcp"></label><label id="mdperror"></label><br />
        <input type="submit" value="modiffier" />
        </form>
        <script type="text/javascript" src="js/JQuery.js"></script>
        <script type="text/javascript" src="js/live_profil.js"></script>
      <?php }
    else{
     header('location: index.php');
    }
    
    ?>
    </body>
</html>
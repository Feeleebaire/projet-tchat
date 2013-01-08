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
        <link rel="stylesheet" media="screen" href="css/style.css" type="text/css" />
        
    </head>
    <body>
        Pseudo actuelle: <?php echo $user?><br />
        entrer un nouveau pseudo: <br />
        <input type="text" name="user" id="user" /><label id="imgu"></label><label id="info"></label>
        <div id="resultat"></div>
        votre e-mail actuelle: <?php ?><br />
        entrer un nouvelle e-mail:<br />
        <input type="text" value="" name="email" id="email" /><label id="imge"></label><label id="info2"></label>
        <div id="resultatemail"></div>
        
        <div id="image">
            
        </div>
        mot de passe:<br />
        <input type="password" value="" name="passwd" id="passwd" /><label id="imgp"></label><label id="mdpinfo"></label><br />
        confimer le mots de passe:<br />
        <input type="password" value="" name="confpasswd" id="confpasswd"/><label id="imgcp"></label><label id="mdperror"></label><br />

      <?php }
    else{
     header('location: index.php');
    }
    
    ?>
    </body>
</html>
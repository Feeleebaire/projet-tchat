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
        <img src="<?php print $_SESSION['pictures'];?>" /> <br />
        <?php print $_SESSION['user'];?>
        </div>
        <div id="menu2">
        <a href="profil.php"> Votres profil </a>
        </div>
        <div id="menu3">
        <a href="exit.php">deconnexion</a>
        </div>
        </div>
        <div>
            <form method="POST" action="room.php">
                <input type="hidden" value="test_beta_fr" />
            <input type="submit" value="tchater" />
                
            </form>
            <?php /*
                foreach(){
                    print ('<form name="tchat" method="post" action="tchat">');
                    print ('<p><input type="submit" value="tchat" name="salon" />');
                    print ('<input type="hidden" value="" name="salon" />');
                    print ('<input type="hidden" value="" name="salon_id" />');
                    print ('</form>');
                }
                */
            ?>
        </div>
    <?php }
    else{
        header('location: index.php');
    }
    ?>
    </body>
</html>
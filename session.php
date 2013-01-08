    <?php
    session_start();
    if(isset($_SESSION['user'])){
    ?>
<html>
    <head>
        <title>bienvenue <?php print $_SESSION['user'];?></title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>

    <?php
        print $_SESSION['user'];
        print '<a href="exit.php">deconnexion</a>';
    ?>

    <?php }
    else{

    }
    ?>
    </body>
</html>
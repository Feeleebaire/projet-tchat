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
        print '<div id="suser">';
        print '<img src="'.$_SESSION['pictures'].'" />';
        print $_SESSION['user'];
        print '</div>';
        print '<div id="exit">';
        print '<a href="exit.php">deconnexion</a>';
        print '</div>';
    ?>

    <?php }
    else{
        header('location: index.php');
    }
    ?>
    </body>
</html>
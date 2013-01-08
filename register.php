<html>
    <head>
        <title>S'enregistrer</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script src="js/register.js" type="text/javascript"></script>
    </head>
    <body>
        <form method="POST" action="connect_register.php" name="form" id="form" onsubmit="return testForm(form)">
            Pseudo<br />
            <input type="text" value="" name="user" id="user" /><label id="imgu"></label><label id="info"></label>
            <div id="resultat"></div>
            e-mail:<br />
            <input type="text" value="" name="email" id="email" /><label id="imge"></label><label id="info2"></label>
            <div id="resultatemail"></div>
            mot de passe:<br />
            <input type="password" value="" name="passwd" id="passwd" /><label id="imgp"></label><label id="mdpinfo"></label><br />
            confimer le mots de passe:<br />
            <input type="password" value="" name="confpasswd" id="confpasswd"/><label id="imgcp"></label><label id="mdperror"></label><br />
            <input type="submit" value="Enregistrer" id="submit" disabled="true" />
        </form>
        <script type="text/javascript" src="js/JQuery.js"></script>
        <script type="text/javascript" src="js/live_register.js"></script>
    </body>
</html>
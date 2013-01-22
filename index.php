<html>
    <head>
        <title>Page de connexion</title>
        <link rel="stylesheet" media="screen" href="css/style.css" type="text/css" />
         <link href="css/images/favicon.ico" rel="icon" type="image/x-icon" />
    <body>
        <form name="form" method="POST" action="connect.php">
        <h1>Connexion</h1>
        Nom d&apos;utilisateur ou adresse email : <br />
        <input type="text" value="" id="user" name="login"/><br />
        Mots de passe : <br />
        <input type="password" value="" id="passwd" name="passwd" /><br />
        <input type="submit" value="connection" />
        </form>
        pas encore inscrit? : <a href="register.php"> s&apos;enregistrer</a>
    </body>
</html>
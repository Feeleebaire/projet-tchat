<?php
include 'config.php';
$user = $_POST['user'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$passhash = sha1($passwd);
$add="INSERT INTO users (`id`,`user`,`email`,`passwd`) VALUES (NULL,'$user','$email','$passhash')";
$dimage = "css/images/user_picture/";
$duser = "images/".$user;
$dossier = "images/";
//je crée un fonction pour la copie du dossier images
function copyfolder($source, $destination)
{

       //Open the specified directory

       $directory = opendir($source);

       //Create the copy folder location

       mkdir($destination);

       //Scan through the folder one file at a time

       while(($file = readdir($directory)) != false)
       {

              //Copy each individual file

              copy($source.'/' .$file, $destination.'/'.$file);

       }

}

copyfolder($dimage, $duser, $mode=0755);
//je crée un fichier html vide pour éviter que les perosnnes voye se qu'il y a dans le dossier
$txt="<html>
    <head></hea>
    <body></body>
    </html>";
//j'ouvre le fichier
$f = fopen($dossier.$user."/"."index.html",'w');
//j'ecris dans le fichier
fwrite($f, $txt);
//et je le referme
fclose($f);

mysql_query($add) or die(mysql_errno());
if(true){
    session_start();
    $_SESSION['user']=$user;
    header('location: session.php');
}
else{
    print(mysql_errno());
}
?>

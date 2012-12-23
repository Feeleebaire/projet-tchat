<?php
//repertoire ou l'image serra enregistrer
$dossier = "images/";
//ici je fais comprandre que c'est un directory pour la boucle while
$d = dir($dossier);
//nom de l'image
$fichier = basename($_FILES['image']['name']);
$pseudo = $_POST['pseudo'];

//je fixe une taille limite pour les images
$taille_maxi = 2097152;

//je fixe une résoution limite pour l'images
$max_widht = 100;
$max_height = 100;

//je regarde la taille de l'image
$taille = filesize($_FILES['image']['tmp_name']);
$info_img = getimagesize($_FILES['image']['tmp_name']);

//je verrifier l'extention de chaque images
$extensions = array('.png', '.gif','.jpg', '.jpeg','.JPG','.JPEG','.GIF','.PNG') ;
$extension = strrchr($_FILES['image']['name'],'.');

//Verification de securité
if(!in_array($extension, $extensions))
{
    $erreur = 'vous devez envoyer un fichier de type png, gif, jpg ou jpeg';
}

//Verifie si la taille de l'image dépasse celle de la taille maxi
if($taille>$taille_maxi)
{
    $erreur = 'Le fichier est trop gros.';
}

//verifie si la résolution de l'image.
if(($info_img[0] > $max_widht) && ($info_img[1] > $max_height)){
    $erreur = 'l\'image est trop grande';
}

//je regarde dans le dossier images
while($entry = $d->read()) {
    //si il existe un dossier ayant le meme nom que le pseudo
    if($entry == $pseudo){
        //je retourne la valeur yes pour dire que le dossier existe
        $exist_dossier = "yes";
    }
}
//je referme le dossier
$d->close();

//Si il n'y a pas d'erreur, on envoys l'image sur le serveur
if(!isset($erreur))
{

        //je change le nom du fichier ici pour enlever tout les accents
        function wd_remove_accents($str, $charset='utf-8'){
            $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
            $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
            $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
            $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
            return $str;
         }
        //j'enléve les accent
        $fichiers = wd_remove_accents($fichier);
        //---------------------------------------------------------------------
        //si le dossier existe
        if($exist_dossier == "yes"){
    
        //je deplace le fichier dans le dossier
	if(move_uploaded_file($_FILES['image']['tmp_name'],$dossier.$pseudo."/" . $fichiers))
	{
		echo 'Envoye effectu&eacute; avec succ&egrave;s !';
	}
        //sinon (la fonction renvois une erreur)
	else
	{
		echo 'Echec de l\'envoye de l\'image.';
	}
}
//si le dossier n'existe pas
else{
    //je crée le dossier avec le nom de la personne et j'ajoute des drois dessus
    mkdir($dossier.$pseudo."/", $mode=0755);
    //je crée un fichier html vide pour éviter que les perosnnes voye se qu'il y a dans le dossier
    $txt="<html>
        <head></hea>
        <body></body>
        </html>";
    //j'ouvre le fichier
    $f = fopen($dossier.$pseudo."/"."index.html",'w');
    //j'ecris dans le fichier
    fwrite($f, $txt);
    //et je le referme
    fclose($f);
    //je déplace l'images dans le dossier qui vient d'êtres fraichement crée
    if(move_uploaded_file($_FILES['image']['tmp_name'],$dossier.$pseudo."/". $fichiers))
	{
		echo 'Envoye effectu&eacute; avec succ&egrave;s !';
	}
        //sinon (la fonction renvois une erreur)
	else
	{
		echo 'Echec de l\'envoye de l\'image.';
	}
}
}
//j'affiche les différente erreurs
else{
    echo $erreur;
}
?>
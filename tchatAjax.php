<?php
    session_start();
    if(isset($_SESSION['user'])){
        include 'config.php';
    
    extract($_POST);
    $pseudo = $_SESSION['user'];
    $userid = $_SESSION['id'];
    //récupere le lieux du tchat
	$sql_tr = "SELECT room FROM connected WHERE user='$pseudo'";
	$req_tr = mysql_query($sql_tr) or die(mysql_error());
    	$tregion = mysql_fetch_array($req_tr);

    /**
     *Action : addMessage
     * Permet d'ajouté un message 
     */
    if($_POST["action"]=="addMessage"){
        $message  = mysql_real_escape_string($message);
        $message = str_replace("\n","<br />",$message);
       $sql_add = "INSERT INTO ".$tregion['room']." (user,message,date) VALUES  ('$pseudo','$message','".time()."')";
        mysql_query($sql_add) or die(mysql_error());

        $sql_up = "UPDATE connected SET date=".time()." WHERE user='$pseudo'";
        mysql_query($sql_up) or die(mysql_error());
        
        $d["erreur"] = "ok";
    }
    
//------------------------------------------------------------------------------
    
    
    /**
     *Action : getMessages
     * Permet d'afficher les dernier messages
     */
    
    if($_POST["action"]=="getMessages"){
       $lastid = floor($lastid);
        $sql = "SELECT * FROM ".$tregion['room']." WHERE id>$lastid ORDER BY date ASC";
        $req = mysql_query($sql) or die(mysql_error());
        $d["result"]="";
        $d["lastid"] = $lastid;
        while($data = mysql_fetch_assoc($req)){
            $text = $data["message"];
                        $conv = array(
                        '\[b\](.*?)\[\/b\]' => '<strong>$1</strong>',
                        '\[i\](.*?)\[\/i\]' => '<em>$1</em>',
                        '\[u\](.*?)\[\/u\]' => '<u>$1</u>',
                        '\[img\](.*?)\[\/img\]' => '<a href="$1" target="_blank"><img src="$1" /></a>',
                        '\[url=([^\]]*)\](.*)\[\/url\]' => '<a href="$1" target="_blank">$2</a>' 
                         
                     );
                    foreach($conv as $k=>$v){
                    $text=preg_replace('/'.$k.'/',$v,$text);
                     }
          $d["result"] .= '<p><strong>'.$data["user"].'</strong>('.date("d/m/y H:i:s",$data["date"]).') : '.$text.'</p>';
          $d["lastid"] = $data["id"];
        }
        $d["erreur"] = "ok";
        
    }
    
//------------------------------------------------------------------------------
    
    /**
     * Action : getConnecte
     * Permet l'affichage des derniers connectés
     */
    
    //temps en seconde avant déconnection
    $deco = 180;
    
    if($_POST["action"]=="getConnected"){
        $now = time();
        $sql="SELECT user, pictures FROM connected WHERE $now-date<=$deco";
        $req = mysql_query($sql) or die (mysql_error());
         $d["result"]="<strong>Connectés : \n</strong> ";
        while($data = mysql_fetch_assoc($req)){
             $d["result"] .="<hr><img src=\"".$data["pictures"]."\" /><br />".$data["user"]."\n";
        }
        $d["result"] = substr($d["result"],0,-1);
        
        $sql = "UPDATE connected SET date=$now WHERE id=$userid";
        $req = mysql_query($sql) or die (mysql_error());
        
        $d["erreur"] = "ok";

    }
    
//------------------------------------------------------------------------------

echo json_encode($d);
}
    else{
        header('location: index.php');
    }
?>
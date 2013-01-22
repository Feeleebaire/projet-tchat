 <?php
    session_start();
    if(isset($_SESSION['user'])){
        include 'config.php';
        $table = "beta_test_fr";
        $pseudo = $_SESSION['user'];
        $image = $_SESSION['pictures'];
        $Limit = $_SESSION['limit'];
        /*$table = $_POST['room'];*/
    ?>
<!DOCTYPE html PUBIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="tchat-css/style.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="tchat-JS/JQuery.js"></script>
        <script type="text/javascript" src="tchat-JS/tchat.js"></script>
        <script type="text/javascript" src="tchat-JS/markitup/jquery.markitup.js"></script>
        <script type="text/javascript" src="tchat-JS/markitup/sets/bbcode/set.js"></script>
        <link rel="stylesheet" type="text/css" href="tchat-JS/markitup/skins/simple/style.css" />
        <link rel="stylesheet" type="text/css" href="tchat-JS/markitup/sets/bbcode/style.css" />
         <link href="css/images/favicon.ico" rel="icon" type="image/x-icon" />
<script type="text/javascript">
    $(function(){
	// Add markItUp! to your textarea in one line
	// $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
	$('textarea').markItUp(mySettings);
});
</script>
<script type="text/javascript">
            <?php 
                $sql= 'SELECT id FROM '.$table.' ORDER BY id DESC LIMIT 1';
                $req = mysql_query($sql) or die(mysql_error());
                $data=mysql_fetch_assoc($req);
            ?>
                var lastid = <?php echo $data["id"]; ?>
        </script>
        
    </head>
    <body>
        <div id="conteneur">
            
            <h1>Connecté en tant que <img src="<?php print $image?>" /> <?php echo $pseudo;?> sur <?php /*print_r ($ur[0]['title']);*/ echo $table ?></h1>
             <div id="connected" unselectable="on"></div>
            
            <div id="tchat" onload = "ScrollWin;">
                
                <?php
                    $sql= 'SELECT * FROM '.$table.' ORDER BY date DESC  LIMIT '.$Limit;
                    $req = mysql_query($sql) or die(mysql_error());
                    $d = array();
                   
                    while($data = mysql_fetch_assoc($req)){
                        $d[]=$data;
                    }
                    for($i=count($d)-1;$i>=0;$i--){

                        //------------------------------------------------------
                        //conversion du code bb en html
                     $text = $d[$i]["message"];
                     $conv = array(
                        '\[b\](.*?)\[\/b\]' => '<strong>$1</strong>',
                        '\[i\](.*?)\[\/i\]' => '<em>$1</em>',
                        '\[u\](.*?)\[\/u\]' => '<u>$1</u>',
                        '\[img\](.*?)\[\/img\]' => '<a href="$1" target="_blank"><img id="img" src="$1" /></a>',
                        '\[url=([^\]]*)\](.*)\[\/url\]' => '<a href="$1" target="_blank">$2</a>' 
                         
                     );
                     foreach($conv as $k=>$v){
                         $text=preg_replace('/'.$k.'/',$v,$text);
                     }

                     //---------------------------------------------------------
                ?>
                 
                    <p><strong><?php echo $d[$i]["user"]; ?></strong> (<?php echo date("d/m/y H:i:s",$d[$i]["date"]); ?>) : <?php echo $text; ?></p>
                
                    <?php
                    }
                ?>
               
            
        </div>
    </div>
        
        <div id="tchatForm" style="position: fixed; margin-top:55px;">
            <form  method="post" action="#">
                <div>
                    <textarea onkeydown="keyPressed(this);" onfocus="clear_textarea(this);" maxlength="255">255 caractères maximum</textarea>
                </div>
                <div id="submit">
                    <input type="submit" value="Envoyer"/>
                </div>
				
				
            </form>
        </div>
            <?php }
    else{
        header('location: index.php');
    }
    ?>
    </body>
</html>
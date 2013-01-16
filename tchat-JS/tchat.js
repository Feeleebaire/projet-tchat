var url="tchatAjax.php";
var lastid=0;
var timer =  setInterval(getMessages, 1000);
var ctimer = setInterval(getConnected,2000);
var flagScroll = true;
var oldTop = 0;
//------------------------------------------------------------------------------

//Fonction pour l'envois des messages

$(function(){
    // affiche les personnes qui sont connecter
    
    getConnected();
    
    // fonction envoyer
    
    $('#tchatForm form').submit(function(){
       clearInterval(timer)
       var message = $("#tchatForm form textarea").val();
       $.post(url,{action:"addMessage",message:message},function(data){
           if(data.erreur=="ok"){
               getMessages();
               $("#tchatForm form textarea").val("");
           }
           else{
               alert(data.erreur); 
           }
           timer =  setInterval(getMessages,1000);
       },"json");
        return false;
    })
});

function clear_textarea(e){
    if (e.value=="255 caractères maximum"){
        e.value='';
    }
}

//------------------------------------------------------------------------------

//Fonction pour recevoir les messages

function getMessages(){
    var divsc = document.getElementById('tchat');
    var scrollOk = true;
   
    if(flagScroll) {
        divsc.scrollTop = divsc.scrollHeight;
        flagScroll = false;
        oldTop = divsc.scrollTop;
    }
   
   $.post(url,{action:"getMessages",lastid:lastid},function(data){
           if(data.erreur=="ok"){
               if(divsc.scrollTop>=oldTop)
                    scrollOk=true;
               else
                    scrollOk=false;

               if(lastid<data.lastid) {
                   $("#tchat").append(data.result);
                   lastid=data.lastid;
                          
                   if(scrollOk) {
                        divsc.scrollTop = divsc.scrollHeight;
                        oldTop = divsc.scrollTop;
                   }
               }
           }
           else{
               alert(data.erreur);
           }
       },"json");
        return false;  
}

//------------------------------------------------------------------------------


//fonction pour voir les personnes connectées

function getConnected(){
   $.post(url,{action:"getConnected"},function(data){
           if(data.erreur=="ok"){
               $("#connected").empty().append(data.result);
           }
           else{
               alert(data.erreur);
           }
       },"json");
        return false;
   
}
//------------------------------------------------------------------------------


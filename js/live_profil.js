$(document).ready(function(){
    //------------------------------------------------------------------------------
//verification de pseudo en temps réele
    $('#user').keyup(function(){
        
        var user = $(this).val();
        var csi = document.getElementById('imgu');
        var csr = document.getElementById('user');
        //var csi = $('imgu').val();
        
        user = $.trim(user);
        
                if(user !==""){
                
                //$('#load').show();
                 
                $.post('post.php',{user:user},function(data){
    
                
                $('#resultat').text(data);
                
                //console.log(user);
                //console.log($('#resultat').text());
                

                if (user == $('#resultat').text()){
                    //var element_style = document.getElementById("user");
                        // element_style.style;
                      //alert ('salut');  
                      //$('#load').hide();
                      $('#info').text('pseudo d\351j\340 utiliser');
                      //var csr = document.getElementById('user');
                      csr.style.borderColor = 'red';
                      csr.style.backgroundColor = 'lightpink';
                      //var csi = document.getElementById('imgu');
                      csi.style.backgroundImage = "url('css/images/croix.png')";
                      csi.style.backgroundRepeat = "no-repeat";
                      
                    
                }
        
                else if(user !== $('#resultat').text()){
                   // alert ('non');
                   //$('#load').hide();
                   //var element_style = $document.getElementById("user");
                   //element_style.className = "user";
                   //element_style.backgroundColor = "green";
                   $('#info').text('ok');
                   //var csg = document.getElementById('user');
                   csr.style.borderColor = 'green';
                   csr.style.backgroundColor = 'yellowgreen';
                   //var csi = document.getElementById('imgu');
                   csi.style.backgroundImage = "url('css/images/vu.png')";
                   csi.style.backgroundRepeat = "no-repeat";
                    return true;
                }

                
                
            });
        }
       else if(user == ""){
            $('#info').text('entrer un pseudo.')
            //var csb = document.getElementById('user');
            csr.style.borderColor = 'red';
            csr.style.backgroundColor = 'white';
            //var csi = document.getElementById('imgu');
            csi.style.backgroundImage = "url('css/images/croix.png')";
            csi.style.backgroundRepeat = "no-repeat";
                    
       }
        
    })
    //------------------------------------------------------------------------------
//Section pour la verification de l\'email
    $('#email').keyup(function(){
        var email =$(this).val();
        var csr = document.getElementById('email');
        var csi = document.getElementById('imge');
        
        email = $.trim(email);
        
            if(email !== ""){
                
                $.post('post.php',{email:email},function(data){
    
                
                $('#resultatemail').text(data);
                
                //console.log(email);
                //console.log($('#resultatemail').text());
                
                if (email == $('#resultatemail').text()){
                    //var element_style = document.getElementById("user");
                        // element_style.style;
                      //alert ('salut');  
                      //$('#load').hide();
                      $('#info2').text('email d\351j\340 enregistrer');
                      //var csr = document.getElementById('email');
                      csr.style.borderColor = 'red';
                      csr.style.backgroundColor = 'lightpink';
                      //var csi = document.getElementById('imge');
                      csi.style.backgroundImage = "url('css/images/croix.png')";
                      csi.style.backgroundRepeat = "no-repeat";
                      
                    
                }
        
                else if(email !== $('#resultatemail').text()){
                   // alert ('non');
                   //$('#load').hide();
                   //var element_style = $document.getElementById("user");
                   //element_style.className = "user";
                   //element_style.backgroundColor = "green";
                   $('#info2').text('ok');
                   //var csg = document.getElementById('email');
                   csr.style.borderColor = 'green';
                   csr.style.backgroundColor = 'yellowgreen';
                   //var csi = document.getElementById('imge');
                   csi.style.backgroundImage = "url('css/images/vu.png')";
                   csi.style.backgroundRepeat = "no-repeat";
                 
                    
                }

                
                
            });
            }
                 else if(email == ""){
            $('#info2').text('entrer votre e-mail.')
            //var csb = document.getElementById('email');
            csr.style.borderColor = 'red';
            csr.style.backgroundColor = 'white';
            //var csi = document.getElementById('imge');
            csi.style.backgroundImage = "url('css/images/croix.png')";
            csi.style.backgroundRepeat = "no-repeat";
                    
       }
        
    })
    //------------------------------------------------------------------------------
//verification du mots de passe en temps réele
    $('#confpasswd').keyup(function checkMdp(){
        
        //var mdp = $('passwd').val();
        //var mdp2 = $('confpasswd').val();
        //var cscp = $('confpasswd');
        //var csp = $('passwd');
        //var csip = $('imgp');
        //var csicp = $('imgcp');
        var mdp = document.getElementById('passwd').value;
        var mdp2 = document.getElementById('confpasswd').value;
        var cscp = document.getElementById('confpasswd');
        var csp =  document.getElementById('passwd');
        var csip = document.getElementById('imgp');
        var csicp = document.getElementById('imgcp');
        
        if(mdp !== "" ){
            //document.getElementById('confpasswd').disabled = "eneable";
            
            if(mdp !== mdp2){

                csip.style.backgroundImage = "url('css/images/croix.png')";
                csicp.style.backgroundImage = "url('css/images/croix.png')";
                csp.style.backgroundColor = "white";
                csp.style.borderColor = "red";
                cscp.style.borderColor = "red";
                cscp.style.backgroundColor = "lightpink";
                $('#mdperror').text("les mots de passe ne correspondent pas.");
                $('#mdpinfo').text("");
            }
            
            else if(mdp == mdp2){
                /*var cspk = document.getElementById('confpasswd');
                var cspk2 =  document.getElementById('passwd');
                var csipo = document.getElementById('imgp');
                var csicpo = document.getElementById('imgcp');*/
                csicp.style.backgroundImage = "url('css/images/vu.png')";
                csip.style.backgroundImage = "url('css/images/vu.png')";
                cscp.style.borderColor = "green";
                cscp.style.backgroundColor = "yellowgreen";
                csp.style.borderColor = "green";
                csp.style.backgroundColor = "yellowgreen";
                $('#mdperror').text("ok");
                $('#mdpinfo').text("ok");
                
            }
            
           else if (mdp2 == ""){
                //var cspcb = document.getElementById('confpasswd');
                //var cscpi = document.getElementById('imgcp');
                csicp.style.backgroundImage("");
                cscp.style.borderColor = "black";
                cscp.style.backgroundColor = "white";
                $('#mdperror').text("");
            }

 
        }
    
        
    })
    $('#passwd').keyup(function checkMdp(){
        
        //var mdp = $('passwd').val();
        //var mdp2 = $('confpasswd').val();
        //var cscp = $('confpasswd');
        //var csp = $('passwd');
        //var csip = $('imgp');
        //var csicp = $('imgcp');
        var mdp = document.getElementById('passwd').value;
        var mdp2 = document.getElementById('confpasswd').value;
        var cscp = document.getElementById('confpasswd');
        var csp =  document.getElementById('passwd');
        var csip = document.getElementById('imgp');
        var csicp = document.getElementById('imgcp');
        
        if(mdp2 !== "" ){
            //document.getElementById('confpasswd').disabled = "eneable";
            
            if(mdp2 !== mdp){

                csip.style.backgroundImage = "url('css/images/croix.png')";
                csicp.style.backgroundImage = "url('css/images/croix.png')";
                csp.style.backgroundColor = "white";
                csp.style.borderColor = "red";
                cscp.style.borderColor = "red";
                cscp.style.backgroundColor = "lightpink";
                $('#mdperror').text("les mots de passe ne correspondent pas.");
                $('#mdpinfo').text("");
            }
            
            else if(mdp2 == mdp){
                /*var cspk = document.getElementById('confpasswd');
                var cspk2 =  document.getElementById('passwd');
                var csipo = document.getElementById('imgp');
                var csicpo = document.getElementById('imgcp');*/
                csicp.style.backgroundImage = "url('css/images/vu.png')";
                csip.style.backgroundImage = "url('css/images/vu.png')";
                cscp.style.borderColor = "green";
                cscp.style.backgroundColor = "yellowgreen";
                csp.style.borderColor = "green";
                csp.style.backgroundColor = "yellowgreen";
                $('#mdperror').text("ok");
                $('#mdpinfo').text("ok");
                
            }
            
           else if (mdp == ""){
                //var cspcb = document.getElementById('confpasswd');
                //var cscpi = document.getElementById('imgcp');
                csicp.style.backgroundImage("");
                cscp.style.borderColor = "black";
                cscp.style.backgroundColor = "white";
                $('#mdperror').text("");
            }

 
        }
    
        
    })
})
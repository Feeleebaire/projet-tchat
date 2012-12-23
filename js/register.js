function testForm(form){
    user = form.user.value;
    passwd = form.passwd.value;
    email = form.email.value;
    resuluser = document.getElementById('resultat').textContent;
    resulemail = document.getElementById('resultatemail').textContent;
    
    
    if(!user){
        alert ("Veuillez remplire le champs nom.");
        var csu = document.getElementById('user');
        csu.style.borderColor = 'red';
        csu.style.backgroundColor = 'lightpink';
        var csui = document.getElementById('imge');
        csui.style.backgroundImage = "url('css/images/croix.png')";
        return false;
    }
    else if(!passwd){
        alert ("Veuillez remplire le champs mot de passe.");
        var csp = document.getElementById('passwd');
        csp.style.borderColor = 'red';
        csp.style.backgroundColor = 'lightpink';
        var cspi = document.getElementById('imge');
        cspi.style.backgroundImage = "url('css/images/croix.png')";
        return false;
    }
    else if(!isEmail(email) && email){
        alert ("adresse email incorrecte");

        
        return false;
    }
    else if(user == resuluser){
        var cse = document.getElementById('email');
        cse.style.borderColor = 'red';
        cse.style.backgroundColor = 'lightpink';
        var csei = document.getElementById('imge');
        csei.style.backgroundImage = "url('css/images/croix.png')";
        alert("ce pseudo est d\351j\340 utiliser");
        return false;
    }
    else if(email == resulemail){
        alert("cette e-mail est d\351j\340 utiliser");
        return false;
    }
   else if(user == resuluser && email == resulemail){
        alert("le pseudo et l'email existe d\351j\340");
        return false;
    }

}

function isEmail(email){
var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
if(regex.test(email))
return true;
else
return false;
} 

function send(form){
  form.submit();
}


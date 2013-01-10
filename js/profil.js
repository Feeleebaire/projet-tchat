function testForm(form){
    user = form.user.value;
    passwd = form.passwd.value;
    email = form.email.value;
    resuluser = document.getElementById('resultat').textContent;
    resulemail = document.getElementById('resultatemail').textContent;
    if(!isEmail(email) && email){
        alert ("adresse email incorrecte");
        return false;
    }
    else if(user == resuluser && user != ""){
        var cse = document.getElementById('email');
        cse.style.borderColor = 'red';
        cse.style.backgroundColor = 'lightpink';
        var csei = document.getElementById('imge');
        csei.style.backgroundImage = "url('css/images/croix.png')";
        alert("ce pseudo est d\351j\340 utiliser");
        return false;
    }
    else if(email == resulemail && email !=""){
        alert("cette e-mail est d\351j\340 utiliser");
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


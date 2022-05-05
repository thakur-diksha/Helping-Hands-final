function fetchData(){
    window.localStorage.removeItem("cTab");

    var d = document.getElementById('donate-dashboard');
    var v = document.getElementById('volunteer-dashboard');
    var p = document.getElementById('pass-board');

    p.style.display = 'none';
    d.style.display = 'block';
    v.style.display = 'block';
}

function password(){
    window.localStorage.setItem("cTab", "pwd");

    var d = document.getElementById('donate-dashboard');
    var v = document.getElementById('volunteer-dashboard');
    var p = document.getElementById('pass-board');

    d.style.display = 'none';
    v.style.display = 'none';
    p.style.display = 'block';
}

function valChangePass(){
    var valid=true;
    var old= document.getElementById('acc-old-pass');
    var newpass= document.getElementById('acc-pass');
    var newpass2= document.getElementById('acc-cpass');
    if(newpass.value==newpass2.value){
        valid=true;
    }
    else{
        alert('Passwords do not match');
        valid=false;
    }
}

window.onload = retainCurrentTab;

function retainCurrentTab(){
    curTab = window.localStorage.getItem("cTab");
    if(curTab == "pwd"){
        document.getElementById('donate-dashboard').style.display = 'none';
        document.getElementById('volunteer-dashboard').style.display='none';
        document.getElementById('pass-board').style.display='block';
    }
}
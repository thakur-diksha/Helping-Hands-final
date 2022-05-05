function adPassword(){
    window.localStorage.setItem("cTab", "pass");

    document.getElementById('admin-info').style.display = 'none';
    document.getElementById('ad-pass-board').style.display = 'block';
    document.getElementById('ad-volunteer-data').style.display = 'none';
    document.getElementById('ad-donor-data').style.display = 'none';
}

function fetchDData(){
    window.localStorage.removeItem("cTab");

    document.getElementById('admin-info').style.display = 'none';
    document.getElementById('ad-donor-data').style.display = 'block';
    document.getElementById('ad-pass-board').style.display = 'none';
    document.getElementById('ad-volunteer-data').style.display = 'none';
}
function fetchVData(){
    window.localStorage.removeItem("cTab");
    
    document.getElementById('admin-info').style.display = 'none';
    document.getElementById('ad-donor-data').style.display = 'none';
    document.getElementById('ad-pass-board').style.display = 'none';
    document.getElementById('ad-volunteer-data').style.display = 'block';
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
    if(curTab == "pass"){
        document.getElementById('admin-info').style.display = 'none';
        document.getElementById('ad-pass-board').style.display = 'block';
        document.getElementById('ad-volunteer-data').style.display = 'none';
        document.getElementById('ad-donor-data').style.display = 'none';
    }
}

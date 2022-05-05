//--------------------------------------login page---------------------------------------------------------
window.onload = retainCurrentTab;

function retainCurrentTab() {
    curTab = window.localStorage.getItem("cTab");
    if (curTab == "signup") {
        document.getElementById('login-box').style.display = 'none';
        document.getElementById('signup-box').style.display = 'block';
        document.getElementById('signup-line').style.display = 'block';
        document.getElementById('login-line').style.display = 'none';
    }
}

function loginform() {
    window.localStorage.removeItem("cTab");

    var login = document.getElementById('login-box');
    var signup = document.getElementById('signup-box');
    var line1 = document.getElementById('login-line');
    var line2 = document.getElementById('signup-line');

    signup.style.display = 'none';
    login.style.display = 'block';
    line2.style.display = 'none';
    line1.style.display = 'block';
}

function signupform() {
    window.localStorage.setItem("cTab", "signup");

    var login = document.getElementById('login-box');
    var signup = document.getElementById('signup-box');
    var line1 = document.getElementById('login-line');
    var line2 = document.getElementById('signup-line');

    login.style.display = 'none';
    signup.style.display = 'block';
    line2.style.display = 'block';
    line1.style.display = 'none';
}

function validateLogin() {
    var e, p, valid = true;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2})+$/;
    e = document.getElementById("email");
    p = document.getElementById("password");

    if ((e.value.match(mailformat) && e.value.endsWith("banasthali.in"))) {
        var reg_email = e.value;
        console.log(reg_email);
        valid = true;
    } else {
        alert("Please enter the valid email format!");
        // document.getElementById("invalid").innerHTML = "please enter a valid email!";
        // return false;
        valid = false;
    }

    if ((p.value.length >= 6 && p.value.length <= 9)) {
        var reg_pwd = p.value;
        console.log(reg_pwd);
        valid = true;
    } else {
        alert("Password should be between 6-9 characters!");
        valid = false;
    }
    return valid;
}


function validateSignup() {
    var e, p, valid = true;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2})+$/;
    e = document.getElementById("mail");
    p = document.getElementById("pass");

    if ((e.value.match(mailformat) && e.value.endsWith("banasthali.in"))) {
        var reg_email = e.value;
        console.log(reg_email);
        valid = true;
    } else {
        alert("Please enter the valid email format!");
        valid = false;
    }

    if ((p.value.length >= 6 && p.value.length <= 9)) {
        var reg_pwd = p.value;
        console.log(reg_pwd);
        valid = true;
    } else {
        alert("Password should be between 6-9 characters!");
        valid = false;
    }
    return valid;
}


//------------------------------volunteer and donation forms-----------------------------------------
var currentTab = 0;
showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
}

//-----------------------------------donation form-------------------------------------------------
function dnextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validatedForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        document.getElementById("d-form").submit();
        return false;
    }

    showTab(currentTab);
}


function validatedForm() {

    var x, y, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");

    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        } else if (y[i].value !== "") {
            console.log(y[i].parentNode.parentNode.className);

            if (y[i].parentNode.parentNode.className == "tab contact") {
                console.log("contact");

                if (y[i].type == "number") {
                    if (y[i].value.length == 10) {
                        valid = true;
                    } else {
                        alert("Please enter a valid 10-digit number!")
                        valid = false;
                    }
                }

            }

        }
    }

    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}

//----------------------------volunteer form--------------------------------------------
function vnextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validatevForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        document.getElementById("v-form").submit();
        return false;
    }

    showTab(currentTab);
}


function validatevForm() {

    var x, y, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");

    // for firstname and lastname field valid
    // var numbers = /^[-+]?[0-9]+$/;

    // for email valid
    // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2})+$/;


    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        } else if (y[i].value !== "") {
            console.log(y[i].parentNode.parentNode.className);

            // if (y[i].parentNode.parentNode.className == "tab name") {
            //   console.log("text");
            //   if (y[i].value.match(numbers)) {
            //     y[i].className += " deep_invalid";
            //     valid = false;
            //   }
            //   else {
            //     valid = true;
            //   }
            // }

            if (y[i].parentNode.parentNode.className == "tab contact") {
                console.log("contact");
                // if (y[i].type == "email") {
                //   if (y[i].value.match(mailformat) && y[i].value.endsWith("banasthali.in")) {
                //     console.log("mailformat");
                //     var reg_email = y[i].value;
                //     console.log(reg_email);
                //     valid = true;
                //   } else {
                //     console.log("not mailformat")
                //     y[i].className += " deep_invalid";
                //     alert("Please enter email in the specified format!");
                //     valid = false;
                //   }
                // }

                if (y[i].type == "number") {
                    if (y[i].value.length == 10) {
                        return valid;
                    } else {
                        alert("Please enter a valid 10-digit number!")
                        valid = false;
                    }
                }

            }

        }
    }

    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}


function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" stepactive", "");
    }
    x[n].className += " stepactive";
}


//----------------donation form-----------------------------------------
function validateCB() {
    var checkboxs = document.getElementsByName("item[]");
    var okay = false;
    for (var i = 0, l = checkboxs.length; i < l; i++) {
        if (checkboxs[i].checked) {
            dnextPrev(1);
            return okay;
        }
    }
    alert("Please select at least one item!");
}

/* -------------------------------------Profile.js----------------------------------------*/
function fetchData() {
    var d = document.getElementById('donate-dashboard');
    var v = document.getElementById('volunteer-dashboard');
    var p = document.getElementById('pass-board');

    p.style.display = 'none';
    d.style.display = 'block';
    v.style.display = 'block';
}

function password() {
    var d = document.getElementById('donate-dashboard');
    var v = document.getElementById('volunteer-dashboard');
    var p = document.getElementById('pass-board');

    d.style.display = 'none';
    v.style.display = 'none';
    p.style.display = 'block';
}
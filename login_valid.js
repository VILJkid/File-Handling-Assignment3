function login_valid() {
    cred = ["test_user", 123456];
    flag1 = flag2 = 0;
    //uname
    {
        if (document.getElementById("uname").value == "") {
            // console.log(document.getElementById("uname").value);
            document.getElementById("unameErr").innerHTML = "Username is required.";
            document.getElementById("uname").style.borderColor = "red";
            document.getElementById("uname").value = "";
            // document.getElementById("email").focus();
            flag1 = 1;
        }
        else if (document.getElementById("uname").value != cred[0]) {
            document.getElementById("unameErr").innerHTML = "Incorrect username.";
            document.getElementById("uname").style.borderColor = "red";
            document.getElementById("uname").value = "";
            // document.getElementById("uname").focus();
            flag1 = 1;
        }

    }

    //pass
    {
        if (document.getElementById("pass").value == "") {
            document.getElementById("passErr").innerHTML = "Password is required.";
            document.getElementById("pass").style.borderColor = "red";
            document.getElementById("pass").value = "";
            // document.getElementById("pass").focus();
            flag2 = 1;
        }
        else if (document.getElementById("pass").value != cred[1]) {
            document.getElementById("passErr").innerHTML = "Incorrect password.";
            document.getElementById("pass").style.borderColor = "red";
            document.getElementById("pass").value = "";
            // document.getElementById("pass").focus();
            flag2 = 1;
        }

    }
    {
        if (flag1 == 0) {
            document.getElementById("uname").style.borderColor = "green";
            document.getElementById("unameErr").innerHTML = "";
        }
        if (flag2 == 0) {
            document.getElementById("pass").style.borderColor = "green";
            document.getElementById("passErr").innerHTML = "";
        }
    }
    if (flag1 == 0 && flag2 == 0) {
        return true;
    }
    else {
        return false;
    }

}
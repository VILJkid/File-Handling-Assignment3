function feed1_valid() {
    flag1 = flag2 = 0;
    reg_name = /^[a-z ,.'-]+$/i;

    //emptype
    {
        var emptype = document.getElementsByName('emptype');

        if (!(emptype[0].checked || emptype[1].checked)) {
            document.getElementById("empTypeErr").innerHTML = "Employee type is required.";
            document.getElementsByName("emptype")[0].style.borderColor = "red";
            document.getElementsByName("emptype")[1].style.borderColor = "red";
            flag1 = 1;
        }
    }

    //empname
    {
        if (document.getElementById("empname").value == "") {
            document.getElementById("empNameErr").innerHTML = "Employer's name is required.";
            document.getElementById("empname").style.borderColor = "red";
            document.getElementById("empname").value = "";
            flag2 = 1;
        }

        else if (document.getElementById("empname").value.search(reg_name) == -1) {
            document.getElementById("empNameErr").innerHTML = "Incorrect format.";
            document.getElementById("empname").style.borderColor = "red";
            document.getElementById("empname").value = "";
            flag2 = 1;
        }
    }


    {
        if (flag1 == 0) {
            document.getElementsByName("emptype")[0].style.borderColor = "green";
            document.getElementsByName("emptype")[1].style.borderColor = "green";
            document.getElementById("empTypeErr").innerHTML = "";
        }
        if (flag2 == 0) {
            document.getElementById("empname").style.borderColor = "green";
            document.getElementById("empNameErr").innerHTML = "";
        }
    }


    if (flag1 == 0 && flag2 == 0) {
        return true;
    }
    else {
        return false;
    }

}
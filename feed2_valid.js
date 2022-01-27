function feed2_valid() {
    flag1 = flag2 = flag3 = flag4 = flag5 = flag6 = flag7 = 0;
    reg_alpha = /^[a-z ,.'-]+$/i;

    //rating-system
    {
        if (document.getElementById("rating-system").value == 0) {
            document.getElementById("ratingSystemErr").innerHTML = "Rating is required.";
            document.getElementById("rating-system").style.borderColor = "red";
            flag1 = 1;
        }
    }

    //empstatus
    {
        if (document.getElementById("empstatus").value == "") {
            document.getElementById("empStatusErr").innerHTML = "Employer's status is required.";
            document.getElementById("empstatus").style.borderColor = "red";
            flag2 = 1;
        }
    }

    //jobtitle
    {
        if (document.getElementById("jobtitle").value == "") {
            document.getElementById("jobTitleErr").innerHTML = "Job title is required.";
            document.getElementById("jobtitle").style.borderColor = "red";
            flag3 = 1;
        }
        else if (document.getElementById("jobtitle").value.search(reg_alpha) == -1) {
            document.getElementById("jobTitleErr").innerHTML = "Incorrect format.";
            document.getElementById("jobtitle").style.borderColor = "red";
            document.getElementById("jobtitle").value = "";
            flag3 = 1;
        }
    }

    //revhead
    {
        if (document.getElementById("revhead").value == "") {
            document.getElementById("revHeadErr").innerHTML = "Review headline is required.";
            document.getElementById("revhead").style.borderColor = "red";
            flag4 = 1;
        }
        else if (document.getElementById("revhead").value.search(reg_alpha) == -1) {
            document.getElementById("revHeadErr").innerHTML = "Incorrect format.";
            document.getElementById("revhead").style.borderColor = "red";
            document.getElementById("revhead").value = "";
            flag4 = 1;
        }
    }

    //pros
    {
        if (document.getElementById("pros").value == "") {
            document.getElementById("prosErr").innerHTML = "Pros is required.";
            document.getElementById("pros").style.borderColor = "red";
            flag5 = 1;
        }
        else if (document.getElementById("pros").value.length < 15 || document.getElementById("pros").value.length > 200) {
            document.getElementById("prosErr").innerHTML = "Min 15 characters to max 200 characters required.";
            document.getElementById("pros").style.borderColor = "red";
            document.getElementById("pros").value = "";
            flag5 = 1;
        }
    }

    //cons
    {
        if (document.getElementById("cons").value == "") {
            document.getElementById("consErr").innerHTML = "Cons is required.";
            document.getElementById("cons").style.borderColor = "red";
            flag6 = 1;
        }
        else if (document.getElementById("cons").value.length < 15 || document.getElementById("cons").value.length > 200) {
            document.getElementById("consErr").innerHTML = "Min 15 characters to max 200 characters required.";
            document.getElementById("cons").style.borderColor = "red";
            document.getElementById("cons").value = "";
            flag6 = 1;
        }
    }

    //admt
    {
        if (document.getElementById("admt").value == "") {
            document.getElementById("admtErr").innerHTML = "Advice Management is required.";
            document.getElementById("admt").style.borderColor = "red";
            flag7 = 1;
        }
        else if (document.getElementById("admt").value.length < 15 || document.getElementById("admt").value.length > 200) {
            document.getElementById("admtErr").innerHTML = "Min 15 characters to max 200 characters required.";
            document.getElementById("admt").style.borderColor = "red";
            document.getElementById("admt").value = "";
            flag7 = 1;
        }
    }

    {
        if (flag1 == 0) {
            document.getElementById("rating-system").style.borderColor = "green";
            document.getElementById("ratingSystemErr").innerHTML = "";
        }
        if (flag2 == 0) {
            document.getElementById("empstatus").style.borderColor = "green";
            document.getElementById("empStatusErr").innerHTML = "";
        }
        if (flag3 == 0) {
            document.getElementById("jobtitle").style.borderColor = "green";
            document.getElementById("jobTitleErr").innerHTML = "";
        }
        if (flag4 == 0) {
            document.getElementById("revhead").style.borderColor = "green";
            document.getElementById("revHeadErr").innerHTML = "";
        }
        if (flag5 == 0) {
            document.getElementById("pros").style.borderColor = "green";
            document.getElementById("prosErr").innerHTML = "";
        }
        if (flag6 == 0) {
            document.getElementById("cons").style.borderColor = "green";
            document.getElementById("consErr").innerHTML = "";
        }
        if (flag7 == 0) {
            document.getElementById("admt").style.borderColor = "green";
            document.getElementById("admtErr").innerHTML = "";
        }
    }

    console.log(flag5);
    if (flag1 == 0 && flag2 == 0 && flag3 == 0 && flag4 == 0 && flag5 == 0 && flag6 == 0 && flag7 == 0) {
        return true;
    }
    else {
        return false;
    }

}
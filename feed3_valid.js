function feed3_valid() {
    flag1 = flag2 = 0;
    test_ext = 0;
    allowed_extensions = new Array("doc", "pdf");
    //file
    {
        if (document.getElementById("file-fake").value == "") {
            document.getElementById("fileErr-fake").innerHTML = "File is required.";
            document.getElementById("file-fake-label").style.borderColor = "red";
            document.getElementById("file-fake").style.borderColor = "red";
            flag1 = 1;
        }
        else {
            console.log(document.getElementById("file-fake").value);

            file_extension = document.getElementById("file-fake").value.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.
            file_name = document.getElementById("file-fake").value.split('\\').pop();

            for (i = 0; i <= allowed_extensions.length; i++) {
                if (allowed_extensions[i] == file_extension) {
                    test_ext = 1;
                    // document.getElementById("file-fake").value = file_name;
                    break; // valid file extension
                }
            }
            if (test_ext == 0) {
                document.getElementById("fileErr-fake").innerHTML = "Only doc and pdf file allowed.";
                document.getElementById("file-fake-label").style.borderColor = "red";
                document.getElementById("file-fake").style.borderColor = "red";
                flag1 = 1;
            }
        }
    }

    //t&c
    {
        if (!document.getElementById("check").checked) {
            document.getElementById("checkErr").innerHTML = "You must agree to the T&Cs.";
            document.getElementById("check").style.borderColor = "red";
            flag2 = 1;
        }
    }


    {
        if (flag1 == 0) {
            document.getElementById("file-fake-label").style.borderColor = "green";
            document.getElementById("file-fake").style.borderColor = "green";
            document.getElementById("fileErr-fake").innerHTML = "";
        }
        if (flag2 == 0) {
            document.getElementById("check").style.borderColor = "green";
            document.getElementById("checkErr").innerHTML = "";
        }
    }


    if (flag1 == 0 && flag2 == 0) {
        return true;
    }
    else {
        return false;
    }

}
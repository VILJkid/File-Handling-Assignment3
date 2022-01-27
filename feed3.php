<?php
error_reporting(0);
session_start();

//file
if (isset($_SESSION["file_name"])) {
    $file_name = $_SESSION["file_name"];
} else {
    $file_name = "";
}

//check
if (isset($_SESSION["check"])) {
    $check = "checked";
} else {
    $check = "";
}
//onsubmit
if (isset($_POST["submit"])) {
    $_SESSION["check"] = $_POST["check"];
    $file_tmp_name = $_FILES["file"]["tmp_name"];
    $_SESSION["file_name"] = $_FILES["file"]["name"];
    $uname = $_SESSION["uname"];

    if (!is_dir("Users/$uname/tmp")) {
        mkdir("Users");
        mkdir("Users/$uname");
        mkdir("Users/$uname/tmp");
    }
    $dest = "Users/$uname/tmp/";

    if (!move_uploaded_file($file_tmp_name, $dest . $_SESSION["file_name"])) {
        rmdir("Users");
        rmdir("Users/$uname");
        rmdir("Users/$uname/tmp");

        echo "Error in file uploading";
    } else {
        $_SESSION["file_dir"] = $dest . $_SESSION["file_name"];
        header("Location: review.php");
        exit;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Stage 3</title>
    <style>
        .error {
            color: red;
        }

        .correct {
            color: green;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        textarea {
            resize: none;
        }

        .hide {
            display: none;
        }
    </style>

</head>

<body>
    <?php
    include("nav.php");
    ?>
    <form method="post" class="center" enctype="multipart/form-data">
        <div class="container">
            <h2 class="mt-3">Feedback form</h2>

            <span class="error"> * are required fields </span><br />
            <br />

            <div class="form-group form-ele hide">
                <label for="file" class="form-label">Submit Proof<span class="error"> *</span></label>
                <input class="form-control" type="file" id="file" name="file" onchange="fakeName()">
                <span class="error">
                    <p id="fileErr"></p>
                </span>
            </div>

            <label for="file-fake" class="form-label">Submit Proof<span class="error"> *</span></label>
            <div class="input-group mb-3">
                <span class="input-group-text addfiles" id="file-fake-label">Choose File</span>
                <input type="text" class="form-control addfiles" name="file-fake" id="file-fake" aria-describedby="file-fake-label" value="<?php echo $file_name; ?>" readonly style="background-color: #fff;">
            </div>
            <div class="error">
                <p id="fileErr-fake"></p>
            </div>

            <div class="form-group form-ele">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="check" name="check" value="check" <?php echo $check; ?> />
                    <label for="check" class="form-check-label">I accept all the Terms and Conditions.<span class="error"> *</span></label>
                    <span class="error">
                        <p id="checkErr"></p>
                    </span>
                    <br /><br />
                </div>
            </div>




            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="feed2.php" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <button type="submit" id="sub" class="page-link" name="submit" onclick="return feed3_valid()">Finish</button>
                    </li>
                </ul>
            </nav>

        </div>

    </form>

    <?php
    include("foot.php");
    ?>
    <script>
        function fakeName() {
            file_name = document.getElementById("file").value.split('\\').pop();
            document.getElementById("file-fake").value = file_name;
        }
    </script>
    <script src="feed3_valid.js"></script>
    <script>
        $('.addfiles').on('click', function() {
            $('#file').click();
            return false;
        })
    </script>

</body>

</html>
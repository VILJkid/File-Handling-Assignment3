<?php
error_reporting(0);
session_start();
$toggleModalAfterLogin = " ";

if (isset($_POST['submit'])) {
    $toggleModalAfterLogin = "hide";

    $uname = $_SESSION["uname"];
    $file_dir = $_SESSION["file_dir"];
    $file_name = $_SESSION["file_name"];
    $emptype = $_SESSION["emptype"];
    $empname = $_SESSION["empname"];
    $rating = $_SESSION["rating-system"];
    $empstatus = $_SESSION["empstatus"];
    $jobtitle = $_SESSION["jobtitle"];
    $revhead = $_SESSION["revhead"];
    $pros = $_SESSION["pros"];
    $cons = $_SESSION["cons"];
    $admt = $_SESSION["admt"];
    $check = $_SESSION["check"];

    // echo "<h2>$file_dir</h2><br>";
    if (!is_dir("Users/$uname/Uploads")) {
        mkdir("Users/$uname/Uploads");
    }

    $dest = "Users/$uname/Uploads/";

    if (!copy($file_dir, $dest . $file_name)) {
        rmdir("Users/$uname/Uploads");
        echo "Error in file uploading";
    } else {
        file_put_contents("Users/$uname/feedback.txt",  "$emptype\n$empname\n$rating\n$empstatus\n$jobtitle\n$revhead\n$pros\n$cons\n$admt\n$file_name\n$check");
        $toggleuploadSuccess = "show";
        // header("Location: index.php");
        // exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Review</title>
    <style>
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
            <div class="row mb-4">
                <h2 class="mt-3">Review your inputs</h2>
            </div>

            <div class="row">
                <h4>Step 1</h4>
                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Employee Type</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["emptype"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Employer's Name</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["empname"]; ?>" readonly style="background-color: #fff;">
                </div>
            </div>

            <div class="row">
                <h4>Step 2</h4>
                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Overall Rating</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["rating-system"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Employment Status</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["empstatus"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Job Title</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["jobtitle"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Review Headline</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["revhead"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Pros</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["pros"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Cons</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["cons"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Advice Management</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["admt"]; ?>" readonly style="background-color: #fff;">
                </div>
            </div>

            <div class="row">
                <h4>Step 3</h4>
                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Proof Uploaded</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["file_name"]; ?>" readonly style="background-color: #fff;">
                </div>

                <label for="basic-url" class="form-label"></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Agree Terms and Conditions</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $_SESSION["check"]; ?>" readonly style="background-color: #fff;">
                </div>
            </div>

            <div class="row mb-5 mt-4">
                <div class="text-center">
                    <input type="submit" class="btn btn-dark btn-lg text" name="submit" value="Upload">
                </div>

            </div>

        </div>
    </form>

    <div class="modal fade <?php echo $toggleModalAfterLogin; ?>" id="uploadSuccess" tabindex="-1" aria-labelledby="uploadSuccessLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadSuccessLabel">Success</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 text-center">
                                <img src="./Images/tick.gif" alt="Error loading image" class="img-rounded center-block" width="40px">
                            </div>
                            <div class="col-sm-6 col-md-9 ml-auto">
                                <div class="text-center">
                                    <h5>Your response has been successfully submitted !</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                    <a href="index.php" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("foot.php");
    ?>

    <script>
        $(document).ready(function() {
            $("#uploadSuccess").modal("<?php echo $toggleuploadSuccess; ?>");
        });
    </script>

</body>

</html>
<?php
error_reporting(0);
session_start();
$toggleModal = "hide";
$toggleModalAfterLogin = " ";
$toggleCheckLoginModal = "hide";
$toggleCheckResubmitModal = "hide";

if (isset($_POST["submit"])) {
    $toggleModalAfterLogin = "hide";
    if (isset($_SESSION["uname"])) {
        if (is_dir("Users/" . $_SESSION["uname"])) {
            $toggleCheckResubmitModal = "show";
            // exit;
        } else {
            header("Location: feed1.php");
            exit;
        }
    } else {
        $toggleCheckLoginModal = "show";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Welcome</title>
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

    <div class="row">
        <div class="container">
            <div class="col-xs-1 mt-5 mb-5" align="center">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <img src="Images/neosoft.jpeg" class=" d-block w-75" alt="...">

                        </div>
                        <div class="carousel-item">
                            <img src="Images/people-working.jpg" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="Images/reading-charts.jpg" class="d-block w-75" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-xs-1 mt-3 px-3" align="center">
                <h5>We value our people. To make our workplace better, we'd like to know about what ideas, suggestions you have for us.</h5>
                <form method="post">
                    <input type="submit" class="btn btn-dark btn-lg mt-5" value="Submit Feedback" name="submit" />
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade <?php echo $toggleModalAfterLogin; ?>" id="checkLogin" tabindex="-1" aria-labelledby="checkLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkLoginLabel">Access Denied</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    You need to Login first in order to submit feedback.
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                    <a href="login.php" class="btn btn-dark">Go to Login page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade <?php echo $toggleModalAfterLogin; ?>" id="checkResubmit" tabindex="-1" aria-labelledby="checkResubmitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkResubmitLabel">Thank You</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    Your response has already been recorded.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button>
                    <a href="index.php" class="btn btn-dark">Close</a> -->
                </div>
            </div>
        </div>
    </div>

    <?php
    include("foot.php");
    ?>
    <script>
        $(document).ready(function() {
            $("#checkLogin").modal("<?php echo $toggleCheckLoginModal; ?>");
        });
        $(document).ready(function() {
            $("#checkResubmit").modal("<?php echo $toggleCheckResubmitModal; ?>");
        });
    </script>
</body>

</html>
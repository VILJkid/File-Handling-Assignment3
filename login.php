<?php
error_reporting(0);
session_start();
$toggleModalAfterLogin = " ";
$toggleloginSuccess = "hide";
$startCounter = "stop";

if (isset($_POST["submit"])) {
    $toggleModalAfterLogin = "hide";

    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    if ($uname == "test_user" && $pass == "123456") {
        $_SESSION["uname"] = $uname;

        $toggleloginSuccess = "show";
        $startCounter = "start";
        // header("Location: index.php");
        // exit;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Login</title>
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

        body {
            background-image: url('Images/loading-gif.png');
            background-size: cover;



            height: 100vh;
            padding: 0;
            margin: 0;
        }
    </style>

</head>

<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
        <form method="post" class="center">
            <div class="container">
                <h2 class="mt-3 text-success">Login</h2>

                <span class="error"> * are required fields </span><br />
                <br />

                <div class="form-ele form-group">
                    <label for="uname" class="form-label text-warning">Username<span class="error"> *</span></label>
                    <input type="text" name="uname" id="uname" class="form-control bg-transparent text-light" size="30" placeholder="Username" />
                    <span class="error">
                        <p id="unameErr"></p>
                    </span>
                    <br /><br />
                </div>

                <div class="form-ele form-group">
                    <label for="pass" class="form-label text-warning">Password<span class="error"> *</span></label>
                    <input type="password" name="pass" id="pass" class="form-control bg-transparent text-light" size="30" placeholder="Password" />
                    <span class="error">
                        <p id="passErr"></p>
                    </span>
                    <br /><br />
                </div>


                <button type="submit" class="btn btn-success" name="submit" onclick="return login_valid()">Login</button>

            </div>

        </form>

        <div class="modal fade <?php echo $toggleModalAfterLogin; ?>" id="loginSuccess" tabindex="-1" aria-labelledby="loginSuccessLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginSuccessLabel">Access Granted</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                                    <img src="./Images/tick.gif" alt="Error loading image" class="img-rounded center-block" width="40px">
                                </div>
                                <div class="col-xs-6 col-sm-9 col-md-9 ml-auto">
                                    <div class="text-center">
                                        <h5>Logged in as <?php echo $uname; ?> !</h5>
                                        <p>Redirecting in <span id="counter">3</span> seconds.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                        <a href="index.php" class="btn btn-dark">Continue</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src=" login_valid.js"></script>
    <?php
    include("foot.php");
    ?>

    <script>
        $(document).ready(function() {
            $("#loginSuccess").modal("<?php echo $toggleloginSuccess; ?>");
        });
        if ("<?php echo $startCounter; ?>" == "start") {
            setTimeout(function() {
                $("#counter").html("3");
            }, 1000, setTimeout(function() {
                $("#counter").html("2");
            }, 2000, setTimeout(function() {
                $("#counter").html("1");
            }, 3000, setTimeout(function() {
                $("#counter").html("0");
                window.location.href = "index.php";
            }, 4000))));
        }
    </script>

</body>

</html>
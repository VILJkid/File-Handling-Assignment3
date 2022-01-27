<?php
error_reporting(0);
session_start();

$toggleWelcome = " "; // default visible
$toggleLogin = " "; // default visible
$toggleLogout = " "; // default visible

if (isset($_SESSION["uname"]))
    $toggleLogin = "hide";
else {
    $toggleWelcome = "hide";
    $toggleLogout = "hide";
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>

    <title></title>
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">NeoSOFT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $toggleWelcome; ?>" href="#">Welcome <?php echo $_SESSION["uname"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $toggleLogin; ?>" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $toggleLogout; ?>" href="" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>



    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Are you sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>All your unsaved changes will be lost.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("foot.php");
    ?>
</body>

</html>
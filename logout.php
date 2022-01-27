<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Logout</title>
    <style>
        body {
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">

        </div>
        <!-- <span class="visually-hidden"> -->
        <strong class="text-light">Loading...</strong>
        <!-- </span> -->
    </div>
    <?php
    include("foot.php");
    ?>

    <script>
        // $(document).ready(function() {
        //     setTimeout("$('strong').html('Clearing session data...')", 2000, function() {
        //         setTimeout("$('strong').html('Logging out of session...')", 4000, function() {
        //             setTimeout("$('strong').html('Done')", 6000, function() {
        //                 setTimeout("$('strong').html('Redirecting to Homepage')", 7000, function() {
        //                     setTimeout("$('strong').html('Yesss')", 9000, function() {
        //                         $(location).attr('href', 'index.php');
        //                     })
        //                 })
        //             })
        //         })
        //     })
        // });

        $(document).ready(function() {
            setTimeout(function() {
                $('strong').html('Clearing session data...');
            }, 2000, setTimeout(function() {
                $('strong').html('Logging out of session...');
            }, 4000, setTimeout(function() {
                $('strong').html('Redirecting to Homepage');
            }, 6000, setTimeout(function() {
                window.location.href = "index.php";
            }, 8000))))
        });
    </script>
</body>

</html>
<?php
error_reporting(0);
session_start();

//emptype
if (isset($_SESSION["emptype"])) {
    if ($_SESSION["emptype"] == "Current") {
        $emptype1 = "checked";
    } else {
        $emptype2 = "checked";
    }
} else {
    $emptype1 = "";
    $emptype2 = "";
}

//empname
if (isset($_SESSION["empname"])) {
    $empname = $_SESSION["empname"];
} else {
    $empname = "";
}

//onsubmit
if (isset($_POST["submit"])) {
    $_SESSION["emptype"] = $_POST["emptype"];
    $_SESSION["empname"] = $_POST["empname"];
    header("Location: feed2.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Stage 1</title>
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
    </style>

</head>

<body>
    <?php
    include("nav.php");
    ?>
    <form method="post" class="center">
        <div class="container">
            <h2 class="mt-3">Feedback form</h2>

            <span class="error"> * are required fields </span><br />
            <br />

            <label for="emptype" class="form-label">Are you a current or former employee<span class="error"> *</span></label>
            <div class="form-check">

                <input class="form-check-input" type="radio" name="emptype" id="emptype1" value="Current" <?php echo $emptype1; ?>>
                <label class="form-check-label" for="emptype1">
                    Current
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="emptype" id="emptype2" value="Former" <?php echo $emptype2; ?>>
                <label class="form-check-label" for="emptype2">
                    Former
                </label>
            </div>

            <span class="error">
                <p id="empTypeErr"></p>
            </span>
            <br /><br />


            <div class="form-ele form-group">
                <label for="empname" class="form-label">Employer's name<span class="error"> *</span></label>
                <input type="text" name="empname" id="empname" class="form-control" size="30" placeholder="Employer's name" value="<?php echo $empname; ?>" />
                <span class="error">
                    <p id="empNameErr"></p>
                </span>
                <br /><br />
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <button type="submit" id="sub" class="page-link" name="submit" onclick="return feed1_valid()">Next</button>
                    </li>
                </ul>
            </nav>

        </div>

    </form>


    <?php
    include("foot.php");
    ?>
    <script src="feed1_valid.js"></script>


</body>

</html>
<?php
error_reporting(0);
session_start();

//rating
if (isset($_SESSION["rating-system"])) {
    $rating = $_SESSION["rating-system"];
} else {
    $rating = "";
}

//empstatus
if (isset($_SESSION["empstatus"])) {
    if ($_SESSION["empstatus"] == "Full Time") {
        $empstatus1 = "selected";
    } else if ($_SESSION["empstatus"] == "Part Time") {
        $empstatus2 = "selected";
    } else if ($_SESSION["empstatus"] == "Contract") {
        $empstatus3 = "selected";
    } else {
        $empstatus4 = "selected";
    }
} else {
    $empstatusdefault = "selected";
}

//jobtitle
if (isset($_SESSION["jobtitle"])) {
    $jobtitle = $_SESSION["jobtitle"];
} else {
    $jobtitle = "";
}

//revhead
if (isset($_SESSION["revhead"])) {
    $revhead = $_SESSION["revhead"];
} else {
    $revhead = "";
}

//pros
if (isset($_SESSION["pros"])) {
    $pros = $_SESSION["pros"];
} else {
    $pros = "";
}

//cons
if (isset($_SESSION["cons"])) {
    $cons = $_SESSION["cons"];
} else {
    $cons = "";
}

//admt
if (isset($_SESSION["admt"])) {
    $admt = $_SESSION["admt"];
} else {
    $admt = "";
}

//onsubmit
if (isset($_POST["submit"])) {
    $_SESSION["rating-system"] = $_POST["rating-system"];
    $_SESSION["empstatus"] = $_POST["empstatus"];
    $_SESSION["jobtitle"] = $_POST["jobtitle"];
    $_SESSION["revhead"] = $_POST["revhead"];
    $_SESSION["pros"] = $_POST["pros"];
    $_SESSION["cons"] = $_POST["cons"];
    $_SESSION["admt"] = $_POST["admt"];
    header("Location: feed3.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <title>Stage 2</title>
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

            <div class="form-ele form-group">
                <label for="rating-system" class="form-label">Overall Rating<span class="error"> *</span></label>
                <input type="number" name="rating-system" id="rating-system" class="form-control" value="<?php echo $rating; ?>">
                <span class="error">
                    <p id="ratingSystemErr"></p>
                </span>
                <br /><br />
            </div>

            <div class="form-ele form-group">
                <label for="empstatus" class="form-label">Employment Status<span class="error"> *</span></label>
                <select class="form-select" aria-label="Default select example" name="empstatus" id="empstatus">
                    <option disabled value <?php echo $empstatusdefault; ?>> -- Select an option -- </option>
                    <option value="Full Time" <?php echo $empstatus1; ?>>Full Time</option>
                    <option value="Part Time" <?php echo $empstatus2; ?>>Part Time</option>
                    <option value="Contract" <?php echo $empstatus3; ?>>Contract</option>
                    <option value="Intern" <?php echo $empstatus4; ?>>Intern</option>
                </select>

                <span class="error">
                    <p id="empStatusErr"></p>
                </span>
                <br /><br />
            </div>

            <div class="form-ele form-group">
                <label for="jobtitle" class="form-label">Job Title<span class="error"> *</span></label>
                <input type="text" name="jobtitle" id="jobtitle" class="form-control" size="30" placeholder="Job Title" value="<?php echo $jobtitle; ?>" />
                <span class="error">
                    <p id="jobTitleErr"></p>
                </span>
                <br /><br />
            </div>

            <div class="form-ele form-group">
                <label for="revhead" class="form-label">Review Headline<span class="error"> *</span></label>
                <input type="text" name="revhead" id="revhead" class="form-control" size="30" placeholder="Review Headline" value="<?php echo $revhead; ?>" />
                <span class="error">
                    <p id="revHeadErr"></p>
                </span>
                <br /><br />
            </div>

            <div class="form-ele form-group">
                <label for="pros" class="form-label">Pros<span class="error"> *</span></label>
                <br />
                <textarea name="pros" id="pros" cols="30" class="form-control" rows="10" noresize placeholder="Pros"><?php echo $pros; ?></textarea>
                <span class="error">
                    <p id="prosErr"></p>
                </span>
                <br /><br />
            </div>

            <div class="form-ele form-group">
                <label for="cons" class="form-label">Cons<span class="error"> *</span></label>
                <br />
                <textarea name="cons" id="cons" cols="30" class="form-control" rows="10" noresize placeholder="Cons"><?php echo $cons; ?></textarea>
                <span class="error">
                    <p id="consErr"></p>
                </span>
                <br /><br />
            </div>

            <div class="form-ele form-group">
                <label for="admt" class="form-label">Advice Management<span class="error"> *</span></label>
                <br />
                <textarea name="admt" id="admt" cols="30" class="form-control" rows="10" noresize placeholder="Advice Management"><?php echo $admt; ?></textarea>
                <span class="error">
                    <p id="admtErr"></p>
                </span>
                <br /><br />
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="feed1.php" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <button type="submit" id="sub" class="page-link" name="submit" onclick="return feed2_valid()">Next</button>
                    </li>
                </ul>
            </nav>

        </div>

    </form>

    <?php
    include("foot.php");
    ?>
    <script src="feed2_valid.js"></script>
    <script>
        // initialize with defaults
        // $("#rating-system").rating();

        // with plugin options
        $("#rating-system").rating({
            min: 0,
            max: 5,
            step: 0.5,
            size: 'lg'
        });
    </script>

</body>

</html>
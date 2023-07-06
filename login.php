<?php
include("config.php");
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="bg">
<?php include 'nav & footer/loginNav.php'; ?>
<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="box">
                <h3 class="feature-title">Patient Login</h3>
                <form method="post">
                    <div class="loginInfo">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="User ID" name="P_UN">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="P_PW">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login" name="logPac">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["logPac"])) {
                        try {
                            $conn = new PDO($db, $un, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = "SELECT `PID` FROM `Patients` WHERE `password`=? and `PID`=?";
                            $st = $conn->prepare($query);
                            $enteredPW = md5($_POST["P_PW"]);
                            $st->bindValue(1, $enteredPW, PDO::PARAM_STR);
                            $st->bindValue(2, $_POST["P_UN"], PDO::PARAM_STR);
                            $st->execute();
                            $result = $st->fetch();
                            $pw = md5($_POST["P_PW"]);
                            if ($result[0] == $_POST["P_UN"]) {
                                $_SESSION["p_un"] = $result[0];
                                echo '<script>window.location.href = "myprofile.php";</script>';
                            } else {
                                echo '<script>alert("Incorrect user name or password")</script>';
                            }
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                    }
                }
                error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                ?>
            </div>
        </div>
    </div>
</div>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
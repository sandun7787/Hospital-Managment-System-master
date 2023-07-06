<?php
require("login-check/logincheck_D.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body class="bg">
<?php include 'nav & footer/nav.php' ?>
<div class="container features">
    <div class="row center">
        <div class="col-md-6 CardBgCol">
            <h3 class="feature-title">Change Password</h3>
            <form method="post">
                <div class="form-group">Old Password:
                    <input type="password" class="form-control" name="pOPW" required>
                </div>
                <div class="form-group"> New password:
                    <input type="password" class="form-control" name="pNPW" required>
                </div>
                <div class="form-group"> Reenter the new password:
                    <input type="password" class="form-control" name="pRNPW" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Change Password" name="change"
                       style="margin-bottom: 10px">
            </form>
        </div>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["change"])) {
        try {
            $num = $_SESSION["d_un"];
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT `Password` FROM `doctors` Where `DID`= $num";
            $st = $conn->prepare($query);
            $st->execute();
            $result = $st->fetch();
            $pw = md5($_POST["pOPW"]);
            if ($pw == $result[0]) {
                if ($_POST["pNPW"] == $_POST["pRNPW"]) {
                    $conn = new PDO($db, $un, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = "UPDATE `doctors` SET `Password`=? Where `DID`=$num";
                    $st = $conn->prepare($query);
                    $npw = md5($_POST["pNPW"]);
                    $st->bindValue(1, $npw, PDO::PARAM_STR);
                    $st->execute();
                    echo "<script> alert('Password updated Successfully!');</script>";
                } else {
                    echo "<script> alert('The reentered password does not match to the new password! ');</script>";
                }
            } else {
                echo '<script>alert("Enter the correct old password")</script>';
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
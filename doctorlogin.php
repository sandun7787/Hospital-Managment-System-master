<?php
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Login</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="bg">
<?php include 'nav & footer/loginNavA&D.php'; ?>
<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="box">
                <h3 class="feature-title">Doctor Login</h3>
                <form method="post">
                    <div class="loginInfo">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Doctor ID" name="D_UN" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="D_PW" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login" name="logDoc">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["logDoc"])) {
                        try {
                            $conn = new PDO($db, $un, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = "SELECT `DID`,`Name` FROM `doctors` WHERE `Password`=? and `DID`=?";
                            $st = $conn->prepare($query);
                            $enteredPW = md5($_POST["D_PW"]);
                            $st->bindValue(1, $enteredPW, PDO::PARAM_STR);
                            $st->bindValue(2, $_POST["D_UN"], PDO::PARAM_STR);
                            $st->execute();
                            $result = $st->fetch();
                            $pw = md5($_POST["D_PW"]);
                            if ($result[0] == $_POST["D_UN"]) {
                                $_SESSION["d_un"] = $result[0];
                                $_SESSION["d_name"] = $result[1];
                                echo '<script>window.location.href = "index_d.php";</script>';
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
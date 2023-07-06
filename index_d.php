<?php
require("login-check/logincheck_D.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home-Doctor</title>
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
<div class="main-container">
    <div class="heading">
        <h1 class="heading__title">Clinic Management System</h1>
        <p class="heading__credits"style="margin-bottom: 10px !important;" >Designed by Team Error 404</p>
        <?php
        $name =$_SESSION["d_name"] ;
        echo '<p class="heading__credits" style="font-size: xx-large;">Welcome! Dr.'.$name.'</p>';?>
        </p>
    </div>
    <div class="cards">
        <div class="card card-1">
            <h2 class="card__title">Patient Register</h2>
            <p class="card__apply">
                <a class="card__link" href="register.php"> Click Here <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
        <div class="card card-2">
            <h2 class="card__title"> Patient Reports</h2>
            <p class="card__apply">
                <a class="card__link" href="report.php">Click Here <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
        <div class="card card-3">
            <h2 class="card__title">Add A New Diagnosis</h2>
            <p class="card__apply">
                <a class="card__link" href="newDiagnose.php"> Click Here <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
        <div class="card card-4">
            <h2 class="card__title">Add A New Patient</h2>
            <p class="card__apply">
                <a class="card__link" href="add.php">Click Here <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
    </div>
</div>

<script src="js/collapsibleCards.js"></script>
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

<?php
require("login-check/logincheck_A&D.php");

include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Patient</title>
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
<form method="post">
    <div class="container features">
        <div class="row center">
            <div class="col-md-8 CardBgCol">
                <h3 class="feature-title">Add new patient</h3>
                <div class="form-group">
                    Name:
                    <input type="text" class="form-control" name="addName" required>
                </div>
                <div class="form-group">
                    Birth Date:
                    <input type="date" class="form-control" name="addAge" required>
                </div>
                <div class="form-group">
                    Contact Number:
                    <input type="number" class="form-control" name="addNum" required>
                </div>
                <div class="form-group">
                    Email:
                    <input type="email" class="form-control" name="addEmail" required>
                </div>
                <div class="form-group">
                    Address:
                    <input type="text" class="form-control" name="addAddress" required>
                </div>
                <div class="form-group">
                    NIC:
                    <input type="text" class="form-control" name="addNIC" required>
                </div>
                <div class="form-group">
                    Blood group:
                    <select class="form-control" name="addBG" required>
                        <option value="O+" name="">O positive</option>
                        <option value="O-" name="">O negative</option>
                        <option value="A+" name="">A positive</option>
                        <option value="A-" name="">A negative</option>
                        <option value="B+" name="">B positive</option>
                        <option value="B-" name="">B negative</option>
                        <option value="AB+" name="">AB positive</option>
                        <option value="AB-" name="">AB negative</option>
                    </select>
                </div>
                <div class="form-group">
                    Gender:
                    <div class="addRadio" style="margin-left: 13%">
                        <input type="radio" name="addGender" value="Male" checked>
                        <label>Male</label><br>
                        <input type="radio" name="addGender" value="Female">
                        <label>Female</label><br>
                        <input type="radio" name="addGender" value="Other">
                        <label>Other</label><br>
                    </div>
                </div>
                <div class="form-group">
                    Create a new password for the patient:
                    <input type="text" class="form-control" name="addPW" required>
                    <?php
                    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                    $md5pw = md5($_POST["addPW"]);
                    ?>
                </div>
                <div class="form-group">
                    Date:
                    <?php $date = date("Y-m-d");
                    echo $date;
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Add Patient" name="btnAdd"
                       style="margin-bottom: 10px">
            </div>
        </div>
    </div>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnAdd'])) {
        try {
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "INSERT INTO `Patients`( `Name`, `BDay`, `No`, `Email`, `Address`, `BG`, `Gender`, `NIC`, `password`, `Day`)  
                         VALUES (?,?,?,?,?,?,?,?,?,?)";
            $st = $conn->prepare($query);
            $st->bindValue(1, $_POST["addName"], PDO::PARAM_STR);
            $st->bindValue(2, $_POST["addAge"], PDO::PARAM_STR);
            $st->bindValue(3, $_POST["addNum"], PDO::PARAM_STR);
            $st->bindValue(4, $_POST["addEmail"], PDO::PARAM_STR);
            $st->bindValue(5, $_POST["addAddress"], PDO::PARAM_STR);
            $st->bindValue(6, $_POST["addBG"], PDO::PARAM_STR);
            $st->bindValue(7, $_POST["addGender"], PDO::PARAM_STR);
            $st->bindValue(8, $_POST["addNIC"], PDO::PARAM_STR);
            $st->bindValue(9, $md5pw, PDO::PARAM_STR);
            $st->bindValue(10, $date, PDO::PARAM_STR);
            $st->execute();
            echo "<script> alert('Patient Added Successfully!');</script>";
        } catch (PDOException $th) {
            echo "<script> alert('There is an existing account to this NIC number! Please check again.');</script>";
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
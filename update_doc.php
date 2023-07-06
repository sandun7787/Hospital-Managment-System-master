<?php
require("login-check/logincheck_A.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Doctor</title>
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
        <div class="col-md-8 CardBgCol">
            <form method="post" enctype="multipart/form-data">
                <h3 class="feature-title">Update doctor profile</h3>
                <?php
                try {
                    $editP = $_SESSION["editDNo"];
                    $conn = new PDO($db, $un, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $query = "SELECT `DID`, `Name`, `No`, `Email`, `Address`,`Day` FROM `doctors` Where `DID`= $editP";
                    $result = $conn->query($query);
                    foreach ($result as $row) {
                        echo '  <div class="form-group"> Name:';
                        echo '<input type="text" class="form-control" name="dName" value="' . $row[1] . '" required >';
                        echo '</div>';
                        echo '  <div class="form-group"> Number:';
                        echo '<input type="number" class="form-control" name="dNo" value="' . $row[2] . '" required >';
                        echo '</div>';
                        echo '  <div class="form-group"> Email:';
                        echo '<input type="email" class="form-control" name="dEmail" value="' . $row[3] . '" required >';
                        echo '</div>';
                        echo '  <div class="form-group"> Address:';
                        echo '<input type="text" class="form-control" name="dAddress" value="' . $row[4] . '" required >';
                        echo '</div>';
                        echo '  <div class="form-group"> Modified Date:';
                        $date = date("Y-m-d");
                        echo $date;
                        echo '</div>';
                        echo '<input type="submit" class="btn btn-primary"  value="Update" name="btnUpdate">';
                        echo '<input type="submit" style="margin-top: 10px; margin-bottom: 10px" class="btn btn-primary"  value="Cancel" name="btnCan">';
                    }
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
                error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                ?>
            </form>
        </div>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnUpdate'])) {
        try {
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "UPDATE `doctors` SET `Name`=?,`No`=?,`Email`=?,`Address`=?,`Day`=? WHERE `DID`=$editP";
            $st = $conn->prepare($query);
            $st->bindValue(1, $_POST["dName"], PDO::PARAM_STR);
            $st->bindValue(2, $_POST["dNo"], PDO::PARAM_STR);
            $st->bindValue(3, $_POST["dEmail"], PDO::PARAM_STR);
            $st->bindValue(4, $_POST["dAddress"], PDO::PARAM_STR);
            $st->bindValue(5, $date, PDO::PARAM_STR);
            $st->execute();
            echo "<script> alert('Doctor updated Successfully!');</script>";
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCan'])) {
        echo '<script>window.location.href = "doc_register.php";</script>';
    }
}
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
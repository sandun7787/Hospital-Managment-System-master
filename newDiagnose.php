<?php
require("login-check/logincheck_D.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Diagnosis</title>
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
            <h3 class="feature-title">Add new Diagnose</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Patient Number" name="dPatient" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Diagnosis" rows="4" name="dDiagnosis"
                              required></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Medications" rows="4" name="dMedications"
                              required></textarea>
                </div>
                <div class="form-group">
                    Date:
                    <?php $date = date("Y-m-d");
                    echo $date;
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Add Diagnosis" name="addDiagnosis"
                       style="margin-bottom: 10px">
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['addDiagnosis'])) {
                    try {
                        $conn = new PDO($db, $un, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = "INSERT INTO `Diagnosis`(`Patient`, `Diagnosis`, `Medications`, `Date`,`Doc`) 
                            VALUES (?,?,?,?,?)";
                        $st = $conn->prepare($query);
                        $doc = $_SESSION["d_un"];
                        $st->bindValue(1, $_POST["dPatient"], PDO::PARAM_STR);
                        $st->bindValue(2, $_POST["dDiagnosis"], PDO::PARAM_STR);
                        $st->bindValue(3, $_POST["dMedications"], PDO::PARAM_STR);
                        $st->bindValue(4, $date, PDO::PARAM_STR);
                        $st->bindValue(5, $doc, PDO::PARAM_STR);
                        $st->execute();
                        echo "<script> alert('Diagnosis Added Successfully!');</script>";
                    } catch (PDOException $th) {
                        echo "<script> alert('Invalid patient number!');</script>";

                    }
                }
            }
            ?>
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

<?php
require("login-check/logincheck_A.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Register</title>
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
<?php
if (isset($_POST["btnEdit"])) {
    $_SESSION["editDNo"] = $_POST["btnEdit"];
    echo '<script>window.location.href = "update_doc.php";</script>';

}
if (isset($_POST["btnView"])) {
    $_SESSION["viewDNo"] = $_POST["btnView"];
    echo '<script>window.location.href = "doc_profile.php";</script>';
}
?>
<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <h3 class="feature-title">Search by Doctor Name</h3>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Doctors Name" name="txtSearch">
                </div>
                <input type="submit" class="btn btn-primary" value="Search" name="btnSearch">
            </form>
        </div>
    </div>
</div>
<div class="container features CardBgCol">
    <form method="post" enctype="multipart/form-data">
        <?php
        try {
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT `DID`, `Name`,`Day`,`Status` FROM `doctors` ";
            if (isset($_POST["btnSearch"])) {
                $query = $query . "where Name like '%" . $_POST['txtSearch'] . "%'";
                $click = true;
            }
            $result = $conn->query($query);
            if ($click == true) {
                echo '<table class="table" style="border:solid #dee2e6 1px;">';
                echo '<thead class="thead-dark">';
                echo '<tr>
                            <th scope="col">Doctor No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>';
                echo '</thead>';
                foreach ($result as $row) {
                    echo '<tbody>';
                    echo '<tr class="rw">';
                    echo '<td> <input type="hidden" name="pID[]" value="' . $row[0] . '">' . $row[0] . '</td>';
                    echo '<td> <input type="hidden" name="pName[]" value="' . $row[1] . '">' . $row[1] . '</td>';
                    if ($row[3] == "Active") {
                        $showStatus = "Remove";
                        $iconColor = "green";
                    } else {
                        $showStatus = "Add";
                        $iconColor = "red";
                    }
                    echo '<td style="vertical-align: middle;"><i class="fas fa-circle" style="color:' . $iconColor . '"></i> ' . $row[3] . '</td>';
                    echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto; width:80px !important;" name="btnStat" type="submit"  value="' . $row[0] . '">' . $showStatus . ' </button></td>';
                    echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto" name="btnEdit" type="submit"  value="' . $row[0] . '">Edit  </button></td>';
                    echo '</tr>';
                    echo ' </tbody>';
                }
                echo '</table>';
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
        ?>
        <?php
        try {
            if ($click == false) {
                $conn = new PDO($db, $un, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "SELECT `DID`, `Name`,`Day`,`Status` FROM `doctors` ORDER BY `Status` ASC ";
                $result = $conn->query($query);
                echo '<table class="table" style="border:solid #dee2e6 1px;">';
                echo '<thead class="thead-dark">';
                echo '<tr>
                            <th scope="col">Doctor No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            
                          </tr>';
                echo '</thead>';
                foreach ($result as $row) {
                    echo '<tbody>';
                    echo '<tr class="rw">';
                    echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" value="' . $row[0] . '">' . $row[0] . '</td>';
                    echo '<td style="vertical-align: middle;"> <input type="hidden" name="pName[]" value="' . $row[1] . '">' . $row[1] . '</td>';
                    if ($row[3] == "Active") {
                        $showStatus = "Remove";
                        $iconColor = "green";
                    } else {
                        $showStatus = "Add";
                        $iconColor = "red";
                    }
                    echo '<td style="vertical-align: middle;"><i class="fas fa-circle" style="color:' . $iconColor . '"></i> ' . $row[3] . '</td>';
                    echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto; width:80px !important;" name="btnStat" type="submit"  value="' . $row[0] . '">' . $showStatus . ' </button></td>';
                    echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto" name="btnEdit" type="submit"  value="' . $row[0] . '">Edit  </button></td>';
                    echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto" name="btnView" type="submit"  value="' . $row[0] . '">View  </button></td>';
                    echo '</tr>';
                    echo ' </tbody>';
                }
                echo '</table>';
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
        ?>
        <?php
        if (isset($_POST['btnStat'])) {
            changeState();
        }
        function changeState()
        {
            include("config.php");
            $A = $_POST['btnStat'];
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT `Status` FROM `doctors` WHERE `DID`=$A ";
            $resultS = $conn->query($query);
            foreach ($resultS as $rowS) {
                try {
                    if ($rowS[0] == "Inactive") {
                        $conn = new PDO($db, $un, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = "UPDATE `doctors` SET `Status`=? WHERE `DID`=$A";
                        $st = $conn->prepare($query);
                        $st->bindValue(1, "Active", PDO::PARAM_STR);
                        $st->execute();
                        echo "<script> alert('Doctor Added!');</script>";
                    } else {
                        $conn = new PDO($db, $un, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = "UPDATE `doctors` SET `Status`=? WHERE `DID`=$A";
                        $st = $conn->prepare($query);
                        $st->bindValue(1, "Inactive", PDO::PARAM_STR);
                        $st->execute();
                        echo "<script> alert('Doctor Removed!');</script>";
                    }
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            }
        }

        error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
        ?>
    </form>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#">Clinic Management System</a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav" id="nav">
            <?php
            if (isset($_SESSION["a_un"])) {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Manage Doctors
                </a>
                <div class="dropdown-menu" style="background-color:#343434" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" style="color: white" href="doc_register.php">Doctors Register</a>
                    <a class="dropdown-item" style="color: white" href="add_doctor.php">Add A New Doctor</a>
                    <a class="dropdown-item" style="color: white" href="change_password_Dadmin.php">Reset Doctor Password</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Manage Patients
                </a>
                <div class="dropdown-menu" style="background-color:#343434" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" style="color: white" href="register.php">Patient Register</a>
                    <a class="dropdown-item" style="color: white" href="report.php">View Patient Records</a>
                    <a class="dropdown-item" style="color: white" href="add.php">Add A New Patient</a>
                    <a class="dropdown-item" style="color: white" href="change_password_admin.php">Reset Patient Password</a>
                </div>';
            } else if (isset($_SESSION["d_un"])) {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="index_d.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Patient Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">New Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newDiagnose.php"> Add Diagnose</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="change_Dpassword.php"> Change Password</a>
            </li>';
            } else if (isset($_SESSION["p_un"])) {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="myprofile.php"> <i class="fas fa-user-alt"></i> My Profile</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="myrecords.php">My Records</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="change_password.php">Change Password</a>
            </li> ';
            } ?>
            <li class="nav-item">
                <form method="post">
                    <button class="logout" type="submit" name="logout">Logout <i class='fas fa-sign-out-alt'
                                                                                 style='color:white'></i></button>
                </form>
                <?php
                if (isset($_POST["logout"])) {
                    if (isset($_SESSION["p_un"])) {
                        unset($_SESSION["p_un"]);
                        echo '<script>window.location.href = "login.php";</script>';
                    } elseif (isset($_SESSION["a_un"])) {
                        unset($_SESSION["a_un"]);
                        echo '<script>window.location.href = "adminlogin.php";</script>';
                    } elseif (isset($_SESSION["d_un"])) {
                        unset($_SESSION["d_un"]);
                        unset($_SESSION["d_name"]);
                        echo '<script>window.location.href = "doctorlogin.php";</script>';
                    }
                }
                ?>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>
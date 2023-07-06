<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body class="bg">
<?php
if (isset($_SESSION["p_un"])) {
    include 'nav & footer/nav.php';
} else {
    include 'nav & footer/loginNav.php';
}
?>

<div class="container features CardBgCol">
    <div class="heading" style="margin-top: 0px !important;">
        <h1 class="heading__title" style="margin-top: 30px !important;">Clinic Management System</h1>
        <p class="heading__credits" style="margin-bottom: 0px !important;  font-weight: 400;"> Our System Software helps
            deliver superior healthcare delivery for doctors, clinics and hospitals.</p>
        <p class="heading__credits" style="    margin-bottom: 10px !important;font-weight: 400;font-size: 25px;">
            Designed by Team Error 404</p>
        <div class="heart-box">
            <img src="images/favicon.ico" class="heart">
        </div>
    </div>
</div>

<div class="container features ">
    <div class="row center CardBgCol">
        <div class=" col-md-12 ">
            <h1 class="cardTitle">Our Hospital</h1>
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.5881070161327!2d80.6322636!3d7.2876155!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36882b22910bf%3A0x82b71793a1e570c5!2sNational%20Hospital%20-%20Kandy!5e0!3m2!1sen!2slk!4v1648022317800!5m2!1sen!2slk"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container features ">
    <div class="row center CardBgCol">
        <div class=" col-md-12 ">
            <h1 class="cardTitle">About Us!</h1>
            <!--            <p class="aboutUs"><i class="fa fa-plus-square" style='font-size:48px;color:black'></i></p>-->
            <p class="aboutUs" style="margin-bottom: 20px">
                Team error 404 clinic management system ideal for health care professionals on the move or who are
                working from different hospitals. It's equivalent app can be access throw website on any mobile
                devices so you can access your medical patient record system anywhere you are.
            </p>
        </div>
    </div>
</div>
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
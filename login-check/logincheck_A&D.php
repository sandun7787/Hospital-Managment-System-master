<?php
session_start();

if (!isset($_SESSION["a_un"])) {
    $check = false;

}
if (!isset($_SESSION["d_un"])) {
    $check = false;

}
if ($check = false) {
    header("location:login.php");
}

?>
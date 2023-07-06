<?php
session_start();
if(!isset($_SESSION["p_un"]))
{
    header("location:login.php");
}
?>
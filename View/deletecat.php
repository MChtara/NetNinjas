<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/categorieC.php';
$categorieC = new categorieC();
$categorieC->deleteCategorie($_GET["id_cat"]);
$_SESSION['message'] = "Record Deleted Successfully";
$_SESSION['msg_type'] = "danger";
header('Location:listcat.php');

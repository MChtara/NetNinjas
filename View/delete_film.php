<?php
include '../Controller/filmC.php';
$filmC = new filmC();
$filmC->deleteFilm($_GET["id_film"]);
$_SESSION['message'] = "Record Deleted Successfully";
$_SESSION['msg_type'] = "danger";
header('Location:list_film.php');

<?php
include '../Controller/reservationR.php';
$reservationR = new reservationR();
$reservationR->deletereservation($_GET["id_res"]);
//header('Location:Listreservations.php');  
$_SESSION['message'] = "Record Deleted Successfully";
$_SESSION['msg_type'] = "danger";
header('Location:Listreservations.php');  




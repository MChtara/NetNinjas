<?php
include '../Controller/ticketC.php';
$ticketC = new ticketC();
$ticketC->deleteticket($_GET["id_ticket"]);
$_SESSION['message'] = "Record Deleted Successfully";
$_SESSION['msg_type'] = "danger";
header('Location:Listtickets.php');  




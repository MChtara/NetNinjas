<?php
include '../controller/comptetable.php';
$Comptetable = new compte_table();
$Comptetable->Supprimercompte($_GET["delete"]);
header('Location: afficherCompte.php');
?>
<?php
	include '../Controller/salleC.php';
	$salleC=new salleC();
	$salleC->supprimersalle($_POST["id_salle"]);
	header('Location:displaysalle.php');
?>
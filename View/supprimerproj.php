<?php
	include '../Controller/projC.php';
	$projC=new projC();
	$projC->supprimerproj($_POST["id_proj"]);
	header('Location:affproj.php');
?>
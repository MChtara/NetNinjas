<?php
include '../Controller/categorieC.php';
$categorieC = new categorieC();
$categorieC->deleteCategorie($_GET["id_cat"]);
header('Location:list_categorie.php');

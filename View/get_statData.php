<?php

// require_once '../partials/config.php';


/*
        $query = "SELECT c.nom_cat, COUNT(f.id_film) as nb_films FROM categorie c INNER JOIN film f ON c.id_cat = f.id_cat GROUP BY c.id_cat";
        $db = config::getConnexion();
        $stmt = $db->prepare($query); // Utilisation de la variable $db au lieu de $pdo
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
*/


//Configuration de base de donnee
$pdo = new PDO('mysql:host=localhost;dbname=filmopia', 'root', '');
$query = "SELECT c.nom_cat, COUNT(f.id_film) as nb_films FROM categorie c LEFT JOIN film f ON c.id_cat = f.id_cat GROUP BY c.id_cat";
// Query the database to retrieve the necessary data

$stmt = $pdo->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the data to JSON format
$json_data = json_encode($data);

// Return the JSON data to the client
header('Content-Type: application/json');
echo $json_data;
?>
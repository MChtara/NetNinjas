<?php
	include_once '../admin/partials/Config.php';
include '../Model/categorie.php';

class categorieC
{
    public function listCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCategorie($id)
    {
        $sql = "DELETE FROM categorie WHERE id_cat = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   function addCategorie($categorie)
   {
    $sql = "INSERT INTO categorie (nom_cat) VALUES (:nom_cat)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['nom_cat' => $categorie->getNomCat()]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
   }

function updateCategorie($categorie, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE categorie SET 
                nom_cat = :nom_cat
            WHERE id_cat= :id_cat'
        );
        $query->execute([
            'id_cat' => $id,
            'nom_cat' => $categorie->getNomCat(),
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

    function showCategorie($id)
    {
        $sql = "SELECT * from categorie where id_cat = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

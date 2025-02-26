<?php
	include_once '../admin/partials/Config.php';
include '../Model/film.php';

class filmC 
{
    public function listFilms()
    {
        $sql = "SELECT f.*, c.nom_cat FROM film f
        JOIN categorie c ON f.id_cat = c.id_cat
        ORDER BY f.id_film DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listFilmstri($order,$valuename)
    {
        $sql = "SELECT * FROM film ORDER BY $valuename $order LIMIT 5";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteFilm($id)
    {
        $sql = "DELETE FROM film WHERE id_film = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addFilm($film)
    {
        $sql = "INSERT INTO film 
        VALUES (NULL, :titre,:realisateur, :duree,:synopsis, :annee, :id_cat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $film->getTitre_film(),
                'realisateur' => $film->getRealisateur_film(),
                'duree' => $film->getDurree_film(),
                'synopsis' => $film->getSynopsis_film(),
                'annee' => $film->getAnnee_film(),
                'id_cat' => $film->getId_cat()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateFilm($film, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE film SET 
                    titre = :titre, 
                    realisateur = :realisateur, 
                    duree = :duree, 
                    synopsis = :synopsis,
                    annee = :annee,
                    id_cat = :id_cat
                WHERE id_film= :id_film'
            );
            $query->execute([
                'id_film' => $id,
                'titre' => $film->getTitre_film(),
                'realisateur' => $film->getRealisateur_film(),
                'duree' => $film->getDurree_film(),
                'synopsis' => $film->getSynopsis_film(),
                'annee' => $film->getAnnee_film(),
                'id_cat' => $film->getId_cat()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showfilm($id)
    {
        $sql = "SELECT * from film where id_film = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $film = $query->fetch();
            return $film;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}


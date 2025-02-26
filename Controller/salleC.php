<?php
include_once '../admin/partials/Config.php';
require_once '../Model/salle.php';
class salleC{
    public function addSalle($salle){
        $sql = "INSERT INTO salles (nom_salle, nb_places, H_ouv, H_ferm,latitude,longitude) VALUES (:nom_salle, :nb_places, :H_ouv, :H_ferm,:latitude,:longitude)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
            'nom_salle'=> $salle->getnomsalle(),
            'nb_places'=>$salle->getnbplaces(),
            'H_ouv'=> $salle->gethouv(),
            'H_ferm'=>$salle->gethferm(),
            'latitude'=> $salle->getlatitude(),
            'longitude'=> $salle->getlongitude()
            ]);
        } catch (Exception $e) {
            echo ('Error: '.$e->getMessage());
        }
    }  
    function afficherSalle(){
        $sql="SELECT * FROM salles ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function supprimersalle($id){
        $sql="DELETE FROM salles WHERE id_salle=:id_salle";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue('id_salle', $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            echo('Erreur:'. $e->getMessage());
        }
    }
    function modifiersalles($salle, $id_salle){
        try {
            $db = Config::getConnexion();
    
            $query = $db->prepare(
                "UPDATE salles SET 
                    nom_salle = :nom_salle, 
                    nb_places = :nb_places, 
                    H_ouv = :H_ouv,
                    H_ferm = :H_ferm,
                    latitude = :latitude,
                    longitude = :longitude
                WHERE id_salle = :id_salle"
            );
            var_dump($query);
            $query->execute([
                'nom_salle'=> $salle->getnomsalle(),
                'nb_places'=>$salle->getnbplaces(),
                'H_ouv'=> $salle->gethouv(),
                'H_ferm'=>$salle->gethferm(),
                'latitude'=>$salle->getlatitude(),
                'longitude'=>$salle->getlongitude(),
                'id_salle'=>$id_salle
            ]); 
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error updating record: " . $e->getMessage();
        }
    }
   
    function recuperersalle($id_salle) {
        $sql="SELECT * from salles where id_salle=$id_salle";
        $db = Config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $salle=$query->fetch();
            return $salle;
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    

function affichertri()
{
    $sql="SELECT * from salles ORDER BY  nb_places DESC";
    $db = Config::getConnexion();
    try{
        $salle=$db->query($sql);
        return $salle;
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}
}
<?php
include_once '../admin/partials/Config.php';
require_once '../Model/salle.php';
class projC{
    public function addProj($projection){
        $sql = "INSERT INTO projections (h_proj, id_film, id_salle, date_proj) VALUES (:h_proj, :id_film, :id_salle, :date_proj)";
        $db = Config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
            'h_proj'=> $projection->gethproj(),
            'id_film'=> $projection->getidfilm(),
            'id_salle'=> $projection->getidsalle(),
            'date_proj'=>$projection->getdate()
            ]);
        } catch (Exception $e) {
            echo ('Error: '.$e->getMessage());
        }

    }  
    function afficherProj(){
        $sql="SELECT * FROM projections";
        $db = Config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function supprimerproj($id){
        $sql="DELETE FROM projections WHERE id_proj=:id_proj";
        $db = Config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue('id_proj', $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            echo('Erreur:'. $e->getMessage());
        }
    }
    function modifierproj($projection, $id_proj){
        try {
            $db = Config::getConnexion();
    
            $query = $db->prepare(
                "UPDATE projections SET 
                    h_proj = :h_proj, 
                    id_film = :id_film,
                    id_salle = :id_salle,
                    date_proj = :date_proj, 
                WHERE id_proj = :id_proj"
            );
            var_dump($query);
            $query->execute([
                'h_proj'=> $projection->gethproj(),
                'id_film'=> $projection->getidfilm(),
                'id_salle'=> $projection->getidsalle(),
                'date_proj'=>$projection->getdate(),
                'id_proj'=>$id_proj
            ]); 
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error updating record: " . $e->getMessage();
        }
    }
   
    function recupererproj($id_proj) {
        $sql="SELECT * from projections where id_proj=$id_proj";
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
    /*function recupererids()
    {
        $sql="SELECT * FROM salles ";
        $db = Config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }*/
    function hasfilm($date_proj)
    {
       
        try {
            $PDO = Config::getConnexion();
            $stmt = $PDO->prepare("SELECT * FROM projections WHERE date_proj = :date_proj");
            // Bind the parameter value
            $stmt->bindParam(':date_proj', $date_proj);
            // Execute the query
            $stmt->execute();
    

            if($stmt->fetchColumn() > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
            // Print the result   
        }
        catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
            exit;
        }
        } 
    
    function afficherProjFront($date_proj)
{
   
    try {
        $PDO = Config::getConnexion();
        $stmt = $PDO->prepare("SELECT * FROM projections WHERE date_proj = :date_proj");
        // Bind the parameter value
        $stmt->bindParam(':date_proj', $date_proj);
        // Execute the query
        $stmt->execute();

        // Fetch the data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Print the result
        return $result;    
    }
    catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        exit;
    }
    } 
    function recupererproj_par_film($id_film,$date_proj)
{
   
    try {
        $PDO = Config::getConnexion();
        $stmt = $PDO->prepare("SELECT * FROM projections WHERE date_proj = :date_proj AND id_film=:id_film");
        // Bind the parameter value
        $stmt->bindParam(':date_proj', $date_proj);
        $stmt->bindParam(':id_film', $id_film);
        // Execute the query
        $stmt->execute();

        // Fetch the data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Print the result
        return $result;    
    }
    catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        exit;
    }
    } 

}
    
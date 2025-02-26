<?php
	include_once '../admin/partials/Config.php';
    include_once '../Model/reservation.php';

class reservationR{
    public function Listreservations()
    {
        $sql = "SELECT * FROM  reservation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletereservation($id)
    {
        $sql = "DELETE FROM  reservation WHERE id_res= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function isreserved($id_proj,$chair)
    {
        $sql = "SELECT * FROM reservation WHERE id_proj = :id_proj AND siege = :siege";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_proj' => $id_proj,
                'siege' => $chair
            ]);
            $query->execute();
            $results = $query->fetchAll();

            if (count($results) > 0) {
                return true;
            }
            else
            {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
            return false;
        }
    }
   function addreservation($reservation)
    {
        $sql = "INSERT INTO reservation 
        VALUES (NULL,:id_ticket,:id_user,:siege,:etat,:id_proj)"; 
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_user' => $reservation->getId_user(),
                'id_ticket' => $reservation->getId_ticket(),
                'siege' => $reservation->getSiege(),
                'etat' => $reservation->getEtat(),
                'id_proj' => $reservation->getId_proj()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updatereservation($reservation,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                   id_user = :id_user, 
                   id_ticket = :id_ticket, 
                    siege = :siege, 
                    etat = :etat,
                    id_proj = :id_proj

                WHERE id_res = :id_res'
            );
           
           $query->execute([
                'id_res' => $id,
                'id_user' => $reservation->getId_user(),
                'id_ticket' => $reservation->getId_ticket(),
                'siege' => $reservation->getSiege(),
                'etat' => $reservation->getEtat(),
                'id_proj' => $reservation->getId_proj()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showreservation($id)
    {
        $sql = "SELECT * from  reservation where id_res  = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function recherche($etat)
    {
        $requete = "SELECT * FROM reservation WHERE etat = :etat";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->bindParam(":etat", $etat);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result;
        } catch (PDOException $th) {
            echo "Erreur: " . $th->getMessage();
        }
    }
    


        function trier($critere, $order) {
            $sql = "SELECT * from reservation ORDER BY $critere $order";
            $db = config::getConnexion();
            try {
                $req = $db->query($sql);
                return $req;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        
        
}

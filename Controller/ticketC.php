<?php
	include_once '../admin/partials/Config.php';
    include_once '../Model/ticket.php';

class ticketC{
    public function Listtickets ()
    {
        $sql = "SELECT * FROM  ticket";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteticket($id)
    {
        $sql = "DELETE FROM  ticket WHERE id_ticket= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   function addticket($ticket)
    {
        $sql = "INSERT INTO  ticket 
        VALUES (NULL,:type,:prix)"; 
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $ticket->gettype(),
                'prix' => $ticket->getprix()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateticket($ticket,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE  ticket SET 
                    type = :type,
                    prix = :prix

                WHERE id_ticket= :id_ticket'
            );
            $query->execute([
                'id_ticket' => $id,
                'type' => $ticket->gettype(),
                'prix' => $ticket->getprix()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showticket($id)
    {
        $sql = "SELECT * from ticket where id_ticket  = $id";
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
    
}

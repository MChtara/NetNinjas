<?php
	include_once '../admin/partials/Config.php';


class dashboardC 
{
    function ListeCompte(){
        $sql='SELECT COUNT(*) FROM user';
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste->fetchColumn();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function ListeAbonnement(){
        $sql='SELECT COUNT(*) FROM abonnement';
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste->fetchColumn();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function ListeReservation(){
        $sql='SELECT COUNT(*) FROM reservation';
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste->fetchColumn();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function ListeProjection(){
        $sql='SELECT COUNT(*) FROM projections';
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste->fetchColumn();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
}


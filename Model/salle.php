<?php
class salle {
private  $id_salle=null;
private  $nom_salle=null;
private  $latitude=null;
private  $longitude=null;
private  $nb_places=null;
private  $H_ouv=null;
private  $H_ferm=null;
private $t_idProj;
public function getIds (){
    return $this->id_salle;
}
public function getnomsalle (){
    return $this->nom_salle;
}
public function getlatitude (){
    return $this->latitude;
}
public function getlongitude (){
    return $this->longitude;
}
public function getnbplaces (){
    return $this->nb_places;
}
public function gethouv (){
    return $this->H_ouv;
}
public function gethferm (){
    return $this->H_ferm;
}

public function gett_idProj(){
    return $this->t_idProj;
}
 function __construct( $nom_salle, $H_ouv, $H_ferm, $nb_places,$latitude,$longitude)
{

    $this->nom_salle=$nom_salle;
    $this->H_ouv=$H_ouv;
    $this->H_ferm=$H_ferm;
    $this->nb_places=$nb_places;
    $this->latitude=$latitude;
    $this->longitude=$longitude;
}
};
?>
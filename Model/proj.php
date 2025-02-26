<?php
class projection {
private  $id_proj=null;
private  $H_proj=null;
private  $id_film=null;
private  $id_salle=null;
private  $date_proj=null;
public function getId_proj (){
    return $this->id_proj;
}
public function gethproj (){
    return $this->H_proj;
}
public function getidfilm (){
    return $this->id_film;
}
public function getidsalle (){
    return $this->id_salle;
}
public function getdate (){
    return $this->date_proj;
}
 function __construct( $H_proj, $id_film, $id_salle, $date)
{

    $this->H_proj=$H_proj;
    $this->id_film=$id_film;
    $this->id_salle=$id_salle;
    $this->date_proj=$date;
    
}
};
?>
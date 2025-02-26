<?php
class ticket{
    private ?int $id_ticket = null ;
    private ?string $type =null ;
    private ?int $prix =null ;


    public function __construct($id_ticket=null, $type, $prix)
    {
        $this->type = $type;
        $this->prix = $prix;

    }

    public function getid_ticket()
    {
        return $this->id_ticket;
    }
   

    public function gettype()
    {
        return $this->type;
    }
    public function settype($type)
    {
         $this-> type=$type;
        return $this;
    }

    public function getprix()
    {
      return  $this->prix ;

    }
    public function setprix($prix)
    {
         $this-> prix=$prix;
        return $this;
    }
}

    
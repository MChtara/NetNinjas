<?php
class reservation{
    private ?int $id_res = null ;
    private ?int $id_user = null ;
    private ?int $id_ticket = null ;
    private ?int $siege = null;
    private ?string $etat =null ;
    private ?int $id_proj =null ;


    public function __construct($id_res=null, $id_user,$id_ticket, $siege,$etat,$id_proj)
    {
        $this->id_res = $id_res;
        $this->id_user = $id_user;
        $this->id_ticket= $id_ticket;
        $this->siege = $siege;
        $this->etat= $etat;
        $this->id_proj = $id_proj;

    }

    public function getid_res()
    {
        return $this->id_res;
    }
   

    public function getId_user()
    {
        return $this->id_user;
    }
    public function setId_user($id_user)
    {
         $this-> id_user=$id_user;
        return $this;
    }
    public function getId_ticket()
    {
        return $this->id_ticket;
    }
    public function setId_ticket($id_ticket)
    {
         $this-> id_ticket=$id_ticket;
        return $this;
    }

    public function getSiege()
    {
      return  $this->siege ;

    }

    public function getEtat()
    {
      return  $this->etat ;

    }
   
    public function getId_proj()
    {
        return $this->id_proj;
    }
    public function setId_proj($id_proj)
    {
       $this-> id_proj = $id_proj;
        return $this;
    }

}


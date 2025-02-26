<?php

class Film
{
    private ?int $id_film = null;
    private ?string $titre = null;
    private ?string $realisateur = null;
    private ?int $duree = null;
    private ?string $synopsis = null;
    private ?string $image = null;
    private ?string $annee = null;
    private ?int $id_cat = null;

    public function __construct($id_f = null, $t, $r, $d, $s, $a,$cat)
    {
        $this->id_film = $id_f;
        $this->titre = $t;
        $this->realisateur = $r;
        $this->duree = $d;
        $this->synopsis = $s;
        $this->annee = $a;
        $this->id_cat = $cat;
    }

    public function getId_film()
    {
        return $this->id_film;
    }
    public function getId_cat()
    {
        return $this->id_cat;
    }
    public function getTitre_film()
    {
        return $this->titre;
    }
    public function getRealisateur_film()
    {
        return $this->realisateur;
    }
    public function getAnnee_film()
    {
        return $this->annee;
    }
    public function getDurree_film()
    {
        return $this->duree;
    }
    public function getSynopsis_film()
    {
        return $this->synopsis;
    }

    public function getImage_film()
    {
        return $this->image;
    }

    public function setTitre_film($titre)
    {
        $this->titre = $titre;
        return $this;
    }
    public function setId_cat($id_cat)
    {
        $this->id_cat = $id_cat ;
        return $this;
    }

}
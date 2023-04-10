<?php
class categorie
{
    private ?int $id_cat = null;
    private ?string $nom_cat = null;

    public function __construct($id = null, $nom)
    {
        $this->id_cat = $id;
        $this->nom_cat = $nom;
    }

    /**
     * Get the value of id_cat
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * Get the value of name Categorie
     */
    public function getNomCat()
    {
        return $this->nom_cat;
    }

    /**
     * Set the value of Nom Cat
     *
     * @return  self
     */
    public function setNomCat($nom_cat)
    {
        $this->nom_cat = $nom_cat;

        return $this;
    }

}
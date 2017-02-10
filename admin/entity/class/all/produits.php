<?php

namespace Noneslad\Entity;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model;
use Noneslad\Tools\DB\model as DB;
class produits extends model

{
    protected $id;
    protected $nom;
    protected $pdf;
    protected $cat;
    protected $date_c;
    protected $date_m;
    protected $id_lang;
    protected $reference;
    protected $code_barre;
    protected $actif;
    protected $etat;
    protected $resume;
    protected $description;
    protected $prix_ht;
    protected $prix_ttc;
    protected $taxe;
    protected $balise_titre;
    protected $meta_desc;
    protected $quantite;
    protected $image;
    protected $fournisseur;

 

     public function __construct($id = false)
    {
        parent::__construct();
        if($id !== false){
            $this->id = $id;
            $this->load();
        }
    }
       public function getId()
    {
        return $this->id;
    }
     public function setId($id)
    {
        $this->id = $id;
    }
    /*--------------------------------*/
   
    public function getNom()
    {
        return $this->nom;
    }
     public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    /*--------------------------------*/
     public function getDate_c()
    {
        return $this->date_c;
    }
     public function setDate_c($date_c)
    {
        $this->date_c = $date_c;
    }
/*--------------------------------*/
 public function getDate_m()
    {
        return $this->date_m;
    }
     public function setDate_m($date_m)
    {
        $this->date_m = $date_m;
    }
/*--------------------------------*/
 public function getId_lang()
    {
        return $this->id_lang;
    }
     public function setId_lang($id_lang)
    {
        $this->id_lang = $id_lang;
    }
/*--------------------------------*/
    public function upload($term) {
        $dest = EXT_UPLOAD_DIR . $_FILES[$term]['name'];
        move_uploaded_file($_FILES[$term]['tmp_name'], $dest);
        $dest = $_FILES[$term]['name'];
        return $dest;
    }
    function setPdf ($term) {
        $this->pdf = $this->upload($term);
    }
     public function getPdf()
    {
        return $this->pdf;
    }
    /*--------------------------------*/
    public function getCat()
    {
        return $this->cat;
    }
    public function setCat($cat)
    {
        $this->cat = $cat;
    }
    /*------------------------------------------*/
    public function getReference()
    {
        return $this->reference;
    }
    public function setReference($reference)
    {
        $this->reference = $reference;
    }
    /*------------------------------------------*/
    public function getCode_barre()
    {
        return $this->code_barre;
    }
    public function setCode_barre($code_barre)
    {
        $this->code_barre = $code_barre;
    }
    /*------------------------------------------*/
    public function getActif()
    {
        return $this->actif;
    }
    public function setActif($actif)
    {
        $this->actif = $actif;
    }
    /*------------------------------------------*/
    public function getEtat()
    {
        return $this->etat;
    }
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
    /*------------------------------------------*/
    public function getResume()
    {
        return $this->resume;
    }
    public function setResume($resume)
    {
        $this->resume = $resume;
    }
    /*------------------------------------------*/
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /*------------------------------------------*/
    public function getPrix_ht()
    {
        return $this->prix_ht;
    }
    public function setPrix_ht($prix_ht)
    {
        $this->prix_ht = $prix_ht;
    }
    /*------------------------------------------*/
    public function getPrix_ttc()
    {
        return $this->prix_ttc;
    }
    public function setPrix_ttc($prix_ttc)
    {
        $this->prix_ttc = $prix_ttc;
    }
    /*------------------------------------------*/
    public function getTaxe()
    {
        return $this->taxe;
    }
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;
    }
    /*------------------------------------------*/
    public function getBalise_titre()
    {
        return $this->balise_titre;
    }
    public function setBalise_titre($balise_titre)
    {
        $this->balise_titre = $balise_titre;
    }
    /*------------------------------------------*/
    public function getMeta_desc()
    {
        return $this->meta_desc;
    }
    public function setMeta_desc($meta_desc)
    {
        $this->meta_desc = $meta_desc;
    }
    /*------------------------------------------*/
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }
    /*------------------------------------------*/
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    /*------------------------------------------*/
    public function getFournisseur()
    {
        return $this->fournisseur;
    }
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;
    }
    /*------------------------------------------*/
  
}
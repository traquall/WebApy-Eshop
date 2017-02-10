<?php

namespace Noneslad\Entity;

use Noneslad\Tools\DB\model as DB;
use Noneslad\Tools\WebTools;

class image extends DB {

    protected $id;
    protected $nom;
    protected $type;
    protected $url;
    protected $alt;
    protected $affichage;
    protected $ordre;

    /**
     * PageWeb constructor.
     * @param $id
     */
    public function __construct($id = false) {
        parent::__construct();
        if ($id !== false) {
            $this->id = $id;
            $this->load();
        }
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getType() {
        return $this->type;
    }

    function getUrl() {
        return $this->url;
    }

    function getAlt() {
        return $this->alt;
    }
     function getOrdre() {
        return $this->ordre;
    }
    function getAffichage() {
        return $this->affichage;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }
    function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

    function setType($type) {
        $this->type = $type;
    }
     function setAffichage($affichage) {
        $this->affichage = $affichage;
    }

    function setUrl($term) {
        $this->url = $this->upload($term);
    }

    function setAlt($alt) {
        $this->alt = $alt;
    }


    public function upload($term) {

        $dest = UPLOAD_DIR . $_FILES[$term]['name'];
        move_uploaded_file($_FILES[$term]['tmp_name'], $dest);
        return $dest;
    }

    public function aff(){
$image = new image(WebTools::fromRequest('id'));
        if($image->getAffichage()==1){
            return"glyphicon glyphicon-eye-open";

        }else{
            return"glyphicon glyphicon-eye-close";
        }
    }

     public function getImg(){
        $sql = "select count(*) AS nb from image ";

        return DB::get_sql_object($sql);
         
    } 

     public function imgList(){
        $sql = "select id from image WHERE affichage=1 AND type='image' ORDER BY ordre ";
        return DB::get_sql_tab($sql);
         
    } 

}

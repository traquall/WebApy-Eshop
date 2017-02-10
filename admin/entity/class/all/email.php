<?php

namespace Noneslad\Entity;

use Noneslad\Tools\DB\model as DB;
use Noneslad\Tools\WebTools;

class email extends DB {

    protected $id;
    protected $nom;
    protected $adresse;
    protected $email;
    protected $message;
    protected $phone;
    protected $objet;

    protected $cp;
    protected $soci;
    protected $vousetes;
    protected $ville;
    protected $civilite;
    protected $prenom;
   

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

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }
 public function setId($id) {
        $this->id = $id;
    }
     public function getPhone() {
        return $this->phone;
    }
 public function setPhone($phone) {
        $this->phone = $phone;
    }
     public function getObjet() {
        return $this->objet;
    }
 public function setObjet($objet) {
        $this->objet = $objet;
    }
    /**
     * @return mixed
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getemail() {
        return $this->email;
    }

    /**
     * @param mixed $prenom
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * @param mixed $email
     */
    public function setemail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param mixed $password
     */
    public function setMessage($message) {
        $this->message = $message;
    }
    /****************************/
     public function getCp() {
        return $this->cp;
    }

    /**
     * @param mixed $password
     */
    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function getSoci() {
        return $this->soci;
    }

    /**
     * @param mixed $password
     */
    public function setSoci($soci) {
        $this->soci = $soci;
    }

    public function getVousetes() {
        return $this->vousetes;
    }

    /**
     * @param mixed $password
     */
    public function setVousetes($vousetes) {
        $this->vousetes = $vousetes;
    }

    public function getCivilite() {
        return $this->civilite;
    }

    /**
     * @param mixed $password
     */
    public function setCivilite($civilite) {
        $this->civilite = $civilite;
    }
    public function getVille() {
        return $this->ville;
    }

    /**
     * @param mixed $password
     */
    public function setVille($ville) {
        $this->ville = $ville;
    }
     public function getPrenom() {
        return $this->prenom;
    }

    /**
     * @param mixed $password
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

   
    public function hydrayeByStdObject($stdObject) {

        $this->id = $stdObject->id;
        $this->nom = $stdObject->nom;
        $this->adresse = $stdObject->adresse;
        $this->email = $stdObject->email;
        $this->message = $stdObject->message;
        $this->phone = $stdObject->phone;
        $this->objet = $stdObject->objet;

        $this->prenom = $stdObject->prenom;
        $this->ville = $stdObject->ville;
        $this->civilite = $stdObject->civilite;
        $this->soci = $stdObject->soci;
        $this->vousetes = $stdObject->vousetes;
        $this->cp = $stdObject->cp;



        return $this;
    }

    public function getUserByemail() {

        $stdObject = $this->findOneBy(array("email" => $this->email));

        if (is_object($stdObject)) {
            $this->hydrayeByStdObject($stdObject);
        }

        return $this;
    }

   

     

}

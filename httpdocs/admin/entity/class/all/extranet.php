<?php

namespace Noneslad\Entity;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model;
use Noneslad\Tools\DB\model as DB;
class extranet extends model
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $login;
    protected $mot_de_passe;
    protected $date_connexion;
   

    /**
     * extranet constructor.
     * @param $id
     */
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

   /*------------------------------*/

    public function getNom()
    {
        return $this->nom;
    }
      public function setNom($nom)
    {
        $this->nom = $nom;
    }
    /*-------------------------------*/
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    /*-------------------------------------*/
     public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    /*------------------------------------*/
    
     public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }
    /*------------------------------------*/
     public function getMot_de_passe()
    {
        return $this->mot_de_passe;
    }

    public function setMot_de_passe($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }
    /*------------------------------------*/
     public function getdate_connexion()
    {
        return $this->date_connexion;
    }

    public function setdate_connexion($date_connexion)
    {
        $this->date_connexion = $date_connexion;
    }
    /*------------------------------------*/
     public function connectextranet() {

        $this->load();
        $_SESSION['login'] = $this->getId();
    }

    public static function disconnectextranet() {
        unset($_SESSION['login']);
        
    }

    public static function isAnyConnected() {
        return WebTools::fromSession('login');
    }

    /* Permet de recuperer un extranet sur un autre page du site */

    public static function giveMeextranet() {

        $extranet = new extranet(WebTools::fromSession('login'));
        return $extranet;
    }

    public function hydrayeByStdObject($stdObject) {

        $this->id = $stdObject->id;
        $this->nom = $stdObject->nom;
        $this->prenom = $stdObject->prenom;
        $this->email = $stdObject->email;
        $this->password = $stdObject->password;

        return $this;
    }

    public function getextranetByLogin() {

        $stdObject = $this->findOneBy(array("login" => $this->login));

        if (is_object($stdObject)) {
            $this->hydrayeByStdObject($stdObject);
        }

        return $this;
    }

    public function validatePassword($passwordForm) {

        return sha1($passwordForm) == $this->mot_de_passe;
    }

    public static function EmailExiste($login) {

        $sql = "select * from extranet where email = '" . $login . "'";
        $resultat = DB::get_sql_object($sql)->id;
        return $resultat == null ? false : true;
    }

    
}
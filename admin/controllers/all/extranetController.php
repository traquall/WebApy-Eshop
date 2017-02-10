<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\extranet;
use Noneslad\Tools\DB\model as DB;


class extranetController {

    public static function routing(){
        switch (WebTools::fromRequest('action')){
             case 'connexion' :
                self::connexion();
                break;
             case 'create' :
                self::create();
                break;
            case 'read' :
                self::read();
                break;
            case 'update' :
                self::update();
                break;
            case 'delete' :
                self::delete();
                break;
                case 'deconnexion' :
                self::deconnexion();
                break;
            default :
                include 'views/components/extranet/list.php';
                break;
        }
    }
   


   
 
   

  


    
     public static function connexion() {
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/extranet/connexion.php';
                break;
            case 'POST':

                /* On crÃ©e un utilisateur et on stock l'email du formulaire dedans */
                $extranet = new extranet();
                $extranet->setLogin(WebTools::fromRequest('login'));

                /* On vÃ©rifie sir l"utilisateur existe par rapport Ã  l'email saisie dans le formulaire */
                $extranet->getextranetByLogin();
               
                if ($extranet->getId() == null) {
                    WebTools::setInFlashBag("Notice","Ce compte n'existe pas !");
                    WebTools::redirect("?page=extranet&action=connexion");
                    break;
                }

                else{

                     if ($extranet->validatePassword(WebTools::fromRequest('password'))){
                        $extranet->connectextranet();
                         WebTools::redirect("?page=admin");
                     }
                       


                else {
                        // Ici mettre un flashBag + rediriger vers le formulaire de connexion
                        WebTools::setInFlashBag("Notice","Le mot de passe entrer ne correspondant pas au Login. Réessayer!");
                        WebTools::redirect("?page=extranet&action=connexion");
                    }
            }

            break;
        }
    }

  
    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/extranet/new.php';
                break;
            case 'POST':
                $extranet = new extranet();
                $extranet->setNom(WebTools::fromRequest('nom'));
                $extranet->setPrenom(WebTools::fromRequest('prenom'));
                $extranet->setEmail(WebTools::fromRequest('email'));
                $extranet->setLogin(WebTools::fromRequest('login'));
                $pass = WebTools::fromRequest('pass');
                $paasi = sha1($pass);
                $extranet->setMot_de_passe($paasi);
              
                $extranet->insert();
                WebTools::setInFlashBag('Notice', "Le membre ".$extranet->getNom()." : ".$extranet->getPrenom()." &agrave; &eacute;t&eacute; enregistr&eacute; avec succ&egrave;s !");
                include 'views/components/extranet/list.php';
                break;
        }
    }

    public static function read(){
        $extranet = new extranet(WebTools::fromRequest('id'));
        include 'views/components/extranet/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $extranet = new extranet(WebTools::fromRequest('id'));
                $formData['id'] = $extranet->getId();
                $formData['nom'] = $extranet->getNom();
                $formData['prenom'] = $extranet->getPrenom();
                $formData['email'] = $extranet->getEmail();
                
                

                include 'views/components/extranet/edit.php';
                break;
            case 'POST':
                $extranet = new extranet(WebTools::fromRequest('id'));
                $extranet->setId(WebTools::fromRequest('id'));
                $extranet->setNom(WebTools::fromRequest('nom'));
                $extranet->setPrenom(WebTools::fromRequest('prenom'));
                $extranet->setEmail(WebTools::fromRequest('email'));
                $extranet->setLogin(WebTools::fromRequest('login'));
               
                $pa = sha1(WebTools::fromRequest('pass'));
                $pas = sha1(WebTools::fromRequest('password'));

                $mdp = $extranet->getMot_de_passe();
                if($mdp!=$pa){
                   
                 WebTools::setInFlashBag('Notice',"Ancien mot de passe non valide");
                
                
                }else{
                     $extranet->setMot_de_passe($pas);
                    
                    
                WebTools::setInFlashBag('Notice', "Le membre ".$extranet->getNom()." : ".$extranet->getPrenom()." &agrave; &eacute;t&eacute; modifi&eacute; avec succ&egrave;s !");
               
                
                }
                $extranet->update();
                 include 'views/components/extranet/list.php';

                break;
        }
    }
    public static function delete(){
        $extranet = new extranet(WebTools::fromRequest('id'));
        $extranet->delete();
        WebTools::setInFlashBag('Notice', "Le membre ".$extranet->getNom()." : ".$extranet->getPrenom()." &agrave; &eacute;t&eacute; supprim&eacute; !");
        include 'views/components/extranet/list.php';


    }

    public static function findAll(){
        $staticextranet = new extranet();
        return $staticextranet->find_all();
    }

   


 
    /* Cette fonction permet de deconnecter un utilisateur */
    public static function deconnexion() {

        extranet::disconnectextranet();
        WebTools::setInFlashBag("Notice","Vous &ecirc;tes maintenant d&eacute;connect&eacute; !");
       // WebTools::redirect("?page=accueil");
        echo "<META http-equiv='refresh' content='0.01; URL=?&page=extranet&action=connexion'>";

    }
 

}

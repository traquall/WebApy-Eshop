<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\user;
use Noneslad\Tools\DB\model as DB;


class UserSiteController {

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
                include 'views/components/user/list.php';
                break;
        }
    }
   


   
 
   

  


    
     public static function connexion() {
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/user/connexion.php';
                break;
            case 'POST':

                /* On crée un utilisateur et on stock l'email du formulaire dedans */
                $user = new User();
                $user->setEmail(WebTools::fromRequest('email'));

                /* On vÃ©rifie sir l"utilisateur existe par rapport Ã  l'email saisie dans le formulaire */
                $user->getUserByEmail();
               
                if ($user->getId() == null) {
                    WebTools::setInFlashBag("Notice","Ce compte n'existe pas !");
                    WebTools::redirect("?page=user&action=connexion");
                    break;
                }

                else {

                    if ($user->validatePassword(WebTools::fromRequest('password'))) {
                        $user->connectUser();
                        
                        if($user->getNiveau()==40){
                             WebTools::redirect("?page=admin");
                        }else{
                             WebTools::redirect("?page=espace");
                        }
                       
                    }

                    else {
                        // Ici mettre un flashBag + rediriger vers le formulaire de connexion
                        WebTools::setInFlashBag("Notice","Le mot de passe entrer ne correspondant pas au Login. Réessayer!");
                        WebTools::redirect("?page=user&action=connexion");
                    }

                }

            break;
        }
    }

  
    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/user/new.php';
                break;
            case 'POST':
                $user = new user();
                $user->setNom(WebTools::fromRequest('nom'));
                $user->setPrenom(WebTools::fromRequest('prenom'));
                $user->setEmail(WebTools::fromRequest('email'));
                $pass = WebTools::fromRequest('password');
                $paasi = sha1($pass);
                $user->setPassword($paasi);
                $user->setNiveau(40);
                $user->insert();
                WebTools::setInFlashBag('Notice', "L'utilisateur ".$user->getNom()." : ".$user->getPrenom()." &agrave; &eacute;t&eacute; enregistr&eacute; avec succ&egrave;s !");
                include 'views/components/user/list.php';
                break;
        }
    }

    public static function read(){
        $user = new user(WebTools::fromRequest('id'));
        include 'views/components/user/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $user = new user(WebTools::fromRequest('id'));
                $formData['id'] = $user->getId();
                $formData['nom'] = $user->getNom();
                $formData['prenom'] = $user->getPrenom();
                $formData['email'] = $user->getEmail();
                
                

                include 'views/components/user/edit.php';
                break;
            case 'POST':
                $user = new user(WebTools::fromRequest('id'));
                $user->setId(WebTools::fromRequest('id'));
                $user->setNom(WebTools::fromRequest('nom'));
                $user->setPrenom(WebTools::fromRequest('prenom'));
                $user->setEmail(WebTools::fromRequest('email'));
               
                $pa = sha1(WebTools::fromRequest('apassword'));

                $mdp = $user->getPassword();
                if($mdp==$pa){
                     $user->setPassword(sha1(WebTools::fromRequest('password')));
                    $user->update();
                     WebTools::setInFlashBag('Notice', "L'utilisateur ".$user->getNom()." : ".$user->getPrenom()." &agrave; &eacute;t&eacute; modifi&eacute; avec succ&egrave;s !");
                include 'views/components/user/list.php';
                }else{
                WebTools::setInFlashBag('Notice',"Ancien mot de passe non valide");
                include 'views/components/user/list.php';
                
                }

                break;
        }
    }
    public static function delete(){
        $user = new user(WebTools::fromRequest('id'));
        $user->delete();
        WebTools::setInFlashBag('Notice', "L'utilisateur ".$user->getNom()." : ".$user->getPrenom()." &agrave; &eacute;t&eacute; supprim&eacute; !");
        include 'views/components/user/list.php';


    }

    public static function findAll(){
        $staticuser = new user();
        return $staticuser->find_all();
    }

   


 
    /* Cette fonction permet de deconnecter un utilisateur */
    public static function deconnexion() {

        user::disconnectuser();
        WebTools::setInFlashBag("Notice","Vous &ecirc;tes maintenant d&eacute;connect&eacute; !");
       // WebTools::redirect("?page=accueil");
        echo "<META http-equiv='refresh' content='0.01; URL=?&page=user&action=connexion'>";

    }
 

}

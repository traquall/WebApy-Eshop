<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\email;
use Noneslad\Tools\DB\model as DB;


class emailController {

    public static function routing(){
        switch (WebTools::fromRequest('action')){
            case 'create' :
                self::create();
                break; 
            case 'read' :
                self::read();
                break;            
            case 'delete' :
                self::delete();
                break;
            default :
                include 'views/components/email/list.php';
                break;
        }
    }

 

    public static function read(){
        $email = new email(WebTools::fromRequest('id'));
        include 'views/components/email/show.php';
    }


   
    public static function delete(){
        $email = new email(WebTools::fromRequest('id'));
        $email->delete();
        WebTools::setInFlashBag('Notice', "L'email de ".$email->getNom()." : ".$email->getemail()." à été supprimé !");
        include 'views/components/email/list.php';


    }

    public static function findAll(){
        $staticemail = new email();
        return $staticemail->find_all();
    }

    public static function getPage(){
        switch(WebTools::fromRequest('page')){
            case 'contact' :
                include 'views/pages/contact.php';
                break;
            case 'email' :
                emailController::routing();
                break;
                case 'email' :
               include 'views/components/email/list.php';
                break;
            default :
                include 'views/pages/.html';
        }
    }


    public static function getPrenomPage(){
        $sql = "select prenom from email where nom = '".WebTools::fromRequest('page')."'";
//        var_dump(DB::query($sql));exit;
        return DB::get_sql_object($sql)->email;
    }
}

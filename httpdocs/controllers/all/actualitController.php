<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\article;
use Noneslad\Tools\DB\model as DB;

/**
 * Description of article
 *
 * @author Job
 */
class articleController {

    public static function routing(){
        switch (WebTools::fromRequest('action')){
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
            
                
            default :
                include 'views/components/article/list.php';
                break;
        }
    }

    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/article/new.php';
                break;
            case 'POST':
                $article = new article();
             	$article->setId_lang(WebTools::fromRequest('id_lang'));
                $article->setTitre(WebTools::fromRequest('titre'));
                $article->setText(WebTools::fromRequest('text'));
                $data=date("Y-m-d");
                $article->setDate($data);
               
                $article->setAffichage(WebTools::fromRequest('affichage'));
               
                
                $article->insert();
                WebTools::setInFlashBag('Notice', "L'article ".$article->getTitre()."  à été enregistré avec succés !");
                include 'views/components/article/list.php';
                break;
        }
    }

  

    public static function read(){
        $article = new article(WebTools::fromRequest('id'));
        include 'views/components/article/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $article = new article(WebTools::fromRequest('id'));
                $formData['id'] = $article->getId();
               
                $formData['titre'] = $article->getTitre();
                $formData['text'] = $article->getText();
                $formData['affichage'] = $article->getAffichage();
               
                

                include 'views/components/article/edit.php';
                break;
            case 'POST':
                $article = new article(WebTools::fromRequest('id'));
                $article->setId(WebTools::fromRequest('id'));
                $article->setTitre(WebTools::fromRequest('titre'));
                $article->setText(WebTools::fromRequest('text'));
                $article->setAffichage(WebTools::fromRequest('affichage'));
                $article->update();
                WebTools::setInFlashBag('Notice', "L'article ".$article->getTitre()."  à été modifié avec succés !");
                include 'views/components/article/list.php';
                break;
        }
    }
    public static function delete(){
        $article = new article(WebTools::fromRequest('id'));
        $article->delete();
        WebTools::setInFlashBag('Notice', "L'article ".$article->getTitre()."  à été supprimé !");
        include 'views/components/article/list.php';


    }
//slectionnée toutes les pages
    public static function findAll(){
        $staticarticle = new article();
        return $staticarticle->find_all();
    } 

     public function etat(){
        $article = new article(WebTools::fromRequest('id'));
        if($article->getAffichage() == 1){
            return"Oui";
        }
        else{
            return"Non";
        }
   }
    
     public static function article(){
        $article = new article();
        $sql = "select * from article where affichage = 1 ORDER BY id DESC";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from article where affichage = '".$parents[$i]["id"]."'AND affichage = 1";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
        }
        return $parents;
    } 
   
 
    public static function geten(){

         $rsu = DB::get_sql_tab("select * from article WHERE id_lang != 1 && affichage ='1' ORDER BY id DESC");
         return $rsu;
        
     }
         public static function getfr(){

         $rsu = DB::get_sql_tab("select * from article WHERE id_lang = 1  && affichage ='1' ORDER BY id DESC");
         return $rsu;
        
     }

     public static function getAllLang(){

         $rsu = DB::get_sql_tab("select * from article WHERE id_lang='".$_SESSION["langue"]."'ORDER BY id DESC");
         return $rsu;
        
     }
 
}

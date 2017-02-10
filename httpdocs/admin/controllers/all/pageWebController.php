<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\pageweb;
use Noneslad\Tools\DB\model as DB;

/**
 * Description of pageweb
 *
 * @author Job
 */
class pagewebController {

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
            case 'updatepage' :
                self::updatepage();
                break;
                
            default :
                include 'views/components/pageweb/list.php';
                break;
        }
    }

    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/pageweb/new.php';
                break;
            case 'POST':
                $pageweb = new pageweb();
                $pageweb->setId_lang(WebTools::fromRequest('id_lang'));
                $pageweb->setNom(WebTools::fromRequest('nom'));
                $pageweb->setTitle(WebTools::fromRequest('title'));
                $pageweb->setDescripion(WebTools::fromRequest('descripion'));
                $pageweb->setContenu(WebTools::fromRequest('contenu'));
                $pageweb->setMenu(WebTools::fromRequest('menu'));
                $nom = $pageweb->getNom();
                $ordree = $pageweb->getNpage($pageweb->getId());
                $pageweb->setRewrite($pageweb->nf_urlencode($nom));
                $pageweb->setOrdre(intval($ordree->nb+1));
                $pageweb->setId_parent(WebTools::fromRequest('id_parent'));
                $pageweb->setSlide('fichier');
                 
                $pageweb->insert();
                WebTools::setInFlashBag('Notice', "La page ".$pageweb->getNom()."  à été enregistré avec succés !");
                include 'views/components/pageweb/list.php';
                break;
        }
    }

  

    public static function read(){
        $pageweb = new pageweb(WebTools::fromRequest('id'));
        include 'views/components/pageweb/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $pageweb = new pageweb(WebTools::fromRequest('id'));
                $formData['id'] = $pageweb->getId();
                $formData['nom'] = $pageweb->getNom();
                $formData['title'] = $pageweb->getTitle();
                $formData['descripion'] = $pageweb->getDescripion();
                $formData['contenu'] = $pageweb->getContenu();
                $formData['id_parent'] = $pageweb->getId_parent();
                $formData['menu'] = $pageweb->getMenu();
                

                include 'views/components/pageweb/edit.php';
                break;
            case 'POST':
                $pageweb = new pageweb(WebTools::fromRequest('id'));
                $pageweb->setId(WebTools::fromRequest('id'));
                $pageweb->setNom(WebTools::fromRequest('nom'));
                $pageweb->setTitle(WebTools::fromRequest('title'));
                $pageweb->setDescripion(WebTools::fromRequest('descripion'));
                $pageweb->setContenu(WebTools::fromRequest('contenu'));
                $pageweb->setId_parent(WebTools::fromRequest('id_parent'));
                $pageweb->setMenu(WebTools::fromRequest('menu'));
                if($_FILES['fichier']['name']!=""){
                   
                $pageweb->setSlide('fichier');
                }
                $pageweb->update();
                WebTools::setInFlashBag('Notice', "La page ".$pageweb->getNom()."  à été modifié avec succés !");
                include 'views/components/pageweb/list.php';
                break;
        }
    }
    public static function delete(){
        $pageweb = new pageweb(WebTools::fromRequest('id'));
        $pageweb->delete();
        WebTools::setInFlashBag('Notice', "La page ".$pageweb->getNom()."  à été supprimé !");
        include 'views/components/pageweb/list.php';


    }
//slectionnée toutes les pages
    public static function findAll(){
        $staticpageweb = new pageweb();
        return $staticpageweb->find_all();
    } 

// aficher le menu corectement 
    public static function menu(){
        $sql = "select * from pageweb where id_parent = 1 AND menu = 1 ORDER BY ordre";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from pageweb where id_parent = '".$parents[$i]["id"]."'AND menu = 1";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
        }
        return $parents;
    } 
    
  
     public static function updatepage() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $pageweb = new pageweb();
                $formData['id'] = $pageweb->getId();
               $formData['ordre'] = $pageweb->getOrdre();

                include 'views/components/pageweb/editpage.php';
                break;
            case 'POST':
                // Parcourir les ordres transmis
                $new_ordre = array();
                foreach ($_POST as $id => $ordre) {
                    $id = substr($id,6);
                    $new_ordre["id"][]=$id;
                    $new_ordre["ordre"][]=$ordre;
                }
                array_multisort($new_ordre["ordre"],SORT_NUMERIC,SORT_ASC,
                                $new_ordre["id"],SORT_NUMERIC,SORT_ASC);
                // On réécrit l'ordre
                for($i=0;$i<count($new_ordre["ordre"]);$i++){
                    $new_ordre["ordre"][$i]=intval($i+1);
                    // requete update
                    $pageweb = new pageweb($new_ordre["id"][$i]);
                    $pageweb->setOrdre($new_ordre["ordre"][$i]);
                    $pageweb->update();
                }

                include 'views/components/pageweb/list.php';

                break;
        }
    }
    

   public static function geten(){

       $sql = "select * from pageweb where id_parent = 1 AND id_lang='".$_SESSION["langue"]."' ORDER BY ordre";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from pageweb where id_parent = '".$parents[$i]["id"]."'AND menu = 1";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
        }
        return $parents;
     }
        public static function getfr(){
  $sql = "select * from pageweb where id_parent = 1 AND id_lang='".$_SESSION["langue"]."' ORDER BY ordre";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from pageweb where id_parent = '".$parents[$i]["id"]."'AND menu = 1";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
        }
        return $parents;
        
     }

     public static function getAllLang(){

         $rsu = DB::get_sql_tab("select * from pageweb WHERE id_lang='".$_SESSION["langue"]."'");
         return $rsu;
        
     }
   
 
 
}

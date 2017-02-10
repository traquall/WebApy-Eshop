<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\categorie;
use Noneslad\Tools\DB\model as DB;


class categorieController {

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
                include 'views/components/categorie/list.php';
                break;
        }
    }

    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/categorie/new.php';
                break;
            case 'POST':
                $categorie = new categorie();

                $categorie->setNom(WebTools::fromRequest('nom'));
                $categorie->setId_lang(WebTools::fromRequest('id_lang'));
                $categorie->setContenu(WebTools::fromRequest('contenu'));
                $ordree = $categorie->getNpage();
                $categorie->setOrdre(intval($ordree->nb+1));
                $niveau = $categorie->getNiveauParent(WebTools::fromRequest('id_parent'));
                $categorie->setNiveau(intval($niveau+1));
                $categorie->setId_parent(WebTools::fromRequest('id_parent'));
                 
                $categorie->insert();
                WebTools::setInFlashBag('Notice', "La categorie ".$categorie->getNom()."  à été enregistré avec succés !");
                include 'views/components/categorie/list.php';
                break;
        }
    }

  

    public static function read(){
        $categorie = new categorie(WebTools::fromRequest('id'));
        include 'views/components/categorie/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $categorie = new categorie(WebTools::fromRequest('id'));
                $formData['id'] = $categorie->getId();
                $formData['nom'] = $categorie->getNom();
                $formData['id_lang'] = $categorie->getId_lang();
                $formData['contenu'] = $categorie->getContenu();
                $formData['id_parent'] = $categorie->getId_parent();
                
                

                include 'views/components/categorie/edit.php';
                break;
            case 'POST':
                $categorie = new categorie(WebTools::fromRequest('id'));
                $categorie->setNom(WebTools::fromRequest('nom'));
                $categorie->setId_lang(WebTools::fromRequest('id_lang'));
                $categorie->setContenu(WebTools::fromRequest('contenu'));
                $categorie->setId_parent(WebTools::fromRequest('id_parent'));
                
                 
                $categorie->update();
                WebTools::setInFlashBag('Notice', "La categorie ".$categorie->getNom()."  à été modifié avec succés !");
                include 'views/components/categorie/list.php';
                break;
        }
    }
    public static function delete(){
        $categorie = new categorie(WebTools::fromRequest('id'));
        $categorie->delete();
        WebTools::setInFlashBag('Notice', "La categorie ".$categorie->getNom()."  à été supprimé !");
        include 'views/components/categorie/list.php';


    }
//slectionnée toutes les pages
    public static function findAll(){
        $staticCategorie = new categorie();
        return $staticCategorie->find_all();
    } 

// aficher le menu corectement 
    public static function menu(){
        $sql = "select * from categorie where id_parent = 1 AND ORDER BY ordre";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from categorie where id_parent = '".$parents[$i]["id"]."'";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
        }
        return $parents;
    } 
    
  
     public static function updatepage() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $categorie = new categorie();
                $formData['id'] = $categorie->getId();
               $formData['ordre'] = $categorie->getOrdre();

                include 'views/components/categorie/editpage.php';
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
                    $categorie = new categorie($new_ordre["id"][$i]);
                    $categorie->setOrdre($new_ordre["ordre"][$i]);
                    $categorie->update();
                }

                include 'views/components/categorie/list.php';

                break;
        }
    }
    

   
    public static function geten(){

       $sql = "select * from categorie where id_parent = 1 AND id_lang='".$_SESSION["langue"]."' ORDER BY ordre";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from categorie where id_parent = '".$parents[$i]["id"]."'";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
            for($j=0;$j<count($enfants);$j++) {
                $sql3= "SELECT * from categorie where id_parent = '".$enfants[$j]["id"]."'";
                $enfants2 = DB::get_sql_tab($sql3);
                $parents[$i]["enfants"][$j]["enfants"] = $enfants2;
                for($k=0;$k<count($enfants2);$k++) {
                    $sql4= "SELECT * from categorie where id_parent = '".$enfants2[$k]["id"]."'";
                    $enfants3 = DB::get_sql_tab($sql4);
                    $parents[$i]["enfants"][$j]["enfants"][$k]["enfants"] = $enfants3;
                }
            }
        }
        return $parents;
     }
        public static function getfr(){
  $sql = "select * from categorie where id_parent = 1 AND id_lang='".$_SESSION["langue"]."' ORDER BY ordre";
        $parents = DB::get_sql_tab($sql);
        for($i=0;$i<count($parents);$i++) {
            $sql2 = "select * from categorie where id_parent = '".$parents[$i]["id"]."'";
            $enfants = DB::get_sql_tab($sql2);
            $parents[$i]["enfants"] = $enfants;
            for($j=0;$j<count($enfants);$j++) {
                $sql3= "SELECT * from categorie where id_parent = '".$enfants[$j]["id"]."'";
                $enfants2 = DB::get_sql_tab($sql3);
                $parents[$i]["enfants"][$j]["enfants"] = $enfants2;
                for($k=0;$k<count($enfants2);$k++) {
                    $sql4= "SELECT * from categorie where id_parent = '".$enfants2[$k]["id"]."'";
                    $enfants3 = DB::get_sql_tab($sql4);
                    $parents[$i]["enfants"][$j]["enfants"][$k]["enfants"] = $enfants3;
                }
            }
        }
        return $parents;
        
     }

     public static function getAllLang(){

         $rsu = DB::get_sql_tab("select * from categorie WHERE id_lang='".$_SESSION["langue"]."'");
         return $rsu;
        
     }
}

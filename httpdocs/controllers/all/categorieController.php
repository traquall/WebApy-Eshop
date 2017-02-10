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

         $rsu = DB::get_sql_tab("SELECT * from categorie WHERE id_lang = 2 AND id_parent = 1 ORDER BY ordre");
         return $rsu;
        
     }
         public  static function getfr(){

         $rsu = DB::get_sql_tab("SELECT * from categorie WHERE id_lang = 1 AND id_parent = 1 ORDER BY ordre");
         return $rsu;
        
     }

     public static function getAllLang(){

         $rsu = DB::get_sql_tab("SELECT * from categorie WHERE id_lang='".$_SESSION["langue"]."'");
         return $rsu;
        
     }
 
  public  static function doc_c(){

       $rsu = DB::get_sql_tab("SELECT * from document WHERE id IN (SELECT id_doc FROM cat_doc WHERE id_cat='".$_GET["id"]."') ORDER BY cat ASC");
         return $rsu;
        
     }
      public static function ext($rsu){

         

         if ($rsu=="pdf") {
             return "pdf.png";
         }
         if ($rsu=="doc") {
             return "doc.png";
         }
          if ($rsu=="zip") {
             return "zip.png";
         }
         if ($rsu=="png" || $rsu=="jpg" || $rsu=="gif") {
             return "img.png";
         }
         if ($rsu=="xls" || $rsu=="xlsx") {
             return "xls.png";
         }
         if ($rsu=="mp4" || $rsu=="mkv" || $rsu=="avi" || $rsu=="mpeg") {
             return "film.png";
         }
    
        
     }
      public  static function sousmenu($id_s){

       $rsu = DB::get_sql_tab("SELECT * from categorie where id_parent = '".$id_s."' ORDER BY ordre");
         return $rsu;
        
     }
      public  static function sousmenuNb($id_s,$niveau=1){

       $rsu = DB::get_sql_tab("SELECT COUNT(id) AS nb FROM categorie WHERE id_parent = '".$id_s."' AND niveau>'".$niveau."'");
         return $rsu;
        
     }

   /*  public  static function filAriane($id){
        //echo $id;
        $ariane = "";
        $rsa = DB::get_sql_tab("SELECT id_parent, nom FROM categorie WHERE id = '".$id."'");
        $ariane = "<a href='index.php?page=admin&crud=categorie&action=read&id=".$id."'>".$rsa[0]["nom"]."</a>";
        // On récupère les parents
        $rsb = DB::get_sql_tab("SELECT id_parent, nom FROM categorie WHERE id = '".$rsa[0]["id_parent"]."'");
        if($rsa[0]["id_parent"]>1){
            $ariane = "<a href='index.php?page=admin&crud=categorie&action=read&id=".$rsa[0]["id_parent"]."'>".$rsb[0]["nom"]."</a>&nbsp;>&nbsp;".$ariane;
            $rsc = DB::get_sql_tab("SELECT id_parent, nom FROM categorie WHERE id = '".$rsb[0]["id_parent"]."'");
            if($rsb[0]["id_parent"]>1){
                $ariane = "<a href='index.php?page=admin&crud=categorie&action=read&id=".$rsb[0]["id_parent"]."'>".$rsc[0]["nom"]."</a>&nbsp;>&nbsp;".$ariane;
                $rsd = DB::get_sql_tab("SELECT id_parent, nom FROM categorie WHERE id = '".$rsc[0]["id_parent"]."'");
                if($rsc[0]["id_parent"]>1){
                    $ariane = "<a href='index.php?page=admin&crud=categorie&action=read&id=".$rsc[0]["id_parent"]."'>".$rsd[0]["nom"]."</a>&nbsp;>&nbsp;".$ariane;
                    // On récupère l'IdParent
                }
            }
        }
        return $ariane;
     }*/
    
}
<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\document;
use Noneslad\Tools\DB\model as DB;


class docController {

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
                include 'views/components/document/list.php';
                break;
        }
    }

    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/document/new.php';
                break;
            case 'POST':
                $document = new document();

                $document->setNom(WebTools::fromRequest('nom'));
                $document->setId_lang(WebTools::fromRequest('id_lang'));
                $data=date("Y-m-d");
                $document->setDate_c($data);
                $document->setUrl('fichier');
                $p=$_FILES['fichier']['name'];
                $rest = explode(".", $p);
                $ext = $rest[intval(count($rest)-1)];
                $document->setExt($ext);
                $document->setCat(WebTools::fromRequest('cat'));
                $document->insert();

                $pp= docController::getlid();
                $der_id = $pp[0]["id"];
                $values = WebTools::fromRequest('id_cat');
                $idcat = 0;
                foreach ($values as $a){
                    $idcat = $a;
                    docController::setCatDoc($a,$der_id);
                }
                
          //Insertion de chaque ligne dans la table.
                WebTools::setInFlashBag('Notice', "Le document ".$document->getNom()."  à été enregistré avec succés !");
                $_GET["id"]=$idcat;
                include 'views/components/document/list.php';
                break;
        }
    }

  

    public static function read(){
        $document = new document(WebTools::fromRequest('id'));
        include 'views/components/document/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $document = new document(WebTools::fromRequest('id'));
                $formData['id'] = $document->getId();
                $formData['id_lang'] = $document->getId_lang();
                $formData['nom'] = $document->getNom();
                $formData['ext'] = $document->getExt();
                $formData['cat'] = $document->getCat();
                $formData['fichier'] = $document->getUrl();                

                include 'views/components/document/edit.php';
                    break;
            case 'POST':
                $document = new document(WebTools::fromRequest('id'));
                $document->setId(WebTools::fromRequest('id'));
                $document->setNom(WebTools::fromRequest('nom'));
                $document->setCat(WebTools::fromRequest('cat'));

                $data=date("Y-m-d");
                $document->setDate_m($data);
                              
                if($_FILES['fichier']['name']!=""){
                   
                    $document->setUrl('fichier');
                }
                $p=$_FILES['fichier']['name'];
                $rest = explode(".", $p);
                $ext = $rest[intval(count($rest)-1)];
                $document->setExt($ext);
                $document->update();
/**/
                $der_id = WebTools::fromRequest('id');
                docController::delCatDoc($der_id);
                $values = WebTools::fromRequest('id_cat');
                $idcat = 0;
                foreach ($values as $a){
                    $idcat = $a;
                    docController::setCatDoc($a,$der_id);
                }

                WebTools::setInFlashBag('Notice', "Le document ".$document->getNom()."  à été modifié avec succés !");
                $_GET["id"]=$idcat;
                include 'views/components/document/list.php';
                break;
        }
    }
    public static function delete(){
        $document = new document(WebTools::fromRequest('id'));
        // On supprime la liaison
        docController::delCatDoc(WebTools::fromRequest('id'));
        // On supprime le doc
        $document->delete();
        WebTools::setInFlashBag('Notice', "Le document ".$document->getNom()."  à été supprimé !");
        $_GET["id"]=WebTools::fromRequest('idcat');
        include 'views/components/document/list.php';


    }
//slectionnée toutes les pages
    public static function findAll(){
        $staticdocument = new document();
        return $staticdocument->find_all();
    } 

       public static function geten(){
           $rsu = DB::get_sql_tab("select * from document WHERE id_lang = 2
                                AND id IN (SELECT id_doc FROM cat_doc WHERE id_cat='".$_GET["id"]."')");
         return $rsu;   
     }

        public  static function getfr(){

       $rsu = DB::get_sql_tab("select * from document WHERE id_lang = 1
                                AND id IN (SELECT id_doc FROM cat_doc WHERE id_cat='".$_GET["id"]."')");
         return $rsu;
        
     }
       public static function getlid(){

         $rsu = DB::get_sql_tab("SELECT id FROM document ORDER BY id DESC limit 0,1");
         return $rsu;
        
     }

    public static function getCatDoc($id_doc){
        $rsu = DB::get_sql_tab("SELECT id_cat FROM cat_doc WHERE `id_doc`='".$id_doc."'");
        return $rsu;
    }
    
    public static function setCatDoc($id_cat,$id_doc){
        DB::query("INSERT INTO cat_doc (`id_cat`,`id_doc`) values ('".$id_cat."','".$id_doc."')");
        
    }
     public static function delCatDoc($id_doc){
        DB::query("DELETE FROM cat_doc WHERE `id_doc`='".$id_doc."'");
        
    }
      public  function getcat(){

         $rsu = DB::get_sql_tab("select * from categorie WHERE id_lang='".$_SESSION["langue"]."'");
         return $rsu;
        
     }  

    public static function rec_in_array($needle, $haystack, $alsokeys=false)
    {
        if(!is_array($haystack)) return false;
        if(in_array($needle, $haystack) || ($alsokeys && in_array($needle, array_keys($haystack)) )) return true;
        else {
            foreach($haystack AS $element) {
                if(docController::rec_in_array($needle, $element, $alsokeys)){
                    return true;
                }
            }
            return false;
        }
    } 
}

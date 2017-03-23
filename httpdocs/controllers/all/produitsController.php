<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\produits;
use Noneslad\Tools\DB\model as DB;


class produitsController {

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
                $produit = new produits();



                $produit->setNom(WebTools::fromRequest('nom'));
                $produit->setId_lang(WebTools::fromRequest('id_lang'));
                $data=date("Y-m-d");
                $produit->setDate_c($data);                
                //$p=$_FILES['fichier']['name'];
                //$produit->setPdf($p);
                $produit->setReference(WebTools::fromRequest('reference'));
                $produit->setCode_barre(WebTools::fromRequest('code_barre'));
                $produit->setActif(WebTools::fromRequest('actif'));
                $produit->setEtat(WebTools::fromRequest('etat'));
                $produit->setResume(WebTools::fromRequest('resume'));
                $produit->setDescription(WebTools::fromRequest('description'));
                $produit->setPrix_ht(WebTools::fromRequest('prix_ht'));
                $produit->setPrix_ttc(WebTools::fromRequest('prix_ttc'));
                $produit->setTaxe(WebTools::fromRequest('taxe'));
                $produit->setBalise_titre(WebTools::fromRequest('balise_titre'));
                $produit->setMeta_desc(WebTools::fromRequest('meta_desc'));
                $produit->setQuantite(WebTools::fromRequest('quantite'));
                //$produit->setImage(WebTools::fromRequest('image'));
                $produit->setFournisseur(WebTools::fromRequest('fournisseur'));
                //$rest = explode(".", $p);
                //$ext = $rest[intval(count($rest)-1)];
                $produit->setCat(WebTools::fromRequest('cat'));
                $produit->insert();

                /*
                $pp= docController::getlid();
                $der_id = $pp[0]["id"];
                $values = WebTools::fromRequest('id_cat');
                $idcat = 0;
                foreach ($values as $a){
                    $idcat = $a;
                    docController::setCatDoc($a,$der_id);
                }*/

          //Insertion de chaque ligne dans la table.
                WebTools::setInFlashBag('Notice', "Le document ".$produit->getNom()."  à été enregistré avec succés !");
                $_GET["id"]=WebTools::fromRequest('cat');
                include 'views/components/document/list.php';
                break;
        }
    }



    public static function read(){
        $produit = new document(WebTools::fromRequest('id'));
        include 'views/components/document/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $document = new produit(WebTools::fromRequest('id'));
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
        //$document = new document(WebTools::fromRequest('id'));
        // On supprime la liaison
        //docController::delCatDoc(WebTools::fromRequest('id'));
        // On supprime le doc
        DB::query("delete from produits where id="+WebTools::fromRequest('id')+";");
        WebTools::setInFlashBag('Notice', "Le document à été supprimé !");
        $_GET["id"]=WebTools::fromRequest('idcat');
        include 'views/components/document/list.php';
    }

    //slectionnée toutes les pages
    public static function findAll(){
        $staticdocument = new document();
        return $staticdocument->find_all();
    }

    public static function geten(){
        //$rsu = DB::get_sql_tab("select * from produits WHERE id_lang = 2
        //                    AND id IN (SELECT id_doc FROM cat_doc WHERE id_cat='".$_GET["id"]."')");
        echo '<script>console.log("coucou")</script>';
        $rsu = DB::get_sql_tab("select * from produits");
        return $rsu;
    }

    public  static function getfr(){
        //$rsu = DB::get_sql_tab("select * from produits WHERE id_lang = 1
        //                    AND id IN (SELECT id_doc FROM cat_doc WHERE id_cat='".$_GET["id"]."')");
        echo '<script>console.log("coucou")</script>';
        $rsu = DB::get_sql_tab("select * from produits");
        return $rsu;
     }

    public static function getCatProd($id_doc){
        $rsu = DB::get_sql_tab("SELECT id_cat FROM cat_doc WHERE `id_doc`='".$id_doc."'");
        return $rsu;
    }

    public static function setCatProd($id_cat,$id_doc){
        DB::query("INSERT INTO cat_doc (`id_cat`,`id_doc`) values ('".$id_cat."','".$id_doc."')");
    }

    public static function delCatProd($id_doc){
        DB::query("DELETE FROM cat_doc WHERE `id_doc`='".$id_doc."'");
    }

    public  function getcat(){
        $rsu = DB::get_sql_tab("select * from categorie WHERE id_lang='".$_SESSION["langue"]."'");
        return $rsu;
    }
}

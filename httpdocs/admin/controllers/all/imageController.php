<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\image;
use Noneslad\Tools\DB\model as DB;


/**
 * Description of image
 *
 * @author Job
 */
class imageController {

    public static function routing() {
        switch (WebTools::fromRequest('action')) {

            case 'create' :
                self::create();
                break;
            case 'read' :
                self::read();
                break;
            case 'update' :
                self::update();
                break;
            case 'updateimg' :
                self::updateimg();
                break;
            case 'delete' :
                self::delete();
                break;

            default :
                include 'views/components/image/list.php';
                break;
        }
    }

    public static function create() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                include 'views/components/image/new.php';
                break;
            case 'POST':

                $image = new image();
                $image->setType(WebTools::fromRequest('type'));
                $image->setNom(WebTools::fromRequest('nom'));
                $image->setAlt(WebTools::fromRequest('alt'));
                $image->setUrl('fichier');
                $image->setAffichage(WebTools::fromRequest('affichage'));
                $ordree = $image->getImg();
                $image->setOrdre(intval($ordree->nb+1));
                $image->insert();

                include 'views/components/image/list.php';
                break;
        }
    }

    public static function read() {
        $image = new image(WebTools::fromRequest('id'));
        include 'views/components/image/show.php';
    }

    public static function update() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $image = new image(WebTools::fromRequest('id'));
                $formData['id'] = $image->getId();
                $formData['type'] = $image->getType();
                $formData['nom'] = $image->getNom();
                $formData['alt'] = $image->getAlt();
                $formData['url'] = $image->getUrl();

                $formData['affichage'] = $image->getAffichage();

                include 'views/components/image/edit.php';
                break;
            case 'POST':
                $image = new image(WebTools::fromRequest('id'));

                $image->setType(WebTools::fromRequest('type'));
                $image->setNom(WebTools::fromRequest('nom'));
                $image->setAlt(WebTools::fromRequest('alt'));
                $image->setAffichage(WebTools::fromRequest('affichage'));
                
                 if($_FILES['fichier']['name']!=""){
                   
                $image->setUrl('fichier');
                }
                $image->update();

                include 'views/components/image/list.php';

                break;
        }
    }
     public static function updateimg() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $image = new image();
                $formData['id'] = $image->getId();
               $formData['ordre'] = $image->getOrdre();

                include 'views/components/image/editimg.php';
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
                    $image = new image($new_ordre["id"][$i]);
                    $image->setOrdre($new_ordre["ordre"][$i]);
                    $image->update();
                }

                include 'views/components/image/list.php';

                break;
        }
    }

    public static function delete() {
        $image = new image(WebTools::fromRequest('id'));
        $image->delete();
        WebTools::setInFlashBag('Notice', "la image " . $image->getType() . " :  &agrave; &eacute;t&eacute; supprim&eacute; !");
        include 'views/components/image/list.php';
    }

    public static function findAll() {
        $staticimage = new image();
        return $staticimage->find_all();
    }

}

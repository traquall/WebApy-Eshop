<?php
namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\optionsite_en;
use Noneslad\Tools\DB\model as DB;
use PDO;
/**
 * Description of Optionsite
 *
 * @author Job
 */
class optionenController {

    public static function routing(){
        switch (WebTools::fromRequest('action')){
            case 'update' :
                self::update();
                break;
            default :
                self::read();
                break;
        }
    }

    public static function read(){
        $optionsite_en = new optionsite_en(1);
        include 'views/components/Optionsiteen/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $optionsite_en = new optionsite_en(1);
                $formData['heureabonne'] = $optionsite_en->getHeureabonne();
                $formData['heurevisite'] = $optionsite_en->getHeurevisite();
                $formData['tel'] = $optionsite_en->getTel();
                $formData['keywords'] = $optionsite_en->getKeywords();
               $formData['text'] = $optionsite_en->getText();
               $a=$optionsite_en->getActu();

               if($optionsite_en->getActu()=="1"){

                 $a="";

               }
                 $formData['actu'] = $a;
                include 'views/components/Optionsiteen/edit.php';
                break;
            case 'POST':
                $optionsite_en = new optionsite_en(1);
                $optionsite_en->setHeureabonne(WebTools::fromRequest('heureabonne'));
                $optionsite_en->setHeurevisite(WebTools::fromRequest('heurevisite'));
                $optionsite_en->setTel(WebTools::fromRequest('tel'));
                $optionsite_en->setKeywords(WebTools::fromRequest('keywords'));
                $optionsite_en->setText(WebTools::fromRequest('text'));
                $ac=WebTools::fromRequest('actu');
                if(WebTools::fromRequest('actu')==""){
                    $ac="1";
                }
                
                $optionsite_en->setActu($ac);
                $optionsite_en->update();
                WebTools::setInFlashBag("Notice", "les options ont été modifié avec succés !");
                include 'views/components/Optionsiteen/show.php';
                break;
        }
    }
   

    public static function findAll(){
        $staticoptionsite_en = new optionsite_en();
        return $staticoptionsite_en->find_all();
    }

  }


  

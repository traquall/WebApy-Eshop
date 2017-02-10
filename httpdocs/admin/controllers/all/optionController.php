<?php
namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\optionsite;
use Noneslad\Tools\DB\model as DB;
use PDO;
/**
 * Description of Optionsite
 *
 * @author Job
 */
class optionController {

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
        $optionsite = new optionsite(1);
        include 'views/components/Optionsite/show.php';
    }


    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $optionsite = new optionsite(1);
                $formData['heureabonne'] = $optionsite->getHeureabonne();
                $formData['heurevisite'] = $optionsite->getHeurevisite();
                $formData['tel'] = $optionsite->getTel();
                $formData['keywords'] = $optionsite->getKeywords();
                $formData['text'] = $optionsite->getText();
                $formData['lienf'] = $optionsite->getLienf();
                $formData['lieng'] = $optionsite->getLieng();
                $formData['lient'] = $optionsite->getLient();
                $formData['logo'] = $optionsite->getLogo();
               // $formData['sliderex'] = $optionsite->getSliderex();
                 $a=$optionsite->getActu();
               if($optionsite->getActu()=="1"){
                 $a="";
               }
                 $formData['actu'] = $a;
                           
                include 'views/components/Optionsite/edit.php';
                break;
            case 'POST':
                $optionsite = new optionsite(1);
                $optionsite->setHeureabonne(WebTools::fromRequest('heureabonne'));
                $optionsite->setHeurevisite(WebTools::fromRequest('heurevisite'));
                $optionsite->setTel(WebTools::fromRequest('tel'));
                $optionsite->setKeywords(WebTools::fromRequest('keywords'));
                $optionsite->setText(WebTools::fromRequest('text'));
                $optionsite->setLienf(WebTools::fromRequest('lienf'));
                $optionsite->setLieng(WebTools::fromRequest('lieng'));
                $optionsite->setLient(WebTools::fromRequest('lient'));
                if($_FILES['fichier']['name']!=""){
                   
                $optionsite->setLogo('fichier');
                }
                  if($_FILES['fichierr']['name']!=""){
                   
                $optionsite->setSliderex('fichierr');
                }
                     $ac=WebTools::fromRequest('actu');
                if(WebTools::fromRequest('actu')==""){
                    $ac="1";
                }
                $optionsite->setActu($ac);
                $optionsite->update();
                WebTools::setInFlashBag("Notice", "les options ont été modifié avec succés !");
                include 'views/components/Optionsite/show.php';
                break;
        }
    }
   

    public static function findAll(){
        $staticoptionsite = new optionsite();
        return $staticoptionsite->find_all();
    }

  }


  

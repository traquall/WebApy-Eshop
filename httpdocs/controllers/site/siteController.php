<?php
namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;

use Noneslad\Entity\email;


class siteController {
    /* ------------------------------------------------------------ */
    /* ----------------- ROUTING NIVEAU 1 ------------------------- */
    /* ------------------------------------------------------------ */
    
 
    public static function routing() {
        global $SITE_VAR;
        switch (WebTools::fromRequest('site')) {
            
            case 'contact' :
            switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
              
          
                include 'views/pages/site/contact.php';

                break;

                 case 'POST':
                
                $email = new email();
                $email->setNom(WebTools::fromRequest('nom'));
                $email->setAdresse(WebTools::fromRequest('adresse'));
                $email->setemail(WebTools::fromRequest('email'));
                $email->setMessage(WebTools::fromRequest('message'));
                $email->setSoci(WebTools::fromRequest('soci'));
                $email->setVille(WebTools::fromRequest('ville'));
                $email->setCivilite(WebTools::fromRequest('civilite'));
                $email->setCp(WebTools::fromRequest('cp'));
                
                $email->setVousetes(WebTools::fromRequest('vousetes'));
                $email->setPrenom(WebTools::fromRequest('prenom'));
                $email->setObjet(WebTools::fromRequest('objet'));
                $email->setPhone(WebTools::fromRequest('phone'));

                $email->insert();
                
                include 'views/pages/site/contact.php';
               

               
        }
          
         break;
         case 'actualite' :
          include 'views/pages/site/article.php';
         	 break;
              case 'plan-du-site' :
          include 'views/pages/site/plan-du-site.php';
             break;	
             case 'news' :
          include 'views/pages/site/article.php';
             break; 
             	
                     case $lien = WebTools::fromRequest('site');
                include  'views/layout/site/text.php';
         break;
                 default :
                include 'views/pages/accueil.php';

        }
    }


}

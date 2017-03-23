<?php


namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\PageWeb;
use Noneslad\Entity\option;
use Noneslad\Entity\user;
use Noneslad\Entity\image;
use Noneslad\Entity\article;
use Noneslad\Entity\extranet;
use Noneslad\Entity\categorie;
use Noneslad\Entity\produits;
use Noneslad\Entity\optionsite_en;
use Noneslad\Tools\DB\model as DB;

class AdminController {
    /* ------------------------------------------------------------ */
    /* ----------------- ROUTING NIVEAU 1 ------------------------- */
    /* ------------------------------------------------------------ */

    public static function routing() {
        
        if (User::isAnyConnected()) {
            $user = User::giveMeUser();
            if ($user->getNiveau() == 40) {

                switch (WebTools::fromRequest('crud')) {
                    case 'pageweb' :
                        pagewebController::routing();
                        break;
                    case 'user' :
                        UserSiteController::routing();
                        break;
                    case 'email' :
                        EmailController::routing();
                        break;
                    case 'optionsite' :
                        OptionController::routing();
                        break;
                    case 'article' :
                        articleController::routing();
                        break;
                    case 'extranet' :
                        extranetController::routing();
                        break;
                    case 'image' :
                        imageController::routing();
                        break;
                    case 'categorie' :
                        categorieController::routing();
                        break;
                    case 'produits' :
                        produitsController::routing();
                        break;
                    case 'optionsite_en' :
                        optionenController::routing();
                        break;
                    default :
                        include 'views/pages/admin/home.html';
                }
            } else {
                echo "<META http-equiv='refresh' content='0.01; URL=?&page=user&action=connexion'>";
            }
        } else {
            echo "<META http-equiv='refresh' content='0.01; URL=?&page=user&action=connexion'>";
        }
    }

}

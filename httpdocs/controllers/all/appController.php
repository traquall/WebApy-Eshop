<?php
namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\pageweb;
use Noneslad\Entity\option;
use Noneslad\Entity\user;
use Noneslad\Entity\categorie;
use Noneslad\Tools\DB\model as DB;

class AppController {
    /* ------------------------------------------------------------ */
    /* ----------------- ROUTING NIVEAU 1 ------------------------- */
    /* ------------------------------------------------------------ */

    public static function getPage() {
        switch (WebTools::fromRequest('page')) {
            case 'user' :
                UserSiteController::routing();
                break;
            case 'admin' :
                AdminController::routing();
                break;
            case 'site' :
                siteController::routing();   
                 break;        
        }
    }

}

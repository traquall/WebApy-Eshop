<?php

namespace Noneslad\Controllers;

use Noneslad\Controllers;
use Noneslad\Tools\WebTools;

//die(print_r($_POST));
require_once './config.inc';
if (WebTools::fromRequest('page') == "") $_GET["page"]="site";
if (WebTools::fromRequest('page') == "admin") {
    include_once 'views/layout/site/header.php';
    include_once 'views/layout/site/nav.php';
    include_once 'admin/views/layout/admin/aside.php';
    include_once 'admin/views/layout/admin/content.php';
    include_once 'views/layout/site/footer.php';

} else if (WebTools::fromRequest('page') == "user") {
      include_once './views/layout/site/content.php'; 
} 

if(WebTools::fromRequest('page') == "site"){
    include_once './views/layout/site/header.php';

    if($_SESSION["age"]==22){

        //include_once './views/layout/admin/age.php';
    } else{

        include_once './views/layout/site/nav.php';

        if(WebTools::fromRequest('site')!="accueil" && WebTools::fromRequest('site')!= "home") {
             include_once './views/layout/site/nav3.php';
        } else {
          //  include_once '.assets/scripts/facebook-act.js';
            
         include_once './views/layout/site/slider.php';
            //include_once './views/layout/admin/actualite.php';
            //include_once './views/layout/site/facebook.php';
           // include_once './assets/scripts/facebook.js';

        }
        include_once './views/layout/site/content.php';
        include_once './views/layout/site/footer.php';
    } 
}

?>

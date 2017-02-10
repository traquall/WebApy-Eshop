<?php
namespace Noneslad\Controllers;

use Noneslad\Controllers;
use Noneslad\Tools\WebTools;

require_once './config.inc';
if (WebTools::fromRequest('page') == "") $_GET["page"]="admin";
if (WebTools::fromRequest('page') == "admin") {
    include_once './views/layout/admin/header.php';
    include_once './views/layout/admin/nav.php';
    include_once './views/layout/admin/aside.php';
    include_once './views/layout/admin/content.php';
    include_once './views/layout/admin/footer.php';

} else if (WebTools::fromRequest('page') == "user") {
      include_once './views/layout/admin/content.php';
   
} 
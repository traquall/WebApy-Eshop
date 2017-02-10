<?php
namespace Noneslad\Controllers;
use Noneslad\Controllers\appController;
use Noneslad\Entity\PageWeb;

echo '<main id="main" class="tg-main-section tg-haslayout tg-bgwhite">';
echo pageweb::givPage($lien)->contenu;
echo "</main>";
?>
              

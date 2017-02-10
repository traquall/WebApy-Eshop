<?php

use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;

$html = new html();
?>
<h1>Option anglais</h1>
<?php
$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}
?>
<div class="table-responsive">
 
    <table class="table">
        <tr>
            <th>Horaires</th>
            <td><?php echo $optionsite_en->getHeureabonne(); ?></td>
        </tr>
        <tr>
            <th>Lettre d'informations</th>
            <td><?php echo $optionsite_en->getHeurevisite(); ?></td>
        </tr>
        
        <tr>
            <th>Keywords</th>
            <td><?php echo $optionsite_en->getkeywords(); ?></td>
        </tr>
        <tr>
            <th>A propos</th>
            <td><?php echo $optionsite_en->getText(); ?></td>
        </tr>
     
       
         <tr>
            <th>Actualités</th>
            <td><?php $a=$optionsite_en->getActu();

            if($optionsite_en->getActu()=="1") $a=""; echo $a; ?></td>
        </tr>

    </table>
</div>
<div class="well">

    <a class="btn btn-warning" href="?page=admin&crud=optionsite_en&action=update"><i class="fa fa-pencil"></i> </a>

</div>
<?php

use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;

$html = new html();
?>
<h1>Option</h1>
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
            <td><?php echo $optionsite->getHeureabonne(); ?></td>
        </tr>
        <tr>
            <th>Lettre d'informations</th>
            <td><?php echo $optionsite->getHeurevisite(); ?></td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td><?php echo $optionsite->getTel(); ?></td>
        </tr>
        <tr>
            <th>Keywords</th>
            <td><?php echo $optionsite->getkeywords(); ?></td>
        </tr>
        <tr>
            <th>A propos</th>
            <td><?php echo $optionsite->getText(); ?></td>
        </tr>
        <tr>
            <th>Lien Facebook</th>
            <td><?php echo $optionsite->getLienf(); ?></td>
        </tr>
        <tr>
            <th>Lien Google +</th>
            <td><?php echo $optionsite->getLieng(); ?></td>
        </tr>
        <tr>
            <th>Lien Twitter</th>
            <td><?php echo $optionsite->getLient(); ?></td>
        </tr>
         <tr>
            <th>Logo</th>
            <td><img src="<?php echo $optionsite->getLogo(); ?>"  width="300px"/></td>
        </tr>
         <tr>
            <th>Slider extranet</th>
            <td><img src="<?php echo $optionsite->getSliderex(); ?>"  width="400px"/></td>
        </tr>
         <tr>
            <th>Actualités</th>

            <td><?php $a=$optionsite->getActu();

            if($optionsite->getActu()=="1")$a=""; echo $a; ?></td>
        </tr>

    </table>
</div>
<div class="well">

    <a class="btn btn-warning" href="?page=admin&crud=optionsite&action=update"><i class="fa fa-pencil"></i> </a>

</div>
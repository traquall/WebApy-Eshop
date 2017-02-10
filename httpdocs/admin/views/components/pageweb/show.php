<?php 
namespace Noneslad\Controllers;

?>
<h1>Information sur la page Web ! (<?php echo $pageweb->getNom(); ?>)</h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom</th>
        <td><?php echo $pageweb->getNom(); ?></td>
    </tr>
    <tr>
        <th>Balise Title</th>
        <td><?php echo $pageweb->getTitle(); ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $pageweb->getDescripion(); ?></td>
    </tr>
    <tr>
        <th>Afichage</th>
        <td><?php echo $pageweb->etat(); ?></td>
    </tr>
    <tr>
        <th>Page mère</th>
        <td><?php echo $pageweb->getPagess(); ?></td>
    </tr>
    <tr>
        <th>voir sur le site</th>
        <td><a class="btn btn-primary" href="http://patriarche.melis.fr/<?php echo $pageweb->getRewrite(); ?>" target="_blank" >
<i class="glyphicon glyphicon-open-file"></i>
</a>
        </td>
    </tr>
    <!--<tr>
        <th>Contenu</th>
        <td><?php //echo $pageweb->getContenu(); ?></td>
    </tr>-->
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=pageweb&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=pageweb&action=update&id=<?php echo $pageweb->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=pageweb&action=delete&id=<?php echo $pageweb->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>